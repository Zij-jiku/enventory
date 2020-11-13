@extends('layouts.dashboard_layouts')

@section('page_title')
 {{ ('Moltran | Invoice ') }}
@endsection

@section('dashboard_content')

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Invoice</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    {{-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                    </div>  --}}

                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-right">
                                                    <img src="{{ asset('backend_assets') }}/images/logo-dark.png" height="18" alt="moltran">
                                                </h4>

                                            </div>
                                            <div class="float-right">
                                                <h5>Invoice # <br>
                                                            <strong>{{ date('d/m/Y') }}</strong>
                                                        </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="float-left mt-4">
                                                    <address>
                                                            <strong>Name : {{ $customer->name }}</strong>
                                                            <br>
                                                              Address : {{ $customer->address }}
                                                            <br>
                                                              City : {{ $customer->city }}
                                                            <br>
                                                            <abbr title="Phone">
                                                                Phone: </abbr> {{ $customer->phone }}
                                                            </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong> {{ date('d-M-Y') }}</p>
                                                    <p class="mt-2"><strong>Order Status: </strong> <span class="badge badge-pink">Pending</span></p>
                                                    <p class="mt-2"><strong>Order ID: </strong> #123456</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>ID No.</th>
                                                                <th>Product Name</th>
                                                                <th>Product Quantity</th>
                                                                <th>Price</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        @php
                                                            $contents = Cart::content();
                                                            $totaltk = 0;
                                                            $totalqty = 0;
                                                        @endphp


                                                         @forelse($contents as $content)
                                                            <tr>
                                                                <td> {{ $content->id }} </td>
                                                                <td> {{ $content->name }} </td>
                                                                <td> {{ $content->qty }}  </td>
                                                                <td> {{ $content->price }} tk</td>
                                                                <td> {{ $content->subtotal }} tk</td>
                                                                {{-- <td>
                                                                    <a href="{{ route('delete.cart',$content->rowId) }}">
                                                                        <i class="fas fa-trash-alt text-danger text-center"></i>
                                                                    </a>
                                                                </td> --}}
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <p class="text-right"> Product Quantity: <strong>{{ $totalqty }}</strong> Ta</p>
                                                <p class="text-right"><b>Sub-total:</b> <strong>{{ $totaltk }}.00</strong> tk</p>
                                                <p class="text-right">Discout: 0.0 %</p>
                                                <p class="text-right">VAT: 0.0 %</p>
                                                <hr>
                                                <h3 class="text-right">BDT: <strong>{{ $totaltk }}.00</strong> Tk</h3>
                                            </div> 
                                            
                                        </div>
                                        <hr>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                {{-- <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a> --}}

                                                <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->


            <form action="{{ route('order.submit') }}" method="POST">
                @csrf

                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                    <h5 class="modal-title">
                                        Invoice Of {{ $customer->name }}
                                        <br>
                                        <span class="pull-right">Total : {{ Cart::total() }}</span>
                                    </h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"> 

                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr>
                                                <th>Payment</th>
                                                <th>Pay </th>
                                                <th>Due</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select name="payment_status" class="form-control">
                                                        <option value="handCash">Hand Cash</option>
                                                        <option value="creaditCard">Creadit Card</option>
                                                        <option value="ssl">SSL</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Pay" name="pay">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Due" name="due">

                                                    <input type="hidden" name="customer_id" class="form-control" value="{{ $customer->id }}">
                                                    <input type="hidden" name="order_date" class="form-control" value="{{ date('d/m/y') }}">
                                                    <input type="hidden" name="order_status" class="form-control" value="pending">
                                                    <input type="hidden" name="total_products" class="form-control" value="{{ Cart::count() }}">
                                                    <input type="hidden" name="sub_total" class="form-control" value="{{ Cart::subtotal() }}">
                                                    <input type="hidden" name="vat" class="form-control" value="{{ Cart::tax() }}">
                                                    <input type="hidden" name="total" class="form-control" value="{{ Cart::total() }}">

                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->

            </form>

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                2016 - 2020 &copy; Moltran theme by <a href="#">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


@endsection