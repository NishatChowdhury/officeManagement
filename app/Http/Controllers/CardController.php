<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    public function index()
    {
        $cards= Card::query()->paginate(10);
        return view('admin.employee-management.card.index',compact('cards'));
    }

    public function create()
    {
        $employees = Employee::query()->pluck('employee_no','id');
        return view('admin.employee-management.card.add',compact('employees'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'number' => 'required',
            'assigned' => 'required',
            'is_active' => 'required',
            'note' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Card::query()->create($request->all());
        return redirect('admin/card')->with('status', 'Card added Successfully!');
    }

    public function edit($id)
    {
        $employees = Employee::query()->pluck('employee_no','id');
        $card= Card::query()->findOrFail($id);
        return view('admin.employee-management.card.edit',compact('card','employees'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employee_id' => 'required',
            'number' => 'required',
            'assigned' => 'required',
            'is_active' => 'required',
            'note' => 'required'
        ]);
        $card= Card::query()->findOrFail($id);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $card->update($request->all());
        return redirect('admin/card')->with('status', 'Card Updated Successfully!');
    }

    public function destroy($id)
    {
        $card = Card::query()->findOrFail($id);
        $card->delete();
        return redirect('admin/card')->with('status', 'Card Deleted Successfully!');
    }

    public function status($id): \Illuminate\Http\RedirectResponse
    {

        $card= Card::query()->findOrFail($id);
        if($card->is_active == 1)
        {
            $card->is_active = 0;
        }else{
            $card->is_active = 1;
        }
        $card->save();

        return redirect('admin/card')->with('success','Status Change Successfully');
    }
}
