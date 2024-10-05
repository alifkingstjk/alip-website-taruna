<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Siapkan query untuk memperbarui pesan
    $query = "UPDATE pesan SET nama=?, email=?, pesan=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $name, $email, $message, $id);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        echo "Pesan berhasil diperbarui!";
    } else {
        echo "Gagal memperbarui pesan: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
    header("Location: admin_view_messages.php"); // Redirect setelah update
    exit();
}

// Ambil ID pesan dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data pesan berdasarkan ID
$query = "SELECT * FROM pesan WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$messageData = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesan - Admin Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Pesan</h1>
    </header>

    <main>
        <div class="container">
            <form action="edit_message.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $messageData['id']; ?>">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" value="<?php echo $messageData['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $messageData['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" rows="4" required><?php echo $messageData['pesan']; ?></textarea>
                </div>
                <button type="submit">Simpan Perubahan</button>
            </form>
            <a href="admin_view_messages.php" class="back-button">Kembali ke Daftar Pesan</a>
        </div>
    </main>
</body>
</html>
