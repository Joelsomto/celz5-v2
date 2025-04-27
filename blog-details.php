<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

// Retrieve post slug from URL
$postSlug = isset($_GET['post']) ? trim(htmlspecialchars($_GET['post'])) : (isset($_GET['tag']) ? trim(htmlspecialchars($_GET['tag'])) : null);

// Redirect if no slug is provided
if ($postSlug === null || $postSlug === '') {
    header("Location: blog.php");
    exit;
}

// Fetch the post (single post only, since a slug is required)
$post = $Controller->getPostsByFilter($postSlug);

// Check if post data exists
if (!empty($post)) {
    // var_dump($post); 
    // die();
} else {

    echo "Post not found.";
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
    <meta name="author" content="Awaiken">
    <!-- Page Title -->
    <title>Blog - <?= $post[0]['title'] ?></title>
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
        .recent-posts {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.recent-post-item {
    display: flex;
    align-items: center;
    gap: 10px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.post-thumb img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
}

.post-info h4 {
    font-size: 16px;
    margin: 0;
    font-weight: bold;
}

.post-date {
    font-size: 14px;
    color: #777;
}

    </style>
</head>

<body>

    <!-- Preloader Start -->
    <!-- <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="images/loader.svg" alt=""></div>
        </div>
    </div> -->
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
                        <h1 class="text-anime-style-2" data-cursor="-opaque"><?= $post[0]['title'] ?></h1>
                        <nav class="wow fadeInUp">
                            <!--<ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index-2.html">home</a></li>
                                <li class="breadcrumb-item"><a href="index-2.html">campaign</a></li>
                                <li class="breadcrumb-item active" aria-current="page">kids sports activity</li> 
                            </ol>-->
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Campaign Single Start -->
    <div class="page-campaign-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="campaign-single-content">
                        <!-- Campaign Featured Image Start -->
                        <div class="campaign-featured-image">
                            <figure class="image-anime reveal">
                                <img src="./admin/default/<?= !empty($post[0]['media']) ? explode("|", explode(";", $post[0]['media'])[0])[0] : 'images/default.jpg'; ?>" alt="Post Image" style="width: 100%; aspect-ratio: 16/9; object-fit: cover; border-radius: 0 0 40px 0">

                            </figure>
                        </div>
                        <!-- Campaign Featured Image End -->

                        <!-- Campaign Donate Box Start -->

                        <!-- Campaign Donate Box End -->

                        <!-- Campaign Entry Content Start -->
                        <div class="campaign-entry">
                            <h2 class="text-anime-style-2" data-cursor="-opaque"><?= $post[0]['title'] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s"><?= $post[0]['content'] ?></p>

                        </div>
                        <!-- Campaign Entry Content End -->


                        <!-- Post Tag Links Start -->
                        <div class="post-tag-links">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <!-- Post Tags Start -->
                                    <div class="post-tags wow fadeInUp" data-wow-delay="0.5s">
                                        <span class="tag-links">
                                            Tags:
                                            <?php
                                            if (!empty($post[0]['tags'])) {
                                                $tags = explode(',', $post[0]['tags']); // Split tags by comma
                                                foreach ($tags as $tag) {
                                                    $tagParts = explode('|', trim($tag)); // Split name and slug
                                                    if (count($tagParts) === 2) {
                                                        $tagName = htmlspecialchars($tagParts[0]);
                                                        $tagSlug = urlencode($tagParts[1]);
                                                        echo '<a href="blog.php?tag=' . $tagSlug . '">' . $tagName . '</a> ';
                                                    }
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <!-- Post Tags End -->
                                </div>

                                <div class="col-lg-4">
                                    <!-- Post Social Links Start -->
                                    <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
                                        <ul>
                                            <?php
                                            $postTitle = urlencode($post[0]['title']);
                                            $postSlug = urlencode($post[0]['post_slug']);
                                            $postUrl = "http://localhost/celz5/blog-details.php?post=" . $postSlug;

                                            $facebookShare = "https://www.facebook.com/sharer/sharer.php?u=$postUrl";
                                            $linkedinShare = "https://www.linkedin.com/shareArticle?mini=true&url=$postUrl&title=$postTitle";
                                            $twitterShare = "https://twitter.com/intent/tweet?url=$postUrl&text=$postTitle";
                                            ?>
                                            <li><a href="<?= $facebookShare ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                            <li><a href="<?= $linkedinShare ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                            <li><a href="<?= $twitterShare ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- Post Social Links End -->
                                </div>
                            </div>
                        </div>



                        <!-- Post Tag Links End -->
                    </div>
                </div>

                <div class="col-lg-4">
    <div class="campaign-single-sidebar">
        <div class="campaign-sidebar-title">
            <h3 class="wow fadeInUp"><span>Recent</span> Posts</h3>
            <p class="wow fadeInUp" data-wow-delay="0.25s">Check out our latest blog posts and stay updated.</p>
        </div>
        <div class="recent-posts">
        <?php
$recentPosts = $Controller->getRecentPosts();

if (!empty($recentPosts)) {
    foreach ($recentPosts as $post) {
        $postTitle = htmlspecialchars($post['title']);
        $postSlug = urlencode($post['slug']);
        $mediaParts = !empty($post['media']) ? explode("|", $post['media']) : [];
        $mediaPath = !empty($mediaParts[0]) ? $mediaParts[0] : 'images/default.jpg';
        $postDate = date("F j, Y", strtotime($post['created_at']));
?>
        <div class="recent-post-item">
            <div class="post-thumb">
                <a href="blog-details.php?post=<?= $postSlug; ?>">
                    <img src="./admin/default/<?= $mediaPath; ?>" alt="<?= $postTitle; ?>">
                </a>
            </div>
            <div class="post-info">
                <h4><a href="blog-details.php?post=<?= $postSlug; ?>"><?= $postTitle; ?></a></h4>
                <span class="post-date"><?= $postDate; ?></span>
            </div>
        </div>
<?php
    }
} else {
    echo "<p>No recent posts available.</p>";
}
?>

        </div>
    </div>
</div>

            </div>
        </div>
    </div>
    <!-- Page Campaign Single End -->

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

</html>