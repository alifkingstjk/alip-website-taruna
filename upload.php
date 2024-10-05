<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['photo'])) {
        $photo = $_FILES['photo']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);
        $uploadOk = 1;
        
        // Check if file is an image
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Upload file if no errors
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                // Insert photo path into database
                $query = "INSERT INTO galeri (photo) VALUES ('$photo')";
                if ($conn->query($query) === TRUE) {
                    echo "The file ". htmlspecialchars( basename( $photo)). " has been uploaded.";
                } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo - Portal Ketarunaan</title>
</head>
<body>
    <h1>Upload Photo</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
