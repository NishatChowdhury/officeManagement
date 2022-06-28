<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\Attendance;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use App\Models\RawAttendance;
use Illuminate\Support\Facades\DB;
use App\Models\AttendanceWeeklyOff;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();
        $dayOfMonth=cal_days_in_month(null,'4',2022);
//        dd($start);
        $employees = Employee::get();
//        dd($employees);
        foreach ($employees as $employee) {
            for ($i=01;$i<=$dayOfMonth;$i++) {
//                $date=('2022-03-'.$i);
////                $date=$date->format('Y-m-d');
//                dd($date);
                $rawData = RawAttendance::query()
                    ->where('access_date', '2022-03-'.$i)
                    ->where('registration_id', $employee->employee_no)
                    ->get();

                $max = $rawData->max('access_time');
                $min = $rawData->min('access_time');
                // dd($max);
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

                // Ot
                // if ($weeklyOff == true){
                //     $diff   = $min->diff($max);
                //     $ot     = $diff->format('%h');
                // }elseif ($max > $shiftOut ) {
                //     $diff   = $shiftOut->diff($max);
                //     $ot     = $diff->format('%h');
                // }else {
                //     $ot = null;
                // }

                // // Extra Ot
                // if ($ot<=2 || $ot==null){
                //     $extraOt= null;
                // }else{
                //     $extraOt= ($ot - 2) ;
                // }

                $attendanceWeeklyOffs = DB::table('employee_weekly_off')->where('employee_id', $employee->id)->get();
                foreach ($attendanceWeeklyOffs as $attendanceWeeklyOff) {
                    AttendanceWeeklyOff::create([
                        'day_id' => $attendanceWeeklyOff->day_id,
                        'employee_id' => $attendanceWeeklyOff->employee_id,
                    ]);
                }

                $leaveCategory=Leave::query()
                    ->where('employee_id', $employee->id)
                    ->where('leave_from', '<=', $today->format('Y-m-d'))
                    ->where('leave_to', '>=', $today->format('Y-m-d'))
                    ->pluck('leave_category_id');
//                dd($leaveCategory);

                $data = [
                    'employee_id' => $employee->id,
                    'date' => '2022-03-'.$i,
                    'in_time' => $rawData->min('access_time'),
                    'out_time' => $rawData->max('access_time'),
                    // 'ot'                    => $ot,
                    // 'extra_ot'              => $extraOt,
                    // 'unit_id'               => $employee->officials->first()->unit_id,
                    // 'floor_id'              => $employee->officials->first()->floor_id,
                    // 'section_id'            => $employee->officials->first()->section_id,
                    'department_id' => $employee->officials->first()->department_id,
                    // 'line_id'               => $employee->officials->first()->line_id,
                    'designation_id' => $employee->officials->first()->designation_id,
                    // 'employee_type_id'      => $employee->officials->first()->employee_type_id,
                    // 'grade_id'              => $employee->officials->first()->grade_id,
                    // 'shift_id'              => $employee->officials->first()->shift_id,
                    // 'calendar_id'           => $employee->officials->first()->calendar_id,
                    'leave_category_id' =>     $leaveCategory ,
                    'attendance_status_id' => $attendanceStatus,
                    'weekly_off_id' => $weeklyOff,
                ];
                Attendance::create($data);

            }
        }
    }

    public function create()
    {
        $startDate = today()->subWeek();
        $startDate = $startDate->format('Y-m-d');
        $endDate = today();
        $endDate = $endDate->format('Y-m-d');

        $rawAccessId = RawAttendance::query()->where('access_id','<>',null)->exists();

        if ($rawAccessId) {
            $accessId = RawAttendance::query()->max('access_id');
        } else {
            $accessId = "00000000";
        }

        $data = array(
            "operation" => "fetch_log",
            "auth_user" => "webpoint",
            "auth_code" => "3efd234cefa324567a342deafd32672",
            "start_date" => $startDate,
            "end_date" => $endDate,
            "start_time" => "00:00:00",
            "end_time" => "23:59:59",
            "access_id" => "$accessId"
        );
        $datapayload = json_encode($data);
        $client = new Client();
        $response = $client->request('POST', "https://rumytechnologies.com/rams/json_api", ['body' => $datapayload]);
        $body = $response->getBody();
        $replace_syntax = str_replace('{"log":', "", $body);

        $replace_syntax = substr($replace_syntax, 0, -1);
        $responseBody = json_decode($replace_syntax);

        foreach ($responseBody as $data) {
            RawAttendance::query()->create([
                'unit_name'         => $data->unit_name,
                'registration_id'   => $data->registration_id,
                'access_id'         => $data->access_id,
                'department'        => $data->department,
                'access_time'       => $data->access_time,
                'access_date'       => $data->access_date,
                'user_name'         => $data->user_name,
                'unit_id'           => $data->unit_id,
                'card'              => $data->card,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
