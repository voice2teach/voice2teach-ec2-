
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version  v3.0.0-alpha.1
* @link  https://coreui.io
* Copyright (c) 2019 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>LaraVoice</title>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="manifest" href="{{asset('custom/coreui/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{asset('custom/coreui/css/free.min.css')}}" rel="stylesheet"> <!-- icons -->
    <link href="{{asset('custom/coreui/css/flag-icon.min.css')}}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{asset('custom/coreui/css/style.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>

    <link href="{{asset('custom/coreui/css/coreui-chartjs.css')}}" rel="stylesheet">

  </head>
  <body class="c-app flex-row align-items-center" style="background-image:url('{{asset('custom/ezeelive/dist/modules/pages/common/img/login/1.jpg')}}')">

    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Register</h1>
                    <p class="text-muted">Create your account</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-user')}}"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="Name" name="name" value="" required autofocus>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open')}}"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="E-Mail Address" name="email" value="" required>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked')}}"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked')}}"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">Register</button>
                </form>
                <div class="" style="padding-top:20px;">
                    <a href="{{route('login')}}">I am already member</a>
                </div>
            </div>
            <!-- <div class="card-footer p-4">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-block btn-facebook" type="button">
                    <span>facebook</span>
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block btn-twitter" type="button">
                    <span>twitter</span>
                  </button>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>

 

    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('custom/coreui/js/coreui.bundle.min.js')}}"></script>

    

  </body>
</html>
