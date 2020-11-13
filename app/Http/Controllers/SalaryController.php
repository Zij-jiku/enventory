<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.salary.index' , [
            'employees_info' => Employee::all(),
        ]);
    }

    public function salariview()
    {
      return view('admin.salary.show',[
        'salary_info' => Salary::all(),
        'salary_totals' => Salary::count(),
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
            'employee_id' => 'required',
            'month' => 'required',
            'year' => 'required',
            'advance_salary' => 'required',
          ]);

        if(Salary::where('employee_id' , $request->employee_id)->where('month' , $request->month)->where('year' , $request->year)->exists()){
            return back()->with('already_payment','Advace Salary Already Payment SuccessFully!!');
        }
        else {
          Salary::insert($request->except('_token')+[
            'created_at' => Carbon::now(),
          ]);
          return back()->with('success_status','Advace Salary Insert SuccessFully!!');
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }


    public function paysalary()
    {
      // $month = date('F' , strtotime('-1 month'));

      // return view('admin.salary.show',[
      //   'salary_info' => Salary::where('month' , $month)->get(),
      //   'salary_totals' => Salary::count(),
      // ]);

       return view('admin.paysalary.index',[
       'employee_info' => Employee::all(),
       ]);
    }
    

    // public function paysalary(Request $request)
    // {
    //     $request->validate([
    //         'employee_id' => 'required',
    //         'month' => 'required',
    //         'year' => 'required',
    //         'advance_salary' => 'required',
    //       ]);

    //     if(Salary::where('employee_id' , $request->employee_id)->where('month' , $request->month)->where('year' , $request->year)->exists()){
    //         return back()->with('already_payment','Advace Salary Already Payment SuccessFully!!');
    //     }
    //     else {
    //       Salary::insert($request->except('_token')+[
    //         'created_at' => Carbon::now(),
    //       ]);
    //       return back()->with('success_status','Advace Salary Insert SuccessFully!!');
    //     }
      
    // }
}
