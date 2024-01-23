<!DOCTYPE html>
<html>
<head>
    <title>NPS</title>
    <!-- Add your CSS and JavaScript links here -->
    <link rel="stylesheet" href="{{ asset('assets/css/home/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="//unpkg.com/alpinejs" defer></script>
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
   {{-- <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
        theme: {
          extend: {
            colors: {
              laravel: '#ef3b2d',
            },
          },
        },
      }
  </script> --}}
  <style>
    body{
         background: #0f0c29;  /* fallback for old browsers */
         /* background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  Chrome 10-25, Safari 5.1-6 */
         background: linear-gradient(to bottom, #0b1428, #0b1428, #0b1428); W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+

    }
    /* nav{
      background-color:white;
      display: flex;
      justify-content: space-between;
    }
    .lr{
        display: flex;
        margin-top: 15px;
    }
    
    .nav-link{
      margin-top: 15px;
    }  */
    html{
        overflow-x: hidden;
    }

    /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
#header {
  height: 90px;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  transition: all 0.5s;
  z-index: 997;
}

#header.header-scrolled,
#header.header-inner {
  background: rgba(6, 12, 34, 0.98);
  height: 70px;
}

#header #logo h1 {
  font-size: 36px;
  margin: 0;
  font-family: "Raleway", sans-serif;
  font-weight: 700;
  letter-spacing: 3px;
  text-transform: uppercase;
}

#header #logo h1 span {
  color: #7bceea;
}

#header #logo h1 a,
#header #logo h1 a:hover {
  color: #fff;
}

#header #logo img {
  padding: 0;
  margin: 0;
  max-height: 110px;
}

@media (max-width: 992px) {
  #header #logo img {
    max-height: 30px;
  }
}


/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
/**
* Desktop Navigation 
*/
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
  margin-right: 80px
}

.navbar li {
  position: relative;
}

.navbar>ul>li {
  white-space: nowrap;
  padding: 10px 0 10px 12px;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: rgba(202, 206, 221, 0.8);
  font-family: "Raleway", sans-serif;
  font-weight: 600;
  font-size: 14px;
  white-space: nowrap;
  transition: 0.3s;
  position: relative;
  padding: 6px 4px;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar>ul>li>a:before {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -6px;
  left: 0;
  background-color: #7bceea;
  visibility: hidden;
  transition: all 0.3s ease-in-out 0s;
}

.navbar a:hover:before,
.navbar li:hover>a:before,
.navbar .active:before {
  visibility: visible;
  width: 100%;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: #fff;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 12px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 14px;
  text-transform: none;
  color: #060c22;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #7bceea;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #fff;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.9);
  transition: 0.3s;
  z-index: 999;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  background-color: #fff;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile>ul>li {
  padding: 0;
}

.navbar-mobile a:hover:before,
.navbar-mobile li:hover>a:before,
.navbar-mobile .active:before {
  visibility: hidden;
}

.navbar-mobile a,
.navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 15px;
  color: #060c22;
}

.navbar-mobile a:hover,
.navbar-mobile .active,
.navbar-mobile li:hover>a {
  color: #7bceea;
}

.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: #7bceea;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}

/*--------------------------------------------------------------

    /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 100vh;
  background-size: cover;
  overflow: hidden;
  position: relative;
  box-shadow: inset 0 0 0 100vh rgba(0, 0, 0, 0.3);
  background: url({{ asset('assets/img/back3.png') }}) top center / cover no-repeat;
}


@media (max-width: 1024px) {
  #hero {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background: url({{ asset('assets/img/back4.png') }}) top center / cover no-repeat;
  
  }
}

#hero:before {
  content: "";
  /*background: rgba(6, 12, 34, 0.8);*/
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#hero .hero-container {
  position: absolute;
  bottom: 0;
  left: 0;
  top: 90px;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  padding: 0 15px;
}

@media (max-width: 991px) {
  #hero .hero-container {
    top: 70px;
  }
}

#hero h1 {
  color: #fff;
  font-family: "Raleway", sans-serif;
  font-size: 56px;
  font-weight: 600;
  text-transform: uppercase;
}

#hero h1 span {
  color:#7bceea;
}

.center-div{
  background-color: blue;
  display: flex;
  justify-content: center;
  align-items: center;
}

@media (max-width: 991px) {
  #hero h1 {
    font-size: 34px;
  }
}

#hero p {
  color: #ebebeb;
  font-weight: 700;
  font-size: 20px;
}

@media (max-width: 991px) {
  #hero p {
    font-size: 16px;
  }
}

#hero .play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(#7bceea 50%, rgba(101, 111, 150, 0.15) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}

#hero .play-btn::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

#hero .play-btn:before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  -webkit-animation: pulsate-btn 2s;
  animation: pulsate-btn 2s;
  -webkit-animation-direction: forwards;
  animation-direction: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: steps;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 2px solid rgba(163, 163, 163, 0.4);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}

#hero .play-btn:hover::after {
  border-left: 15px solid #7bceea;
  transform: scale(20);
}

#hero .play-btn:hover::before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  -webkit-animation: none;
  animation: none;
  border-radius: 0;
}

#hero .about-btn {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 50px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #7bceea
}

#hero .about-btn:hover {
  background: #7bceea;
  color: #fff;
}

@-webkit-keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

@keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }

  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}
/*--------------------------------------------------------------
/* Sections Header
--------------------------------*/
.section-header {
  margin-bottom: 60px;
  position: relative;
  padding-bottom: 20px;
}

.section-header::before {
  content: "";
  position: absolute;
  display: block;
  width: 60px;
  height: 5px;
  background:#7bceea;
  bottom: 0;
  left: calc(50% - 25px);
}

.section-header h2 {
  font-size: 36px;
  text-transform: uppercase;
  text-align: center;
  font-weight: 700;
  margin-bottom: 10px;
  color:white;
}

.section-header p {
  text-align: center;
  padding: 0;
  margin: 0;
  font-size: 18px;
  font-weight: 500;
  color: #9195a2;
}

.section-with-bg {
  background-color: #f6f7fd;
}
/* About Section
--------------------------------------------------------------*/
#about {
  
  background-size: cover;
  overflow: hidden;
  position: relative;
  color: #fff;
  padding: 60px 0 40px 0;
  background: url({{ asset('assets/img/back3.png') }});
}

@media (min-width: 1024px) {
  #about {
    background-attachment: fixed;
  }
}

#about:before {
  content: "";
  background: rgba(13, 20, 41, 0.8);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#about h2 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #fff;
}

#about h3 {
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  margin-bottom: 10px;
  color: #fff;
}

#about p {
  font-size: 14px;
  margin-bottom: 20px;
  color: #fff;
}
/*--------------------------------------------------------------
# Contact Section
--------------------------------------------------------------*/
#contact {
  padding: 60px 0;
}

#contact .contact-info {
  margin-bottom: 20px;
  text-align: center;
}

#contact .contact-info i {
  font-size: 48px;
  display: inline-block;
  margin-bottom: 10px;
  color: white;
}

#contact .contact-info address,
#contact .contact-info p {
  margin-bottom: 0;
  color: white;
}

#contact .contact-info h3 {
  font-size: 18px;
  margin-bottom: 15px;
  font-weight: bold;
  text-transform: uppercase;
  color: white;
}

#contact .contact-info a {
  color: white;
}

#contact .contact-info a:hover {
  color: white;
}

#contact .contact-address,
#contact .contact-phone,
#contact .contact-email {
  margin-bottom: 20px;
}

@media (min-width: 768px) {

  #contact .contact-address,
  #contact .contact-phone,
  #contact .contact-email {
    padding: 20px 0;
  }
}

@media (min-width: 768px) {
  #contact .contact-phone {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
  }
}

#contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: white;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

#contact .php-email-form .error-message br+br {
  margin-top: 25px;
}

#contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

#contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

#contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

#contact .php-email-form input,
#contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

#contact .php-email-form input:focus,
#contact .php-email-form textarea:focus {
  border-color: white;
}

#contact .php-email-form input {
  padding: 10px 15px;
}

#contact .php-email-form textarea {
  padding: 12px 15px;
}

#contact .php-email-form button[type=submit] {
  background:white;
  border: 0;
  padding: 10px 40px;
  color: #fff;
  transition: 0.4s;
  border-radius: 50px;
  cursor: pointer;
}

#contact .php-email-form button[type=submit]:hover {
  background: #e0072f;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }

  100% {
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
#footer {
  background: #0b1428;
  padding: 0 0 25px 0;
  color: #eee;
  font-size: 14px;
}

#footer .footer-top {
  background: #070f1f;
  padding: 60px 0 30px 0;
}

#footer .footer-top .footer-info {
  margin-bottom: 30px;
}

#footer .footer-top .footer-info h3 {
  font-size: 26px;
  margin: 0 0 20px 0;
  padding: 2px 0 2px 0;
  line-height: 1;
  font-family: "Raleway", sans-serif;
  font-weight: 700;
  color: #fff;
}

#footer .footer-top .footer-info img {
  height: 80px;
  margin-bottom: 10px;
}

#footer .footer-top .footer-info p {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 0;
  font-family: "Raleway", sans-serif;
  color: #fff;
}

#footer .footer-top .social-links a {
  display: inline-block;
  background: #222636;
  color: #eee;
  line-height: 1;
  margin-right: 4px;
  border-radius: 50%;
  width: 36px;
  height: 36px;
  transition: 0.3s;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

#footer .footer-top .social-links a i {
  line-height: 0;
  font-size: 16px;
}

#footer .footer-top .social-links a:hover {
  background: #03a9f4;
  color: #fff;
}

#footer .footer-top h4 {
  font-size: 14px;
  font-weight: bold;
  color: #fff;
  text-transform: uppercase;
  position: relative;
  padding-bottom: 12px;
  border-bottom: 2px solid #03a9f4;
}

#footer .footer-top .footer-links {
  margin-bottom: 30px;
}

#footer .footer-top .footer-links ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

#footer .footer-top .footer-links ul i {
  padding-right: 5px;
  color: #03a9f4;
  font-size: 18px;
}

#footer .footer-top .footer-links ul li {
  border-bottom: 1px solid #262c44;
  padding: 10px 0;
}

#footer .footer-top .footer-links ul li:first-child {
  padding-top: 0;
}

#footer .footer-top .footer-links ul a {
  color: #eee;
}

#footer .footer-top .footer-links ul a:hover {
  color:#03a9f4;
}

#footer .footer-top .footer-contact {
  margin-bottom: 30px;
}

#footer .footer-top .footer-contact p {
  line-height: 26px;
}

#footer .footer-top .footer-newsletter {
  margin-bottom: 30px;
}

#footer .footer-top .footer-newsletter input[type=email] {
  border: 0;
  padding: 6px 8px;
  width: 65%;
}

#footer .footer-top .footer-newsletter input[type=submit] {
  background: #03a9f4;
  border: 0;
  width: 35%;
  padding: 6px 0;
  text-align: center;
  color: #fff;
  transition: 0.3s;
  cursor: pointer;
}

#footer .footer-top .footer-newsletter input[type=submit]:hover {
  background: #03a9f4;
}

#footer .copyright {
  text-align: center;
  padding-top: 30px;
}

#footer .credits {
  text-align: center;
  font-size: 13px;
  color: #ddd;
}

    
    </style>
</head>
<body>

  <!-- Navbar -->
  {{-- <nav>
       <div>
           <a class="navbar-brand" href="/">
              <img class="w-24" src="{{asset('assets/img/logo1.png')}}" height="95px" class="logo" alt="Logo" />
           </a>
       </div> 
       <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                   <div class="lr">
                        <a href="{{ route('login') }}" class="nav-link text-dark">
                            <i class="fas fa-arrow-right-to-bracket text-dark"></i> Log in</a>
                    
                    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link text-dark">
                                <i class="fas fa-user-plus text-dark"></i>Register</a>
                        @endif
                   </div>
                  
                    @endauth
                </div>
            @endif
  </nav> --}}
   <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center" style="justify-content: space-between;">

      <div id="logo" class="me-auto">
        <a href="/" class="scrollto"><img src="{{asset('assets/img/aaa.png')}}" alt="" title=""></a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#login">Login</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="/register">Register</a></li>
        </ul>
        <i class="fa fa-bars mobile-nav-toggle"></i>

        

      </nav><!-- .navbar -->

    </div>
    
  </header><!-- End Header -->
  <main>
   <section id="hero" >
    <div class="hero-container" >
      <h1 class="mb-4 pb-0">Welcome <br><span>To Our </span> Website</h1>
      <p class="mb-4 pb-0">United for a Brighter World</p>
      <a href="#about" class="about-btn scrollto">About us</a>
    </div>
  </section><!-- End Hero Section -->
  <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>About Website</h2>
            <p> Our Objective : </p>
            <p>Our platform streamlines the digitization of internships, allowing for a smooth process from submitting requests to involving companies and supervisors. This ensures transparent progress tracking and eliminates any unnecessary complexities.</p>
          </div>
          <div class="col-lg-3">
            <h3>Who are we</h3>
            <p>Start-up Nachd-it</p>
          </div>
          <div class="col-lg-3">
            <h3>Who benefits from the site</h3>
            <p>Student<br>Teacher<br>Company</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
  <section id='login'>
    <!-- Cards Section -->
    {{$slot}}
  </section> 
  
   <!-- ======= Contact Section ======= -->
  <section id="contact" class="section-bg">

      <div class="container" >

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>If you have any question don't hesitate to ask </p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="fas fa-map-marker-alt"></i>
              <h3>Address</h3>
              <address>ISSATSo Incubator - Taffala City (Ibn Khaldoun) 4003, Sousse, Tunisia</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="fas fa-phone"></i>

              <h3>Phone Number</h3>
              <p><a href="tel:+21626608832">+216 55 517 654</a></p>
              <p><a href="tel:+21629216124">+216 99 127 086</a></p>

            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="fas fa-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:contact@nachd-it.com"></a>contact@nachd-it.com</p>
            </div>
          </div>

        </div>

        

      </div>
    </section><!-- End Contact Section -->
  
  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <img src="{{asset('assets/img/aaa.png')}}" alt="TheEvenet">
            <p>Our platform streamlines internship digitization, enabling hassle-free stages from request submission to company and supervisor involvement, all while ensuring transparent progress tracking.</p>
          </div>

          

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="http://nachd-it.com/">Nachd-it Website</a></li>
        
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              ISSATSo Incubator - Taffala City (Ibn Khaldoun) 4003, Sousse, Tunisia<br>
              <strong>Phone:</strong> +216 555 17 654<br>
              <strong>Email:</strong> contact@nachd-it.com<br>
            </p>

            <div class="social-links">
                  <a target="_blank" href="https://www.facebook.com/nachd.it" class="facebook"><i class="fab fa-facebook"></i></a>
              
                  <a target="_blank" href="https://www.linkedin.com/company/nachd-it/" class="linkedin"><i class="fab fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Nachd-it</strong>
      </div>
     
    </div>
  </footer><!-- End  Footer -->


</body>
<script>
            AOS.init();
</script>
<script>
  /**
* Template Name: TheEvent - v4.9.0
* Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 20
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Gallery Slider
   */
  new Swiper('.gallery-slider', {
    speed: 400,
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      575: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 5,
        spaceBetween: 20
      }
    }
  });

  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });
  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

})()
 </script> 
</html>
