<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use App\Models\RawAttendance;
use Illuminate\Console\Command;

class SteallarData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'attendance:raw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
}
