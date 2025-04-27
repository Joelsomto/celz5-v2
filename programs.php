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

$getUpComingProgram = $Controller->getUpComingPrograms();
$user_id = isset($_SESSION['user_id']);

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
    <title>Upcoming Programs - Celz5 </title>
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
						<h1 class="text-anime-style-2" data-cursor="-opaque">Upcoming Programs</h1>
						<nav class="wow fadeInUp">
							<!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">services</li>
							</ol> -->
						</nav>
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
            <?php if (!empty($getUpComingProgram) && count($getUpComingProgram) > 0): ?>
    <?php foreach ($getUpComingProgram as $program): ?>
        <?php $isRegistered = $Controller->isProgramRegistered($user_id, $program['program_id']); ?>
        <div class="col-lg-4 col-md-6">
            <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                <div class="icon-box">
                    <img src="images/icon-service-2.svg" alt="">
                </div>
                <div class="service-body">
                    <p><?= htmlspecialchars($program['description'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="service-footer">
                    <div class="service-content">
                        <h3><?= htmlspecialchars($program['name'], ENT_QUOTES, 'UTF-8') ?></h3>
                    </div>
                    <div class="service-btn">
                        <?php if ($isRegistered): ?>
                            <button class="btn-default" disabled>Registered</button>
                        <?php else: ?>
                            <button class="btn-default" data-program-id="<?= $program['program_id'] ?>">Register Now</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="col-12 text-center">
        <h3>No upcoming programs at the moment. Please check back later!</h3>
    </div>
<?php endif; ?>




            </div>
        </div>
    </div>
    <!-- Page Services End -->

   
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




    document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".service-btn .btn-default");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const programId = this.getAttribute("data-program-id");
            const userId = <?= json_encode($user_id); ?>; // Safely encode PHP session user ID

            if (!programId || !userId) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Invalid program or user.",
                });
                return;
            }

            fetch("submit-programs.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `user_id=${encodeURIComponent(userId)}&program_id=${encodeURIComponent(programId)}`,
})
    .then(response => response.text()) // Read response as text
    .then(responseText => {
        console.log("Raw response text:", responseText);
        try {
            const data = JSON.parse(responseText); // Attempt to parse JSON
            console.log("Parsed response:", data);
            if (data.success) {
                this.textContent = "Registered";
                this.disabled = true;
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: data.message,
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data.message,
                });
            }
        } catch (error) {
            console.error("JSON Parse Error:", error);
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Invalid server response. Please contact support.",
            });
        }
    })
    .catch(error => {
        console.error("Fetch Error:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "An error occurred. Please try again.",
        });
    });


        });
    });
});

</script>
</body>

</html>