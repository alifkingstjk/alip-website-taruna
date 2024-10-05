<?php
session_start();
include('config.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Hapus kegiatan jika tombol hapus diklik
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM kegiatan WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $delete_id);

    if ($delete_stmt->execute()) {
        echo "<script>alert('Kegiatan berhasil dihapus!'); window.location.href='admin_view_kegiatan.php';</script>";
    } else {
        echo "Gagal menghapus kegiatan: " . $delete_stmt->error;
    }
}

// Ambil semua kegiatan dari database
$query = "SELECT * FROM kegiatan";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan - Admin Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Daftar Kegiatan</h1>
    </header>
    <main>
        <h2>Daftar Kegiatan</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php while ($kegiatan = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $kegiatan['id']; ?></td>
                    <td><?php echo $kegiatan['nama_kegiatan']; ?></td>
                    <td><?php echo $kegiatan['tanggal']; ?></td>
                    <td><?php echo $kegiatan['deskripsi']; ?></td>
                    <td>
                        <a href="edit_kegiatan.php?id=<?php echo $kegiatan['id']; ?>">Edit</a>
                        <a href="?delete_id=<?php echo $kegiatan['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        <a href="http://localhost/alif/admin_portal/index.php">Kembali</a>
    </main>
    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
