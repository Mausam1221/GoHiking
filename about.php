<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login Model -About Us
    </title>
    <style>
    .box {
        border-top: 4px solid red !important;
    }
    </style>
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

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus nulla
            ducimus quas quos! Quaerat repellat voluptates fugit nihil corrupti.</p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-2">
                <h3 class="mb-3">Lorem ipsum dolor sit</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor voluptatem quas quisquam nesciunt
                    praesentium non? Mollitia nobis necessitatibus ipsum placeat.</p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
                <img src="images/swiper/4.jpg" class="w-100">
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 text-center box">
                    <img src="images/about/1.jpg" width=100px>
                    <h4 class="mt-3">50+ Places</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 text-center box">
                    <img src="images/about/1.jpg" width=100px>
                    <h4 class="mt-3">50+ Places</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 text-center box">
                    <img src="images/about/1.jpg" width=100px>
                    <h4 class="mt-3">50+ Places</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 text-center box">
                    <img src="images/about/1.jpg" width=100px>
                    <h4 class="mt-3">50+ Places</h4>
                </div>
            </div>
        </div>
    </div>

<!-- management team -->
    <h2 class="fw-bold text-center mt-4">Management Teams</h2>
    <div class="container px-4">
        <div class="swiper mySwiper-about">
            <div class="swiper-wrapper mb-5">

            <?php 
                $about_r=selectAll('team_details');
                $path=ABOUT_IMG_PATH;
                while($row=mysqli_fetch_assoc($about_r)){
                    echo <<<data
                        <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                            <img src="$path$row[picture]" class="w-100">
                            <h4 class="mt-2">$row[name]</h4>
                        </div>

                    data;
                };
            ?>




                <!-- <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div>
                <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div>
                <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div>
                <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div>
                <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div>
                <div class="swiper-slide bg-white rounded overflow-hidden text-center">
                    <img src="images/about/4.jpeg" class="w-100">
                    <h4 class="mt-2">Random Person</h4>
                </div> -->

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <!-- Footer -->

    <?php require('include/footer.php');?>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
    var swiper = new Swiper(".mySwiper-about", {
        // slidesPerView:4,
        spaceBetween:20,
        loop:true,
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
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