<?php
    require_once __DIR__ ."/../functions/kullaniciFunctions.php";
    session_start();

    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre          = $_POST['sifre'];

    $kullanici = kullaniciGiris($kullanici_adi, $sifre);

    if ($kullanici) {
        $_SESSION['kullanici_id']   = $kullanici['id'];
        $_SESSION['kullanici_adi']  = $kullanici['kullanici_adi'];
        $_SESSION['adi']            = $kullanici['adi'];
        $_SESSION['soyadi']         = $kullanici['soyadi'];
        $_SESSION['admin']          = $kullanici['admin'];

        // Giriş başarılı → admin paneline yönlendir
        header("Location: ../dashboard/dashboard.php");
        exit;
    } else {
        echo "Kullanıcı adı veya şifre hatalı.";
    }
    ?>
