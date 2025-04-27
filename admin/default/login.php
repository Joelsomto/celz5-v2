<?php 
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    if (empty($email)) {
        $_SESSION['errorMsg'] = "Email is required!";
        header("Location: login.php");
        exit;
    }

    // Verify user credentials
    $user = $Controller->verifyUser($email);

    if ($user) {
        // Store user data in session
        $_SESSION['admin_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['logged_in'] = true;

        // Redirect based on user role
        if ($user['role'] === 'A') {
            // Admin dashboard
            header("Location: index.php");
        } else {
            // Non-admin dashboard
            header("Location: ../../index.php");
        }
        exit;
    } else {
        // Handle invalid credentials or errors
        $_SESSION['errorMsg'] = "Invalid login credentials!";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Admin </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico"><!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
</head>

<body class="account-body accountbg"><!-- Register page -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box">
                                <div class="text-center p-3"><a class='logo logo-admin' href='index.php'><img src="assets/images/celz5-logo.png" height="50" alt="logo" class="auth-logo"></a>
                                    <h4 class="mt-3 mb-1 font-weight-semibold text-white font-18">Let's Get Started</h4>
                                </div>
                            </div>
                            <?php 
                            echo errorMsg();
                            echo successMsg();
                            ?>
                            <div class="card-body">
                                <ul class="nav-border nav nav-pills" role="tablist">
                                    <li class="nav-item"><a class="nav-link font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab"></a></li>
                                    <li class="nav-item"><a class="nav-link active font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab"></a></li>
                                </ul><!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                        <form class="form-horizontal auth-form my-4" action="" method="post">
                                            <div class="form-group"><label for="email">Email</label>
                                                <div class="input-group mb-3"><input type="text" class="form-control" name="email" id="email" placeholder="Enter email"></div>
                                            </div><!--end form-group-->
                                            
                                            
                                            <div class="form-group row mt-4">
                                                <div class="col-sm-6">
                                                    <div class="custom-control custom-switch switch-success"><input type="checkbox" class="custom-control-input" id="customSwitchSuccess2"> <label class="custom-control-label text-muted" for="customSwitchSuccess2">Remember me</label></div>
                                                </div><!--end col-->

                                            </div><!--end form-group-->
                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-2"><button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button></div><!--end col-->
                                            </div><!--end form-group-->
                                        </form><!--end form-->
                                       
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div><!--end card-body-->
                            <div class="card-body bg-light-alt text-center"><span class="text-muted d-none d-sm-inline-block">Celz5 © 2025</span></div>
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container--><!-- End Register page --><!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
</body>

</html>