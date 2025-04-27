<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ongoing Services - Admin </title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta content="" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico"><!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css"><!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"><!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
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
                                    <h4 class="page-title">Ongoing Services</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Ongoing Services</li>
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
                            <div class="card-header"> <!-- Add padding to the card header -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title mb-0">DataTable</h4>
                                    <div class="nav-link">
                                        <a class="btn btn-sm btn-soft-primary" href="./create-service.php" role="button">
                                            <i class="fas fa-plus mr-2"></i>New Service
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Viewers</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->


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
    <script src="../plugins/daterangepicker/daterangepicker.js"></script><!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script><!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables/jszip.min.js"></script>
    <script src="../plugins/datatables/pdfmake.min.js"></script>
    <script src="../plugins/datatables/vfs_fonts.js"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"></script>
    <script src="../plugins/datatables/buttons.print.min.js"></script>
    <script src="../plugins/datatables/buttons.colVis.min.js"></script><!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="assets/pages/jquery.datatable.init.js"></script><!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- <script>
        $(document).ready(function () {
    // Initialize the DataTable only once
    const table = $('#datatable-buttons').DataTable({
        order: [[5, 'desc']], // Sort by the "Created At" column in descending order
        columnDefs: [
            { orderable: false, targets: [0, 6] } // Disable ordering for "No." and "Action" columns
        ]
    });

    function updateTable(data) {
        // Clear the current rows
        table.clear();

        // Map API response to table columns and add action buttons
        const formattedData = data.map((item, index) => [
            item.title, // Title
            item.total_viewers, // Total viewers
            item.category, // Category
            item.status, // Status
            item.created_at, // Created At
            `
            <div class="action-buttons">
                <button class="btn btn-info btn-sm" onclick="viewInfo(${item.service_id})">More Info</button>
                <button class="btn btn-warning btn-sm" onclick="editService(${item.service_id})">Edit</button>
                <button class="btn btn-danger btn-sm" onclick="deleteService(${item.service_id})">Delete</button>
            </div>
            `
        ]);

        // Add the formatted data to the table
        table.rows.add(formattedData);

        // Redraw the table
        table.draw();
    }

    function fetchData() {
        $.ajax({
            url: 'http://localhost/celz5/admin/default/api/getService.php', // Replace with your API endpoint
            type: 'POST',
            data: {
                start: 0, // Example: Fetch from the first record
                length: 10, // Example: Fetch 10 records
                searchValue: null // Optional: Add search value
            },
            success: function (response) {
                if (response && response.data) {
                    updateTable(response.data);
                } else {
                    console.error('No data received from the server.');
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch data:', error);
            }
        });
    }

    // Fetch and populate data
    fetchData();
});



    </script> -->

    <script>
$(document).ready(function () {
    let table; // Declare table variable outside initialization scope

    // Check if DataTable is already initialized
    if ($.fn.dataTable.isDataTable('#datatable-buttons')) {
        // If already initialized, destroy the existing instance
        $('#datatable-buttons').DataTable().destroy();
    }

    // Initialize DataTable
    table = $('#datatable-buttons').DataTable({
        order: [], // Disable initial sorting (data is already sorted by the API)
        columnDefs: [
            { orderable: false, targets: [0, 5] } // Disable ordering for "No." and "Action" columns
        ]
    });

    function updateTable(data) {
        // Clear the table
        table.clear();

        // Map API data to table rows
        const formattedData = data.map((item) => [
            item.title,
            item.total_viewers,
            item.category,
            item.status,
            item.created_at, // Ensure this is in a sortable format (e.g., ISO 8601)
            `
            <div class="action-buttons">
                <a href="./view-service.php?ServiceId=${item.service_id}" class="btn btn-info btn-sm">View</a>
                <a href="./edit-service.php?ServiceId=${item.service_id}" class="btn btn-warning btn-sm">Edit</a>
            </div>
            `
        ]);

        // Add rows to the table
        table.rows.add(formattedData).draw();
    }

    function fetchData() {
        $.ajax({
            url: './api/getOngoingService.php', // Use the correct API URL
            type: 'POST',
            data: {
                start: 0,
                length: 10,
                searchValue: null
            },
            success: function (response) {
                if (response?.data) {
                    // Log the API response for debugging
                    console.log("API Response:", response);

                    // Update the table with the sorted data
                    updateTable(response.data);
                } else {
                    console.error('No data received');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    // Fetch and populate data
    fetchData();
});
</script>
</body>

</html>