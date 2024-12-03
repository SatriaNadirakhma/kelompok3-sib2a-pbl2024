<?php
include '../../includes/header.php';
include '../../config/database.php';
session_start();

if ($_SESSION['role'] != 'dosen') {
    header('Location: /pages/login.php');
    exit;
}

echo "<h1>Daftar Tata Tertib</h1>";

$stmt = $conn->query("SELECT * FROM TataTertib");
$tata_tertib = $stmt->fetchAll();

echo "<ul>";
foreach ($tata_tertib as $rule) {
    echo "<li>{$rule['description']} (Category: {$rule['category']})</li>";
}
echo "</ul>";

include '../../includes/footer.php';
?>
