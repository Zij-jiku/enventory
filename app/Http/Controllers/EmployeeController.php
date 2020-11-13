<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employee.index');
    }

    public function employeesview()
    {
       return view('admin.employee.show',[
         'employees_info' => Employee::all(),
         'total_employee' => Employee::count(),
       ]);
    }

    public function employeestrash()
    {
       return view('admin.employee.create',[
         'employee_deleted' => Employee::onlyTrashed()->get(),
         'employee_deleted_total' => Employee::onlyTrashed()->count(),
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
          'name' => 'required',
          'email' => 'required|unique:employees,email',
          'phone' => 'required',
          'address' => 'required',
          'exprience' => 'required',
          'salary' => 'required',
          'vacation' => 'required',
          'city' => 'required',
          'employee_photo' => 'required',
        ]);

        $employee_id = Employee::insertGetId($request->except('_token' , 'employee_photo') + [
          'created_at' => Carbon::now(),
        ]);
        if($request->hasFile('employee_photo')){
          $uploded_photo = $request->file('employee_photo');
          $new_photo_name = $employee_id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/employee_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 70);
          Employee::find($employee_id)->update([
            'employee_photo' => $new_photo_name
          ]);
        }
        return back()->with('success_status',$request->name.' Employee Insert SuccessFully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.edit' , [
          'employees_details' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
      $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'exprience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
      ]);

      $employee->update($request->except('_token' , '_method' , 'employee_photo'));
      if($request->hasFile('employee_photo')){
        if($employee->employee_photo != 'default.png'){
          // delete photo
          $old_location = 'public/uploads/employee_photos/'.$employee->employee_photo;
          unlink(base_path($old_location));
        }
        $uploded_photo = $request->file('employee_photo');
        $new_photo_name = $employee->id.'.'.$uploded_photo->getClientOriginalExtension();
        $new_photo_location = 'public/uploads/employee_photos/'.$new_photo_name;
        Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 70);
        $employee->update([
          'employee_photo' => $new_photo_name
        ]);
        return back()->with('success_status' , 'Employee Update Successfully!!');
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('trash_status' , 'Trash Successfully!!');
    }

    public function employeerestore($restore_id)
    {
      Employee::withTrashed()->find($restore_id)->restore();
      return back()->with('restore_status' , 'ID '.$restore_id.' Restore Successfully!');
    }
    public function employeedelete($delete_id)
    {
      Employee::withTrashed()->find($delete_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$delete_id.' Delete Successfully!');
    }

}
