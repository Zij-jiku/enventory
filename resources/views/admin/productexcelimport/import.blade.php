@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Product Import ') }}
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
              <h4 class="page-title">Import Product!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Import Product</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              {{-- <a href="{{ route('customers.view') }}" class = "btn btn-success btn-lg my-3">View All Category</a> --}}
              
              <div class="card">
                  <div class="card-header">
                      <h2>Import Product</h2>
                    </div>
                    <div class="card-body">
                        
                        <a href="{{ route('export') }}" class = "btn btn-success btn-sm mb-2">Xlxs File Download</a>

                        <form method="post" action = "{{ route('import') }}" enctype="multipart/form-data">
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
                                    <label>Import Xlxs File</label>
                                    <input type="file" class="form-control" name = "import_file" required>
                                    @error ('import_file')
                                    <span class = "text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
