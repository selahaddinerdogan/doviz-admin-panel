<?php
    require_once __DIR__ ."/../functions/kullaniciFunctions.php";

    $kullanici_adi = $_POST['kullanici_adi'];
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $sifre = $_POST['sifre'];
    $mail = $_POST['mail'];
    $adres = $_POST['adres'];

    if (kullaniciEkle($kullanici_adi, $adi, $soyadi, $sifre, $mail, $adres)) {
        echo "Kayıt başarıyla eklendi.";
    } else {
        echo "Kayıt sırasında hata oluştu.";
    }
?>
