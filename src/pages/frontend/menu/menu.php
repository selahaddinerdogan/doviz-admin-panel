<?php


?>

<div
        class="absolute top-0 left-0 z-40 flex items-center w-full bg-transparent ud-header"
>
    <div class="container mx-auto px-4">
        <div class="relative flex items-center justify-between -mx-4">
            <div class="max-w-full px-4 w-60">
                <a href="index.php" class="block w-full py-5 navbar-logo">
                    <img
                            src="./assets/images/logo/logo.svg"
                            alt="logo"
                            class="w-full dark:hidden"
                    />
                    <img
                            src="./assets/images/logo/logo-white.svg"
                            alt="logo"
                            class="hidden w-full dark:block"
                    />
                </a>
            </div>
            <div class="flex items-center justify-between w-full px-4">
                <div>
                    <button
                            id="navbarToggler"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
                    >
                <span
                        class="relative my-[6px] block h-[2px] w-[30px] bg-dark dark:bg-white"
                ></span>
                        <span
                                class="relative my-[6px] block h-[2px] w-[30px] bg-dark dark:bg-white"
                        ></span>
                        <span
                                class="relative my-[6px] block h-[2px] w-[30px] bg-dark dark:bg-white"
                        ></span>
                    </button>
                    <nav
                            id="navbarCollapse"
                            class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white dark:bg-dark-2 py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent dark:lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6"
                    >
                        <ul class="blcok lg:flex 2xl:ml-20">
                            <li class="relative group">
                                <a
                                        href="index.php"
                                        class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark dark:text-white group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color dark:lg:text-dark-6"
                                >
                                    Anasayfa
                                </a>
                            </li>
                            <li class="relative group">
                                <a
                                        href="kur.php"
                                        class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark dark:text-white group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color dark:lg:text-dark-6 xl:ml-10"
                                >
                                    Döviz
                                </a>
                            </li>
                            <li class="relative group">
                                <a
                                        href="altin.php"
                                        class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark dark:text-white group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color dark:lg:text-dark-6 xl:ml-10"
                                >
                                    Altın
                                </a>
                            </li>
                            <li class="relative group">
                                <a
                                        href="about.php"
                                        class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark dark:text-white group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color dark:lg:text-dark-6 xl:ml-10"
                                >
                                    Hakkımızda
                                </a>
                            </li>
                            <li class="relative group">
                                <a
                                        href="contact.php"
                                        class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark dark:text-white group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-body-color dark:lg:text-dark-6 xl:ml-10"
                                >
                                    İletişim
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <div class="hidden sm:flex items-center relative group">
                    <?php if (isset($_SESSION['kullanici_id'])): ?>

                        <!-- Kullanıcı Adı -->
                        <button
                                class="flex items-center gap-2 text-sm font-medium text-dark dark:text-white focus:outline-none"
                        >
                            <?= htmlspecialchars($_SESSION['adi'] . ' ' . $_SESSION['soyadi']) ?>
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                                class="absolute right-0 top-full mt-2 w-40 rounded-md bg-white dark:bg-dark-2 shadow-lg opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all"
                        >
                            <?php if ($_SESSION['admin']==1): ?>
                                <a
                                        href="../backend/dashboard/dashboard.php"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-dark-3 rounded-md"
                                >
                                    Dashboard
                                </a>
                            <?php endif; ?>
                            <a
                                    href="../backend/kullanici/cikis.php"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-dark-3 rounded-md"
                            >
                                Çıkış Yap
                            </a>
                        </div>

                    <?php else: ?>

                        <a
                                href="login.html"
                                class="loginBtn py-2 px-[22px] text-base font-medium text-dark dark:text-white hover:opacity-70"
                        >
                            Giriş
                        </a>

                        <!-- Kayıt -->
                        <a
                                href="register.html"
                                class="px-6 py-2 text-base font-medium text-white duration-300 ease-in-out rounded-md signUpBtn bg-primary hover:bg-blue-dark"
                        >
                            Kayıt
                        </a>

                    <?php endif; ?>
                </div>




            </div>
        </div>
    </div>
</div>
</div>