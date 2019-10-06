<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NewBiz Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
          rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}1'" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: NewBiz
      Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
    @stack('styles')
</head>

<body>

<!--==========================
Header
============================-->
<header id="header" class="fixed-top">
    <div class="container">
        <div class="logo float-left">
            <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>
        </div>
        <nav class="main-nav float-right d-none d-lg-block">
            <ul>
                <li><a href="{{route('procesos.index')}}">Mis procesos</a></li>
                <li><a href="#">Cuenta</a></li>
                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Salir</a>
                </li>
            </ul>
        </nav><!-- .main-nav -->
        <form id="logout" action="{{route('logout')}}" method="post">
            @csrf
        </form>
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix" style="height: 0px">
    <div class="container" style="height: 0px">
        <div class="intro-img">
            <img src="{{asset('img/intro-img.svg')}}" style="height: 120px" alt="" class="img-fluid">
        </div>
        <div class="intro-info">
            <h2>@yield('title')</h2>
        </div>

    </div>
</section><!-- #intro -->

<main id="main">
    <section id="portfolio" class="clearfix">
        @yield('content')
    </section>
</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>NewBiz</h3>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet
                        proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum
                        dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>NewBiz</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/mobile-nav/mobile-nav.js')}}"></script>
<script src="{{asset('lib/wow/wow.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{asset('contactform/contactform.js')}}"></script>

<!-- Template Main Javascript File -->
<script src="{{asset('js/main.js')}}"></script>
@stack('scripts')
</body>
</html>
