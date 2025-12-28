<?php
session_start();
require_once __DIR__ . "/../functions/kurFunctions.php";
require_once __DIR__ . "/../functions/altinFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
}

$kurlarDegisimOrani = getKurListesiDegisimOrani();
$altinDegisimOrani = getListesiDegisimOrani();
$altinSayisi = getToplamAltin();
$kurSayisi   = getToplamKur();
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
    <link rel="stylesheet" href="../../../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'sidebar.php'; ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include 'navbar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="row">
                    <?php if (count($altinDegisimOrani) > 0): ?>
                        <?php foreach ($altinDegisimOrani as $altin): ?>
                            <div class="col-sm-4 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5><?= $altin['adi'] ?></h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 class="mb-0"><?= $altin['son_satis'] ?></h2>
                                                    <?php if ($altin['degisim_orani'] > 0): ?>
                                                        <p class="text-success ms-2 mb-0 font-weight-medium">
                                                            +<?= $altin['degisim_orani'] ?>%</p>
                                                    <?php endif; ?>
                                                    <?php if ($altin['degisim_orani'] < 0): ?>
                                                        <p class="text-danger ms-2 mb-0 font-weight-medium"><?= $altin['degisim_orani'] ?>%</p>
                                                    <?php endif; ?>
                                                </div>
                                                <h6 class="text-muted font-weight-normal"><?= $altin['adi'] ?> Son fiyat
                                                    bilgisi</h6>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="icon-lg mdi mdi-gold text-warning ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <?php if (count($kurlarDegisimOrani) > 0): ?>
                        <?php foreach ($kurlarDegisimOrani as $kur): ?>
                            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0"><?= $kur['son_satis'] ?></h3>
                                                    <?php if ($kur['degisim_orani'] > 0): ?>
                                                        <p class="text-success ms-2 mb-0 font-weight-medium">
                                                            +<?= $kur['degisim_orani'] ?>%</p>
                                                    <?php endif; ?>
                                                    <?php if ($kur['degisim_orani'] < 0): ?>
                                                        <p class="text-danger ms-2 mb-0 font-weight-medium"><?= $kur['degisim_orani'] ?>
                                                            %</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <?php if ($kur['degisim_orani'] > 0): ?>
                                                    <div class="icon icon-box-success ">
                                                        <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($kur['degisim_orani'] < 0): ?>
                                                    <div class="icon icon-box-danger">
                                                        <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal"><?= $kur['kod'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Toplam Veriler</h4>
                                <div class="doughnutjs-wrapper d-flex justify-content-center">
                                    <canvas id="totalDataChart" style="height:250px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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
    <script src="../../../assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../../../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="../../../assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../assets/js/off-canvas.js"></script>
    <script src="../../../assets/js/misc.js"></script>
    <script src="../../../assets/js/settings.js"></script>
    <script src="../../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../../assets/js/proBanner.js"></script>
    <script src="../../../assets/js/dashboard.js"></script>
    <script>
        const doughnutPieOptions = {
            responsive: true,
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };
        const doughnutPieData = {
            datasets: [{
                data: ['<?=$altinSayisi?>', '<?=$kurSayisi?>' ,5],
                backgroundColor: [
                    'rgba(234,189,11,0.5)',
                    'rgba(17,193,193,0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255,99,132,1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                'Altın',
                'Kur',
                'emtia'


            ]
        };
        if ($("#totalDataChart").length) {
            const pieChartCanvas = $("#totalDataChart").get(0).getContext("2d");
            const pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: doughnutPieData,
                options: doughnutPieOptions
            });
        }
    </script>

    <!-- End custom js for this page -->
</body>
</html>
