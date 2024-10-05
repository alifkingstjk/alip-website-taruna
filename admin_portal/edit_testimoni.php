<?php
include('config.php');

// Mengambil data testimoni yang akan diedit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM alumni_testimonials WHERE id = $id";
    $result = $conn->query($query);
    $editRow = $result->fetch_assoc();
}

// Memproses form update
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $testimoni = $_POST['testimoni'];

    $updateQuery = "UPDATE alumni_testimonials SET nama='$nama', testimoni='$testimoni' WHERE id=$id";
    if ($conn->query($updateQuery)) {
        header('Location: testimoni.php');
        exit();
    }
}

// Proses Hapus Testimoni
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $deleteId = $_GET['id'];
    $deleteQuery = "DELETE FROM alumni_testimonials WHERE id = $deleteId";
    if ($conn->query($deleteQuery)) {
        header('Location: testimoni.php');
        exit();
    }
}

// Query untuk mengambil semua testimoni alumni
$query = "SELECT * FROM alumni_testimonials";
$result = $conn->query($query);
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
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        /* Styling form dan layout lainnya */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-warning { background-color: #ffc107; }
        .btn-danger { background-color: #dc3545; }

        /* Tombol kembali ke admin di sebelah kanan bawah */
        .btn-back {
            background-color: #6c757d;
            text-align: right;
        }

        .right-align {
            text-align: right;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Testimoni Alumni</h1>

        <!-- Tombol Tambah Testimoni -->
        <a href="tambah_testimoni.php" class="btn btn-success" style="margin-bottom: 20px;">Tambah Testimoni</a>

        <!-- Form Edit Testimoni -->
        <?php if (isset($editRow)): ?>
        <h2>Edit Testimoni</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" value="<?php echo htmlspecialchars($editRow['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label for="testimoni">Testimoni:</label>
                <textarea name="testimoni" required><?php echo htmlspecialchars($editRow['testimoni']); ?></textarea>
            </div>
            <button type="submit" name="update" class="btn">Update</button>
        </form>
        <?php endif; ?>

        <!-- Tampilkan Semua Testimoni -->
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($row['testimoni']); ?></p>
                <!-- Tombol Edit -->
                <a href="edit_testimoni.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                <!-- Tombol Hapus -->
                <a href="?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">Hapus</a>
            </div>
        </div>
        <?php endwhile; ?>

        <!-- Tombol Kembali ke Admin di kanan bawah -->
        <div class="right-align">
            <a href="http://localhost/alif/admin_portal/index.php" class="btn btn-back">Kembali ke Admin</a>
        </div>
    </div>
</body>
</html>
