<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();
if (isset($_GET['ServiceId'])) {
    $service_id = $_GET['ServiceId'];

    $service = $Controller->getServiceByIdForViewServicePage($service_id);
    $viewers = $Controller->getParticipantsByServiceId($service_id);
    $getChurches = $Controller->getChurches();

    if ($service) {
        // Service exists, proceed normally
        // var_dump($service);
        // var_dump($viewers);
        // die();
    } elseif (!$service && !$viewers) {
        echo "Service not found.";
    }
} else {
    echo "No ServiceId provided.";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View Service - Admin </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico"><!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 25px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 25px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 3.5px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #4CAF50;
        }

        input:checked+.slider:before {
            transform: translateX(24px);
        }
    </style>
</head>

<body class="dark-sidenav"><!-- Left Sidenav -->
    <?php include_once('./components/leftSidenav.php') ?>
    <!-- end left-sidenav-->
    <div class="page-wrapper"><!-- Top Bar Start -->
        <?php include_once('./components/topbar.php') ?>
        <!-- Top Bar End --><!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid"><!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="row">
                                <div class="col">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">View Service</li>
                                    </ol>
                                </div><!--end col-->
                                <div class="col-auto align-self-center"><a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date"><span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Jan 11</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i> </a><a href="#" class="btn btn-sm btn-outline-primary"><i data-feather="download" class="align-self-center icon-xs"></i></a></div><!--end col-->
                            </div><!--end row-->
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row--><!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">View Service </h4>
                                    </div><!--end col-->
                                    <div class="col-auto">
                                        <!-- <div class="dropdown"><a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">This Month<i class="las la-angle-down ml-1"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Today</a> <a class="dropdown-item" href="#">Last Week</a> <a class="dropdown-item" href="#">Last Month</a> <a class="dropdown-item" href="#">This Year</a></div>
                                        </div> -->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-9 border-right">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="media"><i data-feather="cast" class="align-self-center icon-lg text-secondary"></i>

                                                    <div class="media-body align-self-center ml-2">
                                                        <h6 class="mt-0 mb-1 font-16"><?= $service[0]['title'] ?></h6>
                                                        <p class="text-muted mb-0">
                                                            <?= strlen($service[0]['description']) > 100 ? substr($service[0]['description'], 0, 100) . '...' : $service[0]['description']; ?>
                                                        </p>
                                                    </div><!--end media body-->
                                                </div>
                                            </div>
                                            <div class="col-auto"><a href="#moreDetails" type="button" class="btn btn-sm btn-outline-secondary px-3 mt-2">More details</a></div>
                                        </div>
                                        <div class="flot-data">
                                            <!-- <div id="CrmDashChart" class="flot-chart"></div> -->
                                            <!-- Video Player -->
                                            <video
                                                id="my-video"
                                                class="video-js vjs-default-skin"
                                                controls
                                                preload="auto"
                                                width="650"
                                                height="300"
                                                data-setup='{}'>
                                                <source src="<?= $service[0]['service_link'] ?>" type="application/x-mpegURL" id="main-source" />
                                            </video>

                                            <!-- Switcher Dropdown -->
                                            <select id="video-switcher" onchange="switchVideoSource()">
                                                <option value="main">Main Stream</option>
                                                <option value="backup">Backup Stream</option>
                                            </select>

                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-3">
                                        <!-- <span class="badge badge-soft-primary float-right"><i class="far fa-arrow-alt-circle-up mr-1"></i>30.2%</span> -->
                                        <!-- <div class="media">
                                            <div class="icon-info align-self-center"><i class="far fa-smile align-self-center icon-lg icon-dual"></i></div>
                                            <div class="media-body align-self-center text-truncate ml-2">
                                                <h3 class="mb-0 font-weight-bold">65k</h3>
                                                <p class="mb-0 text-muted">Happy Customers</p>
                                            </div>
                                        </div>
                                        <div class="apexchart-wrapper mt-3">
                                            <div id="dash_spark_1" class="chart-gutters"></div>
                                        </div> -->
                                        <hr class="hr-dashed">
                                        <!-- <span class="badge badge-soft-danger float-right"><i class="far fa-arrow-alt-circle-down mr-1"></i>1.1%</span> -->
                                        <div class="media">
                                            <div class="icon-info align-self-center"><i class="far fa-user align-self-center icon-lg icon-dual"></i></div>
                                            <div class="media-body align-self-center text-truncate ml-2">
                                                <h3 class="mb-0 font-weight-bold"><?= $service[0]['total_viewers'] ?></h3>
                                                <p class="mb-0 text-muted">Viewers</p>
                                            </div><!--end media-body-->
                                        </div>
                                        <!-- <div class="apexchart-wrapper mt-3">
                                            <div id="dash_spark_2" class="chart-gutters"></div>
                                        </div> -->
                                        <hr class="hr-dashed">

                                        <div class="media">
                                            <div class="icon-info align-self-center"></div>
                                            <div class="media-body align-self-center text-truncate ml-2">
                                                <!-- Toggle Switch -->
                                                <label class="switch">
                                                    <input type="checkbox" class="toggleSwitch" data-id="<?= $service[0]['service_id'] ?>" <?= ($service[0]['status'] == 'active') ? 'checked' : '' ?>>
                                                    <span class="slider"></span>
                                                </label>

                                                <p>Status: <span class="status-text" data-id="<?= $service[0]['service_id'] ?>">
                                                        <?= ucfirst($service[0]['status']) ?>
                                                    </span></p>
                                            </div>
                                        </div>
                                        <hr class="hr-dashed">
                                        <!-- <span class="badge badge-soft-primary float-right"><i class="far fa-arrow-alt-circle-up mr-1"></i>11.8%</span> -->
                                        <!-- <div class="media">
                                            <div class="icon-info align-self-center"><i class="far fa-registered align-self-center icon-lg icon-dual"></i></div>
                                            <div class="media-body align-self-center text-truncate ml-2">
                                                <h3 class="mb-0 font-weight-bold">901</h3>
                                                <p class="mb-0 text-muted">New Register</p>
                                            </div>
                                        </div> -->
                                        <!-- <div class="apexchart-wrapper mt-3">
                                            <div id="dash_spark_3" class="chart-gutters"></div>
                                        </div> -->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->



                <div class="row">
                    <!--  -->
                    <!--end col-->
                    <div class="col-lg-12" id="moreDetails">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Viewers</h4>
                                    </div><!--end col-->
                                    <div class="col-auto">
                                        <div class="dropdown"><a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">This Month<i class="las la-angle-down ml-1"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Today</a> <a class="dropdown-item" href="#">Last Week</a> <a class="dropdown-item" href="#">Last Month</a> <a class="dropdown-item" href="#">This Year</a> <a class="dropdown-item" href="#">All</a></div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Cell</th>
                                                <th>Church</th>
                                                <th>Viewers</th>
                                                <th>Role</th>
                                            </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                            <?php foreach ($viewers as $viewer): ?>
                                                <?php
                                                $churchName = '';
                                                foreach ($getChurches as $church) {
                                                    if ($church['id'] == $viewer['church_id']) {
                                                        $churchName = $church['name'];
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($viewer['first_name'] . ' ' . $viewer['last_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($viewer['email']); ?></td>
                                                    <td><?php echo htmlspecialchars($viewer['phone']); ?></td>
                                                    <td><?php echo htmlspecialchars($viewer['cell']); ?></td>
                                                    <td><?php echo htmlspecialchars($churchName); ?></td>
                                                    <td><?php echo htmlspecialchars($viewer['viewers']); ?></td>
                                                    <td>
                                                        <?php if ($viewer['role'] === 'A'): ?>
                                                            <span class="badge badge-md badge-success">Admin</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-md badge-light">User</span>
                                                        <?php endif; ?>
                                                    </td>

                                                </tr><!--end tr-->
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!-- container -->
            <?php include_once('./components/footer.php') ?>
        </div><!-- end page content -->
    </div><!-- end page-wrapper --><!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/simplebar.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/apex-charts/apexcharts.min.js"></script>
    <script src="../plugins/flot-chart/jquery.canvaswrapper.js"></script>
    <script src="../plugins/flot-chart/jquery.colorhelpers.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.saturated.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.browser.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.drawSeries.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.uiConstants.js"></script>
    <script src="../plugins/flot-chart/jquery.flot-dataType.js"></script>
    <script src="assets/pages/jquery.crm_dashboard.init.js"></script><!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Video.js Library -->
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script>
        // Initialize the video player
        const player = videojs('my-video');

        // Function to switch video sources
        function switchVideoSource() {
            const switcher = document.getElementById('video-switcher');
            const selectedSource = switcher.value;

            if (selectedSource === 'main') {
                // Switch to Main Stream
                player.src({
                    type: 'application/x-mpegURL',
                    src: "<?= $service[0]['service_link'] ?>"
                });
            } else if (selectedSource === 'backup') {
                // Switch to Backup Stream
                player.src({
                    type: 'application/x-mpegURL',
                    src: "<?= $service[0]['backup_service_link'] ?>"
                });
            }

            // Reload the player to apply the new source
            player.load();
            player.play();
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on("change", ".toggleSwitch", function() {
            let serviceId = $(this).data("id");
            let newStatus = $(this).is(":checked") ? "active" : "inactive";

            $.ajax({
    url: "update_status.php",
    type: "POST",
    data: {
        service_id: serviceId,
        status: newStatus
    },
    dataType: "json", // Ensure correct JSON handling
    success: function(response) {
        console.log(response); // Debugging
        if (response.success) {
            $(".status-text[data-id='" + serviceId + "']").text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1));
        } else {
            alert("Failed to update status!"); 
        }
    },
    error: function(xhr, status, error) {
        console.error("AJAX Error:", xhr.responseText);
        alert("Error updating status.");
    }
});

        });
    </script>
</body>

</html>