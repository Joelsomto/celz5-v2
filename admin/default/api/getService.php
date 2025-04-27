<?php
require_once('../include/Session.php');
require_once('../include/Functions.php');
require_once('../include/Crud.php');
require_once("../include/Controller.php");

// Set headers for JSON response
header('Content-Type: application/json');

// Initialize the Controller
$Controller = new Controller();

// Get DataTables parameters from the POST request
$draw = isset($_POST['draw']) ? intval($_POST['draw']) : 0;
$start = isset($_POST['start']) ? intval($_POST['start']) : 0;
$length = isset($_POST['length']) ? intval($_POST['length']) : 10;
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : null;

try {
    // Fetch paginated data
    $services = $Controller->getServices($start, $length, $searchValue);

    // Get total number of records
    $totalRecords = $Controller->getCrud()->read("SELECT COUNT(*) AS total FROM services")[0]['total'];

    // Get total filtered records (considering search value)
    $filteredRecordsQuery = "
        SELECT COUNT(*) AS total 
        FROM services s
        WHERE 1=1 " . (!empty($searchValue) ? "AND (s.title LIKE :search OR s.description LIKE :search)" : "");
    $filteredRecordsParams = !empty($searchValue) ? [':search' => '%' . $searchValue . '%'] : [];
    $filteredRecords = $Controller->getCrud()->read($filteredRecordsQuery, $filteredRecordsParams)[0]['total'];

    // Prepare response data
    $response = [
        "draw" => $draw,
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $filteredRecords,
        "data" => $services
    ];

    echo json_encode($response);
} catch (Exception $e) {
    echo json_encode([
        "error" => true,
        "message" => $e->getMessage()
    ]);
}
?>
