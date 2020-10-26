<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>منظومة اجندة القائد</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/libs/jquery-minicolors/jquery.minicolors.css">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />--}}

{{--        <link rel="stylesheet" type="text/css" href="/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">--}}
    <link rel="stylesheet" type="text/css" href="/assets/libs/quill/dist/quill.snow.css">
    <link href="/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">

    <link href="/dist/css/style.min.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />--}}

    @yield('header')
    <style>
        @yield('styles')

        body {
            font-family: 'Droid Arabic Kufi Regular';
        }

    </style>
</head>

<body dir="rtl">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="/">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="light-logo animated bounceInRight" />

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="light-logo animated bounceInLeft" />

                        </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent"
                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                        class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a
                            class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                            data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">


                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown animated bounceInLeft">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="{{asset('assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31"></a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInLeft "
                             aria-labelledby="2">
                            <a class="dropdown-item" href="javascript:void(0)"> {{Auth()->user()->rank->name}} {{Auth()->user()->name}}</a>
                            <hr>
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#Modal1"><i class="ti-user m-r-5 m-l-5"></i>حساب شخصي</a>

                            {{--                           --}}
                            <a class="dropdown-item" href="/logout"><i
                                    class="fa fa-power-off m-r-5 m-l-5"></i> تسجيل خروج</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav animated bounce" >
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                 href="/" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                class="hide-menu">الرئيسيه</span></a></li>

                    @if(auth()->user()->type=='user')

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                                 href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                class="hide-menu">المهمات </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/tasks" class="sidebar-link"><i
                                        class="mdi mdi-note-outline"></i><span class="hide-menu">جميع المهمات
                                        </span></a></li>
                            <li class="sidebar-item"><a href="/newtask" class="sidebar-link"><i
                                        class="mdi mdi-note-plus"></i><span class="hide-menu"> اضافه مهمة
                                        </span></a></li>
                        </ul>

                    </li>
                    @endif
                    @if(auth()->user()->type=='admin')

                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">المستخدمين </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="/users" class="sidebar-link"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu"> جميع المستخدمين </span></a></li>
                            <li class="sidebar-item"><a href="/createuser" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> اضافة مستخدم </span></a></li>
                        </ul>
                    </li>
                    @endif


                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>

    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
        <div class="modal-dialog" role="document ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغيير كلمة المرور</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true ">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div id="response"></div>
                    <form method="post" id="userForm">
@csrf
                    <div class="form-group row">
                        <label for="fname"
                               class="col-sm-3 text-right control-label col-form-label">كلمة المرور القديمة</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="oldpass" name="oldpass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">كلمة المرور الجديدة</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname"
                               class="col-sm-3 text-right control-label col-form-label">تاكيد كلمة المرور</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="cpassword" name="cpassword">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-9">
                            <input type="button" id="btn-save" class="btn btn-success" value="تغيير كلمة المرور">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(Session::has('message'))
                            <p id="message" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>

            </div>

        </div>
        <footer class="footer text-center">
           جميع الحقوق محفوظه لفرع نظم المعلومات البحري
        </footer>

        <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
{{--        <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>--}}
        <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
        <script src="/assets/extra-libs/sparkline/sparkline.js"></script>
        <!--Wave Effects -->
        <script src="/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="/dist/js/sidebarmenu.js"></script>
{{--        <script src="/assets/libs/moment/moment.js"></script>--}}
{{--        <script src="/assets/libs/moment/locale/ar.js"></script>--}}
        <!--Custom JavaScript -->
        <script src="/dist/js/custom.min.js"></script>
        <!-- This Page JS -->
        <script src="/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
        <script src="/dist/js/pages/mask/mask.init.js"></script>
        <script src="/assets/libs/select2/dist/js/select2.full.min.js"></script>
        <script src="/assets/libs/select2/dist/js/select2.min.js"></script>
        <script src="/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
        <script src="/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
        <script src="/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
        <script src="/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
{{--        <script src="/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}
        <script src="/assets/libs/quill/dist/quill.min.js"></script>
        <script src="/assets/libs/toastr/build/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment-with-locales.min.js" integrity="sha512-EATaemfsDRVs6gs1pHbvhc6+rKFGv8+w4Wnxk4LmkC0fzdVoyWb+Xtexfrszd1YuUMBEhucNuorkf8LpFBhj6w==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>


        <script>
            $('#message').fadeOut(3000);
            //***********************************//
            // For select 2
            //***********************************//
            $(".select2").select2();

            /*colorpicker*/
            $('.demo').each(function() {
                //
                // Dear reader, it's actually very easy to initialize MiniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just for the demo, so don't get confused
                // by it. Also, data- attributes aren't supported at this time...they're
                // only used for this demo.
                //
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    position: $(this).attr('data-position') || 'bottom left',

                    change: function(value, opacity) {
                        if (!value) return;
                        if (opacity) value += ', ' + opacity;
                        if (typeof console === 'object') {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });

            });

            var quill = new Quill('#editor', {
                theme: 'snow'
            });

            $('body').on('click', '#btn-save', function () {

                var actionType = $('#btn-save').val();
                $('#btn-save').html('تحديث...');

                $.ajax({
                    data: $('#userForm').serialize(),
                    url: "/changepassword",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        debugger
                        console.log(data)

                        var res=data[0];
                        if(res=='suc')
                        {
                            $("#response").fadeIn(1);

                            $("#response").html("<p  class=\"alert alert-success\">تم تغيير كلمة المرور بنجاح</p>");
                            $("#response").fadeOut(3000);
                        }
                        else
                        {
                            $("#response").fadeIn(1);
                            $("#response").html("<p  class=\"alert alert-danger\">حدث خطا بتغيير كلمة المرور تاكد من ان كلمة المرور القديمة صحيحة</p>");
                            $("#response").fadeOut(6000);
                        }
                        $('#btn-save').html('تغير كلمة المرور');


                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').html('Save Changes');
                    }
                });
            });
        </script>
    </div>
</div>
        <!-- This Page JS -->
        @yield('scripts')
</body>

</html>
