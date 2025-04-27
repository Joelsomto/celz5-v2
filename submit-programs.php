<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

$getUpComingProgram = $Controller->getUpComingPrograms();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $program_id = $_POST['program_id'];

    if (!empty($user_id) && !empty($program_id)) {
        // Check if the user is already registered
        $isRegistered = $Controller->isProgramRegistered($user_id, $program_id);

        if ($isRegistered) {
            echo json_encode(['success' => false, 'message' => 'You are already registered for this program.']);
        } else {
            // Register the user for the program
            $data = [
                'user_id' => $user_id,
                'program_id' => $program_id
            ];
            $registrationId = $Controller->registrations($data);

            if ($registrationId) {
                echo json_encode(['success' => true, 'message' => 'Registration successful.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to register. Please try again later.']);
            }
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }
} 
?>