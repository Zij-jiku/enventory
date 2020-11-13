@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Salary Add ') }}
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
              <h4 class="page-title"> Advance Salary Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Advance Salary Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('salaris.view') }}" class = "btn btn-success btn-lg my-3">View All Advance Salary</a>
              {{-- <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Supplier</a> --}}

              <div class="card">
                  <div class="card-header">
                      <h2> Advance Salary Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('salary.store') }}">
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


                          @if(session()->has('already_payment'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                               {{ session()->get('already_payment') }}
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          @endif




                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label>Employee Name</label>
                            <select name="employee_id" class = "form-control">
                              <option value="">-- Name Select --</option>
                              @foreach ($employees_info as $employee)
                                
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                              @endforeach
                            </select>
                            @error ('month')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label>Advance Salary Month</label>
                            <select name="month" class = "form-control">
                              <option value="">-- Month Select --</option>
                              <option value="January">January</option>
                              <option value="February">February</option>
                              <option value="March">March</option>
                              <option value="April">April</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="August">August</option>
                              <option value="September">September</option>
                              <option value="October">October</option>
                              <option value="November">November</option>
                              <option value="December">December</option>
                            </select>
                            @error ('employee_id')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        
                        <div class="col-6">
                          <div class="form-group">
                            <label>Advance Salary Year</label>
                            <input type="text" class="form-control" placeholder="Year " name = "year" value = "{{ old('year') }}">
                            @error ('year')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Advance Salary</label>
                            <input type="text" class="form-control" placeholder="Advance Salary" name = "advance_salary" value = "{{ old('advance_salary') }}">
                            @error ('advance_salary')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                      </div>
                      <button type="submit" class="btn btn-primary">Add Salary</button>
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
