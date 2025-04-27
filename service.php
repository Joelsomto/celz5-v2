
<?php
// Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<?php 
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

$churches = $Controller->getChurches();
$services = $Controller->getServices();
$categories = $Controller->getCategories();

// var_dump($services);
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
    <meta name="author" content="Celz5">
    <!-- Page Title -->
    <title>Service - Celz5</title>
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
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Services</h1>
                        <!-- <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">home</a></li>
                                <li class="breadcrumb-item active" aria-current="">services</li>
                            </ol>
                        </nav> -->
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Services Start -->
    <div class="page-services">
        <div class="container">
            <div class="row">
            <?php if (!empty($services) && count($services) > 0): ?>
    <?php foreach ($services as $service): ?>
        <div class="col-lg-3 col-md-6">
            <!-- Service Item Start -->
            <div class="service-item wow fadeInUp" data-wow-delay="0.4s">
                <!-- Icon Box Start -->
                <div class="icon-box">
                    <img src="images/icon-service-3.svg" alt="">
                </div>
                <!-- Icon Box End -->

                <!-- Service Body Start -->
                <div class="service-body">
                    <p><?= htmlspecialchars($service['description'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <!-- Service Body End -->

                <!-- Service Footer Start -->
                <div class="service-footer">
                    <div class="service-content">
                        <h3><?= htmlspecialchars($service['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                    </div>
                    <div class="service-btn">
                        <a href="live.php?service=<?= isset($service['slug']) ? htmlspecialchars($service['slug'], ENT_QUOTES, 'UTF-8') : '' ?>&serviceId=<?= isset($service['service_id']) ? htmlspecialchars($service['service_id'], ENT_QUOTES, 'UTF-8') : '' ?>" class="readmore-btn">
                            <img src="images/arrow-white.svg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Service Footer End -->
            </div>
            <!-- Service Item End -->
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12 text-center">
        <h3>No live services available at the moment. Please check back later!</h3>
    </div>
<?php endif; ?>

            </div>
        </div>
    </div>
    <!-- Page Services End -->

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





<!-- Modal -->
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

    <!-- Bootstrap 5 JS (to enable tab switching) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Ensures tab switches work correctly by using Bootstrap's tab JavaScript plugin
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.nav-link');
            const tabContent = document.querySelectorAll('.tab-pane');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    tabContent.forEach(pane => {
                        pane.classList.remove('show', 'active');
                    });
                    document.querySelector(button.getAttribute('href')).classList.add('show', 'active');
                });
            });
        });
    </script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>


</html>