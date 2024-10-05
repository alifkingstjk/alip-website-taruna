<?php
include('config.php');

// Query untuk mengambil data kegiatan
$query = "SELECT * FROM kegiatan";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #b3cde0, #0056b3); /* Background gradasi biru */
            color: #333; /* Warna teks */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #003d66; /* Warna header biru gelap */
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: white; /* Latar belakang konten putih */
            border-radius: 10px; /* Sudut bulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
        }

        h1 {
            text-align: center; /* Pusatkan judul */
            color: #0056b3; /* Warna judul biru */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Menghapus jarak antara sel tabel */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #007bff; /* Border biru pada sel */
        }

        th {
            background-color: #007bff; /* Latar belakang header tabel biru */
            color: white; /* Warna teks header tabel */
        }

        tr:nth-child(even) {
            background-color: #e7f3ff; /* Warna latar belakang untuk baris genap */
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
            text-align: center; /* Pusatkan teks pada tombol */
        }

        .back-button:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

        footer {
            background-color: #003d66; /* Warna footer biru gelap */
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Portal Ketarunaan</h1> <!-- Judul header -->
    </header>

    <main>
        <h1>Jadwal Kegiatan Ketarunaan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nama_kegiatan']; ?></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Tombol Kembali ke Home -->
        <a href="http://localhost/alif/index.php" class="back-button">Kembali ke Home</a>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>
