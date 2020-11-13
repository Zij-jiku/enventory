@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Supplier View ') }}
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
              <h4 class="page-title">All Supplier!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">All Supplier</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('supplier.index') }}" class = "btn btn-success btn-lg my-3">New Supplier</a>
            <a href="#" class = "btn btn-success btn-lg my-3">Trash Supplier</a>

                 <div class="card">
                     <div class="card-header">
                        <h2>Supplier View</h2>
                        <hr>
                       <h4>Total Supplier : {{ $total_suppliers }}</h4>
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
                                 <th>Supplier Name</th>
                                 <th>Supplier Email</th>
                                 <th>Supplier Phone</th>
                                 <th>Shop Name</th>
                                 <th>Supplier Type</th>
                                 <th>Supplier City</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                 <th>Supplier Photo</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($supplier_info as $supplier)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($supplier->name , 10) }}</td>
                                 <td>{{ $supplier->email }}</td>
                                 <td>{{ $supplier->phone }}</td>
                                 <td>{{ $supplier->shopname }}</td>
                                 <td>{{ $supplier->type }}</td>
                                 <td>{{ $supplier->city }}</td>
                                 <td>{{ $supplier->bank_name }}</td>
                                 <td>{{ $supplier->account_number }}</td>
                                 <td>
                                   <img src="{{ asset('uploads/supplier_photos') }}/{{ $supplier->supplier_photo }}" alt="" width="100">
                                 </td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href = "{{ route('supplier.edit' , $supplier->id) }}" type="button" class="btn btn-primary">Edit</a>

                                     <form action="{{ route('supplier.destroy' , $supplier->id) }}" method="post">
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
