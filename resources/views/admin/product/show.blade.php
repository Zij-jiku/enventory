@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Advance Salary') }}
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
              <h4 class="page-title">Product !</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Product View</li>
                  
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('salary.index') }}" class = "btn btn-success btn-lg my-3">New Product</a>
            <a href="#" class = "btn btn-success btn-lg my-3">Trash Product</a>

                 <div class="card">
                     <div class="card-header">
                        <h2>Product View</h2>
                        <hr>
                       <h4>Total Product : {{ $total_products }}</h4>
                       
                     </div>
                     <div class="card-body">
                       @if(session()->has('trash_status'))
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('trash_status') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif
                      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <style media="screen">
                            .form-control-sm{
                              float: right;
                            }
                            </style>

                             <thead>
                               <tr>
                                 <th>SL No.</th>
                                 <th>Product Name</th>
                                 <th>Buy Date</th>
                                 <th>Product Code</th>
                                 <th>Selling Price</th>
                                 <th>Grage</th>
                                 <th>Route</th>
                                 <th>Image</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($product_info as $product)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($product->product_name , 20) }}</td>
                                 <td>{{ $product->buy_date }}</td>
                                 <td>{{ $product->product_code }}</td>
                                 <td>{{ $product->selling_price }}</td>
                                 <td>{{ $product->product_grage }}</td>
                                 <td>{{ $product->product_route }}</td>
                                 <td>
                                   <img src="{{ asset('uploads/product_photos') }}/{{ $product->product_photo }}" alt="" width="100">
                                 </td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href = "{{ route('product.edit' , $product->id) }}" type="button" class="btn btn-primary">View</a>

                                     <form action="{{ route('product.destroy' , $product->id) }}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger">Delete</button>
                                     </form>
                                   </div>
                                 </td>
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

          </div>
        </div><!-- end row -->
      </div><!-- end col-12 -->
      <!-- end container-fluid -->
    </div>
    <!-- end content -->
  </div>

@endsection



@section('footer_scripts')
  <script>
  $(document).ready(function() {
    $('#datatable').DataTable();
  });
</script>
@endsection
