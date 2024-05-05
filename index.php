<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login Model
    </title>
    <?php
    require('include/links.php');
    ?>

    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <!-- Swiper  -->
    <div class="swiper mySwiper ">
        <div class="swiper-wrapper ">

        <?php
            $res = selectAll('carousel');//select from db(table) because db is linked in header.php we get sr_no and image

            while ($row = mysqli_fetch_assoc($res)) {
                $path = CAROUSEL_IMG_PATH;//we got this from essentials.php
                echo <<<data
                    <div class="swiper-slide">
                        <img src="$path$row[image]" class="w-100 d-block">
                        
                    </div>
                        
                data;
            }
        
        ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>


    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 text-center fw-bold">Testimonials</h2>
    <div class="container">
        <div class="swiper mySwiper-testimonials">
            <div class="swiper-wrapper mb-5">
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/swiper/1.jpg" width=30px />
                        <h6 class="ms-2 m-0">Random Person1</h6>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, praesentium earum rerum
                        deleniti nobis recusandae officia dolor tenetur incidunt ex!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/swiper/1.jpg" width=30px />
                        <h6 class="ms-2 m-0">Random Person1</h6>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, praesentium earum rerum
                        deleniti nobis recusandae officia dolor tenetur incidunt ex!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/swiper/1.jpg" width=30px />
                        <h6 class="ms-2 m-0">Random Person1</h6>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, praesentium earum rerum
                        deleniti nobis recusandae officia dolor tenetur incidunt ex!</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Reach Us -->
    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` =?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    // print_r ($contact_r);   We dont use this in index.php instead of this we used this in header.php bcz we require header in index.php

    ?>


    <h2 class="mt-5 pt-4 text-center fw-bold">Reach Us</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" src="<?php echo $contact_r['iframe'] ?>" height="320px" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4">
                    <h5>Call Us</h5>
                    <a href="tel:+<?php echo $contact_r['ph1'] ?>" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-telephone-fill me-2"></i>+<?php echo $contact_r['ph1'] ?></a><br />

                    <?php
                    if ($contact_r['ph2'] !== '') {
                        echo <<<data
                            <a href="tel:+$contact_r[ph2]" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-telephone-fill me-2"></i>+$contact_r[ph2]</a> 
                            data;
                    }
                    ?>
                </div>
                <div class="bg-white p-4">
                    <h5>Follow Us</h5>
                    <?php
                    if ($contact_r['fb'] !== '') {
                        echo <<<data
                                <a href="$contact_r[fb]" class="d-inline-block mb-2">
                                <span class="badge bg-light text-dark fs-6 p-2 ">
                                    <i class="bi bi-facebook me-1"></i>Facebook</a>
                                </span><br>
                                data;
                    }
                    ?>

                    <!-- <a href="#" class="d-inline-block mb-2">
                        <span class="badge bg-light text-dark fs-6 p-2 ">
                            <i class="bi bi-whatsapp me-1"></i>whatsapp</a>
                        </span> -->

                    <?php
                    if ($contact_r['tw'] !== '') {
                        echo <<<data
                                    <a href="$contact_r[tw]" class="d-inline-block mb-2">
                                        <span class="badge bg-light text-dark fs-6 p-2 ">
                                            <i class="bi bi-twitter-x me-1"></i>Twitter
                                            </a>
                                        </span><br>
                                data;
                    }
                    ?>

                    <?php
                    if ($contact_r['insta'] !== '') {
                        echo <<<data
                                <a href="$contact_r[insta]" class="d-inline-block mb-2">
                                <span class="badge bg-light text-dark fs-6 p-2 ">
                                    <i class="bi bi-instagram me-1"></i>Instagram</a>
                                </span>
                        data;
                    }
                    ?>
                    

                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->

    <?php
     require('include/footer.php'); 
     ?>






    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }
        });

        var swiper = new Swiper(".mySwiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: "3",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>

</html>