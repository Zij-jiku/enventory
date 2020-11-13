<?php

namespace App\Http\Controllers;

use App\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.expense.index');
    }

    public function expensesview()
    {
        return view('admin.expense.show' , [
            'expense_info' => Expense::all(),
            'expense_totals' => Expense::count(),
            'expense_totals_tk' => Expense::sum('amount'),
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
            'details' => 'required',
            'amount' => 'required',
            'month' => 'required',
            'date' => 'required',
          ]);
  
        Expense::insert($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success_status', 'Expense Insert SuccessFully!!');
    }

    public function todayindex(){
        // $today = Carbon::now();
        $today = date('d/m/Y');
        $today_tk = Expense::where('date' , $today)->sum('amount');
        $today_expense = Expense::where('date' , $today)->get();
        return view('admin.expense.today' , compact('today_expense' , 'today_tk'));
        
    }
    
    public function thismonthindex(){
        $month = date('F');
        // $month_tk = Expense::where('month' , $month)->sum('amount');
        $month_expense = Expense::where('month' , $month)->get();
        return view('admin.expense.month' , compact('month_expense'));
    }
    
    public function yearindex(){
        $year = date('Y');
        $year_tk = Expense::where('year' , $year)->sum('amount');
        $year_expense = Expense::where('year' , $year)->get();
        return view('admin.expense.year' , compact('year_expense','year_tk'));
    }
    public function januaryexpense(){
        $january = 'January';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $january)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function februaryexpense(){
        $february = 'February';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $february)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function marchexpense(){
        $march = 'March';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $march)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function aprilexpense(){
        $april = 'April';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $april)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function mayexpense(){
        $may = 'May';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $may)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function juneexpense(){
        $june = 'June';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $june)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function julyexpense(){
        $july = 'July';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $july)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function augustexpense(){
        $august = 'August';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $august)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function septemberexpense(){
        $september = 'September';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $september)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function octoberexpense(){
        $october = 'October';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $october)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function novemberexpense(){
        $november = 'November';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $november)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }
    public function decemberexpense(){
        $december = 'December';
        // $january_tk = Expense::where('month' , $january)->sum('amount');
        $month_expense = Expense::where('month' , $december)->get();
        return view('admin.expense.month' , compact('month_expense'));  
    }





}
