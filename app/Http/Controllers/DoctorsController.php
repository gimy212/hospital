<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctors::all();
        return view('Doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctors=new Doctors;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctors->file=$imagename;
        $doctors->name=$request->name;
        $doctors->notes=$request->notes;
        $doctors->phone=$request->phone;
        $doctors->room=$request->room;
        $doctors->specialization=$request->specialization;
        $doctors->save();
        
        return redirect()->route('Doctors.index')->with(['success' => 'تم الحفظ بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function show(Doctors $doctors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = Doctors::FindOrFail($id);
        session()->flash('oop', 'تم تعديل الفاتورة بنجاح');
        return view('Doctors.update', compact('doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
  
        public function update(Request $request, $id)
    {
        $doctors=Doctors::find($id);
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctors->file=$imagename;
        $doctors->name=$request->name;
        $doctors->notes=$request->notes;
        $doctors->phone=$request->phone;
        $doctors->room=$request->room;
        $doctors->specialization=$request->specialization;
        $doctors->save();
            session()->flash('oop', 'تم تعديل الفاتورة بنجاح');
            return redirect()->route('Doctors.index')->with(['success' => 'تم تحديث الدكتور بنجاح']);
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctors  $doctors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
        {
            /*
                Delete The Job Where id = id request
                And redirect -> with msg [  ]
            */
            try {
                $doctors = Doctors::find($id);
    
                $doctors->delete();
                session()->flash('delete', 'تم حذف الفاتورة بنجاح');
                return redirect()->route('Doctors.index')->with(['success' => 'تم حذف الدكتور بنجاح']);
            } catch (\Exception $ex) {
                return redirect()->route('Doctors.index')->with(['error' => 'هناك خطأ برجاء المحاولة ثانيا']);
            }
        }
}
