@extends('layouts.logreg')

@section('page_title')
  {{ ('Moltran | Registration ') }}
@endsection

@section('logreg_content')
  <div class="account-pages my-5">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-md-8 col-lg-6 col-xl-5">
                       <div class="card mt-4">
                           <div class="card-header bg-img p-5 position-relative">
                               <div class="bg-overlay"></div>
                               <h4 class="text-white text-center mb-0">Create a new Account</h4>
                           </div>
                           <div class="card-body p-4 mt-2">
                                 <form method="POST" action="{{ route('register') }}" class="p-3">
                                     @csrf

                                     <div class="form-group mb-3">
                                       <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Name">
                                         @error('name')
                                           <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                           </span>
                                         @enderror
                                       </div>

                                   <div class="form-group mb-3">
                                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email">

                                       @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>

                                   <div class="form-group mb-3">
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">

                                       @error('password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>

                                   <div class="form-group mb-3">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                                   </div>


                                   <div class="form-group mb-3">
                                       <div class="custom-control custom-checkbox checkbox-primary">
                                           <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                           <label class="custom-control-label" for="checkbox-signin">I accept <a href="#">Terms and Conditions</a></label>
                                       </div>
                                   </div>

                                   <div class="form-group text-center mt-5 mb-4">
                                       <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Register </button>
                                   </div>

                                   <div class="form-group row mb-0">
                                       <div class="col-sm-12 text-center">
                                           <a href="{{ url('login') }}">Already have account?</a>
                                       </div>
                                   </div>
                               </form>

                           </div>
                           <!-- end card-body -->
                       </div>
                       <!-- end card -->

                       <!-- end row -->

                   </div>
                   <!-- end col -->
               </div>
               <!-- end row -->

           </div>
       </div>
@endsection
