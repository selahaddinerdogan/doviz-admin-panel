<?php
require_once __DIR__ . "/db_connect.php";

function kurKaydet($kod, $adi)
{
    global $conn;

    // SQL için güvenli hale getir
    $kod = strtoupper($kod);
    $kod = $conn->real_escape_string($kod);
    $adi = $conn->real_escape_string($adi);

    // Tarih otomatik olarak alınır
    $tarih = date("Y-m-d H:i:s");

    $sql = "INSERT INTO kur (kod, adi, tarih)
            VALUES ('$kod', '$adi', '$tarih')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function kurlariGetir()
{
    global $conn;
    $sql = "SELECT id, kod, adi, `tarih` 
                FROM kur
                ORDER BY `tarih` DESC";
    $result = $conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// ------------------------------------
//  KUR SİL
// ------------------------------------
function kurSil($id)
{
    global $conn;

    $id = intval($id);

    $sql = "DELETE FROM kur WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

function kurGetir($id)
{
    global $conn;

    $id = intval($id);

    $sql = "SELECT * FROM kur WHERE id = $id";
    return $conn->query($sql)->fetch_assoc();
}

// ------------------------------------
//  KUR GÜNCELLE
// ------------------------------------
function kurGuncelle($id, $kod, $adi)
{
    global $conn;
    $id = intval($id);
    $kod = $conn->real_escape_string($kod);
    $adi = $conn->real_escape_string($adi);

    $sql = "UPDATE kur 
            SET kod='$kod', adi='$adi'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

// ------------------------------------
//  KUR FİYAT EKLEME
// ------------------------------------
function kurFiyatEkle($kur_id, $alis, $satis)
{
    global $conn;

    $kur_id = intval($kur_id);
    $alis = floatval($alis);
    $satis = floatval($satis);

    $tarih = date("Y-m-d H:i:s");

    $sql = "INSERT INTO kur_fiyat (kur_id, alis, satis, tarih)
            VALUES ($kur_id, $alis, $satis, '$tarih')";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

function tumKurFiyatListesi()
{
    global $conn;

    $sql = "
        SELECT 
            k.id,
            k.kod,
            k.adi,
            f.alis,
            f.satis,
            f.tarih AS fiyat_tarih
        FROM kur k
        LEFT JOIN kur_fiyat f
            ON f.id = (
                SELECT id 
                FROM kur_fiyat 
                WHERE kur_id = k.id
                ORDER BY tarih DESC 
                LIMIT 1
            )
        ORDER BY k.kod ASC
    ";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function getKurListesiSonFiyatlar()
{
    global $conn;
    $sql = "
        SELECT 
            k.id,
            k.kod,
            k.adi,
            f.alis,
            f.satis,
            f.tarih AS fiyat_tarih
        FROM kur k
        LEFT JOIN kur_fiyat f
            ON f.id = (
                SELECT id 
                FROM kur_fiyat 
                WHERE kur_id = k.id
                ORDER BY tarih DESC 
                LIMIT 1
            )
        ORDER BY k.kod ASC
    ";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function getKurListesiDegisimOrani()
{
    global $conn;
    $sql = "
        SELECT 
            k.id,
            k.kod,
            k.adi,

            -- Son fiyat
            f1.alis AS son_alis,
            f1.satis AS son_satis,
            f1.tarih AS son_tarih,

            -- Önceki fiyat
            f2.satis AS onceki_satis

        FROM kur k

        LEFT JOIN kur_fiyat f1
            ON f1.id = (
                SELECT id FROM kur_fiyat
                WHERE kur_id = k.id
                ORDER BY tarih DESC
                LIMIT 1
            )

        LEFT JOIN kur_fiyat f2
            ON f2.id = (
                SELECT id FROM kur_fiyat
                WHERE kur_id = k.id
                AND tarih < (
                    SELECT tarih FROM kur_fiyat
                    WHERE kur_id = k.id
                    ORDER BY tarih DESC
                    LIMIT 1
                )
                ORDER BY tarih DESC
                LIMIT 1
            )
        WHERE k.kod in ('EUR', 'USD', 'CHF', 'GBP')
        ORDER BY k.kod DESC
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {

        // Değişim oranı hesaplama
        if (!is_null($row['onceki_satis']) && $row['onceki_satis'] > 0) {
            $degisim = (($row['son_satis'] - $row['onceki_satis']) / $row['onceki_satis']) * 100;
        } else {
            $degisim = null;
        }

        $row['degisim_orani'] = number_format($degisim, 2);
        $data[] = $row;
    }

    return $data;
}
function getToplamKur()
{
    global $conn;

    $sql = "SELECT COUNT(*) AS toplam FROM kur";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['toplam'];
}
?>
