<?php

?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="dashboard.php"><img src="../../assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="dashboard.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="../../../assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">
                            <?php echo htmlspecialchars($_SESSION['adi'] . " " . $_SESSION['soyadi']); ?>
                        </h5>
                        <span><?php echo $_SESSION['admin'] ? "Yönetici" : "Kullanıcı"; ?></span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-cog text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="../dashboard/dashboard.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="../kullanici/kullanicilar.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Kullanıcılar</span>
                <i class="menu-arrow"></i>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-kur" aria-expanded="false" aria-controls="ui-kur">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                <span class="menu-title">Kurlar</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-kur">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../kur/kurEkle.php">Kur Ekle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../kur/kurlar.php">Kur Listesi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../kur/kurFiyatlar.php">Fiyatlar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../kur/fiyatGir.php">Fiyat Gir</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-altin" aria-expanded="false" aria-controls="ui-altin">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
                <span class="menu-title">Altın</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-altin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="../altin/altinEkle.php">Altın Ekle</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../altin/altinlar.php">Altın Listesi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../altin/altinFiyatlar.php">Fiyatlar</a></li>
                    <li class="nav-item"> <a class="nav-link" href="../altin/fiyatGir.php">Fiyat Gir</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>

