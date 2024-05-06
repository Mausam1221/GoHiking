<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login Model -Facilities
    </title>
    <style>


    </style>
    <?php
    require('include/links.php');
    ?>
    <style>
        .pop:hover {
            border-top-color: teal!important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Our Facilites</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus nulla
            ducimus quas quos! Quaerat repellat voluptates fugit nihil corrupti.</p>
    </div>

    <div class="container">
        <div class="row">

        <?php 
        $res = selectAll('facilities');
        $path = FACILITIES_IMG_PATH;

        while($row=mysqli_fetch_assoc($res))
        {
            // print_r($row);
            echo<<<data
                    <div class="col-lg-4 col-md-6 mb-5 px-4">
                        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                            <div class="d-flex align-items-center mb-2">
                                <img src="$path$row[icon]" width="40px">
                                <h5 class="m-0 ms-3">$row[name]</h5>
                            </div>
                            <p>
                            $row[Description]
                            </p>
                        </div>
                    </div>

            data;
            
        }
        
        ?>
            


        </div>
    </div>










    <!-- Footer -->

    <?php require('include/footer.php'); ?>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper-about", {
            // slidesPerView:4,
            spaceBetween: 20,
            loop: true,
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