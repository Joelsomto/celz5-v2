<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyMCE Editor Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- TinyMCE CSS (Optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/skins/ui/oxide/content.min.css" rel="stylesheet">
</head>
<body>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">TinyMCE wysihtml5</h4>
                <p class="text-muted mb-0">Bootstrap-wysihtml5 is a javascript plugin that makes it easy to create simple, beautiful wysiwyg editors with the help of wysihtml5 and Twitter Bootstrap.</p>
            </div><!--end card-header-->
            <div class="card-body">
                <form method="post">
                    <textarea id="elm1" name="area"></textarea>
                </form>
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!-- end col -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- TinyMCE JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js"></script>
    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#elm1', // Target the textarea with ID 'elm1'
            height: 300, // Set the height of the editor
            menubar: true, // Disable the menubar
            plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount', // Add plugins
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help', // Configure toolbar
            content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; }', // Customize content style
        });
    </script>
</body>
</html>