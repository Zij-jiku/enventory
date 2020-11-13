@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Employee Add ') }}
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
              <h4 class="page-title">Employee Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Employee Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('employees.view') }}" class = "btn btn-success btn-lg my-3">View All Employee</a>
              <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Employee</a>

              <div class="card">
                  <div class="card-header">
                     <h2>Employee Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('employee.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-12">
                          @if(session()->has('success_status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                               {{ session()->get('success_status') }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          @endif
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Name</label>
                            <input type="text" class="form-control" placeholder="Employee Name" name = "name" value = "{{ old('name') }}">
                            @error ('name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Email</label>
                            <input type="text" class="form-control" placeholder="Employee Email" name = "email" value = "{{ old('email') }}">
                            @error ('email')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Phone</label>
                            <input type="number" class="form-control" placeholder="Employee Phone" name = "phone" value = "{{ old('phone') }}">
                            @error ('phone')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee salary</label>
                            <input type="number" class="form-control" placeholder="Employee salary" name = "salary" value = "{{ old('salary') }}">
                            @error ('salary')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Vacation</label>
                            <input type="number" class="form-control" placeholder="Employee Vacation" name = "vacation" value = "{{ old('vacation') }}">
                            @error ('vacation')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee City</label>
                            <input type="text" class="form-control" placeholder="Employee City" name = "city" value = "{{ old('city') }}">
                            @error ('city')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Photo</label>
                            <input type="file" class="form-control" name="employee_photo">
                            @error ('employee_photo')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Employee Exprience</label>
                            <input type="text" class="form-control" placeholder="Employee Exprience" name = "exprience" value = "{{ old('exprience') }}">
                            @error ('exprience')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label>Employee Address</label>
                            <textarea name="address" rows="4" class="form-control" placeholder="Employee Address">{{ old('address') }}</textarea>
                            @error ('address')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Add Employee</button>
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
