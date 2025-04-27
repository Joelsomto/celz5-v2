<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once('include/Controller.php');

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input
    $parent_id = filter_input(INPUT_POST, 'parent_id', FILTER_VALIDATE_INT);
    $service_id = filter_input(INPUT_POST, 'service_id', FILTER_VALIDATE_INT);
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $reply_text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

    // Check if all required fields are present and valid
    if ($parent_id && $service_id && $user_id && $reply_text) {
        $data = [
            'parent_id' => $parent_id,
            'service_id' => $service_id,
            'user_id' => $user_id,
            'comment_text' => $reply_text,
        ];

        // Submit the reply using the Controller
        $result = $Controller->submitReply($data);

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => 'Reply posted successfully.',
                'reply_id' => $result, // Return the ID of the new reply
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to post reply.',
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid or missing input.',
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.',
    ]);
}
?>
