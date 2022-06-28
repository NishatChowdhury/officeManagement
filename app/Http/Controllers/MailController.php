<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Ni07',
            'url' => 'niloydas.net'
        ];

        Mail::to('nishatchowdhury73@gmail.com')->send(new NotificationMail($mailData));
    }
}
