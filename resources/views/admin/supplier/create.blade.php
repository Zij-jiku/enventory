@extends('layouts.dashboard_layouts')

@section('page_title')
  {{ ('Moltran | Employee Trash ') }}
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
              <h4 class="page-title">Trash Employee!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Trash Employee</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('employee.index') }}" class = "btn btn-success btn-lg my-3">Add Employee</a>
            <a href="{{ route('employees.view') }}" class = "btn btn-success btn-lg my-3">View Employee</a>

            <div class="card">
              <div class="card-header">
                <h2>Employee Trash View</h2>
                <hr>
                <h4>Total Trash Employee : {{ $employee_deleted_total }}</h4>
              </div>
              <div class="card-body">
                @if(session()->has('restore_status'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('restore_status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                @if(session()->has('delete_status'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('delete_status') }}
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
                      <th>Employee Email</th>
                      <th>Employee Phone</th>
                      <th>Employee Salary</th>
                      <th>Employee City</th>
                      <th>Employee Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @forelse($employee_deleted as $employee_delete)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ Str::limit($employee_delete->name , 10) }}</td>
                        <td>{{ $employee_delete->email }}</td>
                        <td>{{ $employee_delete->phone }}</td>
                        <td>{{ $employee_delete->salary }}</td>
                        <td>{{ $employee_delete->city }}</td>
                        <td>
                          <img src="{{ asset('uploads/employee_photos') }}/{{ $employee_delete->product_photo }}" alt="" width="100">
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href = "{{ route('employee.restore' , $employee_delete->id) }}" type="button" class="btn btn-success">Restore</a>
                            <a href = "{{ route('employee.delete' , $employee_delete->id) }}" type="button" class="btn btn-danger">Delete</a>
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
