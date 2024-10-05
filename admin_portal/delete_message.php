<?php
include('config.php');

// Ambil ID dari URL
$id = $_GET['id'];

// Siapkan query untuk menghapus pesan
$query = "DELETE FROM pesan WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

// Eksekusi query dan cek hasilnya
if ($stmt->execute()) {
    header("Location: admin_view_messages.php"); // Redirect setelah hapus
    exit();
} else {
    echo "Gagal menghapus pesan: " . $stmt->error;
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
