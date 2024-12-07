<?php
include '../../includes/header.php';
include '../../config/database.php';
session_start();

if ($_SESSION['role'] != 'dosen') {
    header('Location: /pages/login.php');
    exit;
}

echo "<h1>Welcome, Dosen</h1>";
echo "<p>Your ID: " . $_SESSION['user_id'] . "</p>";

include '../../includes/footer.php';
?>
