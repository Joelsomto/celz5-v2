<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['service_id'], $_POST['status'])) {
    $service_id = intval($_POST['service_id']);
    $status = ($_POST['status'] === 'active') ? 'active' : 'inactive';

    $result = $Controller->updateServiceStatus($service_id, $status);

    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
