<?php
session_start();
require_once __DIR__ . "/../functions/altinFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    if (altinSil($id)) {
        header("Location: altinlar.php");
    } else {
        echo "Silme sırasında hata oluştu!";
    }
}
?>