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
                       {{-- <h4>Total Employee : {{ $total_employee }}</h4> --}}
                       

                       <h5 class = "text-center text-success">Attendence Update :  {{ $date_view->edit_date }} </h5>
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

                       @if(session()->has('update_status'))
                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('update_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

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
                               
                                  @forelse($view_attendence as $edit_att)
                                    <tr>
                                      <td>{{ $loop->index + 1 }}</td>
                                     
                                     
                                      <td class="text-danger">{{ $edit_att->name }}</td>
                                      <td>
                                        
                                        <img src="{{ asset('uploads/employee_photos') }}/{{ $edit_att->employee_photo }}" alt="" width="100">
                                        <input type="hidden" name = "id[]" value="{{ $edit_att->id }}">
                                        <input type="hidden" name = "att_date" value="{{ date('d-m-Y') }}">
                                      </td>

                                      <td>
                                        @if ($edit_att->attendence == 'Present')  
                                            <button class = "btn btn-success btn-sm">Present</button>
                                        @else
                                            <button class = "btn btn-danger btn-sm">Absence</button>
                                         @endif

                                        {{-- <input type="radio" name = "attendence[{{ $edit_att->id }}]" value="Present" <?php if($edit_att->attendence == 'Present') {echo 'checked';} ?> > Present  --}}

                                        {{-- <input type="radio" name = "attendence[{{ $edit_att->id }}]" value="Absence" <?php if($edit_att->attendence == 'Absence') {echo 'checked';} ?>> Absence --}}

                                       
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
