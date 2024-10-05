<?php
session_start();
include('config.php');

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data kegiatan berdasarkan ID
    $query = "SELECT * FROM kegiatan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $kegiatan = $result->fetch_assoc();
} else {
    // Jika ID tidak ada, arahkan kembali ke halaman daftar kegiatan
    header("Location: admin_view_kegiatan.php");
    exit;
}

// Update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    $update_query = "UPDATE kegiatan SET nama_kegiatan = ?, tanggal = ?, deskripsi = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssi", $nama_kegiatan, $tanggal, $deskripsi, $id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='admin_view_kegiatan.php';</script>";
    } else {
        echo "Gagal memperbarui data: " . $update_stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan - Admin Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #003d66;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #003d66;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Edit Kegiatan</h1>
    </header>

    <main>
        <form action="" method="POST">
            <label for="nama_kegiatan">Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" value="<?php echo htmlspecialchars($kegiatan['nama_kegiatan']); ?>" required>
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" value="<?php echo htmlspecialchars($kegiatan['tanggal']); ?>" required>
            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" required><?php echo htmlspecialchars($kegiatan['deskripsi']); ?></textarea>
            <button type="submit">Perbarui Kegiatan</button>
        </form>
        <a href="admin_view_kegiatan.php">Kembali</a>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
