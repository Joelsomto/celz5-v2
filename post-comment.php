<?php
// Display errors for debugging (can be disabled in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once('include/Controller.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;


$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $service_id = filter_input(INPUT_POST, 'service_id', FILTER_VALIDATE_INT);
    $comment_text = filter_input(INPUT_POST, 'comment_text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $parent_id = filter_input(INPUT_POST, 'parent_id', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

    // Validate required fields
    if (!$user_id || !$service_id || !$comment_text) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid input. Ensure all required fields are filled and valid.'
        ]);
        exit;
    }

    // Prepare data for insertion
    $data = [
        'user_id' => $user_id,
        'service_id' => $service_id,
        'comment_text' => $comment_text,
        'parent_id' => $parent_id
    ];

    try {
        // Add the comment to the database
        $comment_id = $Controller->submitComments($data);

        if ($comment_id) {
            // Fetch user details to include in the response
            $user_details = $Controller->getUserDetails($user_id); // Assume this method exists in your `Controller` class

            if ($user_details) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Comment added successfully.',
                    'comment_id' => $comment_id,
                    'title' => $user_details[0]['title'] ?? '', // Use empty string if title is null
                    'first_name' => $user_details[0]['first_name'] ?? '' // Use empty string if first name is null
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Comment added, but user details could not be retrieved.'
                ]);
            }
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to add comment. Please try again later.'
            ]);
        }
    } catch (Exception $e) {
        // Handle unexpected errors
        echo json_encode([
            'success' => false,
            'message' => 'An error occurred while processing your request.',
            'error' => $e->getMessage() // Include error message for debugging
        ]);
    }
} 
?>
