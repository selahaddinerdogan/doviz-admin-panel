<?php
require_once __DIR__ . "/db_connect.php";

function sirketKaydet($id, $hakkinda, $adres, $email, $telefon)
{
    global $conn;

    // SQL injection'a karşı güvenli hale getir
    $hakkinda = $conn->real_escape_string($hakkinda);
    $adres    = $conn->real_escape_string($adres);
    $email    = $conn->real_escape_string($email);
    $telefon  = $conn->real_escape_string($telefon);

    if ($id === null) {
        // YENİ KAYIT
        $sql = "INSERT INTO sirket (hakkinda, adres, email, telefon)
                VALUES ('$hakkinda', '$adres', '$email', '$telefon')";
    } else {
        // GÜNCELLEME
        $id = (int)$id;
        $sql = "UPDATE sirket
                SET hakkinda = '$hakkinda',
                    adres = '$adres',
                    email = '$email',
                    telefon = '$telefon'
                WHERE id = $id";
    }

    return $conn->query($sql) === TRUE;
}

function sirketGetir()
{
    global $conn;

    $sql = "SELECT * FROM sirket LIMIT 1";
    return $conn->query($sql)->fetch_assoc();
}