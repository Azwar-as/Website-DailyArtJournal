<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kumpulan seni abstract,seni,lukisan,dark art,abstract">
    <title>QNM Art</title>
    <link rel="icon" href="./assets/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
    .accordion-button[style*="var(--bs-body-color)"]::after {
        filter: invert(1) grayscale(100%);
    }

    #carouselExample .carousel-control-prev,
    #carouselExample .carousel-control-next {
        width: 10%;
    }

    #carouselExample .carousel-control-prev-icon,
    #carouselExample .carousel-control-next-icon {
        filter: drop-shadow(0 0 6px rgba(0, 0, 0, .8));
    }

    #carouselExample .carousel-control-prev-icon,
    #carouselExample .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, .55);
        border-radius: 999px;
        padding: 18px;
        background-size: 60% 60%;
    }
    </style>
</head>

<body>
    <!-- Nav Begin -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="./assets/logo.png" width="50" alt="">
                Quiet Nightmare Art
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedulue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutme">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" target="_blank">Login</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button"
                                    data-bs-theme-value="light">
                                    <i class="bi bi-sun-fill me-2  opacity-50" data-theme-icon="bi-sun-fill"></i>
                                    Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button"
                                    data-bs-theme-value="dark">
                                    <i class="bi bi-moon-stars-fill me-2 opacity-50"
                                        data-theme-icon="bi-moon-stars-fill"></i>
                                    Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button"
                                    data-bs-theme-value="auto">
                                    <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i>
                                    Auto
                                </button>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav End -->

    <!-- Hero Begin -->
    <main>
        <section id="hero" class="text-center p-5 bg-secondary-subtle text-sm-start">
            <section class="container">
                <div class="d-sm-flex flex-sm-row-reverse align-items-center">
                    <img src="./img/banner.jpg" class="img-fluid" width="300"
                        alt="lukisan patung peri dengan sentuhan warna hitam putih">
                    <div>
                        <h1 class="fw-bold display-4">
                            Dive into the dark, enjoy restlessness, without sound.
                        </h1>
                        <h4 class="lead display-6">
                            Menjelajahi semua ketakutan terdalam yang ada di dalam pikiran manusia.
                        </h4>
                        <span id="tanggal"></span>
                        <span id="jam"></span>
                    </div>
                </div>
            </section>
        </section>
        <!-- Hero End -->

        <!-- Article Begin -->
        <section id="article" class="text-center p-5">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3">Articles</h1>
                <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
                    <?php
                        $sql = "SELECT * FROM articles ORDER BY tanggal DESC";
                        $hasil = $conn->query($sql); 
                        // print_r($hasil);
                        while ($row = $hasil->fetch_assoc()){
                    ?>
                    <!-- Coll Begin -->
                    <article class="col">
                        <div class="card h-100">
                            <img src="<?='img/'.$row["gambar"] ?>" height="500" class="object-fit-cover d-block w-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row["judul"] ?></h5>
                                <p class="card-text"><?= $row["isi"] ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary"><?= $row["tanggal"] ?></small>
                            </div>
                        </div>
                    </article>
                    <!-- Coll Begin End -->
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- Article End -->

        <!-- Gallery Begin -->
        <section id="gallery" class="text-center p-5 mb-3 bg-secondary-subtle">
            <div class="container">
                <h1 class="fw-bold display-4  pb-3">Gallery</h1>
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
                        $hasil = $conn->query($sql); 
                        // print_r($hasil);
                        $first = true;
                        while ($row = $hasil->fetch_assoc()){
                            $activeClass = $first ? "active" : "";
                            $first= false;
                    ?>
                        <div class="carousel-item <?= $activeClass ?>">
                            <img src="<?='img/'.$row["gambar"] ?>" height="500" class="object-fit-cover d-block w-100">
                        </div>
                        <?php 
                        }
                    ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <!-- Gallery End -->

        <!-- Schedule Section -->
        <section id="Schedule" class="text-center p-5">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3">Schedule</h1>
                <div class="row-cols-lg-4 row row-cols-1 row-cols-md-2 g-5 justify-content-between">
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-book h2 p-2 text-drak"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Membaca</h5>
                                <p class="card-text">
                                    Menambah wawasan setiap pagi sebelum beraktivitas
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-laptop h2 p-2 text-drak"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Menulis</h5>
                                <p class="card-text">
                                    Mencatat setiap pengalaman harian dijurnal pribadi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-people h2 p-2 text-drak"></i></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Diskusi</h5>
                                <p class="card-text">
                                    Bertukar ide dengan teman dalam kelompok belajar.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-bicycle h2 p-2 text-drak"></i></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Olahraga</h5>
                                <p class="card-text">
                                    Menjaga Kesehatan dengan bersepeda sore hari.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-film h2 p-2 text-drak"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Movie</h5>
                                <p class="card-text">
                                    Menonton film yang bagus di bioskop.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-40">
                            <div>
                                <a href=""></a> <i class="bi bi-bag h2 p-2 text-drak"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Belanja</h5>
                                <p class="card-text">
                                    Membeli kebutuhan bulanan disupermarket.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Schedule Section End -->

        <!-- About Me  -->
        <section id="aboutme" class="text-center p-5 bg-secondary-subtle">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3">About Me</h1>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button"
                                style="background-color: var(--bs-body-color); color: var(--bs-body-bg);" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                Universitas Dian Nuswantoro Semarang (2024-Nov)
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item’s accordion body.</strong> It is shown by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It’s also worth noting that just about
                                any HTML can go
                                within the <code class="text-body-secondary">.accordion-body</code>, though the
                                transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                SMA NEGERI 1 SEMARANG (2024 - 2021)
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item’s accordion body.</strong> It is hidden by default,
                                until the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It’s also worth noting that just about
                                any HTML can go
                                within the <code class="text-body-secondary">.accordion-body</code>, though the
                                transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                SMA NEGERI 1 SEMARANG (2024 - 2021)
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item’s accordion body.</strong> It is hidden by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the overall
                                appearance, as well as the showing and hiding via CSS transitions. You can modify any of
                                this with
                                custom CSS or overriding our default variables. It’s also worth noting that just about
                                any HTML can go
                                within the <code class="text-body-secondary">.accordion-body</code>, though the
                                transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Me end -->
    </main>

    <!-- Footer Begin -->
    <footer class="text-center p-5">
        <div>
            <a href=""><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
            <a href=""><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
            <a href=""><i class="bi bi-whatsapp  h2 p-2 text-dark"></i></a>
        </div>
        <div>
            M.Azwar Anshari &copy; 2025
        </div>
    </footer>
    <!-- Footer End -->

    <button id="backToTop" class="btn btn-secondary rounded-circle position-fixed bottom-0 end-0 m-3">
        <i class="bi bi-arrow-up " title="Back to Top"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <!-- Colors Mode Scripts Dari Dokumentasi Bootstrap -->
    <script>
    /*!
     * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
     * Copyright 2011-2025 The Bootstrap Authors
     * Licensed under the Creative Commons Attribution 3.0 Unported License.
     */

    (() => {
        'use strict'

        const getStoredTheme = () => localStorage.getItem('theme')
        const setStoredTheme = theme => localStorage.setItem('theme', theme)

        const getPreferredTheme = () => {
            const storedTheme = getStoredTheme()
            if (storedTheme) {
                return storedTheme
            }

            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = theme => {
            if (theme === 'auto') {
                document.documentElement.setAttribute('data-bs-theme', (window.matchMedia(
                    '(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        const showActiveTheme = (theme, focus = false) => {
            const themeSwitcher = document.querySelector('#bd-theme')

            if (!themeSwitcher) {
                return
            }

            const themeSwitcherText = document.querySelector('#bd-theme-text')
            const activeThemeIcon = document.querySelector('.theme-icon-active')
            const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
            const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon;

            document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                element.classList.remove('active')
                element.setAttribute('aria-pressed', 'false')
            })

            btnToActive.classList.add('active')
            btnToActive.setAttribute('aria-pressed', 'true')
            activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive);
            activeThemeIcon.classList.add(iconOfActiveBtn);
            activeThemeIcon.dataset.iconActive = iconOfActiveBtn;
            const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
            themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

            if (focus) {
                themeSwitcher.focus()
            }
        }

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            const storedTheme = getStoredTheme()
            if (storedTheme !== 'light' && storedTheme !== 'dark') {
                setTheme(getPreferredTheme())
            }
        })

        window.addEventListener('DOMContentLoaded', () => {
            showActiveTheme(getPreferredTheme())

            document.querySelectorAll('[data-bs-theme-value]')
                .forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const theme = toggle.getAttribute('data-bs-theme-value')
                        setStoredTheme(theme)
                        setTheme(theme)
                        showActiveTheme(theme, true)
                    })
                })
        })
    })()
    </script>
    <!-- Colors Mode Scripts End-->

    <!-- Script untuk fungsi tanggal,jam, dan scrollToTop Button -->
    <script type="text/javascript">
    function tampilWaktu() {
        const waktu = new Date();

        const tanggal = waktu.getDate();
        const bulan = waktu.getMonth();
        const tahun = waktu.getFullYear();
        const jam = waktu.getHours();
        const menit = waktu.getMinutes();
        const detik = waktu.getSeconds();

        const arrBulan = [
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
            "10",
            "11",
            "12",
        ];

        const tanggal_full = tanggal + "/" + arrBulan[bulan] + "/" + tahun;
        const jam_full = jam + ":" + menit + ":" + detik;

        document.getElementById("tanggal").innerHTML = tanggal_full;
        document.getElementById("jam").innerHTML = jam_full;
    }

    setInterval(tampilWaktu, 1000);

    window.addEventListener("scroll", () => {
        const backToTop = document.getElementById("backToTop");
        if (window.scrollY > 300) {
            backToTop.classList.remove("d-none");
            backToTop.classList.add("d-block");
        } else {
            backToTop.classList.remove("d-block");
            backToTop.classList.add("d-none");
        }
    })
    const backToTop = document.getElementById("backToTop");
    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    })
    </script>
    <!-- Script untuk fungsi tanggal,jam, dan scrollToTop Button End -->
</body>

</html>