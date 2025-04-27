<?php
require_once('include/Session.php');
require_once('include/Crud.php');
require_once("include/Controller.php");
$Controller = new Controller();

// var_dump($getRecentPostsForIndex);
// die();
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
    <meta name="author" content="">
    <!-- Page Title -->
    <title>Home - Celz5</title>
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
    <!-- SweetAlert2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <?php include_once('./components/header.php') ?>
    <!-- Header End -->

    <!-- Hero Section Start -->
    <div class="hero parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">Giving your life a Meaning</h3>
                            <h1 class="text-anime-style-2" data-cursor="-opaque">Welcome to Christ Embassy Lagos Zone 5. </h1>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Experience God's love, grace, and presence in a welcoming community where faith grows, hope thrives, and everyone belongs to a family that cares.</p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Hero Content Body Start -->
                        <div class="hero-content-body wow fadeInUp" data-wow-delay="0.5s">
                            <a href="service.php" class="btn-default"><span>Join Us for Worship</span></a>
                            <a href="#" class="btn-default btn-highlighted"><span>Get Involved</span></a>
                        </div>
                        <!-- Hero Content Body End -->
                    </div>
                    <!-- Hero Content End -->
                </div>
            </div>
        </div>
        <div class="down-arrow">
            <a href="#home-about"><i class="fa-solid fa-arrow-down-long"></i></a>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Our Scrolling Ticker Section Start -->
    <div class="our-scrolling-ticker">
        <!-- Scrolling Ticker Start -->
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
            </div>

            <div class="scrolling-content">
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
                <span><img src="images/icon-sparkles.svg" alt="">"Come to me, all you who are weary and burdened, and I will give you rest." – Matthew 11:28</span>
            </div>
        </div>
    </div>
    <!-- Scrolling Ticker Section End -->

    <!-- About Us Section Start -->
    <div class="about-us" id="home-about">
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


                        <!-- About Us Footer Start -->
                        <div class="about-us-footer wow fadeInUp" data-wow-delay="1s">
                            <a href="./about.php" class="btn-default">read more about us</a>
                        </div>
                        <!-- About Us Footer End -->
                    </div>
                    <!-- About Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- About Us Section End -->

    <!-- Join Worship Section Start -->
    <div class="join-worship">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">worship with us</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Join us on Sunday at <span>7:00 AM, 9:00 AM, 5:00 PM, & 7:00 PM</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Highlighted Worship Item Start -->
                    <div class="highlighted-worship-item wow fadeInUp">
                        <!-- Highlighted Worship Featured Image Start -->
                        <div class="highlighted-worship-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="images/andrew-arrol-b5AkuWDygDo-unsplash.jpg" alt="Main Service">
                                </a>
                            </figure>
                        </div>
                        <!-- Highlighted Worship Featured Image End -->

                        <!-- Highlighted Worship Body Start -->
                        <div class="highlighted-worship-body">
                            <!-- Highlighted Worship Content Start -->
                            <div class="highlighted-worship-content">
                                <h3>Sunday Service</h3>
                                <p>Experience uplifting worship and inspiring messages that empower your faith and daily living.</p>
                            </div>
                            <!-- Highlighted Worship Content End -->
                            <div class="highlighted-worship-btn">
                                <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt="Read More"></a>
                            </div>
                        </div>
                        <!-- Highlighted Worship Body End -->
                    </div>
                    <!-- Highlighted Worship Item End -->
                </div>
                <div class="col-lg-6">
                    <div class="worship-box">
                        <!-- Worship Item Start -->
                        <div class="worship-item wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Worship Image Start -->
                            <div class="worship-image">
                                <figure>
                                    <a href="#" class="image-anime" data-cursor-text="View">
                                        <img src="images/ismael-paramo-08Roe6Iauok-unsplash.jpg" alt="Youth Worship">
                                    </a>
                                </figure>
                            </div>
                            <!-- Worship Image End -->

                            <!-- Worship Body Start -->
                            <div class="worship-body">
                                <!-- Worship Content Start -->
                                <div class="worship-content">
                                    <h3>Youth Worship</h3>
                                    <p>Dynamic and engaging services tailored for our vibrant youth community.</p>
                                </div>
                                <!-- Worship Content End -->

                                <!-- Worship Btn Start -->
                                <div class="worship-btn">
                                    <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt="Read More"></a>
                                </div>
                                <!-- Worship Btn End -->
                            </div>
                            <!-- Worship Body End -->
                        </div>
                        <!-- Worship Item End -->

                        <!-- Worship Item Start -->
                        <div class="worship-item wow fadeInUp" data-wow-delay="0.5s">
                            <!-- Worship Image Start -->
                            <div class="worship-image">
                                <figure>
                                    <a href="#" class="image-anime" data-cursor-text="View">
                                        <img src="images/ben-white-4K2lIP0zc_k-unsplash.jpg" alt="Children's Worship">
                                    </a>
                                </figure>
                            </div>
                            <!-- Worship Image End -->

                            <!-- Worship Body Start -->
                            <div class="worship-body">
                                <!-- Worship Content Start -->
                                <div class="worship-content">
                                    <h3>Children's Worship</h3>
                                    <p>Interactive and fun-filled sessions designed to teach children about God's love.</p>
                                </div>
                                <!-- Worship Content End -->

                                <!-- Worship Btn Start -->
                                <div class="worship-btn">
                                    <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt="Read More"></a>
                                </div>
                                <!-- Worship Btn End -->
                            </div>
                            <!-- Worship Body End -->
                        </div>
                        <!-- Worship Item End -->

                        <!-- Worship Item Start -->
                        <div class="worship-item wow fadeInUp" data-wow-delay="0.75s">
                            <!-- Worship Image Start -->
                            <div class="worship-image">
                                <figure>
                                    <a href="#" class="image-anime" data-cursor-text="View">
                                        <img src="images/aaron-burden-UIib0bAvWfs-unsplash.jpg" alt="Midweek Service">
                                    </a>
                                </figure>
                            </div>
                            <!-- Worship Image End -->

                            <!-- Worship Body Start -->
                            <div class="worship-body">
                                <!-- Worship Content Start -->
                                <div class="worship-content">
                                    <h3>Midweek Service</h3>
                                    <p>Join us every Wednesday at 6:30 PM for an in-depth study of the Word and communal prayer.</p>
                                </div>
                                <!-- Worship Content End -->

                                <!-- Worship Btn Start -->
                                <div class="worship-btn">
                                    <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt="Read More"></a>
                                </div>
                                <!-- Worship Btn End -->
                            </div>
                            <!-- Worship Body End -->
                        </div>
                        <!-- Worship Item End -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Join Worship Section End -->

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


    <!-- Our Mission Section Start -->
    <div class="our-mission">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mission-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">our mission</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Our Mission to Serve, <span>Love, and Grow</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Mission Content Body Start -->
                        <div class="mission-content-body">
                            <h3 class="wow fadeInUp" data-wow-delay="0.25s">Our mission is to share God's love, foster spiritual growth, and serve our community with compassion and purpose.</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.5s">Our mission is to share God's love and grace by fostering spiritual growth, serving our community with compassion, and building meaningful relationships. We are dedicated to living out our faith through worship, outreach, and impactful service.</p>
                        </div>
                        <!-- Mission Content Body End -->

                        <!-- Mission Content Footer Start -->
                        <div class="mission-content-footer wow fadeInUp" data-wow-delay="0.75s">
                            <a href="contact.php" class="btn-default">contact now</a>
                        </div>
                        <!-- Mission Content Footer End -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Mission Image Start -->
                    <div class="mission-image">
                        <!-- Mission Image Start -->
                        <div class="mission-img">
                            <figure class="image-anime reveal">
                                <img src="images/DSC07426.jpg" alt="">
                            </figure>
                        </div>
                        <!-- Mission Image End -->

                        <!-- Mission Life Circle Start -->
                        <div class="mission-life-circle">
                            <img src="images/mission-life-circle-img.png" alt="">
                        </div>
                        <!-- Mission Life Circle End -->
                    </div>
                    <!-- Mission Image End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Mission Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">services</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Loving God, helping others, and serving the <span>world together</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="images/icon-service-1.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p>Find comfort and connection through our support groups, offering guidance for emotional healing, personal growth, and spiritual encouragement.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>support groups</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="images/icon-service-2.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p>Celebrate faith with us through dynamic programs like holiday worship, outreach events, fellowship picnics, and charity fundraisers.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>special programs</h3>
                            </div>
                            <div class="service-btn">
                                <a href="programs.php" class="readmore-btn"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="images/icon-service-3.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p>Stay connected with our virtual services, featuring live Sunday worship, Bible studies, and prayer meetings accessible from anywhere.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>online services</h3>
                            </div>
                            <div class="service-btn">
                                <a href="service.php" class="readmore-btn"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Service Item Start -->
                    <div class="service-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Icon Box Start -->
                        <div class="icon-box">
                            <img src="images/icon-service-4.svg" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- Service Body Start -->
                        <div class="service-body">
                            <p>Experience personalized spiritual guidance through pastoral care, offering counseling, prayer support, and mentorship for life’s challenges.</p>
                        </div>
                        <!-- Service Body End -->

                        <!-- Service Footer Start -->
                        <div class="service-footer">
                            <div class="service-content">
                                <h3>pastoral care</h3>
                            </div>
                            <div class="service-btn">
                                <a href="#" class="readmore-btn"><img src="images/arrow-white.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Service Footer End -->
                    </div>
                    <!-- Service Item End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Our Services Section End -->

    <!-- Service Ticker Start -->
    <div class="service-ticker">
        <div class="scrolling-ticker">
            <div class="scrolling-ticker-box">
                <div class="scrolling-content">
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                </div>

                <div class="scrolling-content">
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                    <span><img src="images/icon-asterisk.svg" alt="">Hope Of All</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Ticker End -->

    <!-- Our Ministries Section Start -->
    <div class="our-ministries">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">ministries</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Our <span>Ministries</span></h2>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="https://enterthehealingschool.org/" class="image-anime" data-cursor-text="View">
                                    <img src="images/healingschool.jpg" alt="">
                                </a>
                            </figure>

                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>The Healing School </h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-tag"></i>The Healing School, led by Rev. Chris Oyakhilome, brings divine healing to nations. Healing Streams TV (HSTV) creates an atmosphere of faith for miracles and divine health.</li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="https://rhapsodyofrealities.org/" class="image-anime" data-cursor-text="View">
                                    <img src="images/rr.jpg" alt="">
                                </a>
                            </figure>

                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>Rhapsody of Realities</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-tag"></i>Rhapsody of Realities is a daily devotional, known as the "Messenger Angel," designed to enhance spiritual growth with inspiring messages, scriptures, confessions, and a Bible reading plan.</li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="https://theinnercitymission.ngo/" class="image-anime" data-cursor-text="View">
                                    <img src="images/innercity.jpg" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->

                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>The Innercity Missions</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-tag"></i>The InnerCity Mission is a humanitarian organization dedicated to reaching vulnerable children and families, providing food, education, and support to help break the cycle of poverty.</li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Ministries Section End -->

    <!-- Our Sermons Section Start -->
    <div class="our-sermons">
        <div class="container">
            <div class="row section-row">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h3 class="wow fadeInUp">our sermons</h3>
                    <h2 class="text-anime-style-2" data-cursor="-opaque">Our Latest <span>Sermons</span></h2>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="images/sermons-img-1.jpg" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->
                            <div class="sermons-meta">
                                <h3>03</h3>
                                <p>aug</p>
                            </div>
                            <!-- Sermons Meta End -->

                            <div class="sermons-audio-icon">
                                <a href="#"><img src="images/audio-play-icon.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>Start a New Way of Living</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-user"></i>Sermon From : <span>John Due</span></li>
                                    <li><i class="fa-solid fa-tag"></i>Categories : <span>Pray</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date & Time : <span>Aug 03 - on 7:00 am - 11:00 am</span></li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="images/sermons-img-2.jpg" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->
                            <div class="sermons-meta">
                                <h3>03</h3>
                                <p>aug</p>
                            </div>
                            <!-- Sermons Meta End -->

                            <div class="sermons-audio-icon">
                                <a href="#"><img src="images/audio-play-icon.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>overcoming life's challenges</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-user"></i>Sermon From : <span>John Due</span></li>
                                    <li><i class="fa-solid fa-tag"></i>Categories : <span>Pray</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date & Time : <span>Aug 03 - on 7:00 am - 11:00 am</span></li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>

                <div class="col-lg-4 col-md-6">
                    <!-- Sermons Item Start -->
                    <div class="sermons-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Sermons Image Start -->
                        <div class="sermons-image">
                            <figure>
                                <a href="#" class="image-anime" data-cursor-text="View">
                                    <img src="images/sermons-img-3.jpg" alt="">
                                </a>
                            </figure>
                            <!-- Sermons Meta Start -->
                            <div class="sermons-meta">
                                <h3>03</h3>
                                <p>aug</p>
                            </div>
                            <!-- Sermons Meta End -->

                            <div class="sermons-audio-icon">
                                <a href="#"><img src="images/audio-play-icon.svg" alt=""></a>
                            </div>
                        </div>
                        <!-- Sermons Image End -->

                        <!-- Sermons Body Start -->
                        <div class="sermons-body">
                            <!-- Sermons Title Start -->
                            <div class="sermons-title">
                                <h2>hope in times of trouble</h2>
                            </div>
                            <!-- Sermons Title End -->

                            <!-- Sermons List Start -->
                            <div class="sermons-list">
                                <ul>
                                    <li><i class="fa-solid fa-user"></i>Sermon From : <span>John Due</span></li>
                                    <li><i class="fa-solid fa-tag"></i>Categories : <span>Pray</span></li>
                                    <li><i class="fa-regular fa-calendar-days"></i>Date & Time : <span>Aug 03 - on 7:00 am - 11:00 am</span></li>
                                </ul>
                            </div>
                            <!-- Sermons List End -->
                        </div>
                        <!-- Sermons Body End -->
                    </div>
                    <!-- Sermons Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Sermons Section End -->

    <!-- Verse Church Section Start -->
    <div class="verse-church">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Verse Church Content Start -->
                    <div class="verse-church-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">verse of the day</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque" id="bible-verse-text"></span></h2>
                            <p class="wow fadeInUp" id="bible-verse-reference" data-wow-delay="0.25s"></p>
                        </div>
                        <!-- Section Title End -->

                        <!-- Verse Church Btn Start -->
                        <div class="verse-church-btn wow fadeInUp" data-wow-delay="0.5s">
                            <a href="#" class="btn-default">Get Involved</a>
                        </div>
                        <!-- Verse Church Btn End -->
                    </div>
                    <!-- Verse Church Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Verse Church Section End -->

    <!-- CTA Box Section Start -->
    <div class="cta-box">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <!-- CTA Box Content Start -->
                    <div class="cta-box-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Get Involved and Stay Connected: Support Our Mission and Join Our Community Today!</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- CTA Box Content End -->
                </div>

                <div class="col-md-3">
                    <!-- CTA Box Btn Start -->
                    <div class="cta-box-btn wow fadeInUp">
                        <a href="#" class="btn-default btn-highlighted">join group</a>
                    </div>
                    <!-- CTA Box Btn End -->
                </div>
            </div>
        </div>
    </div>
    <!-- CTA Box Section End -->

    <!-- Our Event Section Start -->
    <div class="our-event">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="event-image">
                        <figure class="image-anime reveal">
                            <img src="images/HSLHS_MARCH_2025_ETHS_WEB.jpg" alt="" style="width: 100%; aspect-ratio: 16/11; object-fit: cover;">

                        </figure>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="event-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">up coming event</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Healing Streams Live Healing Services with <span>Pastor Chris </span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Event Body Start -->
                        <div class="event-body">
                            <!-- Event Item Start -->
                            <div class="event-item wow fadeInUp">
                                <div class="icon-box">
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                <div class="event-item-content">
                                    <p>Friday 14th - Sunday 16th March 2025 (2 p.m. GMT+1)</p>
                                </div>
                            </div>
                            <!-- Event Item End -->

                            <!-- Event Item Start -->
                            <div class="event-item wow fadeInUp" data-wow-delay="0.25s">
                                <div class="icon-box">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="event-item-content">
                                    <p>All Christ Embassy Churches and Online Streaming Platforms</p>
                                </div>
                            </div>
                            <!-- Event Item End -->
                        </div>
                        <!-- Event Body End -->

                        <!-- Event Footer Start -->
                        <div class="event-footer">
                            <p class="wow fadeInUp" data-wow-delay="0.5s">The Healing Streams Live Healing Services with Pastor Chris is a global event renowned for its powerful demonstrations of God's healing power. Led by Pastor Chris Oyakhilome, the program reaches millions of people across continents through online platforms and physical healing centers.</p>
                        </div>
                        <!-- Event Footer End -->

                        <!-- Event Btn Start -->
                        <div class="event-btn wow fadeInUp" data-wow-delay="0.75s">
                            <a href="http://healingstreams.tv/zone/ETHS" class="btn-default">Participate</a>
                        </div>
                        <!-- Event Btn End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Event Section End -->

    <!-- Donate Now Section Start -->
    <div class="donate-now parallaxie">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-4">
                    <div class="intro-video-box">
                        <!-- Video Play Button Start -->
                        <div class="video-play-button">
                            <a href="https://s3.amazonaws.com/loveworldnews/post/video/2024/06/1tpHrb27948.mp4" class="popup-video" data-cursor-text="Play">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div>
                        <!-- Video Play Button End -->
                    </div>
                </div>

                <div class="col-lg-6 col-md-8">
                    <!-- Donate Box Start -->
                    <div class="donate-box">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">donate now</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Seize a chance for <span>something greater!</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">It’s time for greater glory and to rebuild the LCA! As Rev. Chris Oyakhilome DSc. DSc. DD said:
                                “We will build a bigger and better one!”

                                Join us in rebuilding the Loveworld Convocation Arena by making a generous donation. Click below to donate.
                                Thank you for being part of this vision!</p>
                        </div>
                        <!-- Section Title End -->

                        <div class="donate-form wow fadeInUp" data-wow-delay="0.5s">
                            <form id="donateForm" action="#" method="POST">
                                <!-- <div class="form-group mb-4">
                                    <input type="text" name="text" class="form-control" placeholder="donate now ..." required>
                                </div> -->

                                <!-- <fieldset class="donate-value-box">                                  
                                    <div class="donate-value">
                                        <input type="radio" id="value1" name="value" value="value1" checked>
                                        <label for="value1">$ 100.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value2" name="value" value="value2">
                                        <label for="value2">$ 200.00</label>
                                      </div>
                                    
                                      <div class="donate-value">
                                        <input type="radio" id="value3" name="value" value="value3">
                                        <label for="value3">$ 300.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value4" name="value" value="value4">
                                          <label for="value4">$ 400.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value5" name="value" value="value5">
                                          <label for="value5">$ 500.00</label>
                                      </div>
                                      
                                      <div class="donate-value">
                                          <input type="radio" id="value6" name="value" value="value6">
                                          <label for="value6">$ 600.00</label>
                                      </div>
                                </fieldset> -->

                                <div class="form-group-btn">
                                    <a href="https://christembassy.org/lcarebuild/new.php" class="btn-default">donate now</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Donate Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Donate Now Section End -->

    <!-- Our Blog Start -->
    <div class="our-blog">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">latest post</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Read Our <span>Latest Articles</span></h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <?php
                $getRecentPostsForIndex =  $Controller->getRecentPostsForIndex();

                if (!empty($getRecentPostsForIndex)) {
                    foreach ($getRecentPostsForIndex as $post) {
                        $postTitle = !empty($post['title']) ? $post['title'] : 'No Title';
                        $postSlug = !empty($post['post_slug']) ? $post['post_slug'] : '#';
                        $media = !empty($post['media']) ? explode(";", $post['media'])[0] : 'images/default.jpg';
                        $mediaParts = explode("|", $media);
                        $mediaPath = !empty($mediaParts[0]) ? $mediaParts[0] : 'images/default.jpg';
                ?>
                        <div class="col-lg-4 col-md-6">
                            <!-- Blog Item Start -->
                            <div class="blog-item wow fadeInUp">
                                <!-- Post Featured Image Start-->
                                <div class="post-featured-image" data-cursor-text="View">
                                    <figure>
                                        <a href="blog-details.php?post=<?= urlencode($postSlug); ?>" class="image-anime">
                                            <img src="./admin/default/<?= htmlspecialchars($mediaPath); ?>" alt="Post Image" style="width: 100%; aspect-ratio: 16/9; object-fit: cover;">
                                        </a>
                                    </figure>
                                </div>
                                <!-- Post Featured Image End -->

                                <!-- post Item Body Start -->
                                <div class="post-item-body">
                                    <h2><a href="blog-details.php?post=<?= urlencode($postSlug); ?>"><?= $postTitle ?></a></h2>
                                </div>
                                <!-- Post Item Body End-->

                                <!-- Post Item Footer Start-->
                                <div class="post-item-footer">
                                    <a href="blog-details.php?post=<?= urlencode($postSlug); ?>" class="read-more-btn">read more</a>
                                </div>
                                <!-- Post Item Footer End-->
                            </div>
                            <!-- Blog Item End -->
                        </div>
                    <?php
                    }
                } else { ?>
                    <div class="col-12 text-center">
                        <h3>No Posts at the moment. Please check back later!</h3>
                    </div>
                <?php  }
                ?>

            </div>
        </div>
    </div>
    <!-- Our Blog End -->

    <!-- Subscribe Newsletter Section Start -->
    <div class="subscribe-newsletter parallaxie">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">subscribe newsletter</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Keep Up With Our <span>Latest News</span></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.25s">Subscribe to our newsletter to stay informed about upcoming events, inspiring messages, and the latest news from our church community.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Subscribe Newsletter Form Start -->
                    <div class="subscribe-newsletter-form wow fadeInUp" data-wow-delay="0.5s">
                        <form id="newslettersForm" action="" method="POST">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="mail" placeholder="Your Email..." required>
                                <button type="submit" class="subscribe-btn">subscribe</button>
                            </div>
                        </form>
                    </div>
                    <!-- Subscribe Newsletter Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe Newsletter Section End -->

    <!-- Footer Start -->
    <?php include_once('./components/footer.php') ?>
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
    <script>
        document.getElementById('newslettersForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            const formData = new FormData(this);

            fetch('newsletter.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text()) // Get raw text first
                .then(rawData => {
                    // console.log('Raw Response:', rawData); // Log raw response to check for issues

                    try {
                        const data = JSON.parse(rawData); // Attempt to parse JSON
                        // console.log('Parsed Data:', data); // Log parsed data

                        if (data.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Subscribed!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            document.getElementById('newslettersForm').reset();
                        } else if (data.status === 'exists') {
                            Swal.fire({
                                icon: 'info',
                                title: 'Already Subscribed',
                                text: data.message,
                                timer: 2000
                            });
                        } else if (data.status === 'invalid') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Invalid Email',
                                text: data.message,
                                timer: 2000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: data.message,
                                timer: 2000
                            });
                        }
                    } catch (error) {
                        console.error('JSON Parse Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Response',
                            text: 'The server returned an unexpected response.',
                            timer: 2000
                        });
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'Unable to process your request.',
                        timer: 2000
                    });
                });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("https://bible-api.com/?random=verse")
                .then(response => response.json())
                .then(data => {
                    document.getElementById("bible-verse-text").textContent = data.text;
                    document.getElementById("bible-verse-reference").textContent = `- ${data.reference}`;
                })
                .catch(error => console.error("Error fetching verse:", error));
        });
    </script>

    <!-- <script>
document.addEventListener("DOMContentLoaded", function() {
    fetch("https://beta.ourmanna.com/api/v1/get/?format=json")
        .then(response => response.json())
        .then(data => {
            document.getElementById("bible-verse-text").innerHTML = data.verse.details.text;
            document.getElementById("bible-verse-reference").textContent = `- ${data.verse.details.reference}`;
        })
        .catch(error => {
            console.error("Error fetching verse:", error);
            document.getElementById("bible-verse-text").textContent = "Could not load verse. Please try again later.";
        });
});
</script> -->
</body>

</html>