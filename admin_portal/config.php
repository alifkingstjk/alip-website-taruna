<?php
$servername = "localhost"; // Nama server database, biasanya localhost
$username = "root"; // Username untuk mengakses database
$password = ""; // Jika tidak ada password, biarkan kosong
$dbname = "ketarunaan_db"; // Nama database yang Anda buat

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Uncomment the next line to see this message during successful connection
    // echo "Koneksi berhasil!";
}
?>
