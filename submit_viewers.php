<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once('include/Controller.php');

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and fetch input data
    $user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;
    $service_id = isset($_POST['service_id']) ? intval($_POST['service_id']) : null;
    $viewers = isset($_POST['viewers']) ? intval($_POST['viewers']) : null;

    // Validate input
    if (!$user_id || !$service_id || !$viewers) {
        echo json_encode(["success" => false, "message" => "Invalid data provided."]);
        exit;
    }

    // Prepare data to pass to the controller
    $data = [
        'user_id' => $user_id,
        'service_id' => $service_id,
        'viewers' => $viewers
    ];

    // Call the controller method
    $result = $Controller->viewers($data);

    // Check and respond based on the result
    if ($result) {
        echo json_encode(["success" => true, "message" => "Viewers count updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update viewers count."]);
    }
    exit;
}
