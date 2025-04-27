<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();
$getBlogCategories = $Controller->getBlogCategories();
$getTags = $Controller->getTags();
// var_dump($getBlogCategories);
// var_dump($getTags);
// $Controller->blog_media($data);
// $Controller->posts($data);
// $Controller->post_tags($data);
// // die();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Create Post - Admin </title>
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
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


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
                                    <h4 class="page-title">Create Post</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blog</a></li>
                                        <li class="breadcrumb-item active">Create Post</li>
                                    </ol>
                                </div><!--end col-->
                                <div class="col-auto align-self-center"><a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date"><span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Jan 11</span> <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i> </a><a href="#" class="btn btn-sm btn-outline-primary"><i data-feather="download" class="align-self-center icon-xs"></i></a></div><!--end col-->
                            </div><!--end row-->
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row--><!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <?php
                        echo successMsg();
                        echo errorMsg();
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Editor</h4>
                                <!-- <p class="text-muted mb-0">A lightweight, modern WYSIWYG editor perfect for blogging.</p> -->
                            </div><!--end card-header-->
                            <div class="card-body">
                                <form method="post" action="submit-blog.php" enctype="multipart/form-data" onsubmit="return submitForm()">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category[]" id="categorySelect" class="form-control" multiple required>
                                            <?php foreach ($getBlogCategories as $category): ?>
                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small style="color:red">Create a new category <a href="./create-blog-categories.php" target="_blank" rel="noopener noreferrer">here</a></small>
                                    </div>

                                    <div id="editor" style="height: 300px;"></div>
                                    <textarea name="content" id="hiddenContent" style="display:none;"></textarea>

                                    <div class="form-group">
                                        <label>Tags</label>
                                        <select name="tags[]" id="tagsSelect" class="form-control" multiple required>
                                            <?php foreach ($getTags as $tag): ?>
                                                <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small style="color:red">Create a new tag <a href="./create-blog-tag.php" target="_blank" rel="noopener noreferrer">here</a></small>
                                    </div>

                                    <div class="form-group">
                                        <label>Upload Media</label>
                                        <input type="file" name="media[]" class="form-control" multiple>
                                    </div>

                                    <div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-secondary mt-3" name="status" value="draft">Save to Draft</button>
    <button type="submit" class="btn btn-primary mt-3" name="status" value="published">Publish</button>
</div>
                                </form>




                            </div><!--end card-body-->
                        </div><!--end card-->
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
    <script src="../plugins/daterangepicker/daterangepicker.js"></script><!--Wysiwig js-->
    <script src="../plugins/tinymce/tinymce.min.js"></script>
    <script src="assets/pages/jquery.form-editor.init.js"></script><!-- App js -->
    <script src="assets/js/app.js"></script>
    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Start writing your blog post here...',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    ['link', 'image', 'blockquote', 'code-block'],
                    [{
                        align: []
                    }, {
                        color: []
                    }, {
                        background: []
                    }],
                    ['clean'] // remove formatting
                ]
            }
        });

        // Submit the form with Quill content
        function submitForm() {
            document.getElementById('hiddenContent').value = quill.root.innerHTML;
            return true; // Allow form submission
        }
    </script>

    <!-- Include jQuery & Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tagsSelect').select2({
                placeholder: "Select Tags",
                allowClear: true,
                width: "100%"
            });
        });
        $(document).ready(function() {
            $('#categorySelect').select2({
                placeholder: "Select Category",
                allowClear: true,
                width: "100%"
            });
        });
    </script>

</body>

</html>