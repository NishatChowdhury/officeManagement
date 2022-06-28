<?php

namespace App\Console\Commands;

use App\Mail\NotificationMail;
use App\Models\Domain\CustomerDomain;
use App\Models\Domain\Domain;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DomainEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A Command to sent email for Domains!';

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
        $domains = Domain::query()->get();
        foreach ($domains as $domain){
            $expiry_date = Carbon::parse($domain->expire_date);
            $current_date = Carbon::now();
            $diff = $expiry_date->diffInDays($current_date);
            if ($diff <= 60){
                $reminder = $domain->name.''.' has '.$diff.' day/s to expire!';
                echo $domain->name.''.' has '.$diff.' day/s to expire!'.'<br>';
                $mailData = [
                    'domain_name' => $domain->name,
                    'alias' => $domain->alias,
                    'registration_date' => $domain->registration_date,
                    'expire_date' => $domain->expire_date,
                    'reminder' => $reminder
                ];

                Mail::to('nishatchowdhury73@gmail.com')->send(new NotificationMail($mailData));
            }
        }

        $customerDomains = CustomerDomain::query()->get();
        foreach ($customerDomains as $domain){
            $expiry_date = Carbon::parse($domain->expire_date);
            $current_date = Carbon::today();
            $diff = $expiry_date->diffInDays($current_date);
            if ($diff <= 60){
                $reminder = $domain->name.''.' has '.$diff.' day/s to expire!';
                echo $domain->name.''.' has '.$diff.' day/s to expire!'.'<br>';
                $mailData = [
                    'domain_name' => $domain->name,
                    'alias' => $domain->alias,
                    'registration_date' => $domain->registration_date,
                    'expire_date' => $domain->expire_date,
                    'reminder' => $reminder
                ];
                $email = $domain->customer->email;
                Mail::to($email)->send(new NotificationMail($mailData));
            }
        }
    }
}
