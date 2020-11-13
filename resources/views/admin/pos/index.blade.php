@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Pos ') }}
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
              <h4 class="page-title">POS (Poin Of Sale)</h4> <br>
              <h5 class="text-danger">Date : {{ date('d/m/y') }}</h5>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Pos</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        @if(session()->has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success_message') }} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

         <!-- start page title -->
         <div class="row">

    
            <div class="col-5">

              <div class="card-header">
                <h3 class="text-warning">Card View </h3> 
              </div>
              
                
                <div class="card-body">
                  <div class="card text-center">  
                    <div class="p-4">
                      <ul class="list-unstyled mb-0">
                        
                        
                        
                        <table class="table">
                          
                          @if(session()->has('success_update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('success_update') }} 
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          @endif
                              
                              @if(session()->has('success_delete'))
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session()->get('success_delete') }} 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              @endif
                              
                              
                              
                              <thead>
                                
                                <tr>   
                                  <th>Sl No.</th>
                                  <th>Name</th>
                                  <th>Qty</th>
                                  <th>Price</th>
                                  <th>Subtotal</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              
                                  @php
                                    $contents = Cart::content();
                                    $totaltk = 0;
                                    $totalqty = 0;
                                  @endphp


                                  <tbody>
                                    
                                    @forelse($contents as $content)
                                    <tr>
                                      <td> {{ $content->id }} </td>
                                      <td> {{ $content->name }} </td>
                                      <td>
                                        
                                        <form action="{{ route('update.cart') }}" method="POST">
                                          @csrf
                                          
                                          <input type="number" name = "qty" value="{{ $content->qty }}">
                                          
                                          <input type="hidden" name = "rowId" value="{{ $content->rowId }}">
                                          
                                          <button class="btn btn-success btn-sm" type="submit">update</button>
                                         </form>


                                        </td>
                                        <td> {{ $content->price }} tk</td>
                                        <td> {{ $content->subtotal }} tk</td>
                                        <td>
                                            <a href="{{ route('delete.cart',$content->rowId) }}">
                                                <i class="fas fa-trash-alt text-danger text-center"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    @php
                                        $totalqty += $content->qty;
                                        $totaltk += $content->subtotal;
                                    @endphp


                                    @empty
                                          <tr>
                                            <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                          </tr>
                                    @endforelse


                                  </tbody>
                            </table>
                            </ul>
                        </div>
                        
                        <div class="bg-primary">

                            <p class="text-white">Quantity : {{ $totalqty }}</p>
                            <p class="text-white">Vat : 0</p>
                            <hr>
                            <p class="text-white">Total : {{ $totaltk }}.00 tk</p>
                        </div>

                      </div>

                      <form action="{{ route('invoice.index') }}" method="POST">
                        @csrf

                        <div class="card-header mb-3">
                          <h3 class="text-warning">Customer
                              <a href="{{ route('customer.index') }}" class="btn btn-sm btn-primary pull-right">New Customer</a>
                            </h3>
                            
                            <select class="form-control" name="customer_id">
                              <option disabled="">--Select Customer--</option>
                              
                              @foreach ($customers as $customer)   
                               <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                              @endforeach
                              
                            </select>

                            @error ('customer_id')
                             <span class = "text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-success btn-block">Create Invoice</button>

                      </form>

              </div>

            </div>






            <div class="col-7">
                <h3>All Products</h3>

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <style media="screen">
                    .form-control-sm{
                      float: right;
                    }
                    </style>

                     <thead>
                       <tr>   
                         <th>Product Add</th>
                         <th>Product Image</th>
                         <th>Product Name</th>
                         <th>Category Name</th>
                         <th>Product Code</th>
                       </tr>
                     </thead>

                     <tbody>

                      @if(session()->has('success_cart'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('success_cart') }} 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      @endif

                       @forelse($product_info as $product)
                       <tr>
                         <form action="{{ route('cart.index') }}" method="POST">
                           @csrf

                           <td>
                             <input type="hidden" value="{{ $product->id }}" name="id" min="1">
                             <input type="hidden" value="{{ $product->product_name }}" name="name">
                             <input type="hidden" value="1" name="qty">

                              <button type="submit" class="btn btn-sm"><i class="fas fa-plus-square fa-2x text-success text-center"></i></button>
                            </td>
                            <td>
                              <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="" width="100">
                            </td>
                            
                            <td>{{ Str::limit($product->product_name , 20) }}</td>
                            <td>
                              Category
                            </td>
                            <td>{{ $product->product_code }}</td>
                          </form>
                        
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

       
      </div><!-- end col-12 -->
      <!-- end container-fluid -->
    </div>
    <!-- end content -->
  </div>
@endsection
