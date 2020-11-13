@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Take Attendence ') }}
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
              <h4 class="page-title">Take Attendence!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Take Attendence</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            {{-- <a href="{{ route('employee.index') }}" class = "btn btn-success btn-lg my-3">New Employee</a> --}}
            {{-- <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash Employee</a> --}}
            <a href="{{ route('all.attendence') }}" class = "btn btn-success btn-lg my-3">All Attendence</a>

                 <div class="card">
                     <div class="card-header">
                       <h2>Take Attendence</h2>
                       <hr>
                       <h4>Total Employee : {{ $total_employee }}</h4>
                       

                       <h5 class = "text-center text-success">Today Date :  {{ date('d-M-Y') }} </h5>
                     </div>
                     <div class="card-body">

                       @if(session()->has('error_status'))
                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

                       @if(session()->has('success_status'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('success_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

                       <form action="{{ route('attendence.store') }}" method="POST">
                        @csrf 

                        {{-- table (id) datatable --}}
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <style media="screen">
                          .form-control-sm{
                            float: right;
                          }
                          </style>

                              <thead>
                                <tr>
                                  <th>SL No.</th>
                                  <th>Employee Name</th>
                                  <th>Employee Photo</th>
                                  <th>Attendence</th>
                                </tr>
                              </thead>
                              
                              <tbody>    
                                  @forelse($employees_info as $employee)
                                    <tr>
                                      <td>{{ $loop->index + 1 }}</td>
                                      <td>{{ Str::limit($employee->name , 30) }}</td>
                                      <td>
                                        <img src="{{ asset('uploads/employee_photos') }}/{{ $employee->employee_photo }}" alt="" width="100">
                                        <input type="hidden" name = "user_id[]" value="{{ $employee->id }}">
                                        <input type="hidden" name = "att_date" value="{{ date('d-m-Y') }}">
                                        <input type="hidden" name = "att_year" value="{{ date('Y') }}">
                                        <input type="hidden" name = "att_month" value="{{ date('F') }}">
                                      </td>

                                      <td>
                                        <input type="radio" name = "attendence[{{ $employee->id }}]" value="Present"> Present 

                                        <input type="radio" name = "attendence[{{ $employee->id }}]" value="Absence"> Absence

                                        <br>

                                        @error('attendence')
                                            <span class = "text-danger">{{ $message }}</span>
                                        @enderror
                                      </td>
                                      
                                    </tr>
                                    @empty
                                      <tr>
                                        <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                      </tr>
                                      @endforelse 
                              </tbody>
                            </table>

                            <button type="submit" class = "btn btn-success pull-right">Attendence Submit</button>
                          </form>
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
