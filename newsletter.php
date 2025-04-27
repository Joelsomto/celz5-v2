<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once('include/Controller.php');

$Controller = new Controller();

// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate if email is provided
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $data = [
            'email' => trim($_POST['email']) // Trim to remove extra spaces
        ];
        $Controller->newsletters($data);
    } else {
        // Handle the case where the email is not provided
        echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
    }
} else {
    // Reject any non-POST request for security
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
