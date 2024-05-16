<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>


    </style>
    <?php
    require('include/links.php');
    ?>
    <title> <?php echo $settings_r['site_title'] ?> - Destination</title>


    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <?php
    if (!isset($_GET['id'])) {
        redirect('rooms.php');
    }
    $data = filteration($_GET);
    // echo $data['id'];
    $room_res = select("SELECT * FROM `rooms` WHERE `status`=?", [1], 'i');

    // $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=?", $data['id'], [1], 'ii');
    // if (mysqli_num_rows($room_data) == 0) {
    //     redirect('rooms.php');
    // }
    // $room_data = mysqli_fetch_assoc($room_res);



    ?>



    <div class="container">

        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold"><?php echo $room_data['name'] ?></h2>
                <div style="font-size: 14px;"> <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class=" text-secondary"> 
                    </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">Destination</a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 px-4 bg-dark">
                <div id="roomCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <?php
                // $room_res=select("SELECT * FROM `rooms` WHERE `status`=?",[1],'i');
                // while($room_data=mysqli_fetch_assoc($room_res))
                // {
                //     // echo $room_data;
                //     echo<<<data
                //         <div class="card mb-4 border-0 shadow">
                //             <div class="row g-0  p-3">
                //                 <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                //                     <img src="images/about/4.jpeg" class="img-fluid rounded">
                //                 </div>
                //                 <div class="col-md-5 px-lg-3 px-md-3 px-0">
                //                     <h5 class="mb-3">$room_data[name]</h5>
                //                     <div class="features mb-3">
                //                         <h6 class="mb-1">Features</h6>

                //                     </div>

                //                     <div class="facilities mb-3">
                //                         <h6 class="mb-1">Facilities</h6>

                //                     </div>
                //                     <div class="facilities mb-3">
                //                         <h6 class="mb-1">Description</h6>
                //                     <p>$room_data[description]</p>
                //                     </div>


                //                 </div>


                //                 <div class="col-md-2 text-center mt-4">
                //                     <h6 class="mb-4">$200</h6>
                //                     <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
                //                     <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                //                 </div>
                //             </div>
                //         </div>
                //     data;
                // }

                ?>


                <!-- </div> -->

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