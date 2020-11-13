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
              <h4 class="page-title">Category Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Category Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="{{ route('categoris.view') }}" class = "btn btn-success btn-lg my-3">View All Category</a>
              {{-- <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash All Category</a> --}}

              <div class="card">
                  <div class="card-header">
                     <h2>Category Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('category.store') }}">
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

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" placeholder="Customer Name" name = "category_name" value = "{{ old('category_name') }}">
                            @error ('category_name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                          <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                      </div>
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
