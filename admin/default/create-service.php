<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

$getCategories = $Controller->getCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get the form values
  $title = trim($_POST['title']);
  $description = trim($_POST['description']);
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'] ?: null; // If end_time is empty, set it to null
  $service_link = trim($_POST['service_link']);
  $backup_service_link = trim($_POST['backup_service_link']) ?: null; 
  $status = trim($_POST['status']) ;
  $category_id = $_POST['category'];

  // Validate inputs
  if (empty($title) || empty($description) || empty($start_time) || empty($service_link) || empty($category_id)) {
    $_SESSION['errorMsg'] = 'Please fill in all required fields!';
    header('Location: create-service.php');
    exit();
  }

  if (!preg_match('/^(2[0-3]|[01]?[0-9]):[0-5][0-9]$/', $start_time)) {
    $_SESSION['errorMsg'] = "Invalid start time format.";
    header('Location: create-service.php');
    exit();
  }

  if ($end_time && !preg_match('/^(2[0-3]|[01]?[0-9]):[0-5][0-9]$/', $end_time)) {
    $_SESSION['errorMsg'] = "Invalid end time format.";
    header('Location: create-service.php');
    exit();
  }

  // Generate the slug
  function createSlug($string)
  {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string); // Remove special characters
    $string = preg_replace('/[\s-]+/', '-', $string); // Replace spaces and dashes with single dash
    return trim($string, '-'); // Trim any trailing dashes
  }

  $slug = createSlug($title);

  // Prepare data to pass to the controller
  $data = [
    'title' => $title,
    'description' => $description,
    'start_time' => $start_time,
    'end_time' => $end_time,
    'service_link' => $service_link,
    'backup_service_link' => $backup_service_link,
    'status' => $status,
    'category_id' => $category_id,
    'slug' => $slug, // Include the generated slug
  ];

  try {
    // Call the controller method to create the service
    $Controller->createService($data);

    // Success message
    $_SESSION['successMsg'] = 'Service added successfully!';

    // Redirect to the services page or another page of your choice
    header('Location: create-service.php');
    exit();
  } catch (Exception $e) {
    // Handle any exceptions during the process
    $_SESSION['errorMsg'] = 'Error creating service: ' . $e->getMessage();
    header('Location: create-service.php');
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Create Service - Admin </title>
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
                  <h4 class="page-title">Create Service</h4>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0);">Admin</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0);">Page</a>
                    </li>
                    <li class="breadcrumb-item active">Create Service</li>
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
                <h4 class="card-title">Create Service</h4>
                <p class="text-muted mb-0">
                  <!-- Kindly Complete -->
                </p>
              </div>
              <!--end card-header-->
              <div class="card-body">

                <form class="form-parsley" action="" method="post" id="time-form">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="" />
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" rows="5" name="description" class="form-control" required placeholder="Description"></textarea>
                  </div>

                  <!--end form-group-->
                  <div class="form-group">
                    <label>Start Time</label>
                    <div>
                      <input
                        name="start_time"
                        type="text"
                        class="form-control time-picker"
                        required
                        placeholder="12:00 AM" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label>End Time <small style="color:red">Optional</small></label>
                    <div>
                      <input
                        name="end_time"
                        type="text"
                        class="form-control time-picker"
                        placeholder="12:00 AM" />
                    </div>
                  </div>

                  <!--end form-group-->
                  <div class="form-group">
                    <label>Service Link</label>
                    <input name="service_link" type="text" class="form-control" required="" placeholder="URL" />
                  </div>
                  <!--end form-group-->
                  <div class="form-group">
                    <label>Backup Service Link <small style="color:red">Optional</small> </label>
                    <input type="text" name="backup_service_link" class="form-control" placeholder="URL" />
                  </div>
                  <?php
                  // Backend check for categories
                  if (empty($getCategories)) {
                    echo "<script>
            alert('No categories available. Please create a category on the category page.');
            window.location.href = 'create-categories.php';
          </script>";
                    exit();
                  }
                  ?>
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required placeholder="">
                      <option value="0" selected disabled>Select </option>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" required placeholder="">
                      <option value="0" selected disabled>Select Category</option>
                      <?php foreach ($getCategories as $category) { ?>
                        <option value="<?= $category['cat_id'] ?>"><?= $category['category'] ?></option>
                      <?php } ?>
                    </select>
                    <small style="color:red">Create a new category <a href="./create-categories.php" target="_blank" rel="noopener noreferrer">here</a> </small>

                  </div>


                  <!--end form-group-->
                  <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                      Submit
                    </button>
                    <button type="reset" class="btn btn-danger waves-effect">
                      Cancel
                    </button>
                  </div>
                  <!--end form-group-->
                </form>
                <!--end form-->
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!-- end col -->

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
  <!-- end page-wrapper -->




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
  <!-- jQuery  -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <script>
    flatpickr(".time-picker", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "h:i K", // Keep 12-hour format with AM/PM
      time_24hr: false
    });

    document.getElementById("time-form").addEventListener("submit", function(event) {
      const startTimeInput = document.querySelector('input[name="start_time"]');
      const endTimeInput = document.querySelector('input[name="end_time"]');

      if (startTimeInput.value) {
        startTimeInput.value = convertTo24HourFormat(startTimeInput.value);
      }
      if (endTimeInput.value) {
        endTimeInput.value = convertTo24HourFormat(endTimeInput.value);
      }
    });

    function convertTo24HourFormat(timeStr) {
      const [time, modifier] = timeStr.split(" ");
      let [hours, minutes] = time.split(":");

      if (modifier.toLowerCase() === "pm" && hours !== "12") {
        hours = parseInt(hours, 10) + 12;
      } else if (modifier.toLowerCase() === "am" && hours === "12") {
        hours = "00";
      }

      return `${hours}:${minutes}`;
    }
  </script>

</body>

</html>