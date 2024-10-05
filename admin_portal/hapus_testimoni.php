<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM alumni_testimonials WHERE id = $id";
    
    if ($conn->query($deleteQuery)) {
        header('Location: testimoni.php');
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID testimoni tidak ditemukan.";
}
?>
