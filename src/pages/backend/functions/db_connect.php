<?php
    $servername = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "doviz"; // kendi veritabanı adını yaz

    // Bağlantı oluştur
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantı kontrolü
    if ($conn->connect_error) {
        die("Veritabanı bağlantı hatası: " . $conn->connect_error);
    }

    // Türkçe karakter desteği için
    $conn->set_charset("utf8mb4");







