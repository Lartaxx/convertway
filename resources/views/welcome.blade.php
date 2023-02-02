
<!DOCTYPE html>
<html lang="fr-FR">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>ConvertWay - Convertissez vos paysafecard</title>

<!-- Fav Icon -->
<link rel="icon" href="{{ url("images/favicon.ico") }}" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<script src="https://kit.fontawesome.com/0017d4f378.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ url("css/landing/flaticon.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/owl.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/bootstrap.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/jquery.fancybox.min.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/animate.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/imagebg.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/style.css") }}" rel="stylesheet">
<link href="{{ url("css/landing/responsive.css") }}" rel="stylesheet">

</head>


<!-- page wrapper -->
<body class="boxed_wrapper">

    <!-- preloader -->
    <div class="preloader"></div>
    <!-- preloader -->

    <!-- main header -->
    <header class="main-header home-1">
        <div class="outer-container">
            <div class="container">
                <div class="main-box clearfix">
                    <div class="logo-box pull-left">
                        <figure class="logo"><a href="index.html"><img src="{{ url("images/logo.png") }}" alt=""></a></figure>
                    </div>
                    <div class="menu-area pull-right">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="current dropdown"><a href="#homepart">Accueil</a>
                                    </li> 
                                    <li class="dropdown"><a href="#featurespart">Pourquoi nous choisir</a>
                                    </li>
                                    <li class="dropdown"><a href="#avispart">Avis Clients</a>
                                        
                                    </li>
                                    <li class="dropdown"><a href="{{ route("panel_convert_view") }}">Convertir</a>
                                        
                                    </li>                          
                                    <li class="dropdown"><a href="https://discord.gg/FTJ3BsbrWF">Discord</a>
                                        
                                    </li>                          
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!--sticky Header-->
        <div class="sticky-header">
            <div class="container clearfix">
                <figure class="logo-box"><a href="index.html"><img src="{{ url("images/small-logo.png") }}" alt=""></a></figure>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><a href="index.html"><img src="{{ url("images/logo.png") }}" alt="" title=""></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            <div class="contact-info">
                <h4>Contact Info</h4>
                <ul>
                    <li>Chicago 12, Melborne City, USA</li>
                    <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div><!-- End Mobile Menu -->


    <!-- banner-section -->
    <section class="banner-section">
        <div id="homepart" class="bg-layer" style="background-image: url({{ url("images/banner-1.png") }});"></div>
        <div class="pattern-bg" style="background-image: url({{ url("images/vactor-1.png") }});"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <h1>Convertissez vos Paysafecard</h1>
                        <div class="text">ConvertWay vous propose de convertir vos Paysafecard en virement Paypal, Bancaire, BTC, ETH, LTC en seulement quelques clics</div>
                        <div class="btn-box"><a href="{{ route("panel_convert_view") }}">Convertir dès maintenant</a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box float-bob-y clearfix">
                        <figure class="image image-1 wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms"><img src="{{ url("images/phone-1.png") }}" alt=""></figure>
                        <figure class="image image-2 wow fadeInUp" data-wow-delay="1500ms" data-wow-duration="1500ms"><img src="{{ url("images/phone-2.png") }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- feature-section -->
    <section class="feature-section">
        <div id="featurespart" class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div id="iamge_block_01">
                        <div class="image-box float-bob-y">
                            <figure class="image wow slideInLeft" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="{{ url("images/phone-3.png") }}" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div id="content_block_01">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>ConvertWay</h2>
                                <p>Voici les différents informations importantes pour tout savoir sur ConvertWay</p>
                            </div>
                            <div class="inner-box wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item">
                                            <div class="bg-layer" style="background-color: #ffff;"></div>
                                            <div class="icon-box"><i class="flaticon-app-1"></i></div>
                                            <h5><a href="#">Convertions en 1 à 24H</a></h5>
                                            <div class="text">Nous pouvons convertir vos Paysafecard en beaucoup de monnaies différentes tels que Paypal, Bitcoin, Etherum, Litecoin. </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                            <div class="bg-layer" style="background-color: #ffff;"></div>
                                            <div class="icon-box"><i class="flaticon-target"></i></div>
                                            <h5><a href="#">Facile & Sécurise</a></h5>
                                            <div class="text">ConvertWay propose une facilité de convertions et un suivi en temps réel grâce à notre panel en ligne ne perdez jamais votre convertion de vue.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                            <div class="bg-layer" style="background-color: #ffff;"></div>
                                            <div class="icon-box"><i class="flaticon-shipping"></i></div>
                                            <h5><a href="#">Trackez votre conversion</a></h5>
                                            <div class="text">Suivez en temps réel le temps restant avant de recevoir votre argent ainsi que l'évolution de votre code Paysafecard</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                        <div class="single-item wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                                            <div class="bg-layer" style="background-color: #ffff;"></div>
                                            <div class="icon-box"><i class="flaticon-dashboard"></i></div>
                                            <h5><a href="#">Haute limite de paiement.</a></h5>
                                            <div class="text">Nous vous proposons une solution permettant de convertir 1000€ maximum par jour. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-section -->


    <!-- feature-style-two -->
    <section class="feature-style-two centred">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow flipInY animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box js-tilt">
                            <div class="hover-content"></div>
                            <div class="icon-box">
                                <div class="bg-layer" style="background-image: url({{ url("images/feature-icon-1.png") }});"></div>
                                <i class="flaticon-smartphone"></i>
                            </div>
                            <h5><a href="#">Facile d'utilisation</a></h5>
                            <div class="text">Un panel adapté aux besoins des clients, simple d'utilisation, convertissez votre paysafecard en quelques secondes.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow flipInY animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="inner-box js-tilt">
                            <div class="hover-content"></div>
                            <div class="icon-box">
                                <div class="bg-layer" style="background-image: url({{ url("images/feature-icon-2.png") }});"></div>
                                <i class="flaticon-seo-and-web"></i>
                            </div>
                            <h5><a href="#">Panel sécurisé</a></h5>
                            <div class="text">Utilisez un panel sécurisé grâce à un espace client perssonel connexion via Google & Discord.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow flipInY animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box js-tilt">
                            <div class="hover-content"></div>
                            <div class="icon-box">
                                <div class="bg-layer" style="background-image: url({{ url("images/feature-icon-3.png") }});"></div>
                                <i class="flaticon-app"></i>
                            </div>
                            <h5><a href="#">Convertion rapide</a></h5>
                            <div class="text">Les convertions sont effectuées en 24H maximum, généralement en une heure.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-style-two end -->




  
    <!-- testimonial-section -->
    <section class="testimonial-section centred">
        <div id="avispart" class="image-layer" style="background-image: url({{ url("images/testimonial-bg.png") }});"></div>
        <div class="container">
            <div class="sec-title center">
                <h2>Nos avis clients</h2>
                <p>Recommandé par plus de 150 clients, 4.7 étoiles sur TrustPilot</p>
            </div>
            <div class="testimonial-carousel owl-carousel owl-theme">
                <div class="testimonial-inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ url("images/testimonial-1.png") }}" alt=""></figure>
                                    <div class="text">“Convertion en 30 minutes, panel super simple d'utilisation je recommande après 4 convertions chez eux”</div>  
                                    <div class="author-info">
                                        <h5 class="name">Alones</h5>
                                        <span class="designation">Client vérifié</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 testimonial-block">
                            <div class="testimonial-block-one">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{ url("images/testimonial-2.png") }}" alt=""></figure>
                                    <div class="text">“Super rapide taxes de 20% ca reste encore OK fiable je conseille”</div>  
                                    <div class="author-info">
                                        <h5 class="name">Mikou</h5>
                                        <span class="designation">Client vérifié</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
    <!-- testimonial-section end -->


    <!-- main-footer -->
    <footer class="main-footer">
        <div class="image-layer" style="background-image: url({{ url("images/footer-bg.png") }});"></div>
        <div class="container">
            <div class="footer-top">
                <div class="widget-section">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="about-widget footer-widget">
                                <figure class="footer-logo"><a href="#"><img src="{{ url("images/footer-logo.png") }}" alt=""></a></figure>
                                <div class="text">Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim lorem sed do eiusmod.</div>
                                <ul class="social-links">
                                    <li><h6>Suivez-nous sur nos réseaux</h6></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="links-widget footer-widget">
                                <h4 class="widget-title">Architecture Web</h4>
                                <div class="widget-content">
                                    <ul class="list clearfix">
                                        <li><a href="#homepart">Accueil</a></li>
                                        <li><a href="#featurespart">Pourquoi nous choisir</a></li>
                                        <li><a href="#avispart">Avis clients</a></li>
                                        <li><a href="#">Convertir</a></li>
                                        <li><a href="https://discord.gg/FTJ3BsbrWF">Discord</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="contact-widget footer-widget">
                                <h4 class="widget-title">Informations de contact</h4>
                                <div class="widget-content">
                                    <ul class="list clearfix">
                                        </li>
                                        <li>
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:info@example.com">Une question ? - contact@convertway.fr</a>
                                            <li>
                                            <i class="fas fa-envelope"></i>
                                            <a href="mailto:info@example.com">Un problème ? - support@convertway.fr</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright">&copy; {{ date("Y") }} <a href="#">ConvertWay</a>. All rights reserved</div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
</button>


<!-- jequery plugins -->
<script src="{{ url("js/landing/jquery.js") }}"></script>
<script src="{{ url("js/landing/popper.min.js") }}"></script>
<script src="{{ url("js/landing/bootstrap.min.js") }}"></script>
<script src="{{ url("js/landing/owl.js") }}"></script>
<script src="{{ url("js/landing/wow.js") }}"></script>
<script src="{{ url("js/landing/validation.js") }}"></script>
<script src="{{ url("js/landing/jquery.fancybox.js") }}"></script>
<script src="{{ url("js/landing/appear.js") }}"></script>
<script src="{{ url("js/landing/scrollbar.js") }}"></script>
<script src="{{ url("js/landing/tilt.jquery.js") }}"></script>

<!-- main-js -->
<script src="{{ url("js/landing/script.js") }}"></script>

</body><!-- End of .page_wrapper -->
</html>
