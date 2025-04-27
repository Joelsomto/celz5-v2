<?php


function redirect_to($new_location){
    header("Location: ". $new_location);
    exit;
}


// Check authenticated user and confirm login
function confirm_login()
{
    // Check if the session is already set
    if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'U') {
        return true;
    }

    // If the session is not set, check if cookies exist
    if (isset($_COOKIE['user_id'])) {
        // Recreate the necessary session variables from cookies
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['role'] = $_COOKIE['role'] ?? null;
        $_SESSION['email'] = $_COOKIE['email'] ?? null;
        $_SESSION['first_name'] = $_COOKIE['first_name'] ?? null;
        $_SESSION['last_name'] = $_COOKIE['last_name'] ?? null;
        $_SESSION['title'] = $_COOKIE['title'] ?? null;
        $_SESSION['logged_in'] = true;

        return true;
    }

    // If neither session nor cookie exists, trigger modal or redirect to login page
    return false;
}


?>



