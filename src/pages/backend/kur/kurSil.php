<?php
session_start();
require_once __DIR__ . "/../functions/kurFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}

$kurlar = [];
if ($_SESSION['admin'] == 1) {
    $kurlar = kurlariGetir();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    if (kurSil($id)) {
        header("Location: altinlar.php");
    } else {
        echo "Silme sırasında hata oluştu!";
    }
}
?>