<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
// var_dump($_SESSION['user_id']);
// die();
try {
    // Retrieve GET parameters
    $slug = $_GET['service'] ?? null;
    $service_id = $_GET['serviceId'] ?? null;

    $service = null;

    // Check with slug first
    if (!empty($slug)) {
        $service = $Controller->getServicesWithSlug($slug);

        // If no result, try with ID
        if (empty($service) && !empty($service_id)) {
            $service = $Controller->getServicesWithId($service_id);
        }
    } elseif (!empty($service_id)) {
        // Check with ID if slug is not provided
        $service = $Controller->getServicesWithId($service_id);

        // If no result, try with slug
        if (empty($service) && !empty($slug)) {
            $service = $Controller->getServicesWithSlug($slug);
        }
    } else {
        // If neither slug nor id is provided
        $_SESSION['errorMsg'] = "Missing or invalid parameters.";
    }

    // Check if a service was found
    if (!empty($service)) {
        // Successfully fetched the service
        // echo "Service Found: ";
        // print_r($service);
    } else {
        // No matching service found
        $_SESSION['errorMsg'] = "No service found for the given parameters.";
    }
} catch (Exception $e) {
    // Handle errors
    $_SESSION['errorMsg'] =  "Error: " . $e->getMessage();
}
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
    <title>Live - Celz5</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Include SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    <style>
        /* General Styling for Player */
        .hls-player {
            position: relative;
            width: 100%;
            max-width: 800px;
            background: #000;
            border: 2px solid #FE6035;
            border-radius: 8px;
            overflow: hidden;
        }

        .video {
            width: 100%;
            height: auto;
            background: black;
            cursor: pointer;
            /* Indicate video is clickable */
        }

        /* Hide controls initially */
        .controls {
            display: flex;
            align-items: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.8);
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s, transform 0.3s;
        }

        /* Show controls on hover */
        .hls-player:hover .controls,
        .hls-player.active .controls {
            opacity: 1;
            transform: translateY(0);
        }

        .btn {
            background: none;
            border: none;
            color: #FE6035;
            font-size: 18px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            color: #FF7D54;
        }

        .progress-bar {
            flex: 1;
            margin: 0 10px;
            appearance: none;
            height: 5px;
            border-radius: 5px;
            background: #444;
            outline: none;
            cursor: pointer;
        }

        .progress-bar::-webkit-slider-thumb {
            appearance: none;
            width: 12px;
            height: 12px;
            background: #FE6035;
            border-radius: 50%;
            cursor: pointer;
        }

        .volume-slider {
            width: 100px;
            appearance: none;
            height: 5px;
            border-radius: 5px;
            background: #444;
            margin-right: 10px;
        }

        .volume-slider::-webkit-slider-thumb {
            appearance: none;
            width: 12px;
            height: 12px;
            background: #FE6035;
            border-radius: 50%;
            cursor: pointer;
        }

        .time-display {
            font-size: 14px;
            margin-right: 10px;
            color: #FE6035;
        }

        .comment-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .comment-header {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .comment-input {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
            margin-bottom: 10px;
            resize: none;
        }

        .comment-btn {
            background-color: #FE6035;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .comment-btn:hover {
            background-color: #d9522d;
        }

        .comment-list {
            max-height: 350px;
            /* Set a max height for the list */
            overflow-y: auto;
            /* Enable vertical scrolling */
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }


        .comment-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }

        .comment-item:last-child {
            border-bottom: none;
        }

        .comment-content {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .comment-actions {
            font-size: 12px;
            color: #FE6035;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
        }

        .comment-actions:hover {
            text-decoration: underline;
        }

        .reply-list {
            list-style: none;
            padding-left: 20px;
            margin-top: 10px;
            display: none;
            /* Initially hidden for collapsibility */
        }

        .reply-form {
            margin-top: 10px;
        }

        .reply-form textarea {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 8px;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .reply-form button {
            background-color: #FE6035;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }

        .reply-form button:hover {
            background-color: #d9522d;
        }

        .toggle-replies {
            font-size: 12px;
            color: #FE6035;
            cursor: pointer;
            margin-top: 5px;
            display: inline-block;
        }

        .toggle-replies:hover {
            text-decoration: underline;
        }
    </style>
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

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Live Service</h1>
                        <nav class="wow fadeInUp">
                            <!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">home</a></li>
                                <li class="breadcrumb-item"><a href="index-2.html">Services</a></li>
								<li class="breadcrumb-item active" aria-current="page">support groups</li>
							</ol> -->
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Service Single Start -->
    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Service Single Content Start -->
                    <div class="service-single-content">
                        <!-- Service Single Slider Start -->
                        <div class="service-single-slider">

                            <div class="hls-player">
                                <video class="video" poster="" id="video-player"></video>
                                <div class="controls">
                                    <button class="btn" id="play-pause-btn">▶️</button>
                                    <span class="time-display" id="current-time">00:00</span>
                                    <input type="range" class="progress-bar" id="progress-bar" min="0" max="100" value="0">
                                    <input type="range" class="volume-slider" id="volume-slider" min="0" max="1" step="0.1">
                                    <span class="time-display" id="total-time">00:00</span>
                                    <button class="btn" id="mute-btn">🔊</button>
                                    <label for="stream-selector">Stream:</label>
                                    <select id="stream-selector">
                                        <option value="primary">Primary Stream</option>
                                        <option value="backup">Backup Stream</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <!-- Service Single Slider End -->

                        <!-- Service Entry Content Start -->
                        <div class="service-entry">
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><?= $service[0]['title'] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s"><?= $service[0]['description'] ?></p>
                            <ul class="wow fadeInUp" data-wow-delay="0.6s">
                                <li>
                                    <h4>Offering Details</h4>
                                </li>
                                <li>CE Lekki Espees Code - <strong>CELK</strong></strong> </li>
                                <li>CE Lagos Zone 5 Espess Code - <strong>CELZ5</strong></li>
                                <li>BANK: PARALLEX BANK</li>
                                <li>ACCOUNT NAME: Christ Embassy</li>
                                <li>ACCOUNT NUMBER: 2030074162</li>
                            </ul>
                        </div>
                        <!-- Service Entry Content End -->


                    </div>
                    <!-- Service Single Content End -->
                </div>

                <div class="col-lg-4">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">
                        <!-- Service Categories List Start -->
                        <div class="service-catagery-list wow fadeInUp">
                            <div class="comment-header">Leave a Comment</div>
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="hidden" name="service_id" value="<?= $service_id ?>">
                            <textarea class="comment-input" name="comment_text" id="commentInput" rows="3" placeholder="Write your comment here..."></textarea>
                            <button class="comment-btn" id="addCommentBtn">Post Comment</button>

                            <ul class="comment-list" id="commentList">
                                <!-- Comments will appear here -->
                            </ul>
                        </div>
                        <!-- Service Categories List End -->



                    </div>
                    <!-- Service Sidebar End -->
                </div>
            </div>
        </div>
    </div>
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
    <!-- Page Service Single Start -->
    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Service Single Content Start -->
                    <div class="service-single-content">
                        <!-- Service Single Slider Start -->



                        <!-- Service Single Faqs Start -->
                        <div class="service-single-faqs">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h2 class="text-anime-style-2" data-cursor="-opaque">More Offering Details</h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- Core Value FAQ Accordion Start -->
                            <div class="core-value-faqs-accordion" id="accordion">


                                <!-- FAQ Item Start -->
                                <div class="accordion-item wow fadeInUp" data-wow-delay="0.25s">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Click Here!!
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <div class="row mb-3 p-2">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">OFFERING / SEED</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Christ Embassy</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030074162 </p>
                                                            <p class="card-text"><strong>BANK : </strong> PARALLEX BANK</p>
                                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">TITHE</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Christ Embassy </p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030074131 </p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">THANKSGIVING</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Christ Embassy </p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong> 2030074148 </p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 p-2">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">FIRST FRUIT</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Christ Embassy</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030074186</p>
                                                            <p class="card-text"><strong>BANK : </strong> PARALLEX BANK</p>
                                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">HEALING SCHOOL</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Loveworld Arena Solutions Healing School</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>1000044895</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">PROJECT LIFESAVER</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong> Loveworld Arena Solutions Project LiveSaver</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>1000045108</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 p-2">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">RHAPSODY OF REALITIES</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Loveworld Arena Solutions Rhapsody</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>1000044905</p>
                                                            <p class="card-text"><strong>BANK : </strong> PARALLEX BANK</p>
                                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">MINISTRY PROGRAMS</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>Loveworld Arena Solutions Ministry Programs</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030078108</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h6 class="card-title">LW CRUSADE GROUND LOVEWORLD ARENA SOLUTIONS ACCOUNT</h6>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong> LOVEWORLD ARENA SOLUTIONS</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>34-1000041526</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 p-2">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">INNERCITY MISSION</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>INNERCITY MISSION LAGOS ZONE 5</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030076634</p>
                                                            <p class="card-text"><strong>BANK : </strong> PARALLEX BANK</p>
                                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">LOVEWORLD RADIO</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong> Loveworld Arena Solutions Radio</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>1000053864</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">LOVEWORLD TELEVISION MINISTRY</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong> Loveworld Arena Solutions LTM</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>1000053840</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 p-2">
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">LOVEWORLD USA</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong>LOVEWORLD TV LTD LZ5</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>2030080996</p>
                                                            <p class="card-text"><strong>BANK : </strong> PARALLEX BANK</p>
                                                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">BIBLE SPONSORSHIP</h5>
                                                            <hr>
                                                            <p class="card-text"><strong>ACCOUNT NAME : </strong> LOVEWORLD ARENA SOLUTIONS ACCOUNT</p>
                                                            <p class="card-text"><strong>ACCOUNT NO : </strong>37-1000041588</p>
                                                            <p class="card-text"><strong>BANK : </strong>PARALLEX BANK </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h6 class="card-title">KINGSPAY CODE: NAIRA/FOREIGN CURRENCY- CELZ5</h6>
                                                            <hr>
                                                            <p class="card-title">LOVEWORLD ARENA SOLUTIONS</p>
                                                            <p class="card-text"><strong>USD : </strong> 3000004303</p>
                                                            <p class="card-text"><strong>EUR : </strong>3000004310</p>
                                                            <p class="card-text"><strong>POUNDS : </strong>3000004327</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- FAQ Item End -->

                            </div>
                            <!-- Core Value FAQ Accordion End -->
                        </div>
                        <!-- Service Single Faqs End -->
                    </div>
                    <!-- Service Single Content End -->
                </div>

                <div class="col-lg-4">
                    <!-- Service Sidebar Start -->
                    <div class="service-sidebar">

                        <!-- Service Categories List Start -->
                        <div class="service-catagery-list wow fadeInUp">
                            <h3>Links</h3>
                            <ul>
                                <li><a href="announcements.php">Announcements</a></li>
                                <li><a type="button" data-bs-toggle="modal" data-bs-target="#viewerModal">Update Attendance</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <!-- <li><a href="#">sunday worship</a></li>
                                <li><a href="#">midweek prayer</a></li> -->
                            </ul>
                        </div>
                        <!-- Service Categories List End -->

                        <!-- Sidebar Cta Start -->
                        <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Cta Contact Item Start -->
                            <div class="cta-contact-item">
                                <div class="icon-box">
                                    <img src="images/icon-sidebar-cta.svg" alt="">
                                </div>
                                <div class="cta-contact-content">
                                    <h2>We're Here Help</h2>
                                    <p>Need assistance? We're here to help with support, guidance, and resources. Reach out to us anytime.</p>
                                </div>
                                <div class="cta-contact-btn">
                                    <a href="https://kingschat.online/user/lgzone5" class="btn-default btn-highlighted">contact now</a>
                                </div>
                            </div>
                            <!-- Cta Contact Item End -->
                        </div>
                        <!-- Sidebar Cta End -->
                    </div>
                    <!-- Service Sidebar End -->
                </div>
            </div>
        </div>
    </div>



    <!-- Button trigger modal -->


    <div class="modal fade" id="viewerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">How many people are watching?</h1>
                </div>
                <div class="modal-body">
                    <!-- Add id to the form -->
                    <form class="row g-3 needs-validation" method="post" id="viewerForm">
                        <div class="col-md-12">
                            <!-- Hidden fields for user_id and service_id -->
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="hidden" name="service_id" value="<?= $service_id ?>">
                            <!-- Input for viewers -->
                            <input type="number" class="form-control" name="viewers" value="1" required>
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-12">
                            <button class="btn" type="submit" style="background-color: #FE6035; color: white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Service Single End -->
    <?php include_once('./auth-modal.php') ?>

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
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

    <!-- <script>
        const commentInput = document.getElementById("commentInput");
        const addCommentBtn = document.getElementById("addCommentBtn");
        const commentList = document.getElementById("commentList");

        function createCommentElement(text) {
            const li = document.createElement("li");
            li.classList.add("comment-item");

            li.innerHTML = `
                <div class="comment-content">${text}</div>
                <div>
                    <span class="comment-actions reply-action">Reply</span>
                    <span class="toggle-replies" style="display: none;">Show Replies</span>
                </div>
                <ul class="reply-list"></ul>
                <div class="reply-form" style="display: none;">
                    <textarea class="comment-input reply-input" rows="2" placeholder="Write your reply..."></textarea>
                    <button class="comment-btn submit-reply-btn">Post Reply</button>
                    <button class="comment-btn cancel-reply-btn" style="background-color: #ddd; color: #333;">Cancel</button>
                </div>
            `;

            const replyAction = li.querySelector(".reply-action");
            const replyForm = li.querySelector(".reply-form");
            const replyInput = replyForm.querySelector(".reply-input");
            const submitReplyBtn = replyForm.querySelector(".submit-reply-btn");
            const cancelReplyBtn = replyForm.querySelector(".cancel-reply-btn");
            const replyList = li.querySelector(".reply-list");
            const toggleReplies = li.querySelector(".toggle-replies");

            // Toggle reply form
            replyAction.addEventListener("click", () => {
                replyForm.style.display = replyForm.style.display === "none" ? "block" : "none";
                replyInput.focus();
            });

            // Submit reply
            submitReplyBtn.addEventListener("click", () => {
                const replyText = replyInput.value.trim();
                if (replyText) {
                    const replyItem = createCommentElement(replyText);
                    replyList.appendChild(replyItem);
                    replyInput.value = "";
                    replyForm.style.display = "none";

                    // Show the toggle replies link when a reply is added
                    toggleReplies.style.display = "inline-block";
                }
            });

            // Cancel reply
            cancelReplyBtn.addEventListener("click", () => {
                replyInput.value = "";
                replyForm.style.display = "none";
            });

            // Toggle replies visibility
            toggleReplies.addEventListener("click", () => {
                if (replyList.style.display === "none") {
                    replyList.style.display = "block";
                    toggleReplies.textContent = "Hide Replies";
                } else {
                    replyList.style.display = "none";
                    toggleReplies.textContent = "Show Replies";
                }
            });

            return li;
        }

        addCommentBtn.addEventListener("click", () => {
            const commentText = commentInput.value.trim();
            if (commentText) {
                const commentElement = createCommentElement(commentText);
                commentList.appendChild(commentElement);
                commentInput.value = "";
            }
        });
    </script> -->


    <script>
        const commentInput = document.getElementById("commentInput");
        const addCommentBtn = document.getElementById("addCommentBtn");
        const commentList = document.getElementById("commentList");
        const title = <?= json_encode($_SESSION['title'] ?? '') ?>;
        const first_name = <?= json_encode($_SESSION['first_name'] ?? '') ?>;

        const commentCache = new Map(); // Cache for comments and replies

        async function fetchComments() {
            try {
                const response = await fetch('./get-comments.php?service_id=<?= $service_id ?>');
                const data = await response.json();

                // Clear the current list
                commentList.innerHTML = '';

                // Loop through comments
                data.forEach((comment) => {
                    const commentElement = createCommentElement(
                        comment.comment_text,
                        comment.comment_id,
                        comment.title,
                        comment.first_name,
                        comment.is_reply // Check if it's a reply
                    );

                    // Add replies if available
                    if (comment.replies) {
                        const replyList = commentElement.querySelector('.reply-list');
                        comment.replies.forEach((reply) => {
                            const replyElement = createCommentElement(
                                reply.reply_text,
                                reply.reply_id,
                                reply.title,
                                reply.first_name,
                                true // Mark as reply
                            );
                            replyList.appendChild(replyElement);
                        });
                    }

                    // Append the comment element
                    commentList.appendChild(commentElement);
                });
            } catch (error) {
                console.error("Error fetching comments:", error);
            }
        }

        // Add new comment
        addCommentBtn.addEventListener("click", async () => {
            const commentText = commentInput.value.trim();
            if (commentText) {
                try {
                    const formData = new FormData();
                    formData.append('user_id', <?= $user_id ?>);
                    formData.append('service_id', <?= $service_id ?>);
                    formData.append('comment_text', commentText);

                    const response = await fetch('./post-comment.php', {
                        method: 'POST',
                        body: formData,
                    });

                    const result = await response.json();

                    if (result.success) {
                        const commentElement = createCommentElement(
                            commentText,
                            result.comment_id,
                            result.title,
                            result.first_name,
                            false // Not a reply
                        );
                        commentList.insertBefore(commentElement, commentList.firstChild);
                        commentCache.set(result.comment_id, commentElement);
                        commentInput.value = "";
                        fetchComments(); // Fetch latest comments after posting
                    } else {
                        console.error("Error adding comment:", result.message);
                    }
                } catch (error) {
                    console.error("Error adding comment:", error);
                }
            }
        });

        // Create a comment or reply element
        function createCommentElement(text, commentId = null, title = "", name = "", isReply = false) {
            const li = document.createElement("li");
            li.classList.add("comment-item");

            li.innerHTML = `
            <div class="comment-header">
                <small class="comment-author">${title} ${name}</small>
            </div>
            <div class="comment-content">${text}</div>
            <div>
                <span class="comment-actions reply-action">Reply</span>
                <span class="toggle-replies" style="display: none;">Show Replies</span>
            </div>
            <ul class="reply-list" data-comment-id="${commentId}"></ul>
            <div class="reply-form" style="display: none;">
                <textarea name="reply_text" class="comment-input reply-input" rows="2" placeholder="Write your reply..."></textarea>
                <button class="comment-btn submit-reply-btn">Post Reply</button>
                <button class="comment-btn cancel-reply-btn" style="background-color: #ddd; color: #333;">Cancel</button>
            </div>
        `;

            const replyAction = li.querySelector(".reply-action");
            const replyForm = li.querySelector(".reply-form");
            const replyInput = replyForm.querySelector(".reply-input");
            const submitReplyBtn = replyForm.querySelector(".submit-reply-btn");
            const cancelReplyBtn = replyForm.querySelector(".cancel-reply-btn");
            const replyList = li.querySelector(".reply-list");
            const toggleReplies = li.querySelector(".toggle-replies");

            replyAction.addEventListener("click", () => {
                replyForm.style.display = replyForm.style.display === "none" ? "block" : "none";
                replyInput.focus();
            });

            submitReplyBtn.addEventListener("click", async () => {
                const replyText = replyInput.value.trim();
                if (replyText) {
                    try {
                        const formData = new FormData();
                        formData.append('user_id', <?= $user_id ?>); // User ID
                        formData.append('parent_id', commentId); // Parent comment ID
                        formData.append('service_id', <?= $service_id ?>); // Service ID
                        formData.append('text', replyText); // Reply text

                        const response = await fetch('./post-reply.php', {
                            method: 'POST',
                            body: formData,
                        });

                        const result = await response.json();

                        if (result.status === "success") {
                            const replyElement = createCommentElement(
                                replyText,
                                result.reply_id,
                                result.title,
                                result.first_name,
                                true // Mark as reply
                            );
                            replyList.appendChild(replyElement); // Add the reply to the UI
                            replyInput.value = ""; // Clear the input
                            replyForm.style.display = "none"; // Hide the form
                            toggleReplies.style.display = "inline-block"; // Show the "Show Replies" button
                        } else {
                            console.error("Error adding reply:", result.message);
                        }
                    } catch (error) {
                        console.error("Error adding reply:", error);
                    }
                }
            });

            cancelReplyBtn.addEventListener("click", () => {
                replyInput.value = "";
                replyForm.style.display = "none";
            });

            toggleReplies.addEventListener("click", async () => {
                if (replyList.style.display === "none") {
                    if (!replyList.hasChildNodes()) {
                        try {
                            const response = await fetch(`./get-replies.php?parent_id=${commentId}`);
                            const replies = await response.json();

                            replies.forEach((reply) => {
                                const replyElement = createCommentElement(
                                    reply.reply_text,
                                    reply.reply_id,
                                    reply.title,
                                    reply.first_name,
                                    true // Mark as reply
                                );
                                replyList.appendChild(replyElement);
                            });
                        } catch (error) {
                            console.error("Error fetching replies:", error);
                        }
                    }

                    replyList.style.display = "block";
                    toggleReplies.textContent = "Hide Replies";
                } else {
                    replyList.style.display = "none";
                    toggleReplies.textContent = "Show Replies";
                }
            });

            return li;
        }

        // Periodically fetch comments
        function startCommentFetcher() {
            fetchComments();
            setInterval(fetchComments, 5000); // Refresh comments every 5 seconds
        }

        startCommentFetcher();
    </script>




<!-- video player -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const video = document.getElementById("video-player");
        const playPauseBtn = document.getElementById("play-pause-btn");
        const progressBar = document.getElementById("progress-bar");
        const volumeSlider = document.getElementById("volume-slider");
        const muteBtn = document.getElementById("mute-btn");
        const streamSelector = document.getElementById("stream-selector");

        // Stream URLs
        const streams = {
            primary: "<?= $service[0]['service_link'] ?>",
            backup: "<?= $service[0]['backup_service_link'] ?>"
        };

        let hls;

        // Function to load the HLS stream
        const loadStream = (url) => {
            if (Hls.isSupported()) {
                if (hls) hls.destroy(); // Clean up previous HLS instance
                hls = new Hls();
                hls.loadSource(url);
                hls.attachMedia(video);

                // Start playback automatically when the stream is ready
                hls.on(Hls.Events.MANIFEST_PARSED, () => video.play());

                // Handle errors and fallback to backup
                hls.on(Hls.Events.ERROR, (_, data) => {
                    if (data.type === Hls.ErrorTypes.NETWORK_ERROR) {
                        console.warn("Primary stream failed, switching to backup...");
                        switchStream("backup");
                    }
                });
            } else if (video.canPlayType("application/vnd.apple.mpegurl")) {
                video.src = url;
                video.play();
            }
        };

        // Switch between primary and backup streams
        const switchStream = (streamType) => {
            streamSelector.value = streamType;
            loadStream(streams[streamType]);
            console.log(`Switched to: ${streamType === "primary" ? "Primary Stream" : "Backup Stream"}`);
        };

        // Load the primary stream by default
        switchStream("primary");

        // Handle stream switching
        streamSelector.addEventListener("change", () => switchStream(streamSelector.value));

        // Play/Pause functionality
        const togglePlay = () => {
            if (video.paused) {
                video.play();
                playPauseBtn.textContent = "⏸️";
            } else {
                video.pause();
                playPauseBtn.textContent = "▶️";
            }
        };

        // Update progress bar and time display
        const updateProgress = () => {
            const progress = (video.currentTime / video.duration) * 100;
            progressBar.value = progress || 0;

            const formatTime = (time) => {
                const minutes = Math.floor(time / 60);
                const seconds = Math.floor(time % 60).toString().padStart(2, "0");
                return `${minutes}:${seconds}`;
            };

            document.getElementById("current-time").textContent = formatTime(video.currentTime);
            document.getElementById("total-time").textContent = formatTime(video.duration);
        };

        video.addEventListener("timeupdate", updateProgress);

        // Seek functionality
        progressBar.addEventListener("input", () => {
            video.currentTime = (progressBar.value / 100) * video.duration;
        });

        // Volume control
        volumeSlider.addEventListener("input", () => {
            video.volume = volumeSlider.value;
        });

        // Mute/Unmute functionality
        muteBtn.addEventListener("click", () => {
            video.muted = !video.muted;
            muteBtn.textContent = video.muted ? "🔇" : "🔊";
        });

        // Play/Pause on click
        video.addEventListener("click", togglePlay);
        playPauseBtn.addEventListener("click", togglePlay);

        // Check primary stream availability every 10 seconds
        const checkPrimaryStream = () => {
            if (streamSelector.value === "backup") {
                fetch(streams.primary, { method: 'HEAD' })
                    .then((response) => {
                        if (response.ok) {
                            console.log("Primary stream is back online. Switching to Primary Stream...");
                            switchStream("primary");
                        }
                    })
                    .catch(() => console.log("Primary stream still offline."));
            }
        };

        setInterval(checkPrimaryStream, 10000); // Check every 10 seconds
    });
</script>

    <!-- viewers modal -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Automatically show the modal when the page loads
            const viewerModal = new bootstrap.Modal(document.getElementById("viewerModal"));
            viewerModal.show();

            // Handle form submission
            document.getElementById("viewerForm").addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent default form submission

                // Collect form data
                const formData = new FormData(this);

                // Send the data via AJAX
                fetch("submit_viewers.php", {
                        method: "POST",
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Close the modal
                            viewerModal.hide();

                            // Optionally, display a success message
                            console.log("Viewers count submitted successfully!");
                        } else {
                            alert("Error submitting viewers count: " + data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("An unexpected error occurred.");
                    });
            });
        });
    </script>

</body>

</html>