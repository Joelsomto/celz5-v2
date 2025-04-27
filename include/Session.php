<?php
ob_start();
session_start();

// Function to display error messages
function errorMsg()
{
    if (isset($_SESSION['errorMsg']) && !empty($_SESSION['errorMsg'])) {
        $message = $_SESSION['errorMsg'];
        $_SESSION['errorMsg'] = null;
        return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    $message
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
    return ""; // Return an empty string if no error message
}

// Function to display success messages
function successMsg()
{
    if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
        $message = $_SESSION['successMsg'];
        $_SESSION['successMsg'] = null;
        return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success:</strong> $message
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
}
function infoMsg()
{
    if (isset($_SESSION['infoMsg']) && !empty($_SESSION['infoMsg'])) {
        $message = $_SESSION['infoMsg'];
        $_SESSION['infoMsg'] = null;
        return "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <strong>$message</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
    }
}

?>

