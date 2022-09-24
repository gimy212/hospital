<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function redirect()
    {

       if(Auth::id())
       {
         if(Auth::user()->usertype=='0')
         {
            
            $doctor= Doctors::all();
            return view('user.index',compact('doctor'));
         }
         else{return view('home');}
       }
       else 
       {
        
        $doctor= Doctors::all();
        return view('user.index',compact('doctor'));
       }
     
    }
     public function index()
    {
       
        $doctor= Doctors::all();
        return view('user.index',compact('doctor'));
    }
    
    public function myappointment()
    {
        if(Auth::id())
        { 
        $userid=Auth::user()->id;
        $appoint= Appointment::where('user_id',$userid)->get();
        return view('user.myappointment',compact('appoint'));
        }
        else{return redirect()->back();}
    }
    public function cancel_appoint($id)
    {
        /*
            Delete The Job Where id = id request
            And redirect -> with msg [  ]
        */
        try {
            $appoint = Appointment::find($id);

            $appoint->delete();
            session()->flash('delete', 'deleted sucssed');
            return redirect()->back();
        } catch (\Exception $ex) {
            return redirect()->back();
        }
    }

}
