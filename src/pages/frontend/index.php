<?php

session_start();
require_once __DIR__ . "/../backend/functions/kurFunctions.php";
require_once __DIR__ . "/../backend/functions/altinFunctions.php";
require_once __DIR__ . "/../backend/functions/sirketFunctions.php";


$kurlarDegisimOrani = getKurListesiDegisimOrani();
$altinDegisimOrani = getListesiDegisimOraniAnasayfa();
$sirket = sirketGetir();

?>

<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        Döviz ve Altın Kurları
    </title>
    <link
            rel="shortcut icon"
            href="assets/images/favicon.png"
            type="image/x-icon"
    />
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"/>
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
<?php include 'menu/mainMenu.php'; ?>
<!-- ====== Navbar Section End -->

<!-- ====== Hero Section Start -->
<div
        id="home"
        class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]"
>
</div>
<!-- ====== Hero Section End -->


<section
        id="pricing"
        class="relative z-20 overflow-hidden bg-white pb-12 pt-20 dark:bg-dark lg:pb-[90px] lg:pt-[120px]"
>
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mx-auto mb-12 max-w-[485px] text-center lg:mb-[70px]">
              <span class="block mb-2 text-lg font-semibold text-primary">

              </span>
                    <h2
                            class="mb-3 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
                    >
                        Güncel Döviz Bilgileri
                    </h2>
                    <p class="text-base text-body-color dark:text-dark-6">

                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center -mx-3">
            <?php foreach ($kurlarDegisimOrani as $kur): ?>
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div
                            class="relative z-10 px-8 py-10 mb-10 overflow-hidden bg-white rounded-xl shadow-pricing dark:bg-dark-2 sm:p-12 lg:px-6 lg:py-10 xl:p-14"
                    >
              <span
                      class="block mb-5 text-xl font-medium text-dark dark:text-white"
              >
                <?= $kur['kod'] ?>
              </span>
                        <h2
                                class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:text-[42px] xl:leading-[1.21]"
                        >
                        <span class="text-xl font-medium">                                    <?= $kur['kod'] == "USD" ? "$" :
                                    ($kur['kod'] == "EUR" ? "€" :
                                            ($kur['kod'] == "GBP" ? "£" :
                                                    ($kur['kod'] == "CHF" ? "CHF" : "")))
                            ?></span>
                            <span class="-ml-1 -tracking-[2px]"><?= $kur['son_satis'] ?></span>
                            <span
                                    class="text-base font-normal text-body-color dark:text-dark-6"
                            >
                </span>
                        </h2>
                        <div class="mb-[50px]">
                            <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">
                                <?= $kur['adi'] ?>
                            </h5>
                            <div class="flex flex-col gap-[14px]">
                                <div class="container py-16">
                                    <div class="flex flex-wrap gap-4 text-xl font-bold">
                                        <?php if ($kur['degisim_orani'] < 0): ?>
                                            <span class="badge badge-danger ">
                                               %<?php echo $kur['degisim_orani']; ?>
                                          </span>

                                        <?php endif; ?>
                                        <?php if ($kur['degisim_orani'] > 0): ?>
                                            <span class="badge badge-success">
                                              %<?php echo $kur['degisim_orani']; ?>
                                          </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section
        id="pricing"
        class="relative z-20 overflow-hidden bg-white pb-12 pt-20 dark:bg-dark lg:pb-[90px] lg:pt-[120px]"
>
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mx-auto mb-12 max-w-[485px] text-center lg:mb-[70px]">
              <span class="block mb-2 text-lg font-semibold text-primary">

              </span>
                    <h2
                            class="mb-3 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
                    >
                        Güncel Altın Bilgileri
                    </h2>
                    <p class="text-base text-body-color dark:text-dark-6">

                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center -mx-3">
            <?php foreach ($altinDegisimOrani as $kur): ?>
                <div class="w-full px-4 md:w-1/2 lg:w-1/4">
                    <div
                            class="relative z-10 px-8 py-10 mb-10 overflow-hidden bg-white rounded-xl shadow-pricing dark:bg-dark-2 sm:p-12 lg:px-6 lg:py-10 xl:p-14"
                    >
              <span
                      class="block mb-5 text-xl font-medium text-dark dark:text-white"
              >
                <?= $kur['adi'] ?>
              </span>
                        <h2
                                class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:text-[42px] xl:leading-[1.21]"
                        >
                        <span class="text-xl font-medium">
                            <?= $kur['adi'] == "Ons Altın" ? "$" : "₺" ?></span>
                            <span class="-ml-1 -tracking-[2px]"><?= $kur['son_satis'] ?></span>
                            <span
                                    class="text-base font-normal text-body-color dark:text-dark-6"
                            >
                </span>
                        </h2>
                        <div class="mb-[50px]">
                            <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">

                            </h5>
                            <div class="flex flex-col gap-[14px]">
                                <div class="container py-16">
                                    <div class="flex flex-wrap gap-4 text-xl font-bold">
                                        <?php if ($kur['degisim_orani'] < 0): ?>
                                            <span class="badge badge-danger ">
                                               %<?php echo $kur['degisim_orani']; ?>
                                          </span>

                                        <?php endif; ?>
                                        <?php if ($kur['degisim_orani'] > 0): ?>
                                            <span class="badge badge-success">
                                              %<?php echo $kur['degisim_orani']; ?>
                                          </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ====== About Section Start -->
<section
        id="about"
        class="bg-gray-1 pb-8 pt-20 dark:bg-dark-2 lg:pb-[70px] lg:pt-[120px]"
>
    <div class="container px-4 mx-auto">
        <div class="wow fadeInUp" data-wow-delay=".2s">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="mb-12 max-w-[540px] lg:mb-0">
                        <h2
                                class="mb-5 text-3xl font-bold leading-tight text-dark dark:text-white sm:text-[40px] sm:leading-[1.2]"
                        >
                            Hakkımızda
                        </h2>
                        <p
                                class="mb-10 text-base leading-relaxed text-body-color dark:text-dark-6"
                        >
                            <?= isset($sirket['hakkinda']) ? $sirket['hakkinda'] : '' ?>

                        </p>
                    </div>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <div class="flex flex-wrap -mx-2 sm:-mx-4 lg:-mx-2 xl:-mx-4">
                        <div class="w-full px-2 sm:w-1/2 sm:px-4 lg:px-2 xl:px-4">
                            <div
                                    class="mb-4 sm:mb-8 sm:h-[400px] md:h-[540px] lg:h-[400px] xl:h-[500px]"
                            >
                                <img
                                        src="assets/images/about/about-image-01.jpg"
                                        alt="about image"
                                        class="object-cover object-center w-full h-full"
                                />
                            </div>
                        </div>

                        <div class="w-full px-2 sm:w-1/2 sm:px-4 lg:px-2 xl:px-4">
                            <div
                                    class="mb-4 sm:mb-8 sm:h-[220px] md:h-[346px] lg:mb-4 lg:h-[225px] xl:mb-8 xl:h-[310px]"
                            >
                                <img
                                        src="assets/images/about/about-image-02.jpg"
                                        alt="about image"
                                        class="object-cover object-center w-full h-full"
                                />
                            </div>

                            <div
                                    class="relative z-10 mb-4 flex items-center justify-center overflow-hidden bg-primary px-6 py-12 sm:mb-8 sm:h-[160px] sm:p-5 lg:mb-4 xl:mb-8"
                            >
                                <div>
                      <span class="block text-5xl font-extrabold text-white">
                        09
                      </span>
                                    <span class="block text-base font-semibold text-white">
                        We have
                      </span>
                                    <span
                                            class="block text-base font-medium text-white text-opacity-70"
                                    >
                        Years of experience
                      </span>
                                </div>
                                <div>
                      <span class="absolute top-0 left-0 -z-10">
                        <svg
                                width="106"
                                height="144"
                                viewBox="0 0 106 144"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect
                                  opacity="0.1"
                                  x="-67"
                                  y="47.127"
                                  width="113.378"
                                  height="131.304"
                                  transform="rotate(-42.8643 -67 47.127)"
                                  fill="url(#paint0_linear_1416_214)"
                          />
                          <defs>
                            <linearGradient
                                    id="paint0_linear_1416_214"
                                    x1="-10.3111"
                                    y1="47.127"
                                    x2="-10.3111"
                                    y2="178.431"
                                    gradientUnits="userSpaceOnUse"
                            >
                              <stop stop-color="white"/>
                              <stop
                                      offset="1"
                                      stop-color="white"
                                      stop-opacity="0"
                              />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                                    <span class="absolute top-0 right-0 -z-10">
                        <svg
                                width="130"
                                height="97"
                                viewBox="0 0 130 97"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect
                                  opacity="0.1"
                                  x="0.86792"
                                  y="-6.67725"
                                  width="155.563"
                                  height="140.614"
                                  transform="rotate(-42.8643 0.86792 -6.67725)"
                                  fill="url(#paint0_linear_1416_215)"
                          />
                          <defs>
                            <linearGradient
                                    id="paint0_linear_1416_215"
                                    x1="78.6495"
                                    y1="-6.67725"
                                    x2="78.6495"
                                    y2="133.937"
                                    gradientUnits="userSpaceOnUse"
                            >
                              <stop stop-color="white"/>
                              <stop
                                      offset="1"
                                      stop-color="white"
                                      stop-opacity="0"
                              />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                                    <span class="absolute bottom-0 right-0 -z-10">
                        <svg
                                width="175"
                                height="104"
                                viewBox="0 0 175 104"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                        >
                          <rect
                                  opacity="0.1"
                                  x="175.011"
                                  y="108.611"
                                  width="101.246"
                                  height="148.179"
                                  transform="rotate(137.136 175.011 108.611)"
                                  fill="url(#paint0_linear_1416_216)"
                          />
                          <defs>
                            <linearGradient
                                    id="paint0_linear_1416_216"
                                    x1="225.634"
                                    y1="108.611"
                                    x2="225.634"
                                    y2="256.79"
                                    gradientUnits="userSpaceOnUse"
                            >
                              <stop stop-color="white"/>
                              <stop
                                      offset="1"
                                      stop-color="white"
                                      stop-opacity="0"
                              />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== About Section End -->


<!-- ====== Contact Start ====== -->
<section id="contact" class="relative py-20 md:py-[120px]">
    <div class="absolute top-0 left-0 w-full h-full -z-1 dark:bg-dark"></div>
    <div
            class="absolute left-0 top-0 -z-1 h-1/2 w-full bg-[#E9F9FF] dark:bg-dark-700 lg:h-[45%] xl:h-1/2"
    ></div>
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4 lg:w-7/12 xl:w-8/12">
                <div class="ud-contact-content-wrapper">
                    <div class="ud-contact-title mb-12 lg:mb-[150px]">
                <span
                        class="block mb-6 text-base font-medium text-dark dark:text-white"
                >
                </span>
                        <h2
                                class="max-w-[500px] text-[30px] leading-[1.14] font-semibold text-dark dark:text-white"
                        >
                            Bizimle İletişime geçmek ister misiniz? </br>

                        </h2>
                        <?= isset($sirket['telefon']) ? $sirket['telefon'] : '' ?>
                    </div>
                    <div class="flex flex-wrap justify-between mb-12 lg:mb-0">
                        <div class="mb-8 flex w-[330px] max-w-full">
                            <div class="mr-6 text-[32px] text-primary">
                                <svg
                                        width="29"
                                        height="35"
                                        viewBox="0 0 29 35"
                                        class="fill-current"
                                >
                                    <path
                                            d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z"
                                    />
                                    <path
                                            d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <h5
                                        class="mb-[18px] text-lg font-semibold text-dark dark:text-white"
                                >
                                    Adresimiz
                                </h5>
                                <p class="text-base text-body-color dark:text-dark-6">
                                    <?= isset($sirket['adres']) ? $sirket['adres'] : '' ?>
                                </p>
                            </div>
                        </div>
                        <div class="mb-8 flex w-[330px] max-w-full">
                            <div class="mr-6 text-[32px] text-primary">
                                <svg
                                        width="34"
                                        height="25"
                                        viewBox="0 0 34 25"
                                        class="fill-current"
                                >
                                    <path
                                            d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z"
                                    />
                                </svg>
                            </div>
                            <div>
                                <h5
                                        class="mb-[18px] text-lg font-semibold text-dark dark:text-white"
                                >
                                    Mail Adresimiz
                                </h5>
                                <p class="text-base text-body-color dark:text-dark-6">
                                    <?= isset($sirket['email']) ? $sirket['email'] : '' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ====== Contact End ====== -->

<!-- ====== Footer Section Start -->
<?php include 'menu/footer.php'; ?>
<!-- ====== Footer Section End -->

<!-- ====== Back To Top Start -->
<a
        href="javascript:void(0)"
        class="fixed left-auto items-center justify-center hidden w-10 h-10 text-white transition duration-300 ease-in-out rounded-md shadow-md back-to-top bottom-8 right-8 z-999 bg-primary hover:bg-dark"
>
      <span
              class="mt-[6px] h-3 w-3 rotate-45 border-l border-t border-white"
      ></span>
</a>
<!-- ====== Back To Top End -->

<!-- ====== All Scripts -->

<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector(elem.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                offsetTop: 1 - 60,
            });
        });
    });

    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            const refElement = document.querySelector(val);
            const scrollTopMinus = scrollPos + 73;
            if (
                refElement.offsetTop <= scrollTopMinus &&
                refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
            ) {
                document
                    .querySelector(".ud-menu-scroll")
                    .classList.remove("active");
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }

    window.document.addEventListener("scroll", onScroll);

    // Testimonial
    const testimonialSwiper = new Swiper(".testimonial-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
</script>
</body>
</html>
