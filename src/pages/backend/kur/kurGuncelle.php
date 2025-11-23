<?php

session_start();
require_once __DIR__ . "/../functions/kurFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if ($_SESSION['admin'] != 1 || !isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id  = $_POST['id'];
    $kod = $_POST['kod'];
    $adi = $_POST['adi'];

    if (kurGuncelle($id, $kod, $adi)) {
        echo "Kayıt başarıyla güncellendi!";
    } else {
        echo "Güncelleme sırasında hata oluştu!";
    }
}
$kur = null;
if (isset($_GET['id'])) {
    $id  = $_GET['id'];
    $kur = kurGetir($id);
}else{
    header("Location: altinlar.php");
}
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
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card" >
                            <div class="card-body col-lg-6" >
                                <h4 class="card-title">Kur Ekle</h4>
                                <form class="forms-sample" action="kurGuncelle.php" method="post">
                                    <input type="hidden" name="id" value="<?= $kur['id'] ?>">
                                    <div class="form-group row">
                                        <label for="kod" class="col-sm-3 col-form-label">Kod</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kod" name="kod"  value="<?= $kur['kod'] ?>" placeholder="Kod" maxlength="7" minlength="2" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="adı" class="col-sm-3 col-form-label">Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="adi" name="adi" value="<?= $kur['adi'] ?>" placeholder="Adı" required maxlength="100" minlength="4">
                                        </div>
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
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                    <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center"> <span class="text-muted float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span> <i class="mdi mdi-heart text-danger"></i></span>
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