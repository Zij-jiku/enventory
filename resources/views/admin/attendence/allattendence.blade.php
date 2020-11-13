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
              <h4 class="page-title">All Attendence!</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">All Attendence</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-12">

            <a href="{{ route('attendence.index') }}" class = "btn btn-success btn-lg my-3">Take Attendence</a>
            {{-- <a href="">Take Attendence</a> --}}

                 <div class="card">
                     <div class="card-header">
                        <h2>Attendence View</h2>
                        <hr>
                       {{-- <h4>Total Customer : {{ $total_customers }}</h4> --}}
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
                                 <th>Attendence Date</th>
                                 <th>Action</th>
                               </tr>
                             </thead>

                             <tbody>
                               @forelse($att_edit_date as $edit_date_single)
                               <tr>
                                 <td>{{ $loop->index + 1 }}</td>
                                 <td class = "text-danger">{{ $edit_date_single->edit_date }}</td>
                                
                                 <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                    {{-- {{ route('attendence.edit' , $edit_date->id) }} --}}
                                     <a href = "{{ route('allattendenceedit',$edit_date_single->edit_date) }}" type="button" class="btn btn-primary">Edit</a>
                                     {{-- <a href = "" type="button" class="btn btn-info">View</a> --}}
                                     <a href = "{{ route('view.attendence',$edit_date_single->edit_date) }}" type="button" class="btn btn-info">View</a>
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
