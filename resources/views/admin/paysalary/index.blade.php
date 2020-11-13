@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Pay Salary') }}
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
              <h4 class="page-title">Pay Salary!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Pay Salary View</li>
                  
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('salary.index') }}" class = "btn btn-success btn-lg my-3">Pay Salary</a>
            <a href="#" class = "btn btn-success btn-lg my-3">Trash Pay Salary</a>

                 <div class="card">
                     <div class="card-header">
                        <h2>Pay Salary </h2>
                        <h4 class = "text-success text-right"> Month : {{ date('F - Y') }} </h4>
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
                                 <th>Employee Name</th>
                                 <th>Employee Salary</th>
                                 <th>Salary Month</th>
                                 {{-- <th>Salaray Year</th> --}}
                                 <th>Advance Salary</th>
                                 <th>Employee Photo</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($employee_info as $employee)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($employee->name , 20) }}</td>
                                 <td>{{ $employee->salary }}</td>
                                 <td>{{ date("F" , strtotime('-1 month')) }}</td>
                                 {{-- <td>{{ $salary->year }}</td> --}}
                                 <td>
                                   ache
                                 </td>
                                 <td>
                                  <img src="{{ asset('uploads/employee_photos') }}/{{ $employee->employee_photo }}" alt="" width="100">
                                </td>

                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href = "{{ route('employee.edit' , $employee->id) }}" type="button" class="btn btn-success">Pay Now</a>
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
