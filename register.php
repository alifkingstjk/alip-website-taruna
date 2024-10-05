<?php
include('config.php'); // Pastikan ini adalah file konfigurasi database

// Variabel untuk menyimpan pesan kesalahan atau sukses
$message = "";

// Cek apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($password)) {
        $message = 'Username dan password tidak boleh kosong.';
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk memasukkan data user ke tabel
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        // Prepare statement
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $username, $hashed_password);

            // Eksekusi statement
            if ($stmt->execute()) {
                $message = "Registrasi berhasil. <a href='login.html'>Login</a>";
            } else {
                $message = "Error saat eksekusi query: " . $stmt->error;
            }

            // Tutup statement
            $stmt->close();
        } else {
            $message = "Error saat prepare statement: " . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Registrasi Pengguna</h2>
        <?php if ($message): ?>
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
