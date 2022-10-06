<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Pangkalan Data - SPMI Universitas Tadulako</title>
    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"/>

    <link rel="stylesheet" href="{{URL::asset('vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{URL::asset('vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{URL::asset('css/demo.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{URL::asset('vendor/libs/apex-charts/apex-charts.css')}}" />

    <script src="{{URL::asset('vendor/js/helpers.js')}}"></script>
    <script src="{{URL::asset('vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <script src="{{URL::asset('js/config.js')}}"></script>
  </head>

  <body style="background-color: #4e49ba !important;">

    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
          <!-- /Left Text -->
          <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            <div class="w-100 d-flex justify-content-center">
              <img src="{{ URL::asset('images/boy-with-rocket-light.png') }}" class="img-fluid" alt="Login image" width="650" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png">
            </div>
          </div>
          <!-- /Left Text -->
      
          <!-- Login -->
          <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4 bg-white">
            <div class="w-px-400 mx-auto">
              <!-- Logo -->
              <div class="app-brand mb-5">
                <a href="" class="app-brand-link gap-2">
                  <img src="/images/untadlogo.png" alt="" width="35px">
                  <span class="app-brand-text fs-3" style="color:#566a7f;font-weight:700;">Portaldata UNTAD</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Selamat Datang di Portaldata Universitas Tadulako</h4>
              <p class="mb-4">Silahkan login untuk masuk di sistem kami.</p>
  
              {{-- menampilkan error validasi --}}
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
      
              <form id="formAuthentication" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="mb-3 fv-plugins-icon-container">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="username" autofocus="">
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="#">
                      <small>Lupa Kata Sandi?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge has-validation">
                    <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div><div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me">
                    <label class="form-check-label" for="remember-me">
                      Remember Me
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">
                  Sign in
                </button>
                <div></div><input type="hidden">
              </form>
      
              <p class="text-center">
                <span>Belum punya akun?</span>
                <a href="#">
                  <span>Hubungi kami</span>
                </a>
              </p>
      
            </div>
          </div>
          <!-- /Login -->
        </div>
    </div>
  
    
  </body>

  <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/demo.css')}}">
  <script src="{{URL::asset('vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{URL::asset('vendor/libs/popper/popper.js')}}"></script>
  <script src="{{URL::asset('vendor/js/bootstrap.js')}}"></script>
  <script src="{{URL::asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{URL::asset('vendor/js/menu.js')}}"></script>
  <script src="{{URL::asset('js/main.js')}}"></script>

</html>
