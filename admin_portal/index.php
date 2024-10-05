<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            flex: 1;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Portal Ketarunaan - Admin</h1>
    </header>

    <main>
        <div class="container">
            <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Ini adalah halaman admin. Anda dapat mengelola konten dari sini.</p>

            <!-- Tombol Edit yang mengarahkan ke opsi tambah kegiatan, testimoni, dan pesan -->
            <h3>Pilih Opsi Edit:</h3>
            <a href="tambah_kegiatan.php" class="btn">Edit Kegiatan</a>
            <a href="edit_testimoni.php" class="btn">Edit Testimoni</a>
            <a href="admin_view_messages.php" class="btn">Edit Pesan</a>

            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>
