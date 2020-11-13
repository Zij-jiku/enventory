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
              <h4 class="page-title">Company Name!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Company Setting</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              {{-- <a href="{{ route('employees.view') }}" class = "btn btn-success btn-lg my-3">View All Employee</a>
              <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Employee</a> --}}

              <div class="card">
                  <div class="card-header">
                     <h2>Company Setting Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('setting.store') }}" enctype="multipart/form-data">
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
                            <label>Company Name</label>
                            <input type="text" class="form-control" placeholder="Company Name" name = "company_name" value = "{{ old('company_name') }}">
                            @error ('company_name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Email</label>
                            <input type="company_email" class="form-control" placeholder="Company Email" name = "company_email" value = "{{ old('company_email') }}">
                            @error ('company_email')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Phone</label>
                            <input type="company_phone" class="form-control" placeholder="Company Phone" name = "company_phone" value = "{{ old('company_phone') }}">
                            @error ('company_phone')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Mobile</label>
                            <input type="company_phone" class="form-control" placeholder="Company Mobile" name = "company_mobile" value = "{{ old('company_mobile') }}">
                            @error ('company_mobile')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company City</label>
                            <input type="text" class="form-control" placeholder="Company City" name = "company_city" value = "{{ old('company_city') }}">
                            @error ('company_city')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Country</label>
                            <input type="text" class="form-control" placeholder="Company Country" name = "company_country" value = "{{ old('company_country') }}">
                            @error ('company_country')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Zipcode</label>
                            <input type="text" class="form-control" placeholder="Company Zipcode" name = "company_zipcode" value = "{{ old('company_zipcode') }}">
                            @error ('company_zipcode')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Company Logo</label>
                            <input type="file" class="form-control" name="company_logo">
                            @error ('company_logo')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                       
                        <div class="col-12">
                          <div class="form-group">
                            <label>Company Address</label>
                            <textarea name="company_address" rows="4" class="form-control" placeholder="Company Address">{{ old('company_address') }}</textarea>
                            @error ('company_address')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Setting Add</button>
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
