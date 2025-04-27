<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php 
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
    <title>About - Celz5</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="css/slicknav.min.css" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="css/swiper-bundle.min.css">
	<!-- Font Awesome Icon Css-->
	<link href="css/all.css" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="css/animate.css" rel="stylesheet">
	<!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Mouse Cursor Css File -->
	<link rel="stylesheet" href="css/mousecursor.css">
    <!-- Audio Css File -->
	<link rel="stylesheet" href="css/plyr.css">
	<!-- Main Custom Css -->
	<link href="css/custom.css" rel="stylesheet" media="screen">
</head>
<body>

    <!-- Preloader Start -->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="images/loader.svg" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->

    <!-- Header Start -->
    <?php include_once('./components/header.php')?>

	<!-- Header End -->

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque"><span>About</span> Us</h1>
						<nav class="wow fadeInUp">
							<!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">about us</li>
							</ol> -->
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- About Us Section Start -->
	<div class="about-us page-about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- About Image Start -->
                    <div class="about-image">
                        <div class="about-img-1">
                            <figure class="image-anime reveal">
                                <img src="images/DSC03688.jpg" alt="">
                            </figure>
                        </div>

                        <div class="about-img-2">
                            <figure class="image-anime reveal">
                                <img src="images/DSC07426.jpg" alt="">
                            </figure>
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- About Content Start -->
                    <div class="about-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">about us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Faith, hope, and love in <span>action every day</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">We are a vibrant community of believers dedicated to worship, fellowship, and service. Our mission is to share God's love, grow in faith, and make a positive impact in the world through compassionate outreach and meaningful connections.</p>
                            <p class="wow fadeInUp" data-wow-delay="0.5s">Our church is a welcoming place where everyone can find support, inspiration, and a sense of belonging. Together, we strive to live out our faith and make a difference.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- About Content List Start -->
                        <div class="about-content-body">
                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp">
                                <div class="icon-box">
                                    <img src="images/icon-about-list-1.svg" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>share god's love</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <img src="images/icon-about-list-2.svg" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>foster spiritual growth</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.5s">
                                <div class="icon-box">
                                    <img src="images/icon-about-list-3.svg" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>serve our community</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->

                            <!-- About List Item Start -->
                            <div class="about-list-item wow fadeInUp" data-wow-delay="0.75s">
                                <div class="icon-box">
                                    <img src="images/icon-about-list-4.svg" alt="">
                                </div>
                                <div class="about-list-item-content">
                                    <h3>build strong relationships</h3>
                                </div>
                            </div>
                            <!-- About List Item End -->
                        </div>
                        <!-- About Content List End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Vision Mission Section Start -->
    <div class="vision-mission">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">vision mission</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Building Faithful Community Through Love, Service, <span>Worship, and Fellowship.</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Sidebar Our Vision Mission Nav start -->
					<div class="vision-mission-nav wow fadeInUp" data-wow-delay="0.25s">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-selected="true">our vision</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-selected="false">our mission</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#approach" type="button" role="tab" aria-selected="false">our approach</button>
                            </li>
                        </ul>
					</div>
					<!-- Sidebar Our Vision Mission Nav End -->

                    <!-- Vision Mission Box Start -->
                    <div class="vision-mission-box tab-content" id="myTabContent">
                        <!-- Our Vision Item Start -->
                        <div class="our-vision-item tab-pane fade show active" id="vision" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3 class="wow fadeInUp">our vision</h3>
                                            <h2 class="text-anime-style-2" data-cursor="-opaque">OUR VISION TO INSPIRE,  <span>EMPOWER, AND TRANSFORM</span></h2>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission Body Start -->
                                        <div class="vision-mission-body">
                                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">Our vision is to inspire lives, empower believers, and transform communities through the boundless love of Christ.</h3>
                                            <p class="wow fadeInUp" data-wow-delay="0.5s">We envision a world where every individual experiences the fullness of God’s love, walks in divine purpose, and lives a victorious life. By fostering spiritual growth, promoting unity, and nurturing faith, we aim to create a community that reflects the glory of God in every sphere of influence.</p>
                                        </div>
                                        <!-- Vision Mission Body End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>
    
                                <div class="col-lg-6">
                                    <!-- Vision Mission Image Start -->
                                    <div class="vision-mission-image">
                                        <figure class="image-anime reveal">
                                            <img src="images/aaron-burden-4eWwSxaDhe4-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Mission Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Vision Item End -->

                        <!-- Our Vision Item Start -->
                        <div class="our-vision-item tab-pane fade" id="mission" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3>our mission</h3>
                                            <h2 class="text-anime-style-2" data-cursor="-opaque">OUR MISSION TO REACH, <span>TEACH, AND IMPACT</span></h2>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission Body Start -->
                                        <div class="vision-mission-body">
                                            <h3>Our mission is to reach the lost, teach the Word of God, and impact the world with the message of Christ’s love and hope.</h3>
                                            <p>We are committed to spreading the gospel through dynamic evangelism, discipleship programs, and community outreach. By equipping believers with biblical knowledge and empowering them to serve, we strive to build strong, faith-driven individuals who influence their world for Christ.</p>
                                        </div>
                                        <!-- Vision Mission Body End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>
    
                                <div class="col-lg-6">
                                    <!-- Vision Mission Image Start -->
                                    <div class="vision-mission-image">
                                        <figure class="image-anime reveal">
                                            <img src="images/aaron-burden-FGbLYvTgxx0-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Mission Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Vision Item End -->

                        <!-- Our Mission Item Start -->
                        <div class="our-mission-item tab-pane fade" id="approach" role="tabpanel">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <!-- Vision Mission Content Start -->
                                    <div class="vision-mission-content">
                                        <!-- Section Title Start -->
                                        <div class="section-title">
                                            <h3>our approach</h3>
                                            <h2 class="text-anime-style-2" data-cursor="-opaque">OUR APPROACH TO LOVE, <span> SERVE, AND GROW </span></h2>
                                        </div>
                                        <!-- Section Title End -->

                                        <!-- Vision Mission Body Start -->
                                        <div class="vision-mission-body">
                                            <h3>Our approach is to demonstrate God’s love, serve with compassion, and create opportunities for spiritual growth and personal development.</h3>
                                            <p>We believe in fostering meaningful relationships, encouraging active participation in ministry, and supporting individual growth through worship, fellowship, and service. Our inclusive approach nurtures faith, strengthens families, and builds vibrant communities rooted in the principles of Christ.</p>
                                        </div>
                                        <!-- Vision Mission Body End -->
                                    </div>
                                    <!-- Vision Mission Content End -->
                                </div>
    
                                <div class="col-lg-6">
                                    <!-- Vision Mission Image Start -->
                                    <div class="vision-mission-image">
                                        <figure class="image-anime reveal">
                                            <img src="images/aaron-burden-09AhDCedXF8-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                    <!-- Vision Mission Image End -->
                                </div>
                            </div>
                        </div>
                        <!-- Our Mission Item End -->
                    </div>
                    <!-- Vision Mission Box End -->                
                </div>
            </div>
        </div>
    </div>
    <!-- Vision Mission Section End -->

<!-- Our Counter Section Start -->
<div class="our-counter">
    <div class="container">
        <div class="row counter-box">
            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <!-- Counter Title Start -->
                    <div class="counter-title">
                        <h2><span class="counter">50</span>+</h2>
                    </div>
                    <!-- Counter Title End -->                     

                    <!-- Counter Content Start -->
                    <div class="counter-content">
                        <h3>Churches in the Zone</h3>
                        <p>Christ Embassy Lagos Zone 5 encompasses over 50 local churches, each dedicated to spreading the Gospel and serving their communities.</p>
                    </div>
                    <!-- Counter Content End -->
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <!-- Counter Title Start -->
                    <div class="counter-title">
                        <h2><span class="counter">30</span>+</h2>
                    </div>
                    <!-- Counter Title End -->                     

                    <!-- Counter Content Start -->
                    <div class="counter-content">                            
                        <h3>Youth Ministries</h3>
                        <p>Our vibrant youth ministries engage and empower young people across more than 30 dedicated groups, fostering spiritual growth and leadership.</p>
                    </div>
                    <!-- Counter Content End -->
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <!-- Counter Title Start -->
                    <div class="counter-title">
                        <h2><span class="counter">1000</span>+</h2>                            
                    </div>
                    <!-- Counter Title End -->                     

                    <!-- Counter Content Start -->
                    <div class="counter-content">
                        <h3>Community Outreach Programs</h3>
                        <p>We have conducted over 1,000 community outreach programs, impacting lives through charitable initiatives, educational workshops, and health services.</p>
                    </div>
                    <!-- Counter Content End -->
                </div>
                <!-- Counter Item End -->
            </div>

            <div class="col-lg-3 col-md-6">
                <!-- Counter Item Start -->
                <div class="counter-item">
                    <!-- Counter Title Start -->
                    <div class="counter-title">
                        <h2><span class="counter">5000</span>+</h2>
                    </div>
                    <!-- Counter Title End -->                     

                    <!-- Counter Content Start -->
                    <div class="counter-content">
                        <h3>Members Worldwide</h3>
                        <p>Christ Embassy Lagos Zone 5 is part of a global network, contributing to a worldwide membership exceeding 5,000 believers united in faith.</p>
                    </div>
                    <!-- Counter Content End -->
                </div>
                <!-- Counter Item End -->
            </div>
        </div>
    </div>
</div>
<!-- Our Counter Section End -->


    <!-- What We do Section Start -->
    <div class="what-we-do">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">what we do</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Living Our <span>Faith Together</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- What We Item Start -->
                    <div class="what-we-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="images/icon-what-we-1.svg" alt="">
                        </div>
                        <div class="what-we-content">
                            <h3>worship services</h3>
                            <p>Experience spiritual growth and meaningful connection through heartfelt worship and fellowship. Everyone is welcome to join us</p>
                        </div>
                    </div>
                    <!-- What We Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- What We Item Start -->
                    <div class="what-we-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="images/icon-what-we-2.svg" alt="">
                        </div>
                        <div class="what-we-content">
                            <h3>community outreach</h3>
                            <p>Experience spiritual growth and meaningful connection through heartfelt worship and fellowship. Everyone is welcome to join us</p>
                        </div>
                    </div>
                    <!-- What We Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- What We Item Start -->
                    <div class="what-we-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="icon-box">
                            <img src="images/icon-what-we-3.svg" alt="">
                        </div>
                        <div class="what-we-content">
                            <h3>educational programs</h3>
                            <p>Experience spiritual growth and meaningful connection through heartfelt worship and fellowship. Everyone is welcome to join us</p>
                        </div>
                    </div>
                    <!-- What We Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- What We do Section End -->

    

    <!-- Pastors Message Section Start -->
    <div class="pastors-message">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Pastors Image Start -->
                    <div class="pastors-image">
                        <figure class="image-anime reveal">
                            <img src="images/pastor-dee.jpg" alt="">
                        </figure>
                    </div>
                    <!-- Pastors Image End -->
                </div>

                <div class="col-lg-6">
                    <!-- Pastors Comtent Start -->
                    <div class="pastors-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">pastors message</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Your generosity makes a <span>profound impact</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Pastors Comtent Body Start -->
                        <div class="pastors-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">Our mission is to reach the lost, teach the Word of God, and impact the world with the message of Christ’s love and hope.</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s">We would love to get to know you better. Feel free to reach out to us through our Contact Us page, or join us for one of our upcoming services or events. Our doors are always open, and we look forward to welcoming you into our church family.</p>
                        </div>
                        <!-- Pastors Comtent Body End -->

                        <!-- Pastors Signature Start -->
                        <div class="pastors-signature">
                            <!-- Pastors Signature Image Start -->
                            <div class="pastors-signature-img">
                                <img src="images/pastors-signature.svg" alt="">
                            </div>
                            <!-- Pastors Signature Image End -->

                            <!-- Pastors Signature Comtent Start -->
                            <div class="pastors-signature-content">
                                <p>Zonal pastor</p>
</div>
                            <!-- Pastors Signature Comtent End -->
                        </div>
                        <!-- Pastors Signature End -->
                    </div>
                    <!-- Pastors Comtent End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Pastors Message Section End -->

    <!-- Core Value Section Start -->
    <div class="core-value">
        <div class="container">
            <div class="row align-items-center section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our core value</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Foundations of Our Faith and <span>Community Life</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Core Value FAQ Accordion Start -->
                    <div class="core-value-faqs-accordion" id="accordion">
                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Why is faith a core value?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We demonstrate love through compassionate service, supportive relationships, and inclusive community practices.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does the church demonstrate love?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We demonstrate love through compassionate service, supportive relationships, and inclusive community practices.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How is community fostered within the church?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We demonstrate love through compassionate service, supportive relationships, and inclusive community practices.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="0.75s">
                            <h2 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    What is the importance of spiritual growth?
                                </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We demonstrate love through compassionate service, supportive relationships, and inclusive community practices.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->

                        <!-- FAQ Item Start -->
                        <div class="accordion-item wow fadeInUp" data-wow-delay="1s">
                            <h2 class="accordion-header" id="headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    How do these values shape church activities?
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    <p>We demonstrate love through compassionate service, supportive relationships, and inclusive community practices.</p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item End -->
                    </div>
                    <!-- Core Value FAQ Accordion End -->
                </div>

                <div class="col-lg-6">
                    <!-- Core Value Slider Start -->
                    <div class="core-value-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Core Value Image Slide Start -->
                                <div class="swiper-slide">
                                    <div class="core-value-slider-img">
                                        <figure class="image-anime">
                                            <img src="images/aaron-burden-JXX380Eg-RI-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <!-- Core Value Image Slide End -->

                                <!-- Core Value Image Slide Start -->
                                <div class="swiper-slide">
                                    <div class="core-value-slider-img">
                                        <figure class="image-anime">
                                            <img src="images/hannah-busing-G-_L3Eqkqmc-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <!-- Core Value Image Slide End -->

                                <!-- Core Value Image Slide Start -->
                                <div class="swiper-slide">
                                    <div class="core-value-slider-img">
                                        <figure class="image-anime">
                                            <img src="images/priscilla-du-preez-8xFOE4kiyys-unsplash.jpg" alt="">
                                        </figure>
                                    </div>
                                </div>
                                <!-- Core Value Image Slide End -->
                            </div>
                            <div class="core-value-btn">
                                <div class="core-value-button-prev"></div>
                                <div class="core-value-button-next"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Core Value Slider End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Core Value Section End -->

    <!-- Footer Start -->
    <?php include_once('./components/footer.php')?>

    <!-- Footer End -->

    <!-- Jquery Library File -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Magnific js file -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="js/SmoothScroll.js"></script>
    <!-- Parallax js -->
    <script src="js/parallaxie.js"></script>
    <!-- MagicCursor js file -->
    <script src="js/gsap.min.js"></script>
    <script src="js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="js/SplitText.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <!-- YTPlayer js File -->
    <script src="js/jquery.mb.YTPlayer.min.js"></script>
    <!-- Audio js File -->
    <script src="js/plyr.js"></script>
    <!-- Wow js file -->
    <script src="js/wow.js"></script>
    <!-- Main Custom js file -->
    <script src="js/function.js"></script>
	<script src="../../assets/js/theme-panel.js"></script>
</body>

<!-- Mirrored from demo.awaikenthemes.com/html-preview/avenix/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 14:11:01 GMT -->
</html>