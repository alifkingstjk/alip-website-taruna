<?php
session_start();
$_SESSION = array(); // Kosongkan semua session
session_destroy(); // Hancurkan sesi
header("Location: login.php"); // Redirect ke halaman login
exit;
?>
