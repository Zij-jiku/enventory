@extends('layouts.dashboard_layouts')

@section('dashboard_content')

  <div class="content-page">
    <div class="content">
      <!-- Start Content-->
      <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
          <div class="col-12">
            <div class="page-title-box">
              <h4 class="page-title">Welcome !</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">
          <div class="col-8 m-auto">

            <div class="card">
              <div class="card-header text-white">{{ __('Verify Your Email Address') }}</div>

              <div class="card-body text-white">
                @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                  </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                  @csrf
                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
