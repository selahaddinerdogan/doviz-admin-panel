<?php

session_start();
require_once __DIR__ . "/../backend/functions/altinFunctions.php";

// Giriş yapılmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: ../frontend/login.html");
    exit;
}
$altinDegisimOrani = getTumListesiDegisimOrani();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Altın Fiyatları</title>
    <link
        rel="shortcut icon"
        href="assets/images/favicon.png"
        type="image/x-icon"
    />
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="src/css/tailwind.css"/>
    <!-- ==== WOW JS ==== -->
    <script src="assets/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
<!-- ====== Navbar Section Start -->
<?php include 'menu/menu.php'; ?>
<!-- ====== Navbar Section End -->

<!-- ====== Pricing Section Start -->
<section class="bg-white py-20 lg:py-[120px] dark:bg-dark">
    <div class="container mx-auto">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4">
                <div class="text-center">
                    <h1
                        class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
                    >
                        Altın Fiyatları
                    </h1>
                </div>
            </div>
        </div>
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div class="max-w-full overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                        <tr class="bg-primary text-center">
                            <th class="w-1/6 min-w-[160px] px-3 py-4 text-lg font-medium text-white lg:px-4 lg:py-7">
                                Adı
                            </th>
                            <th class="w-1/6 min-w-[160px] px-3 py-4 text-lg font-medium text-white lg:px-4 lg:py-7">
                                Alış
                            </th>
                            <th class="w-1/6 min-w-[160px] px-3 py-4 text-lg font-medium text-white lg:px-4 lg:py-7">
                                Satış
                            </th>
                            <th class="w-1/6 min-w-[160px] px-3 py-4 text-lg font-medium text-white lg:px-4 lg:py-7">
                                Tarih
                            </th>
                            <th class="w-1/6 min-w-[160px] px-3 py-4 text-lg font-medium text-white lg:px-4 lg:py-7">
                                Değişim
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($altinDegisimOrani as $k): ?>
                            <tr>
                                <td class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] px-2 py-5 text-center text-base font-medium text-dark dark:border-dark dark:bg-dark-3 dark:text-dark-7">
                                    <?php echo htmlspecialchars($k['adi']); ?></td>
                                <td class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] px-2 py-5 text-center text-base font-medium text-dark dark:border-dark dark:bg-dark-3 dark:text-dark-7">
                                    <?php echo htmlspecialchars($k['son_alis']); ?></td>
                                <td class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] px-2 py-5 text-center text-base font-medium text-dark dark:border-dark dark:bg-dark-3 dark:text-dark-7">
                                    <?php echo htmlspecialchars($k['son_satis']); ?></td>
                                <td class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] px-2 py-5 text-center text-base font-medium text-dark dark:border-dark dark:bg-dark-3 dark:text-dark-7">
                                    <?php echo $k['son_tarih']; ?></td>
                                <td class="border-b border-l border-[#E8E8E8] bg-[#F3F6FF] px-2 py-5 text-center text-base font-medium text-dark dark:border-dark dark:bg-dark-3 dark:text-dark-7">
                                    <div class="container py-16">
                                        <div class="flex flex-wrap gap-4">
                                            <?php if ($k['degisim_orani'] < 0): ?>
                                                <span class="badge badge-danger">
                                               %<?php echo $k['degisim_orani']; ?>
                                          </span>

                                            <?php endif; ?>
                                            <?php if ($k['degisim_orani'] > 0): ?>
                                                <span class="badge badge-success">
                                              %<?php echo $k['degisim_orani']; ?>
                                          </span>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ====== Pricing Section End -->

<!-- ====== Footer Section Start -->
<?php include 'menu/footer.php'; ?>
<!-- ====== Footer Section End -->

<!-- ====== Back To Top Start -->
<a
    href="javascript:void(0)"
    class="fixed left-auto items-center justify-center hidden w-10 h-10 text-white transition duration-300 ease-in-out rounded-md shadow-md back-to-top bottom-8 right-8 z-999 bg-primary hover:bg-dark"
>
      <span
          class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"
      ></span>
</a>
<!-- ====== Back To Top End -->

<!-- ====== All Scripts -->
<script src="assets/js/main.js"></script>
</body>
</html>
