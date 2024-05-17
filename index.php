<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require('include/links.php');
    ?>
    <title> <?php echo $settings_r['site_title'] ?> - Home</title>

    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<style>
    .c-img {
        height: 100%;
        object-fit: cover;
    }

    .c-item {
        height: 480px;
    }
</style>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <!-- Swiper -->
    <div class="swiper mySwiper ">
        <div class="swiper-wrapper ">

            <?php
            $res = selectAll('carousel'); //select from db(table) because db is linked in header.php we get sr_no and image

            while ($row = mysqli_fetch_assoc($res)) {
                $path = CAROUSEL_IMG_PATH; //we got this from essentials.php
                echo <<<data
                    <div class="swiper-slide c-item">
                        <img src="$path$row[image]" class="w-100 d-block c-img">
                        <div class="carousel-caption top-0 mt-4">
                            <p class="mt-5 fs-3 text-uppercase ">Discover the hidden Gems of Nepal</p>
                            <h1 class="display-1 fw-bolder text-capitalize ">Let's GoHiking</h1>
                            <a button class="btn btn-primary px-4 py-2 fs-5 mt-5" href="rooms.php">Book a tour</a>
                        </div>
                    </div>
                        
                data;
            }

            ?>

        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Our Destination -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR DESTINATIONS</h2>
    <div class="container">
        <div class="row">

            <?php
            $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?  ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');
            while ($room_data = mysqli_fetch_assoc($room_res)) {
                //get thumbnail of image

                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
                    WHERE `room_id`='$room_data[id]'
                    AND `thumb`='1'");
                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }
                $book_btn='';
                if(!$settings_r['shutdown'])
                {
                    $book_btn ="<a href='#' class='btn btn-sm text-white bg-success custom-bg shadow-none'>Book Now</a>";
                    
                }
                echo <<<data
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;"> 
                        <img src="$room_thumb" class="card-img-top "> 
                        <div class="card-body">
                            <h5>$room_data[name]</h5>
                            <h6 class="mb-4">$$room_data[price] per night</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                            </div>
                            
                             <div class="rating">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2 mt-2">
                            $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                            </div>  
                        </div>
                    </div>
                </div>
                data;
            }

            ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Destinations>>></a>
            </div>





            <!-- Our Facilities -->
            <h2 class="mt-5 pt-4 text-center fw-bold">Our Facilities</h2>
            <class="container">
                <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
                    <?php
                    // $res = selectAll('facilities');
                    $res = mysqli_query($con, "SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
                    $path = FACILITIES_IMG_PATH;

                    while ($row = mysqli_fetch_assoc($res)) {
                        // print_r($row);
                        echo <<<data
                        <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        
                            <img src="$path$row[icon]" width="60px">
                            <h5 class="mt-3">$row[name]</h5>
                        </div>
                    
                    data;
                    }

                    ?>
                    <div class="col-lg-12 text-center mt-5">
                        <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities>>></a>
                    </div>
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
                    <div class="col-lg-12 text-center mt-5">
                        <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More>>></a>
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
                            delay: 9000,
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