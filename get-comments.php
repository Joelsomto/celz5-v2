<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

// Ensure the service_id is retrieved securely
$service_id = isset($_GET['service_id']) ? intval($_GET['service_id']) : 0;

// Check if service_id is valid
if ($service_id > 0) {
    // Call the getComments method with the service_id
    $getComments = $Controller->getComments($service_id);
    
    // Return the comments as JSON
    echo json_encode($getComments);
} else {
    // Handle invalid service_id
    echo json_encode(["error" => "Invalid or missing service ID."]);
}
?>
