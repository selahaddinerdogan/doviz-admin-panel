<?php
session_start();

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../samples/login.html");
    exit;
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
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
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

                </div>
                <div class="row">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transaction History</h4>
                                <div class="position-relative">
                                    <div class="daoughnutchart-wrapper">
                                        <canvas id="transaction-history" class="transaction-chart"></canvas>
                                    </div>
                                    <div class="custom-value">$1200 <span>Total</span>
                                    </div>
                                </div>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1">Transfer to Paypal</h6>
                                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0">$236</h6>
                                    </div>
                                </div>
                                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                    <div class="text-md-center text-xl-left">
                                        <h6 class="mb-1">Tranfer to Stripe</h6>
                                        <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                                    </div>
                                    <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                                        <h6 class="font-weight-bold mb-0">$593</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title mb-1">Open Projects</h4>
                                    <p class="text-muted mb-1">Your data status</p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-primary">
                                                        <i class="mdi mdi-file-document"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Admin dashboard design</h6>
                                                        <p class="text-muted mb-0">Broadcast web app mockup</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">15 minutes ago</p>
                                                        <p class="text-muted mb-0">30 tasks, 5 issues </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-success">
                                                        <i class="mdi mdi-cloud-download"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Wordpress Development</h6>
                                                        <p class="text-muted mb-0">Upload new design</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">1 hour ago</p>
                                                        <p class="text-muted mb-0">23 tasks, 5 issues </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-info">
                                                        <i class="mdi mdi-clock"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Project meeting</h6>
                                                        <p class="text-muted mb-0">New project discussion</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">35 minutes ago</p>
                                                        <p class="text-muted mb-0">15 tasks, 2 issues</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="preview-item border-bottom">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-danger">
                                                        <i class="mdi mdi-email-open"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">Broadcast Mail</h6>
                                                        <p class="text-muted mb-0">Sent release details to team</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">55 minutes ago</p>
                                                        <p class="text-muted mb-0">35 tasks, 7 issues </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="preview-item">
                                                <div class="preview-thumbnail">
                                                    <div class="preview-icon bg-warning">
                                                        <i class="mdi mdi-chart-pie"></i>
                                                    </div>
                                                </div>
                                                <div class="preview-item-content d-sm-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <h6 class="preview-subject">UI Design</h6>
                                                        <p class="text-muted mb-0">New application planning</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                        <p class="text-muted">50 minutes ago</p>
                                                        <p class="text-muted mb-0">27 tasks, 4 issues </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

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
<script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
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
<!-- End custom js for this page -->
</body>
</html>
