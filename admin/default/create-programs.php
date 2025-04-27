<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input values
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $start_date = trim($_POST['start_date']);
    $end_date = trim($_POST['end_date']);

    // Validate the input
    if (empty($name)) {
        $_SESSION['errorMsg'] = 'Name cannot be empty!';
        header('Location: create-programs.php');
        exit();
    }

    if (empty($description)) {
        $_SESSION['errorMsg'] = 'Description cannot be empty!';
        header('Location: create-programs.php');
        exit();
    }

    if (empty($start_date)) {
        $_SESSION['errorMsg'] = 'Start date cannot be empty!';
        header('Location: create-programs.php');
        exit();
    }

    if (empty($end_date)) {
        $_SESSION['errorMsg'] = 'End date cannot be empty!';
        header('Location: create-programs.php');
        exit();
    }

    if (strtotime($start_date) > strtotime($end_date)) {
        $_SESSION['errorMsg'] = 'Start date cannot be later than the end date!';
        header('Location: create-programs.php');
        exit();
    }

    $data = [
        'name' => $name,
        'description' => $description,
        'start_date' => $start_date,
        'end_date' => $end_date
    ];

    try {
        // Call the controller to create the program
        $Controller->createPrograms($data);

        // Success message
        $_SESSION['successMsg'] = 'Program added successfully!';
        header('Location: create-programs.php');
        exit();
    } catch (Exception $e) {
        $_SESSION['errorMsg'] = 'Error creating program: ' . $e->getMessage();
        header('Location: create-programs.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Create Programs - Admin </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="dark-sidenav">
    <!-- Left Sidenav -->
    <?php include_once('./components/leftSidenav.php') ?>

    <!-- end left-sidenav-->
    <div class="page-wrapper">
        <!-- Top Bar Start -->
        <?php include_once('./components/topbar.php') ?>

        <!-- Top Bar End --><!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Create Programs</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);">Admin</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="javascript:void(0);">Pages</a>
                                        </li>
                                        <li class="breadcrumb-item active">Create Programs</li>
                                    </ol>
                                </div>
                                <!--end col-->
                                <div class="col-auto align-self-center">
                                    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date"><span class="day-name"
                                            id="Day_Name">Today:</span>&nbsp;
                                        <span class="" id="Select_date">Jan 11</span>
                                        <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i> </a><a href="#"
                                        class="btn btn-sm btn-outline-primary"><i data-feather="download"
                                            class="align-self-center icon-xs"></i></a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row--><!-- end page title end breadcrumb -->

                <!--end row-->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        echo successMsg();
                        echo errorMsg();
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Programs</h4>

                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <form class="form-parsley" action="create-programs.php" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" required placeholder="Enter program name" />
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" required class="form-control" rows="5" placeholder="Enter program description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input name="start_date" type="date" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input name="end_date" type="date" class="form-control" required />
                                    </div>

                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                        <button type="reset" class="btn btn-danger waves-effect">Cancel</button>
                                    </div>
                                </form>

                                <!--end form-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- container -->
            <?php include_once('./components/footer.php') ?>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper --><!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Parsley js -->
    <script src="../plugins/parsleyjs/parsley.min.js"></script>
    <script src="assets/pages/jquery.validation.init.js"></script>
    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>