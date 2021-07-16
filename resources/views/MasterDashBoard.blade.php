<!DOCTYPE html>
<html lang="fa" >

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('plugins_dashboard/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('plugins_dashboard/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> -->
    <link rel="stylesheet" href="{{asset('plugins_dashboard/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('plugins_dashboard/css/font_awesome.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{asset('plugins_dashboard/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('plugins_dashboard/demo/demo.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins_dashboard/css/jquery-confirm.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins_dashboard/css/color.css')}}">
@yield('style')
</head>

@if(session()->has('success'))
    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" onload=" me.showNotification2('top','center','success','{{session()->get('success')}}')" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    @elseif (session('error'))

        <body data-open="click" data-menu="vertical-menu" data-col="2-columns"  onload=" me.showNotification2('top','center','danger','{{session()->get('error')}}')"  class="vertical-layout vertical-menu 2-columns  fixed-navbar">
        @else
            <body data-open="click" data-menu="vertical-menu" data-col="2-columns"    class="vertical-layout vertical-menu 2-columns  fixed-navbar">

            @endif
            @if ($errors->any())
                <script>
                    // $(document).ready(function() {
                    // Javascript method's body can be found in assets/js/demos.js



                    window.onload = function() {
                        @foreach ($errors->all() as $error)
                        me.showNotification2('top','center','danger','{{ $error }}');
                        @endforeach
                    };
                </script>
            @endif

            <div class="wrapper ">
                @include('Dashboard_Partials.sidebar')
<div class="main-panel">
@include('Dashboard_Partials.header')
@yield('content')
</div>
            </div>
            @include('Dashboard_Partials.footer')

<script src="{{asset('plugins_dashboard/js/core/jquery.min.js')}}"></script>
<script src="{{asset('plugins_dashboard/js/core/popper.min.js')}}"></script>
<script src="{{asset('plugins_dashboard/js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('plugins_dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Plugin for the momentJs  -->
<script src="{{asset('plugins_dashboard/js/plugins/moment.min.js')}}"></script>
<!--  Plugin for Sweet Alert -->
<script src="{{asset('plugins_dashboard/js/plugins/sweetalert2.js')}}"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('plugins_dashboard/js/plugins/jquery.validate.min.js')}}"></script>
<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{asset('plugins_dashboard/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{asset('plugins_dashboard/js/plugins/bootstrap-selectpicker.js')}}"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{asset('plugins_dashboard/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{asset('plugins_dashboard/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('plugins_dashboard/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('plugins_dashboard/js/plugins/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{asset('plugins_dashboard/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{asset('plugins_dashboard/js/plugins/jquery-jvectormap.js')}}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('plugins_dashboard/js/plugins/nouislider.min.js')}}"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="{{asset('plugins_dashboard/js/core/core2_4_1.js')}}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('plugins_dashboard/js/plugins/arrive.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!-- Chartist JS -->
<script src="{{asset('plugins_dashboard/js/plugins/chartist.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('plugins_dashboard/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('plugins_dashboard/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('plugins_dashboard/demo/demo.js')}}"></script>
            <script src="{{asset('plugins/js/jquery-confirm.min.js')}}"></script>

            <script>
    $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function(event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
            });

            $('.fixed-plugin .img-holder').click(function() {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function() {
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $full_page_background.fadeOut('fast', function() {
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function() {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function() {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                } else {

                    $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                    setTimeout(function() {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function() {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function() {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });
        });
    });
</script>
<script>
    me = {
        showNotification2: function (from, align,mytype,msg) {
            type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

            color = Math.floor((Math.random() * 6) + 1);

            $.notify({
                    icon: "add_alert",
                    message: msg

                },
                {
                    type: mytype,
                    timer: 3000,
                    placement: {
                        from: from,
                        align: align
                    }
                });
        },
    }

</script>
            <script>


                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });



                $("#navbarDropdownMenuLink").click(function(e){



                    e.preventDefault();



                    jQuery.support.cors = true;


                    $.ajax({


                        method: 'PUT',

                        url: 'http://cryptic-stream-63897.herokuapp.com/dashboard/message/1' ,


                        success: function (data) {
                            if (data === "success") {
                                $('.notification').remove();



                            }

                        }
                    });










                });

            </script>

            @yield('script')


            </body>
</html>