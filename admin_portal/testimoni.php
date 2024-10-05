<?php
include('config.php');

// Mengambil data testimoni untuk ditampilkan
$query = "SELECT * FROM alumni_testimonials";
$result = $conn->query($query);

// Pesan konfirmasi
$successMessage = '';
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $successMessage = 'Testimoni berhasil diperbarui atau ditambahkan!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Alumni - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f1f1;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.5em;
            color: #007bff;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
        }

        .btn-warning, .btn-danger {
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Styling for success message */
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            margin-bottom: 30px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Testimoni Alumni</h1>

        <!-- Pesan Sukses -->
        <?php if ($successMessage): ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <!-- Tombol Konfirmasi Testimoni -->
        <a href="index.php" class="btn" style="margin-bottom: 30px;">Konfirmasi Testimoni</a>

        <!-- Tampilkan Semua Testimoni -->
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
            <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($row['testimoni']); ?></p>
            <!-- Tombol Edit -->
            <a href="edit_testimoni.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
            <!-- Tombol Hapus -->
            <a href="hapus_testimoni.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">Hapus</a>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
