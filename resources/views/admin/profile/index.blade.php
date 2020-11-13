@extends('layouts.dashboard_layouts')

@section('page_title')
  {{ ('Moltran | Profile ') }}
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
              <h4 class="page-title">Welcome !</h4>
              <div class="page-title-right">
                <ol class="breadcrumb p-0 m-0">
                  <li class="breadcrumb-item"><a href="{{ url('/home') }}">Moltran</a></li>
                  <li class="breadcrumb-item active">Profile</li>
                </ol>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- end page title -->

        <div class="row">

          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                   <h2>Name Change</h2>
                </div>
                <div class="card-body">

                  <form method="post" action = "{{ url('profile/insert') }}">
                    @csrf
                    @if(session()->has('name_change'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('name_change') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session()->has('days_status'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session()->get('days_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="form-group">
                      <label>Name Change</label>
                      <input type="text" class="form-control" placeholder="Name Change" name = "name" value="{{ Auth::user()->name }}">
                      @error ('name')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Name Change</button>
                  </form>

                </div>
           </div>
          </div>

          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                   <h2>Password Change</h2>
                </div>
                <div class="card-body">

                  <form method="post" action = "{{ url('edit/password/post') }}">
                    @csrf
                    @if(session()->has('password_status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('password_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session()->has('pass_milenai_status'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session()->get('pass_milenai_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session()->has('old_pass_status'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session()->get('old_pass_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="form-group">
                      <label>Current Password</label>
                      <input type="password" class="form-control" placeholder="Old Password" name = "old_password" id="button_one">
                      <div class="form-group my-2">
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" onclick="one_button()">
                           <label class="form-check-label text-primary ml-2" for="invalidCheck1">
                             Show Current Password
                           </label>
                         </div>
                       </div>

                      @error ('old_password')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>New Password</label>
                      <input type="password" class="form-control" placeholder="New Password" name = "password" id="button_two">
                      <div class="form-group my-2">
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" onclick="two_button()">
                           <label class="form-check-label text-primary ml-2" for="invalidCheck2">
                             Show New Password
                           </label>
                         </div>
                       </div>
                      @error ('password')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Confirm Password</label>
                      <input type="password" class="form-control" placeholder="Confirm Password" name = "password_confirmation" id="button_three">
                      <div class="form-group my-2">
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" onclick="three_button()">
                           <label class="form-check-label text-primary ml-2" for="invalidCheck3">
                             Show Confirm Password
                           </label>
                         </div>
                       </div>
                      @error ('password_confirmation')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Password Change</button>
                  </form>

                </div>
           </div>
          </div>

          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                   <h2>Profile Image Change</h2>
                </div>
                <div class="card-body">

                  <form method="post" action = "{{ url('profile/image/upload') }}" enctype="multipart/form-data">
                    @csrf
                    @if(session()->has('photo_success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('photo_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    @if(session()->has('photo_status'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ session()->get('photo_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="form-group">
                      <label>Profile Image</label>
                      <input type="file" class="form-control" name = "profile_image">
                    </div>

                    <button type="submit" class="btn btn-primary">Profile Upload</button>
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

@section('footer_scripts')
<script>
  function one_button() {
    var x = document.getElementById("button_one");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
  
  <script>
  function two_button() {
    var x = document.getElementById("button_two");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
  
  <script>
  function three_button() {
    var x = document.getElementById("button_three");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  </script>
      
@endsection