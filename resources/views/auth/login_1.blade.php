
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic page needs -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login - Ezeelive Technologies Admin Panel</title>
        <!-- fevicon -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/dist/modules/core/common/img/favicon.ico" rel="shortcut icon">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">


    <!-- VENDORS -->
    <!-- v2.0.0 -->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/ladda//dist/ladda-themeless.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/bootstrap-select//dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/select2//dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/fullcalendar//dist/fullcalendar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/bootstrap-sweetalert//dist/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/summernote//dist/summernote.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/owl.carousel//dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/ionrangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/datatables/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/c3/c3.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/chartist//dist/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/nprogress/nprogress.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/jquery-steps/demo/css/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/dropify//dist/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/font-linearicons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/font-icomoon/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/cleanhtmlaudioplayer/src/player.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/vendors/cleanhtmlvideoplayer/src/player.css')}}">
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery//dist/jquery.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/popper.js//dist/umd/popper.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-mousewheel/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/spin.js/spin.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/ladda//dist/ladda.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/bootstrap-select//dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/select2//dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/html5-form-validation//dist/jquery.validation.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-typeahead//dist/jquery.typeahead.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-mask-plugin//dist/jquery.mask.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/autosize//dist/autosize.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/bootstrap-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/fullcalendar//dist/fullcalendar.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/bootstrap-sweetalert//dist/sweetalert.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/remarkable-bootstrap-notify//dist/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/summernote//dist/summernote.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/owl.carousel//dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/ionrangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/nestable/jquery.nestable.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/datatables-responsive/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/editable-table/mindmup-editabletable.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/d3/d3.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/c3/c3.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/chartist//dist/chartist.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/chartist-plugin-tooltip//dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-countTo/jquery.countTo.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/chart.js//dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/dropify//dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js')}}"></script>

    <!-- CLEAN UI ADMIN TEMPLATE MODULES-->
    <!-- v2.0.0 -->
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/core/common/core.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/vendors/common/vendors.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/layouts/common/layouts-pack.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/themes/common/themes.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/menu-left/common/menu-left.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/menu-right/common/menu-right.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/top-bar/common/top-bar.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/footer/common/footer.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/pages/common/pages.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/ecommerce/common/ecommerce.cleanui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('custom/ezeelive/dist/modules/apps/common/apps.cleanui.css')}}">
    <script src="{{asset('custom/ezeelive/dist/modules/menu-left/common/menu-left.cleanui.js')}}"></script>
    <script src="{{asset('custom/ezeelive/dist/modules/menu-right/common/menu-right.cleanui.js')}}"></script>        
    </head>
	 </html>
	<body class="cat__pages__login">
<!-- START: pages/login -->
<div class="cat__pages__login cat__pages__login--fullscreen" style="background-image: url('{{asset('custom/ezeelive/dist/modules/pages/common/img/login/1.jpg')}}')">
    <div class="cat__pages__login__block">
        <div class="row">
            <div class="col-xl-12">
                <div class="cat__pages__login__block__promo text-white text-center">
                    <h2 class="mb-">
                        <strong>WELCOME TO VOICE COMMAND GRADING</strong>
                    </h2>
                </div>
                <div class="cat__pages__login__block__inner">
                    <div class="cat__pages__login__block__form">
                        <h4 class="text-uppercase">
                            <strong>Please log in</strong>
                        </h4>
                        <br />
														
							
                        <form id="form-validation" name="form-validation" method="POST" action="{{ route('login') }}">
						    @csrf
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input id="validation-email"
                                       class="form-control"
                                       placeholder="Email or Username"
                                       name="email"
                                       type="text"
                                       data-validation="[NOTEMPTY]">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input id="validation-password"
                                       class="form-control password"
                                       name="password"
                                       type="password" data-validation="[L>=6]"
                                       data-validation-message="$ must be at least 6 characters"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="pull-right cat__core__link--blue cat__core__link--underlined">Forgot Password?</a>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  checked>
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary mr-3" name="login" value="login">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cat__pages__login__footer text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
            <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
        </ul>
    </div>
</div>
<!-- END: pages/login-alpha -->

<!-- START: page scripts -->
<script>
    $(function() {

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Change BG
        var min = 1, max = 5,
            next = Math.floor(Math.random()*max) + min,
            final = next > max ? min : next;
        $('.random-bg-image').data('img', final);
        $('.cat__pages__login').data('img', final).css('backgroundImage', 'url("{{asset("custom/ezeelive/dist/modules/pages/common/img/login/")}}"' + final + '.jpg)');
    
    });
</script>
<!-- END: page scripts -->
</body>

