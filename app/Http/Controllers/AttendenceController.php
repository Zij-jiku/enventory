<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attendence.show',[
            'employees_info' => Employee::all(),
            'total_employee' => Employee::count(),
          ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'attendence' => 'required'
       ]);
       

       $date =  $request->att_date;
       $att_date_db = Attendence::where('att_date' , $date)->first();
       if($att_date_db){
          return back()->with('error_status', 'Today Attendence Allready Taken!!');
       }
       else {
            foreach($request->user_id as $id){
                Attendence::insert([
                    'user_id' => $id,
                    'employee_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'month' => $request->att_month,
                    'att_date' => $request->att_date,
                    'att_year' => $request->att_year,
                    'edit_date' => date('d_m_y')
                ]);
           }
         
           return back()->with('success_status', 'Today Attendence Take SuccessFully!!');
       }
    }

    public function allattendence()
    {
        $att_edit_date = Attendence::select('edit_date')->groupBy('edit_date')->get();
        return view('admin.attendence.allattendence' , compact('att_edit_date'));
    }
    public function allattendenceedit($date)
    {
        $edit_date = Attendence::where('edit_date' , $date)->first();
        $all_edit_att = Attendence::join('employees' , 'attendences.user_id' , 'employees.id')->where('edit_date' , $date)->get();
        return view('admin.attendence.editattendence' , compact('all_edit_att' , 'edit_date'));
        // return $all_edit_att;

    }

    public function updateattendence(Request $request){

        $request->validate([
            'attendence' => 'required'
        ]);

        foreach($request->id as $id){   
            $attendence = Attendence::where(['att_date'=>$request->att_date,'id'=>$id])->first();
            $attendence->update([
                'attendence' => $request->attendence[$id]
            ]);
        }
        
        echo 'done';
        // return back()->with('update_status', 'Attendence Update SuccessFully!!');
    }

    public function viewattendence($edit_date){
        // return $edit_date;
        $date_view = Attendence::where('edit_date' , $edit_date)->first();
        $view_attendence = Attendence::join('employees' , 'attendences.user_id' , 'employees.id')->where('edit_date' , $edit_date)->get();
        return view('admin.attendence.viewattendence' , compact('view_attendence', 'date_view'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence )
    {
        echo 'hello';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
