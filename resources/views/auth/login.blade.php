<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:12 GMT -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
  <link rel="shortcut icon" href="{{asset('server/assets/images/favicon.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Cuba - Premium Admin Template</title>
  <!-- Google font-->
  <link href="{{asset('server/fonts.googleapis.com/css31d8.css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap')}}" rel="stylesheet">
  <link href="{{asset('server/fonts.googleapis.com/css8807.css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/font-awesome.css')}}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/icofont.css')}}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/themify.css')}}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/flag-icon.css')}}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/feather-icon.css')}}">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/vendors/bootstrap.css')}}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/style.css')}}">
  <link id="color" rel="stylesheet" href="{{asset('server/assets/css/color-1.css')}}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{asset('server/assets/css/responsive.css')}}">
</head>

<body>
  <!-- login page start-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('server/assets/images/login/2.jpg')}}" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
        <div class="login-card">
          <div>
            <div><a class="logo text-start" href="{{route('index')}}"><img class="img-fluid for-light" src="{{asset('client/images/logo/logo-2.png')}}" alt="Learts Logo"><img class="img-fluid for-dark" src="{{asset('server/assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
            <div class="login-main">

              <form class="theme-form" method="POST" action="{{ url('/LoginCheck') }}">
                {{ csrf_field() }}
                <h4>Đăng nhập</h4>
                <?php
                $message = Session::get('message');
                if ($message) {
                  echo '<p style="color:red">' . $message . '</p>';
                  Session::put('message', null);
                } else {
                  echo '<p>
                  Nhập tài khoản & mật khẩu để đăng nhập</p>';
                }
                ?>
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                  <label class="col-form-label">Tài khoản</label>
                  <input type="text" class="form-control" name="username" required="" placeholder="Username" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="col-form-label">Mật khẩu</label>
                  <div class="form-input position-relative">
                    <input type="password" class="form-control" name="password" placeholder="*********" required>
                    <div class="show-hide"><span class="show"> </span></div>
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>
                    <label class="text-muted" for="checkbox1">Ghi nhớ mật khẩu</label>
                  </div>
                  <button class="btn btn-info btn-block w-100" type="submit">Đăng nhập</button>
                </div>
                <h6 class="text-muted mt-4 or">Hoặc đăng nhập với</h6>
                <div class="social mt-4">
                  <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                </div>
              </form>
              <p class="mt-4 mb-0 text-center">Bạn không có tài khoản?<a class="ms-2" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" href="#">Tạo tài khoản</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Đăng Ký Tài Khoản</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form role="form" method="POST" action="{{ url('/register') }}">
              {{ csrf_field() }}
              <fieldset>
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <input type="name" class="form-control" id="firstName" name="firstName" placeholder="Họ" required>
                    @if ($errors->has('firstName'))
                    <span class="help-block">
                      <strong>{{ $errors->first('firstName') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group col-sm-6">
                    <input type="name" class="form-control" id="lastName" name="lastName" placeholder="Tên" required>
                    @if ($errors->has('lastName'))
                    <span class="help-block">
                      <strong>{{ $errors->first('lastName') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="number" name="phone" class="form-control" placeholder="Số Điện Thoại" required>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Tên Tài Khoản" required>
                  @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Mật Khẩu" required>
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Nhập Lại Mật Khẩu" required>
                </div>
                <div class="text-center">
                  <button class="btn btn-primary" type="submit">Submit</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Shopping Cart Section End -->
    <!-- latest jquery-->
    <script src="{{asset('server/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('server/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('server/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('server/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('server/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('server/assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </div>
</body>

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login_one.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 10:56:12 GMT -->

</html>