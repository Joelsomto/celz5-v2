<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once('include/Controller.php');

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve and sanitize input
    $parent_id = filter_input(INPUT_GET, 'parent_id', FILTER_VALIDATE_INT);

    // Check if the parent_id is provided and valid
    if ($parent_id) {
        try {
            // Call a method in your Controller to fetch replies
            $replies = $Controller->getReplies($parent_id);

            if (!empty($replies)) {
                echo json_encode([
                    'status' => 'success',
                    'data' => $replies
                ]);
            } else {
                echo json_encode([
                    'status' => 'success',
                    'data' => [],
                    'message' => 'No replies found for this comment.'
                ]);
            }
        } catch (Exception $e) {
            // Handle exceptions and log the error
            error_log("Error fetching replies: " . $e->getMessage());
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to fetch replies. Please try again later.'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid or missing parent_id parameter.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>
