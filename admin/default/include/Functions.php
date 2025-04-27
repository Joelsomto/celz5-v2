<?php
function redirect_to($new_location){
    header("Location: " . $new_location);
    exit;
}

function confirm_login()
{
    $current_file = basename($_SERVER['PHP_SELF']); // Get the current script name
    if ($current_file === 'login.php') {
        return; // Do not redirect if the user is already on the login page
    }

    if (isset($_SESSION['admin_id']) && $_SESSION['role'] === 'A') {
        return true;
    } else {
        $_SESSION['errorMsg'] = "Login required!";
        redirect_to("login.php");
    }
}

// Call confirm_login to enforce authentication
confirm_login();
?>
