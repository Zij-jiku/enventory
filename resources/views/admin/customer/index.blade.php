@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Customer Add ') }}
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
              <h4 class="page-title">Customer Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Customer Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('customers.view') }}" class = "btn btn-success btn-lg my-3">View All Customer</a>
              <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Customer</a>

              <div class="card">
                  <div class="card-header">
                     <h2>Customer Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('customer.store') }}" enctype="multipart/form-data">
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
                            <label>Customer Name</label>
                            <input type="text" class="form-control" placeholder="Customer Name" name = "name" value = "{{ old('name') }}">
                            @error ('name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Customer Email</label>
                            <input type="text" class="form-control" placeholder="Customer Email" name = "email" value = "{{ old('email') }}">
                            @error ('email')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Customer Phone</label>
                            <input type="text" class="form-control" placeholder="Customer Phone" name = "phone" value = "{{ old('phone') }}">
                            @error ('phone')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Shop Name</label>
                            <input type="text" class="form-control" placeholder="Shop Name" name = "shopname" value = "{{ old('shopname') }}">
                            @error ('shopname')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" placeholder="Bank Name" name = "bank_name" value = "{{ old('bank_name') }}">
                            @error ('bank_name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Bank Branch</label>
                            <input type="text" class="form-control" placeholder="Bank Branch" name = "bank_branch" value = "{{ old('bank_branch') }}">
                            @error ('bank_branch')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Account Holder</label>
                            <input type="text" class="form-control" placeholder="Bank Holder" name = "account_holder" value = "{{ old('account_holder') }}">
                            @error ('account_holder')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control" placeholder="Account Number" name = "account_number" value = "{{ old('account_number') }}">
                            @error ('account_number')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-12">
                          <div class="form-group">
                            <label>Customer Address</label>
                            <textarea name="address" rows="4" class="form-control" placeholder="Customer Address">{{ old('address') }}</textarea>
                            @error ('address')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name = "city" value = "{{ old('city') }}">
                            @error ('city')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Customer Photo</label>
                            <input type="file" class="form-control" name = "customer_photo" value = "{{ old('customer_photo') }}">
                            @error ('customer_photo')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>


                      </div>
                      <button type="submit" class="btn btn-primary">Add Customer</button>
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
