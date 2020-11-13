@extends('layouts.logreg')

@section('page_title')
  {{ ('Moltran | Login ') }}
@endsection

@section('logreg_content')
  <div class="account-pages my-5">
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-md-8 col-lg-6 col-xl-5">
                         <div class="card mt-4">
                             <div class="card-header bg-img p-5 position-relative">
                                 <div class="bg-overlay"></div>
                                 <h4 class="text-white text-center mb-0">Sign In to Moltran</h4>
                             </div>
                             <div class="card-body p-4 mt-2">
                               <form method="POST" action="{{ route('login') }}" class="p-3">
                                 @csrf

                                 <div class="form-group mb-3">
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address">
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
                                         <div class="custom-control custom-checkbox">
                                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                             <label class="form-check-label" for="remember">
                                                 {{ __('Remember Me') }}
                                             </label>
                                         </div>
                                     </div>

                                     <div class="form-group text-center mt-5 mb-4">
                                         <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In </button>
                                     </div>

                                     <div class="form-group row mb-0">
                                         <div class="col-sm-7">
                                             @if (Route::has('password.request'))
                                                 <a class="btn btn-link" href="{{ route('password.request') }}">
                                                     {{ __('Forgot Your Password?') }}
                                                 </a>
                                             @endif
                                         </div>
                                         <div class="col-sm-5 text-right">
                                             <a href="{{ url('register') }}">Create an account</a>
                                         </div>
                                     </div>
                                 </form>

                                 <a href = "{{ url('login/github') }}" class="btn btn-secondary btn-block"> <i class = "fab fa-github"></i> Login With Github</a>
                                 <a href = "{{ url('login/google') }}" class="btn btn-info btn-block"> <i class = "fab fa-google"></i> Login With Google</a>
                                 <a href = "{{ url('login/facebook') }}" class="btn btn-primary btn-block"> <i class = "fab fa-facebook"></i> Login With Facebook</a>

                                 
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
