
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
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'Laravel') }}">
    <meta name="author" content="">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Voice Command </title>
    
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="manifest" href="{{asset('custom/coreui/assets/favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{asset('custom/coreui/css/free.min.css')}}" rel="stylesheet"> <!-- icons -->
    <link href="{{asset('custom/coreui/css/flag-icon.min.css')}}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{asset('custom/coreui/css/style.css')}}" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet"> -->
    <link href="{{asset('css/bootstrap-social.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
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
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Sign In to your account</p>
                <form method="POST" action="{{route('login')}}">
                  @csrf
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-user')}}"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="text" placeholder="E-Mail Address" name="email" value="" required autofocus>
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="{{asset('custom/coreui/assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked')}}"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="row ">
                    <div class="col-6 center">
                      <button class="btn btn-primary px-4  center-child" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('password.request') }}" class="btn btn-link px-0">Forgot Your Password?</a>
                    </div>
                  </div>
                </form>
                    <!-- </div> -->
                    <!-- <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                      <strong>Login With Google</strong>
                    </a>  -->
                    <a href="{{ url('auth/google') }}" class="btn btn-block btn-social btn-google" style="margin-top: 20px; color:white;">
                      <span class="fa fa-google"></span> Sign in with Google
                    </a>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Create your account with your email address.</p>
                  <a href="{{ route('register') }}" class="btn btn-primary active mt-3">Register</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer style="width: 100%;position: fixed;bottom: 0px;padding:5px 10px;font-size: 20px;color: white;background: #321fdb;text-align: center;">
        This application is designed to be used in Google's Chrome browser only.
    </footer>

 

    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('custom/coreui/js/coreui.bundle.min.js')}}"></script>

    <style>
    .center {
      /* height: 200px; */
      position: relative;
    }

    .center-child {
      margin: 0;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
    </style>

  </body>
</html>
