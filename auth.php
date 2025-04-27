<?php
require_once('include/Session.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();
$dbConnection = new DbConnection();
$conn = $dbConnection->getConnection();

// Helper function to save session values in cookies for 30 days
function saveSessionInCookies()
{
    foreach ($_SESSION as $key => $value) {
        setcookie($key, $value, time() + (30 * 24 * 60 * 60), "/", "", true, true);
    }
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'] ?? null;

        if ($action === 'register') {
            // Register user
            $data = [
                'title' => $_POST['title'] ?? '',
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'church_id' => $_POST['church_id'] ?? '',
                'cell' => $_POST['cell'] ?? ''
            ];

            // Validate inputs
            if (empty($data['title']) || empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['phone']) || empty($data['select_your_church']) || empty($data['cell'])) {
                echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
                exit;
            }

            $lastInsertedId = $Controller->registerUser($data);

            if ($lastInsertedId) {
                $role = 'U';
                $_SESSION['role'] = $role;
                $_SESSION['user_id'] = $lastInsertedId;
                $_SESSION['email'] = $data['email'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                $_SESSION['title'] = $data['title'];
                $_SESSION['logged_in'] = true;

                // Save session data to cookies
                saveSessionInCookies();

                echo json_encode(['status' => 'success', 'message' => 'Registration successful.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Registration failed.']);
            }
        } elseif ($action === 'login') {
            // Login user
            $email = $_POST['email'] ?? '';

            if (empty($email)) {
                echo json_encode(['status' => 'error', 'message' => 'Email is required.']);
                exit;
            }

            $isRegistered = $Controller->isUserRegistered($email, $conn);

            if ($isRegistered) {
                $user = $Controller->verifyUser($email);
                if ($user) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['title'] = $user['title'];
                    $_SESSION['logged_in'] = true;

                    // Save session data to cookies
                    saveSessionInCookies();

                    echo json_encode(['status' => 'success', 'message' => 'Login successful.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Invalid login credentials.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'User not registered.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid action.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
    }
}




?>
