<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Portal Ketarunaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        main {
            padding: 30px 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h1 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .card {
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: white;
        }
        label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: 0.3s;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        /* CSS untuk iframe map */
        #map {
            height: 400px;
            width: 100%;
            border: 0;
            border-radius: 10px;
            margin-top: 20px;
        }
        footer {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="color: black;">Portal Ketarunaan - Kontak Kami</h1>
    </header>

    <main>
        <div class="container">
            <div class="card">
                <h1>Kontak Kami</h1>
                <form action="send_email.php" method="POST">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-3">Kirim</button>
                </form>
                <a href="http://localhost/alif/index.php" class="btn btn-primary btn-block">Kembali ke Home</a>
            </div>
            
            <hr>
            <h2>Alamat Sekolah</h2>
            <p>SMKN 3 Yogyakarta, Jl. Contoh No. 123, Yogyakarta</p>
            <iframe
                id="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1142146448465!2d110.36330607438614!3d-7.777712677163283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58378e231e21%3A0x34bffdcc5d618a71!2sSMK%20Negeri%203%20Jogja!5e0!3m2!1sen!2sid!4v1727165241005!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Portal Ketarunaan SMKN 3 Yogyakarta</p>
    </footer>
</body>
</html>
