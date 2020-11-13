@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Customer View ') }}
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
              <h4 class="page-title">All Customer!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">All Customer</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('customer.index') }}" class = "btn btn-success btn-lg my-3">New Customer</a>
            <a href="{{ route('employees.trash') }}" class = "btn btn-success btn-lg my-3">Trash Customer</a>

                 <div class="card">
                     <div class="card-header">
                        <h2>Customer View</h2>
                        <hr>
                       <h4>Total Customer : {{ $total_customers }}</h4>
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
                                 <th>Customer Name</th>
                                 <th>Customer Email</th>
                                 <th>Customer Phone</th>
                                 <th>Shop Name</th>
                                 <th>Customer City</th>
                                 <th>Bank Name</th>
                                 <th>Account Number</th>
                                 <th>Customer Photo</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($customer_info as $customer)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td>{{ Str::limit($customer->name , 10) }}</td>
                                 <td>{{ $customer->email }}</td>
                                 <td>{{ $customer->phone }}</td>
                                 <td>{{ $customer->shopname }}</td>
                                 <td>{{ $customer->city }}</td>
                                 <td>{{ $customer->bank_name }}</td>
                                 <td>{{ $customer->account_number }}</td>
                                 <td>
                                   <img src="{{ asset('uploads/customer_photos') }}/{{ $customer->customer_photo }}" alt="" width="100">
                                 </td>
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href = "{{ route('customer.edit' , $customer->id) }}" type="button" class="btn btn-primary">Edit</a>

                                     <form action="{{ route('customer.destroy' , $customer->id) }}" method="post">
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
