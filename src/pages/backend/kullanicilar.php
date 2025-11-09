<?php

session_start();
require_once "functions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}

$kullanicilar = [];
if ($_SESSION['admin'] == 1) {
    $kullanicilar = kullanicilariGetir();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Döviz Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <?php include 'dashboard/sidebar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <!-- partial:../../partials/_navbar.html -->
        <?php include 'dashboard/navbar.php'; ?>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title">Kullanıcılar</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kullanıcılar</h4>
                                </p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Kullanıcı Adı</th>
                                            <th>Adı</th>
                                            <th>Soyadı</th>
                                            <th>Email</th>
                                            <th>Adres</th>
                                            <th>Rol</th>
                                            <th>Kayıt Tarihi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($kullanicilar as $k): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($k['kullanici_adi']); ?></td>
                                            <td><?php echo htmlspecialchars($k['adi']); ?></td>
                                            <td><?php echo htmlspecialchars($k['soyadi']); ?></td>
                                            <td><?php echo htmlspecialchars($k['mail']); ?></td>
                                            <td><?php echo htmlspecialchars($k['adres']); ?></td>
                                            <td><?php echo $k['admin'] ? "<label class='badge badge-success'>Yönetici</label>" : "<label class='badge badge-info'>Kullanıcı</label>"; ?></td>
                                            <td><?php echo $k['kayit tarih']; ?></td>
<!--                                            <td><label class="badge badge-danger">Pending</label></td>-->
                                        </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
</body>
</html>