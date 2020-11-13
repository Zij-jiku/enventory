@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Month Expense ') }}
@endsection

@section('dashboard_content')

  <div class="content-page">
    <div class="content">
      <!-- Start Content-->
      <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <h4 class="page-title">Month Expense!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Month Expense</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('expense.index') }}" class = "btn btn-success btn-lg my-3">New Expense</a>
            <br>
            <a href="{{ route('expenses.view') }}" class = "btn btn-success btn-lg my-3">All Expense</a>
            <a href="{{ route('today.index') }}" class = "btn btn-success btn-lg my-3">Today Expense</a>
            <a href="{{ route('year.index') }}" class = "btn btn-success btn-lg my-3">This Year Expense</a>
            {{-- <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash Employee</a> --}}

           

                 <div class="card">
                     <div class="card-header">
                      
                      <a href="{{ route('january.expense') }}" class = "btn btn-success">January</a>
                      <a href="{{ route('february.expense') }}" class = "btn btn-danger">February</a>
                      <a href="{{ route('march.expense') }}" class = "btn btn-warning">March</a>
                      <a href="{{ route('april.expense') }}" class = "btn btn-info">April</a>
                      <a href="{{ route('may.expense') }}" class = "btn btn-success">May</a>
                      <a href="{{ route('june.expense') }}" class = "btn btn-danger">June</a>
                      <a href="{{ route('july.expense') }}" class = "btn btn-info">July</a>
                      <a href="{{ route('august.expense') }}" class = "btn btn-primary">August</a>
                      <a href="{{ route('september.expense') }}" class = "btn btn-warning">September</a>
                      <a href="{{ route('october.expense') }}" class = "btn btn-info">October</a>
                      <a href="{{ route('november.expense') }}" class = "btn btn-success">November</a>
                      <a href="{{ route('december.expense') }}" class = "btn btn-danger">December</a>

                        <h2>Month Expense View</h2>
                        <hr>
                       {{-- <h4>Total Tk : {{ $month_tk }} tk</h4> --}}

                       
                     </div>
                     <div class="card-body">
                       @if(session()->has('trash_status'))
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('trash_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif
                       <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <style media="screen">
                         .form-control-sm{
                           float: right;
                         }
                         </style>

                             <thead>
                               <tr>
                                 <th>SL No.</th>
                                 <th>Expense Details</th>
                                 <th>Expense Amount</th>
                                 <th>Expense Month</th>
                                 <th>Expense Date</th>
                                 <th>Expense Year</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($month_expense as $expense)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($expense->details , 10) }}</td>
                                 <td>{{ $expense->amount }}</td>
                                 <td>{{ $expense->month }}</td>
                                 <td>{{ $expense->date }}</td>
                                 <td>{{ $expense->year }}</td>
                               
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href = "{{ route('expense.edit' , $expense->id) }}" type="button" class="btn btn-primary">Edit</a>

                                     <form action="{{ route('expense.destroy' , $expense->id) }}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger">Delete</button>
                                     </form>
                                   </div>
                                 </td>
                               </tr>

                               @empty
                                 <tr>
                                   <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                 </tr>
                             @endforelse

                             </tbody>
                           </table>

                     </div>
                 </div>

          </div>
        </div><!-- end row -->
      </div><!-- end col-12 -->
      <!-- end container-fluid -->
    </div>
    <!-- end content -->
  </div>

@endsection



@section('footer_scripts')
  <script>
  $(document).ready(function() {
    $('#datatable').DataTable();
  });
</script>
@endsection
