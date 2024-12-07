<?php
include '../../includes/header.php';
include '../../config/database.php';
session_start();

if ($_SESSION['role'] != 'mahasiswa') {
    header('Location: /project/pages/login.php');
    exit;
}

echo "<h1>Welcome, Mahasiswa</h1>";
echo "<p>Your ID: " . $_SESSION['user_id'] . "</p>";

include '../../includes/footer.php';
?>