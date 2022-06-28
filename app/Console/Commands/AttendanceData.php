<?php

namespace App\Console\Commands;

use App\Models\Attendance;
use App\Models\AttendanceWeeklyOff;
use App\Models\CalendarEvent;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\RawAttendance;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AttendanceData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily Attendances';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today();
        //$dayOfMonth=cal_days_in_month(null,'4',2022);
        $employees = Employee::get();
        foreach ($employees as $employee) {
                $rawData = RawAttendance::query()
                    ->where('access_date', $today->format('Y-m-d'))
                    ->where('registration_id', $employee->employee_no)
                    ->get();

                //$max = $rawData->max('access_time');
                //$min = $rawData->min('access_time');

                $shift = $employee->officials->first()->shift;
                $shiftIn = $shift->in;
                $shiftOut = $shift->out;

                // Weekly Off
                foreach ($employee->days as $key => $weeklyOff) {
                    if ($weeklyOff = $weeklyOff->id == $today->format('N')) {
                        break;
                    }
                }

                // Holiday
                $calendarId = $employee->officials->calendar_id;
                $holiday = CalendarEvent::query()
                    ->where('calendar_id', $calendarId)
                    ->where('start', '<=', $today->format('Y-m-d'))
                    ->where('end', '>=', $today->format('Y-m-d'))
                    ->where('is_holiday', 1)
                    ->exists();

//                 Leave Management
                $leave = Leave::query()
                    ->where('employee_id', $employee->id)
                    ->where('leave_from', '<=', $today->format('Y-m-d'))
                    ->where('leave_to', '>=', $today->format('Y-m-d'))
                    ->exists();

                // Attendance Status
                if ($leave){
                    $attendanceStatus= '7';
                }elseif ($rawData->min('access_time') == null) {
                    $attendanceStatus = '2';
                } elseif ($rawData->min('access_time') <= $shiftIn && $rawData->max('access_time') <= $shiftOut) {
                    $attendanceStatus = '4';
                } elseif ($rawData->min('access_time') > $shiftIn) {
                    $attendanceStatus = '3';
                } elseif ($rawData->min('access_time') <= $shiftIn) {
                    $attendanceStatus = '1';
                } elseif ($holiday) {
                    $attendanceStatus = 5;
                } elseif ($weeklyOff == true) {
                    $attendanceStatus = 6;
                }

                $attendanceWeeklyOffs = DB::table('employee_weekly_off')
                    ->where('employee_id', $employee->id)
                    ->get();

                foreach ($attendanceWeeklyOffs as $attendanceWeeklyOff) {
                    AttendanceWeeklyOff::query()->create([
                        'day_id' => $attendanceWeeklyOff->day_id,
                        'employee_id' => $attendanceWeeklyOff->employee_id,
                    ]);
                }

                $leaveCategory=Leave::query()
                    ->where('employee_id', $employee->id)
                    ->where('leave_from', '<=', $today->format('Y-m-d'))
                    ->where('leave_to', '>=', $today->format('Y-m-d'))
                    ->pluck('leave_category_id');

                $data = [
                    'employee_id' => $employee->id,
                    'date' => $today,
                    'in_time' => $rawData->min('access_time'),
                    'out_time' => $rawData->max('access_time'),
                    'department_id' => $employee->officials->first()->department_id,
                    'designation_id' => $employee->officials->first()->designation_id,
                    'leave_category_id' =>     $leaveCategory ,
                    'attendance_status_id' => $attendanceStatus,
                    'weekly_off_id' => $weeklyOff,
                ];

                Attendance::query()->create($data);
        }
    }
}
