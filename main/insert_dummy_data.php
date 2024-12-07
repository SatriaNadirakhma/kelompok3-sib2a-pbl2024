<?php
include 'config/database.php';

$conn->exec("INSERT INTO Users (username, password, role) VALUES
('123456', '" . password_hash('password1', PASSWORD_DEFAULT) . "', 'dosen'),
('654321', '" . password_hash('password2', PASSWORD_DEFAULT) . "', 'dosen'),
('20210001', '" . password_hash('password3', PASSWORD_DEFAULT) . "', 'mahasiswa'),
('20210002', '" . password_hash('password4', PASSWORD_DEFAULT) . "', 'mahasiswa')");


echo "Dummy data inserted successfully!";
?>
