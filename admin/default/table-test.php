<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>Service ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#datatable-buttons').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: './api/getService.php',
                    type: 'POST'
                },
                columns: [
                    { data: 'service_id' },
                    { data: 'title' },
                    { data: 'description' },
                    { data: 'category' },
                    { data: 'created_at' },
                    { data: 'status' }
                ]
            });
        });
    </script>
</body>
</html>
