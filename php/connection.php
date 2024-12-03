<?php

// Konfigurasi koneksi database
$serverName = "LAPTOP-CQ7PSFUN"; // Nama server
$connectionInfo = array("Database" => "si_tata_tertib"); // Nama database
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Cek koneksi
if ($conn === false) {
    // Log error ke file
    logError(sqlsrv_errors());

    // Berikan pesan error kepada pengguna
    die("Terjadi kesalahan saat menghubungkan ke database. Silakan coba lagi.");
}else{
    echo "connected Succesfully!";
}

?>