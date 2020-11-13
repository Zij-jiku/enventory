@extends('layouts.dashboard_layouts')

@section('page_title')

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
              <h4 class="page-title">Employee Edit :  {{ $employees_details->name }} !</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Employee Edit</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-md-6 m-auto">
              <div class="card">
                  <div class="card-header">
                     <h2>Employee Update</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('employee.update' , $employees_details->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')

                      @if(session()->has('success_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ session()->get('success_status') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif

                      <div class="form-group">
                        <label>Employee Name</label>
                        <input type="text" class="form-control" placeholder="Employee Name" name = "name" value = "{{ $employees_details->name }}">
                        @error ('name')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Email</label>
                        <input type="text" class="form-control" placeholder="Employee Email" name = "email" value = "{{ $employees_details->email }}">
                        @error ('email')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Price</label>
                        <input type="number" class="form-control" placeholder="Employee Phone" name = "phone" value = "{{ $employees_details->phone }}">
                        @error ('phone')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Address</label>
                        <textarea name="address" rows="4" class="form-control" placeholder="Employee Address">{{ $employees_details->address }}</textarea>
                        @error ('address')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Exprience</label>
                        <input type="number" class="form-control" placeholder="Employee Exprience" name = "exprience" value = "{{ $employees_details->exprience }}">
                        @error ('exprience')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee salary</label>
                        <input type="number" class="form-control" placeholder="Employee salary" name = "salary" value = "{{ $employees_details->salary }}">
                        @error ('salary')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Vacation</label>
                        <input type="number" class="form-control" placeholder="Employee Vacation" name = "vacation" value = "{{ $employees_details->vacation }}">
                        @error ('vacation')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee City</label>
                        <input type="text" class="form-control" placeholder="Employee City" name = "city" value = "{{ $employees_details->city }}">
                        @error ('city')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label>Employee Photo</label>
                        <img src="{{ asset('uploads/employee_photos') }}/{{ $employees_details->product_photo }}" alt="" width="100">

                        <input type="file" class="form-control" name="employee_photo">


                        @error ('employee_photo')
                          <span class = "text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Update Employee</button>
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
