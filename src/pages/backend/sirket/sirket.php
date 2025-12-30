<?php

session_start();
require_once __DIR__ . "/../functions/sirketFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if ($_SESSION['admin'] != 1 || !isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // id boş gelirse NULL yap (yeni kayıt için)
    $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;

    $hakkinda = $_POST['hakkinda'];
    $adres = $_POST['adres'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];

    // PARAMETRE SIRASI DÜZELTİLDİ
    if (sirketKaydet($id, $hakkinda, $adres, $email, $telefon)) {
        header("Location: sirket.php?durum=basarili");
        exit;
    } else {
        header("Location: sirket.php?durum=hata");
        exit;
    }
}

// SAYFA AÇILDIĞINDA MEVCUT VERİYİ GETİR
$sirket = sirketGetir();
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Döviz Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <?php include '../dashboard/sidebar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:../../partials/_navbar.html -->
        <?php include '../dashboard/navbar.php'; ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sirket iletişim/Hakkında</h4>
                                <p class="card-description"></p>
                                <form class="forms-sample" action="sirket.php" method="post">
                                    <input type="hidden" name="id" value="<?= $sirket['id'] ?>">
                                    <div class="form-group row">
                                        <label for="telefon" class="col-sm-3 col-form-label">Telefon</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="telefon" name="telefon"  value="<?= $sirket['telefon'] ?>" placeholder="telefon" maxlength="20" minlength="10" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" value="<?= $sirket['email'] ?>" placeholder="Email" required maxlength="50" minlength="10">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="iletisim">Adres</label>
                                        <textarea class="form-control" id="adres"  name="adres"  rows="10"  style="height:auto;"><?= isset($sirket['adres']) ? $sirket['adres'] : '' ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="hakkinda">Hakkımızda</label>
                                        <textarea class="form-control" id="hakkinda"  name="hakkinda" rows="15"  style="height:auto;" ><?= isset($sirket['hakkinda']) ? $sirket['hakkinda'] : '' ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 </span>

                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../../assets/js/off-canvas.js"></script>
<script src="../../../assets/js/misc.js"></script>
<script src="../../../assets/js/settings.js"></script>
<script src="../../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
</body>
</html>