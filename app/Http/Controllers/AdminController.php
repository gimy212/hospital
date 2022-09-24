<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Doctors;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $appointments=Appointment::all();
        return view('appointment.index',compact('appointments'));
    }
    public function appointment(Request $request)
    {
        $data = new appointment;
        $data ->name=$request->name;
        $data ->email=$request->email;
        $data ->phone=$request->phone;
        $data ->message=$request->message;
        $data ->doctor=$request->doctor;
        $data ->date=$request->date;
        $data ->status="in progress";
        if(Auth::id()){
        $data ->user_id=Auth::user()->id;
        }
        $data->save();
        session()->flash('Add', 'appointment added successfly');
        return redirect()->back();
    }

   
    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back(); 
    }

    
    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

  
    public function footer()
    {
        
    }

    
    public function destroy(Admin $admin)
    {
        //
    }
}
