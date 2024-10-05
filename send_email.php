<?php
include('config.php'); // Pastikan ini mengarah ke file config yang benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Siapkan query untuk menyimpan pesan
    $query = "INSERT INTO pesan (nama, email, pesan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $message);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        $responseMessage = "Pesan berhasil dikirim!";
    } else {
        $responseMessage = "Gagal mengirim pesan: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center; /* Memusatkan isi kontainer */
        }

        h1 {
            color: #333;
        }

        .response-message {
            margin: 20px 0;
            font-size: 1.2em;
            color: #007bff;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesan Kontak</h1>
        <div class="response-message">
            <?php if (isset($responseMessage)) echo $responseMessage; ?>
        </div>
        <a href="http://localhost/alif/index.php" class="back-button">Kembali ke Home</a>
    </div>
</body>
</html>
