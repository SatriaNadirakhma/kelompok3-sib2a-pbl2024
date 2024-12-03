<?php
include '../../includes/header.php';
include '../../config/database.php';
session_start();

if ($_SESSION['role'] != 'dosen') {
    header('Location: /pages/login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $violation_details = $_POST['violation_details'];
    $proof = $_POST['proof'];

    $stmt = $conn->prepare("INSERT INTO Laporan (id_mahasiswa, id_dosen, violation_details, proof) VALUES (:id_mahasiswa, :id_dosen, :violation_details, :proof)");
    $stmt->bindParam(':id_mahasiswa', $id_mahasiswa);
    $stmt->bindParam(':id_dosen', $_SESSION['user_id']);
    $stmt->bindParam(':violation_details', $violation_details);
    $stmt->bindParam(':proof', $proof);
    $stmt->execute();

    echo "<p>Laporan berhasil dibuat.</p>";
}
?>

<form method="POST">
    <label for="id_mahasiswa">Mahasiswa ID:</label>
    <input type="number" name="id_mahasiswa" required>
    <label for="violation_details">Violation Details:</label>
    <textarea name="violation_details" required></textarea>
    <label for="proof">Proof:</label>
    <input type="text" name="proof">
    <button type="submit">Submit</button>
</form>

<?php
include '../../includes/footer.php';
?>
