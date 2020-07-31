<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom -->
    <meta name="google-signin-scope" content="https://www.googleapis.com/auth/userinfo.profile">
	<meta name="google-signin-client_id" content="22783882800-75ev30ra8e2o3nsog36d2cu1lrp5urpl.apps.googleusercontent.com">

	<!-- css -->
	<!-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/css/stylecolorlib.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="{{asset('assets/css/notify.css')}}" rel="stylesheet"/>
	<script src="{{asset('assets/js/notify.js')}}"></script>
	<!-- <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
	<!-- <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script> -->
    <!-- Custom -->
</head>
<body>
    <input type="hidden" id="base_url" value="{{url('')}}">
    <input type="hidden" id="base_asset" value="{{asset('')}}">
    <div id="app" style="height:100%;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="site-header">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> -->

                            <li class="nav-item dropdown"><a class="nav-link" href="{{url('User/marks')}}">New</a></li>
							<li class="nav-item dropdown"><a class="nav-link" href="{{url('User/mytables')}}">My Tables</a></li>
                            <li class="nav-item dropdown">
                                <!-- <a class="nav-link" href="{{route('logout')}}">
                                Logout
                                </a> -->
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="add_table_Modal" role="dialog">
        <div class="modal-dialog modal-md" style="margin-top:200px;">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create New Table</h4>
            </div>
            <div class="modal-body">
                <div class="form_group">
                    <p>Table Name</p>
                    <input type="text" class="form-control" id="newtablename" placeholder="Enter TableName">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="add_Table_btn" data-dismiss="modal">Create</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer style="position:fixed; bottom:0px;">
        This application is designed to be used in Google's Chrome browser only.
    </footer>
    <style>
        #site-header{
            background-color: cornflowerblue !important;
            color:white;
        }
        #site-header a{
            color:white;
        }
        #site-header a:hover{
            color:black;
        }
    </style>
    <script>
    $(function(){
        // Check the initial Poistion of the Sticky Header
        var stickyHeaderTop = $('#site-header').offset().top;

        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#actionbar').css({position: 'fixed', top: '0px'});
                        $('#actionbar').css('background-color', 'white');
                        $('#actionbar').css('margin-top', '5px');
                        $('#actionbar').css('right', '5px');
                } else {
                        $('#actionbar').css({position: 'static', top: '0px'});
                }
        });
     });
     var options1 = {
		'title': 'Saved',
		'style': 'success',
		'message': 'Your changes are saved successfully!',
		'icon': 'check',
	}; 
	var options2 = {
		'title': 'Saved',
		'style': 'success',
		'message': 'All data are saved in DB successfully!',
		'icon': 'check',
	}; 
	var options3 = {
		'title': 'Saved',
		'style': 'success',
		'message': 'Student Name is saved successfully!',
		'icon': 'check',
	}; 
	var options4 = {
		'title': 'Saved',
		'style': 'success',
		'message': 'New Table is created successfully!',
		'icon': 'check',
	}; 
	var n1 = new notify(options1);
	var n2 = new notify(options2);
	var n3 = new notify(options3);
	var n4 = new notify(options4);
    $(document).ready(function(){
        
        $("#add_name").click(function(){
			$("#add_name_Modal").modal();
		});
		$("#new_table").click(function(){
			$("#add_table_Modal").modal();
		});
		$("#add_name_btn").on("click", function() {
			var student_name = $("#studentname").val();console.log(student_name);
            $.ajax({
                // url: BASE_URL + 'Tablemanagement/save_studentname',
                url: '{{url("Tablemanagement/save_studentname")}}',
                data: {
                    student_name: student_name
                },
                error: function(e) {
                    // $('#info').html('<p>An error has occurred</p>');
                },
                dataType: 'json',
                success: function(data) {
                    var delay = 1000; ;
                    setTimeout(function() {
                        n3.show('slow',{}, 500)
                    }, 500);
                    setTimeout(function() {
                        n3.hide('blind', {}, 500),
                        setTimeout(function(){ window.location.reload();}, delay);                   
                    }, 2000);

                },
                type: 'POST'
            });
        });
		$("#add_Table_btn").on("click", function() {
			var Tablename = $("#newtablename").val();
            $.ajax({
                url: '{{url("Tablemanagement/new_table")}}',
                data: {
                    Tablename: Tablename
                },
                error: function(e) {
                    // $('#info').html('<p>An error has occurred</p>');
                },
                dataType: 'json',
                success: function(data) {
                    var delay = 1000; ;
                    setTimeout(function() {
                        n4.show('slow',{}, 500)
                    }, 500);
                    setTimeout(function() {
                        n4.hide('blind', {}, 500),
                        setTimeout(function(){document.location.href = '{{url("")}}/Tablemanagement/loadtable?t_id=' + data;}, delay);                   
                    }, 2000);

                },
                type: 'POST'
            });
        });
    });
    </script>
</body>
</html>
