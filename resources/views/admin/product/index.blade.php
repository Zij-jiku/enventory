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
              <h4 class="page-title">Product Add!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Product Add</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-12">
              <a href="#" class = "btn btn-success btn-lg my-3">View All Product</a>
              <a href="#" class = "btn btn-success btn-lg my-3">Trash All Product</a>

              <div class="card">
                  <div class="card-header">
                     <h2>Product Add</h2>
                  </div>
                  <div class="card-body">

                    <form method="post" action = "{{ route('product.store') }}" enctype="multipart/form-data">
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
                            <label>Product Name</label>
                            <input type="text" class="form-control" placeholder="Customer Name" name = "product_name" value = "{{ old('product_name') }}">
                            @error ('product_name')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Product Code</label>
                            <input type="text" class="form-control" placeholder="Product Code" name = "product_code" value = "{{ old('product_code') }}">
                            @error ('product_code')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>


                        <div class="col-12">
                          <div class="form-group">
                            <label>Category ID</label>
                            <select name="category_id" class = "form-control text-success">
                              <option value="">-- Category Select --</option>
                              @foreach ($category_info as $category)
                                
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                            @error ('category_id')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>


                        <div class="col-12">
                          <div class="form-group">
                            <label>Supplier ID</label>
                            <select name="supplier_id" class = "form-control text-success">
                              <option value="">-- Supplier Select --</option>
                              @foreach ($supplier_info as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                              @endforeach
                            </select>
                            @error ('supplier_id')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Product Garage</label>
                            <input type="text" class="form-control" placeholder="Product Garage" name = "product_grage" value = "{{ old('product_grage') }}">
                            @error ('product_grage')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Product Route</label>
                            <input type="text" class="form-control" placeholder="Product Route" name = "product_route" value = "{{ old('product_route') }}">
                            @error ('product_route')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Product Buy Date</label>
                            <input type="date" class="form-control" name = "buy_date">
                            @error ('buy_date')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Expire Date</label>
                            <input type="date" class="form-control" name = "expire_date">
                            @error ('expire_date')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Buying Price</label>
                            <input type="text" class="form-control" placeholder="Buying Price" name = "buying_price" value = "{{ old('buying_price') }}">
                            @error ('buying_price')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Selling Price</label>
                            <input type="text" class="form-control" placeholder="Selling Price" name = "selling_price" value = "{{ old('selling_price') }}">
                            @error ('selling_price')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label>Product Photo</label>
                            <input type="file" class="form-control" name = "product_photo" value = "{{ old('product_photo') }}">
                            @error ('product_photo')
                              <span class = "text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>


                      </div>
                      <button type="submit" class="btn btn-primary">Add Product</button>
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
