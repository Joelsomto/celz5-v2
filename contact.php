<?php
require_once('include/Session.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

try {
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        // Fallback to avoid undefined array key error
        $first_name = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
        $last_name = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
        $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
        $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
        $message = isset($_POST['msg']) ? htmlspecialchars(trim($_POST['msg'])) : '';

        // Input validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }

        if (empty($first_name) || empty($last_name) || empty($phone) || empty($message)) {
            throw new Exception("All fields are required");
        }

        // Structure the data into an array
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message
        ];

        // Attempt to insert the message into the database
        if ($Controller->contact_messages($data)) {
            echo "Message submitted successfully!";
        } else {
            throw new Exception("Failed to submit message. Please try again later.");
        }
    }
} catch (Exception $e) {
    // Handle exceptions gracefully
    echo "Error: " . $e->getMessage();
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
    <title>Contact Us - Celvz5</title>
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
    <?php include_once('./components/header.php') ?>

	<!-- Header End -->

    <!-- Page Header Start -->
	<div class="page-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-2" data-cursor="-opaque">Contact Us</h1>
						<nav class="wow fadeInUp">
							<!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">contact us</li>
							</ol> -->
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->

    <!-- Page Contact Us Start -->
    <div class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Contact Information Start -->
                    <div class="contact-information">
                        <!-- Contact Information Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">contact us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Reach Out to Our <span>Church Support</span></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.25s">Contact us for support, information, or to get involved. We're here to help and welcome you to our community.</p>
                        </div>
                        <!-- Contact Information Title End -->

                        <!-- Contact Information List Start -->
                        <div class="contact-info-list">
                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="images/icon-phone.svg" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>give us a call</p>
                                    <h3>+234 907 641 5312</h3>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="images/icon-mail.svg" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>Send us a message on Kingschat</p>
                                    <h3><a href="https://kingschat.online/user/lz5testimonies">@Celz5testimonies</a></h3>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->

                            <!-- Contact Info Item Start -->
                            <div class="contact-info-item wow fadeInUp" data-wow-delay="0.75s">
                                <!-- Icon Box Start -->
                                <div class="icon-box">
                                    <img src="images/icon-location.svg" alt="">
                                </div>
                                <!-- Icon Box End -->

                                <!-- Contact Info Content Start -->
                                <div class="contact-info-content">
                                    <p>Visit our location</p>
                                    <h3>CFGR+MFW, Lekki Penninsula II, Lekki 106104, Lagos</h3>
                                </div>
                                <!-- Contact Info Content End -->
                            </div>
                            <!-- Contact Info Item End -->
                        </div>
                        <!-- Contact Information List End -->
                    </div>
                    <!-- Contact Information End -->
                </div>

                <div class="col-lg-6">
                    <!-- Contact Form Start -->
                    <div class="contact-us-form wow fadeInUp" data-wow-delay="0.25s">
                        <form class="FormContact" action="" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.5s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea name="msg" class="form-control" id="msg" rows="5" placeholder="Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="contact-form-btn">
                                        <button type="submit" class="btn-default">submit message</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map Start -->
	<div class="google-map">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-12">
                    <!-- Google Map Iframe Start -->
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.745493156466!2d3.4886168737462677!3d6.426735393564302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5d0cfdc7817%3A0xbd8915c402262ece!2sChrist%20Embassy%2C%20LoveWorld%20Arena%20Lekki!5e0!3m2!1sen!2sng!4v1736455000066!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map Iframe End -->
                </div>
            </div>
        </div>
    </div>
	<!-- Google Map End -->

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelector('.FormContact').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    // Fetch form data
    const formData = new FormData(this);

    // Send an AJAX request to the PHP backend
    fetch('', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text()) // Parse response as plain text
    .then(data => {
        if (data.includes('Message submitted successfully!')) {
            // Success alert
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message has been submitted successfully.',
                confirmButtonText: 'OK',
            }).then(() => {
                // Optionally, reset the form
                document.querySelector('.FormContact').reset();
            });
        } else if (data.includes('Error:')) {
            // Error alert
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: data.replace('Error: ', '').trim(), // Show the error message from PHP
                confirmButtonText: 'OK',
            });
        } else {
            // Unexpected response
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: 'Unexpected response from the server. Please try again.',
                confirmButtonText: 'OK',
            });
        }
    })
    .catch(error => {
        // Handle fetch error
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Failed to submit the form. Please try again later.',
            confirmButtonText: 'OK',
        });
        console.error('Error:', error);
    });
});

    </script>
</body>

</html>