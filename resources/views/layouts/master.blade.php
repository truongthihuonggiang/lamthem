<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Lam Them</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Replenish a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="{{asset('/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/css/zoomslider.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/css/style6.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700')}}" rel="stylesheet">
    <link href="{{asset('//fonts.googleapis.com/css?family=Quicksand:300,400,500,700')}}" rel="stylesheet">
</head>

<body class="">
    <!-- header -->
    @if(isset($page))
        @include('pages.header')
    @else
        @include('layouts.header') 
    @endif
    <!-- //header -->
    <!-- content -->
    <div id="content">
        @yield('content')
        
    </div>
    <!-- //content -->
    <!-- footer -->
    @include('layouts.footer')
    <!-- //footer -->


    <!--//model-form-->
    <!-- js -->
    <!--/slider-->
    <script src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('/js/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('/js/jquery.zoomslider.min.js')}}"></script>
    <!--//slider-->
    <!--search jQuery-->
    <script src="{{asset('/js/classie-search.js')}}"></script>
    <script src="{{asset('/js/demo1-search.js')}}"></script>
    <!--//search jQuery-->

    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->
    <!-- password-script -->
    <!-- <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script> -->
    <!-- //password-script -->

    <!-- stats -->
    <script src="{{asset('/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/js/jquery.countup.js')}}"></script>
    <script>
        $('.counter').countUp();
    </script>
    <!-- //stats -->

    <!-- //js -->
    <script src="{{asset('/js/bootstrap.js')}}"></script>
    <!--/ start-smoth-scrolling -->
    <script src="{{asset('/js/move-top.js')}}"></script>
    <script src="{{asset('/js/easing.js')}}"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            /*
            						var defaults = {
            							  containerID: 'toTop', // fading element id
            							containerHoverID: 'toTopHover', // fading element hover id
            							scrollSpeed: 1200,
            							easingType: 'linear' 
            						 };
            						*/

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!--// end-smoth-scrolling -->
</body>

</html>