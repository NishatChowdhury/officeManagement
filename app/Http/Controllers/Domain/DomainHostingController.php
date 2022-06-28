<?php

namespace App\Http\Controllers\Domain;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\Domain\CustomerDomain;
use App\Models\Hosting;
use function view;

class DomainHostingController extends Controller
{
    public function index()
    {
        $customers = CustomerDomain::query()
            ->take(5)
            ->with('domain')
            ->orderBy('expire_date','DESC')
            ->get();

        $hosting = Hosting::query()
            ->take(5)
            ->orderBy('expire_date','DESC')
            ->get();

        return view('admin.domain-hosting.dashboard',compact('customers','hosting'));
    }
}
