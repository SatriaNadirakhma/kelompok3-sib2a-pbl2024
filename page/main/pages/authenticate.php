<?php
// Start session
session_start();

// Include the database connection file
include_once '../config/database.php'; // Ensure this path is correct

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Debugging: Log input data
    error_log("Username: $username, Password: $password");

    // Validate input
    if (empty($username) || empty($password)) {
        header('Location: /pages/login.php?error=Empty username or password');
        exit();
    }

    // Query to verify the user
    $sql = "SELECT * FROM Users WHERE username = ?";
    $params = array($username); // Parameters for the query

    // Debugging: Log SQL query
    error_log("SQL Query: $sql with params: " . print_r($params, true));

    // Prepare the statement
    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt) {
        // Execute the statement
        if (sqlsrv_execute($stmt)) {
            // Fetch the result
            $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            // Debugging: Log fetched user data
            error_log("Fetched User: " . print_r($user, true));

            // Check if the user exists and verify password
            if ($user && $password === $user['password']) { // Use password_verify() if passwords are hashed
                // Valid credentials, set session variables
                $_SESSION['user_id'] = $user['id_user'];
                $_SESSION['username'] = $user['username']; // Store username in session
                $_SESSION['role'] = $user['role']; // Store role in session

                // Debugging: Log successful login
                error_log("Login successful for user: " . $user['username']);

                // Redirect based on user role
                if ($user['role'] === 'dosen') {
                    header('Location: /project/pages/dosen/dashboard.php');
                } else if ($user['role'] === 'mahasiswa') {
                    header('Location: /project/pages/mahasiswa/dashboard.php');
                }
                exit();
            } else {
                // Debugging: Log mismatch reason
                if (!$user) {
                    error_log("User not found in the database.");
                } else {
                    error_log("Password mismatch for user: " . $username);
                }
                header('Location: /pages/login.php?error=Invalid credentials');
                exit();
            }
        } else {
            // Debugging: Log execution errors
            error_log("Execution error: " . print_r(sqlsrv_errors(), true));
            header('Location: /pages/login.php?error=Database error');
            exit();
        }
    } else {
        // Debugging: Log preparation errors
        error_log("Preparation error: " . print_r(sqlsrv_errors(), true));
        header('Location: /pages/login.php?error=Database preparation error');
        exit();
    }
} else {
    // Redirect to login if accessed without a POST request
    header('Location: /pages/login.php');
    exit();
}
?>
