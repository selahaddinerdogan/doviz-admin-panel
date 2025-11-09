<?php
    require_once __DIR__ . "/db_connect.php";

    /**
     * Yeni kullanıcı ekler
     */
    function kullaniciEkle($kullanici_adi, $adi, $soyadi, $sifre, $mail, $adres, $admin = 0)
    {
        global $conn;

        // Şifreyi hashle
        $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);

        // Şu anki zamanı al (PHP sunucusundan)
        $kayit_tarih = date('Y-m-d H:i:s');

        // SQL sorgusu (artık kayit_tarih da eklendi)
        $sql = "INSERT INTO kullanicilar 
                (kullanici_adi, adi, soyadi, sifre, mail, adres, admin, `kayit tarih`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // 7 string + 1 datetime olduğu için 7 s + 1 s = toplam "ssssssis"
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssis", $kullanici_adi, $adi, $soyadi, $sifre_hash, $mail, $adres, $admin, $kayit_tarih);

        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Kayıt hatası: " . $stmt->error);
            return false;
        }

        $stmt->close();
    }

    function kullaniciGiris($kullanici_adi, $sifre)
    {
        global $conn;

        $sql = "SELECT id, kullanici_adi, adi, soyadi, sifre, mail, admin FROM kullanicilar WHERE kullanici_adi = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $kullanici_adi);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Şifre kontrolü
            if (password_verify($sifre, $user['sifre'])) {
                return $user; // Giriş başarılı → kullanıcı bilgilerini döndür
            }
        }

        return false; // Giriş başarısız
    }

    function kullanicilariGetir()
    {
        global $conn;
        $sql = "SELECT id, kullanici_adi, adi, soyadi, mail, adres, admin, `kayit tarih` 
                FROM kullanicilar
                ORDER BY `kayit tarih` DESC";
        $result = $conn->query($sql);
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
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

    ?>
