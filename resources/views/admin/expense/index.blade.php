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
              <h4 class="page-title">Expense Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Expense Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('expenses.view') }}" class = "btn btn-success btn-lg my-3">View All Expense</a>
            <br>
              <a href="{{ route('today.index') }}" class = "btn btn-success btn-lg my-3">Today Expense</a>
              <a href="{{ route('thismonth.index') }}" class = "btn btn-success btn-lg my-3">This Month Expense</a>
              <a href="{{ route('year.index') }}" class = "btn btn-success btn-lg my-3">This Year Expense</a>
              
              
              {{-- <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Expense</a> --}}

              <div class="card">
                  <div class="card-header">
                     <h2>Employee Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('expense.store') }}" enctype="multipart/form-data">
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

                        <div class="col-12">
                          <div class="form-group">
                            <label>Expense Details</label>
                            <textarea name="details" rows="6" placeholder="Expense Details" class="form-control">{{ old('details') }}</textarea>
                            
                            @error ('details')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label>Expense Amount</label>
                            <input type="text" class="form-control" placeholder="Expense Amount" name = "amount" value = "{{ old('amount') }}">
                            @error ('amount')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <input type="hidden" class="form-control" name = "date" value = "{{ date('d/m/Y') }}">
                            @error ('date')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        
                        <div class="col-6">
                          <div class="form-group">
                            <input type="hidden" class="form-control" name = "month" value = "{{ date('F') }}">
                            @error ('month')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <input type="hidden" class="form-control" name = "year" value = "{{ date('Y') }}">
                            @error ('year')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                      </div>
                      <button type="submit" class="btn btn-primary">Add Expense</button>
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
