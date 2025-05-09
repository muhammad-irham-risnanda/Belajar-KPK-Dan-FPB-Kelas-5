<?php
session_start();
session_destroy();
header('Location: login.php');
exit; // Pastikan untuk menghentikan eksekusi script setelah redirect
?>