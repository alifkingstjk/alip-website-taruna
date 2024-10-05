<?php
include('config.php');

// Memproses form tambah testimoni
if(isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $testimoni = $_POST['testimoni'];

    // Query untuk memasukkan testimoni baru ke dalam database
    $insertQuery = "INSERT INTO alumni_testimonials (nama, testimoni) VALUES ('$nama', '$testimoni')";
    if($conn->query($insertQuery)) {
        header('Location: testimoni.php'); // Redirect ke halaman testimoni setelah sukses
        exit();
    } else {
        $error = "Gagal menambahkan testimoni: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Testimoni - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f3f5;
            color: #343a40;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 1.1em;
            color: #495057;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #6c757d;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        .error-message {
            color: red;
            font-size: 1em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Testimoni Alumni</h1>
        
        <?php if(isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label for="testimoni">Testimoni:</label>
                <textarea name="testimoni" required></textarea>
            </div>
            <button type="submit" name="tambah" class="btn">Tambah Testimoni</button>
        </form>

        <!-- Tombol Kembali ke Edit Testimoni -->
        <a href="edit_testimoni.php" class="btn btn-back">Kembali</a>
    </div>
</body>
</html>
