<?php
include('config.php');

// Query untuk mengambil testimoni alumni
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
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #007bff;
            text-align: center;
            margin-bottom: 40px;
        }

        .card {
            display: flex;
            flex-direction: column;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.8rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
        }

        .back-button {
            display: inline-block;
            margin: 30px 0;
            padding: 12px 25px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            font-size: 1.2rem;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #f8f9fa;
            padding: 15px 0;
            text-align: center;
            margin-top: 50px;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <h1>Portal Ketarunaan</h1>
    </header>

    <main>
        <div class="container">
            <h1>Testimoni Alumni Ketarunaan</h1>
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($row['testimoni']); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <a href="http://localhost/alif/index.php" class="back-button">Kembali ke Home</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>
