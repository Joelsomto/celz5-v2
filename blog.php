<?php
require_once('include/Session.php');
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
    <meta name="author" content="">
    <!-- Page Title -->
    <title>Blog - Celz5</title>
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
    <style>
        .post-image {
            height: 768px;
            /* Set fixed height */
            width: auto;
            /* Maintain aspect ratio */
            max-width: 100%;
            /* Prevent images from exceeding container width */
            object-fit: cover;
            /* Ensures no distortion while covering */
            border-radius: 10px;
            /* Optional rounded corners */
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
                        <h1 class="text-anime-style-2" data-cursor="-opaque">Latest Articles</h1>
                        <nav class="wow fadeInUp">
                            <!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index-2.html">home</a></li>
								<li class="breadcrumb-item active" aria-current="page">blog</li>
							</ol> -->
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Blog Start -->
    <div class="page-blog">
        <div class="container">
            <div class="row">
                <?php
                // Retrieve category or tag slug from URL
$categorySlug = isset($_GET['category']) ? trim(htmlspecialchars($_GET['category'])) : null;
$tagSlug = isset($_GET['tag']) ? trim(htmlspecialchars($_GET['tag'])) : null;

// Define pagination parameters
$limit = 6; // Posts per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total posts count for pagination
$totalPosts = $Controller->countFilteredPosts($categorySlug, $tagSlug);
$totalPages = ceil($totalPosts / $limit);

// Fetch paginated blog posts
$getBlogPosts = $Controller->getBlogPostsByFilter($categorySlug, $tagSlug, $limit, $offset);

if (!empty($getBlogPosts)) {
    foreach ($getBlogPosts as $post) {
        $postTitle = !empty($post['title']) ? $post['title'] : 'No Title';
        $postSlug = !empty($post['post_slug']) ? $post['post_slug'] : '#';
        $media = !empty($post['media']) ? explode(";", $post['media'])[0] : 'images/default.jpg';
        $mediaParts = explode("|", $media);
        $mediaPath = !empty($mediaParts[0]) ? $mediaParts[0] : 'images/default.jpg';
?>
        <div class="col-lg-4 col-md-6">
            <div class="blog-item wow fadeInUp">
                <div class="post-featured-image" data-cursor-text="View">
                    <figure>
                        <a href="blog-details.php?post=<?= urlencode($postSlug); ?>" class="image-anime">
                            <img src="./admin/default/<?= htmlspecialchars($mediaPath); ?>" alt="Post Image" style="width: 100%; aspect-ratio: 16/9; object-fit: cover;">
                        </a>
                    </figure>
                </div>
                <div class="post-item-body">
                    <h2><a href="blog-details.php?post=<?= urlencode($postSlug); ?>"><?= htmlspecialchars($postTitle); ?></a></h2>
                </div>
                <div class="post-item-footer">
                    <a href="blog-details.php?post=<?= urlencode($postSlug); ?>" class="read-more-btn">read more</a>
                </div>
            </div>
        </div>
<?php
    }
} else {?>
    <div class="col-12 text-center">
        <h3>No Posts at the moment. Please check back later!</h3>
    </div>             
 <?php  }
    ?>

<!-- Pagination -->
<div class="col-lg-12">
    <div class="page-pagination wow fadeInUp" data-wow-delay="0.5s">
        <ul class="pagination">
            <?php if ($page > 1): ?>
                <li><a href="?<?= http_build_query(array_merge($_GET, ['page' => $page - 1])); ?>"><i class="fa-solid fa-arrow-left-long"></i></a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="<?= ($i == $page) ? 'active' : ''; ?>">
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $i])); ?>"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li><a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1])); ?>"><i class="fa-solid fa-arrow-right-long"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>


            </div>
        </div>
    </div>
    <!-- Page Blog End -->

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
</body>

<!-- Mirrored from demo.awaikenthemes.com/html-preview/avenix/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 29 Dec 2024 14:11:10 GMT -->

</html>