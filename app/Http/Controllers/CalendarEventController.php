<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\Calender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarEventController extends Controller
{
    public function index()
    {
        $calendarEvent = CalendarEvent::query()->paginate(10);
        return view('admin.office-setup.calendarEvent.index',compact('calendarEvent'));
    }

    public function create()
    {
        $calendars = Calender::query()->pluck('name','id');
        return view('admin.office-setup.calendarEvent.add',compact('calendars'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'calendar_id' => 'required',
            'description' => 'required',
            'start' => 'required',
            'is_holiday' => 'required',
            'sms' => 'required',
            'email' => 'required',
            'is_active' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        CalendarEvent::query()->create($request->all());
        return redirect('admin/calendar-event')->with('status', 'Event added Successfully!');
    }

    public function edit($id)
    {
        $calendarEvent= CalendarEvent::query()->findOrFail($id);
        $calendars = Calender::query()->pluck('name','id');
        return view('admin.office-setup.calendarEvent.edit',compact('calendarEvent','calendars'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'calendar_id' => 'required',
            'description' => 'required',
            'start' => 'required',
            'is_holiday' => 'required',
            'sms' => 'required',
            'email' => 'required',
            'is_active' => 'required'
        ]);
        $calendarEvent = CalendarEvent::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $calendarEvent->update($request->all());
        return redirect('admin/calendar-event')->with('status', 'Event Updated Successfully!');
    }

    public function destroy($id)
    {
        $calendarEvent = CalendarEvent::query()->findOrFail($id);
        $calendarEvent->delete();
        return redirect('admin/calendar-event')->with('status', 'Event Deleted Successfully!');
    }

    public function isHoliday($id): \Illuminate\Http\RedirectResponse
    {

        $calendarEvent = CalendarEvent::query()->findOrFail($id);
        if($calendarEvent->is_holiday == 1)
        {
            $calendarEvent->is_holiday = 0;
        }else{
            $calendarEvent->is_holiday = 1;
        }
        $calendarEvent->save();

        return redirect('admin/calendar-event')->with('success','Status Changed Successfully');
    }

    public function sms($id): \Illuminate\Http\RedirectResponse
    {

        $calendarEvent = CalendarEvent::query()->findOrFail($id);
        if($calendarEvent->sms == 1)
        {
            $calendarEvent->sms = 0;
        }else{
            $calendarEvent->sms = 1;
        }
        $calendarEvent->save();

        return redirect('admin/calendar-event')->with('success','Status Changed Successfully');
    }

    public function email($id): \Illuminate\Http\RedirectResponse
    {

        $calendarEvent = CalendarEvent::query()->findOrFail($id);
        if($calendarEvent->email == 1)
        {
            $calendarEvent->email = 0;
        }else{
            $calendarEvent->email = 1;
        }
        $calendarEvent->save();

        return redirect('admin/calendar-event')->with('success','Status Changed Successfully');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $calendarEvent = CalendarEvent::query()->findOrFail($id);
        if($calendarEvent->is_active == 1)
        {
            $calendarEvent->is_active = 0;
        }else{
            $calendarEvent->is_active = 1;
        }
        $calendarEvent->save();

        return redirect('admin/calendar-event')->with('success','Status Changed Successfully');
    }
}
