<?php
include('config.php');

// Query to get gallery photos
$query = "SELECT * FROM galeri";
$result = $conn->query($query);

// Simpan semua nama file foto dalam array
$photos = [];
while ($row = $result->fetch_assoc()) {
    $photos[] = $row['photo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Portal Ketarunaan</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Styling untuk galeri dan slide */
        .slideshow-container {
            width: 100%;
            max-width: 700px;
            overflow: hidden; /* Sembunyikan bagian luar gambar */
            position: relative;
            margin: auto;
        }

        .slides {
            display: flex; /* Menggunakan flexbox untuk menata gambar */
            transition: transform 0.5s ease; /* Transisi saat menggeser gambar */
            width: 100%; /* Memastikan kontainer penuh */
        }

        .slide {
            min-width: 100%; /* Setiap slide mengambil 100% lebar kontainer */
        }

        .slide img {
            width: 100%;
            border-radius: 8px;
        }

        /* Judul gallery */
        .gallery-title {
            text-align: center; /* Pusatkan teks */
            font-size: 2em; /* Ukuran font */
            margin-bottom: 20px; /* Jarak bawah dari judul ke gambar */
            color: #333; /* Warna teks */
        }

        /* Tombol kembali ke home */
        .back-button {
            display: inline-block;
            margin: 20px 0;
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
    <header>
        <h1>Portal Ketarunaan</h1>
    </header>

    <main>
        <div class="container">
            <h1 class="gallery-title">Gallery</h1> <!-- Judul di sini -->
            <div class="slideshow-container">
                <div class="slides">
                    <!-- Gambar slide di sini -->
                    <?php foreach ($photos as $photo): ?>
                        <div class="slide">
                            <img src="uploads/<?php echo $photo; ?>" alt="Gallery Image">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Tombol Kembali ke Home -->
            <a href="http://localhost/alif/index.php" class="back-button">Kembali ke Home</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>

    <script>
        // Script untuk bergeser otomatis
        let currentIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = <?php echo count($photos); ?>; // Menghitung jumlah gambar

        function showNextSlide() {
            currentIndex++;
            if (currentIndex >= totalSlides) {
                currentIndex = 0; // Kembali ke slide pertama
            }
            const offset = -currentIndex * 100; // Menggeser ke kiri berdasarkan index saat ini
            slides.style.transform = `translateX(${offset}%)`; // Menggeser gambar
        }

        setInterval(showNextSlide, 3000); // Ubah slide setiap 3 detik
    </script>
</body>
</html>
