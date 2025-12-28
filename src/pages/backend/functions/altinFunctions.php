<?php
require_once __DIR__ . "/db_connect.php";

function altinKaydet($adi)
{
    global $conn;

    $adi = $conn->real_escape_string($adi);

    // Tarih otomatik olarak alınır
    $tarih = date("Y-m-d H:i:s");

    $sql = "INSERT INTO altin (adi, tarih)
            VALUES ('$adi', '$tarih')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

    $conn->close();
}

function altinlariGetir()
{
    global $conn;
    $sql = "SELECT id, adi, `tarih` 
                FROM altin
                ORDER BY `tarih` DESC";
    $result = $conn->query($sql);
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

// ------------------------------------
//  altin SİL
// ------------------------------------
function altinSil($id)
{
    global $conn;

    $id = intval($id);

    $sql = "DELETE FROM altin WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

function altinGetir($id)
{
    global $conn;

    $id = intval($id);

    $sql = "SELECT * FROM altin WHERE id = $id";
    return $conn->query($sql)->fetch_assoc();
}

// ------------------------------------
//  altin GÜNCELLE
// ------------------------------------
function altinGuncelle($id, $adi)
{
    global $conn;
    $adi = $conn->real_escape_string($adi);

    $sql = "UPDATE altin 
            SET adi='$adi'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

// ------------------------------------
//  altin FİYAT EKLEME
// ------------------------------------
function altinFiyatEkle($altin_id, $alis, $satis)
{
    global $conn;

    $altin_id = intval($altin_id);
    $alis = floatval($alis);
    $satis = floatval($satis);

    $tarih = date("Y-m-d H:i:s");

    $sql = "INSERT INTO altin_fiyat (altin_id, alis, satis, tarih)
            VALUES ($altin_id, $alis, $satis, '$tarih')";

    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}

function tumAltinFiyatListesi()
{
    global $conn;

    $sql = "
        SELECT 
            k.id,
            k.adi,
            f.alis,
            f.satis,
            f.tarih AS fiyat_tarih
        FROM altin k
        LEFT JOIN altin_fiyat f
            ON f.id = (
                SELECT id 
                FROM altin_fiyat 
                WHERE altin_id = k.id
                ORDER BY tarih DESC 
                LIMIT 1
            )
        ORDER BY k.id ASC
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

function getListesiDegisimOrani()
{
    global $conn;
    $sql = "
        SELECT 
            a.id,
            a.adi,

            -- Son fiyat
            f1.alis AS son_alis,
            f1.satis AS son_satis,
            f1.tarih AS son_tarih,

            -- Önceki fiyat
            f2.satis AS onceki_satis

        FROM altin a

        LEFT JOIN altin_fiyat f1
            ON f1.id = (
                SELECT id 
                FROM altin_fiyat
                WHERE altin_id = a.id
                ORDER BY tarih DESC
                LIMIT 1
            )

        LEFT JOIN altin_fiyat f2
            ON f2.id = (
                SELECT id 
                FROM altin_fiyat
                WHERE altin_id = a.id
                AND tarih < (
                    SELECT tarih 
                    FROM altin_fiyat
                    WHERE altin_id = a.id
                    ORDER BY tarih DESC
                    LIMIT 1
                )
                ORDER BY tarih DESC
                LIMIT 1
            )
        WHERE a.adi in ('Ons Altın', 'Gram Altın', 'Tam altın')
        ORDER BY a.id ASC
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {

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
function getTumListesiDegisimOrani()
{
    global $conn;
    $sql = "
        SELECT 
            a.id,
            a.adi,

            -- Son fiyat
            f1.alis AS son_alis,
            f1.satis AS son_satis,
            f1.tarih AS son_tarih,

            -- Önceki fiyat
            f2.satis AS onceki_satis

        FROM altin a

        LEFT JOIN altin_fiyat f1
            ON f1.id = (
                SELECT id 
                FROM altin_fiyat
                WHERE altin_id = a.id
                ORDER BY tarih DESC
                LIMIT 1
            )

        LEFT JOIN altin_fiyat f2
            ON f2.id = (
                SELECT id 
                FROM altin_fiyat
                WHERE altin_id = a.id
                AND tarih < (
                    SELECT tarih 
                    FROM altin_fiyat
                    WHERE altin_id = a.id
                    ORDER BY tarih DESC
                    LIMIT 1
                )
                ORDER BY tarih DESC
                LIMIT 1
            )
        ORDER BY a.id ASC
    ";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {

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

function getToplamAltin()
{
    global $conn;
    $sql = "SELECT COUNT(*) AS toplam FROM altin";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    return $row['toplam'];
}

?>
