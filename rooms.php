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
    <title> <?php echo $settings_r['site_title'] ?> - Room</title>


    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Our Destinations</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus nulla
            ducimus quas quos! Quaerat repellat voluptates fugit nihil corrupti.</p>
    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 col-md-12 px-4">
            <?php
                $room_res=select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?",[1,0],'ii');
                while($room_data=mysqli_fetch_assoc($room_res))
                {
                    //get thumbnail of image
                
                    $room_thumb = ROOMS_IMG_PATH. "thumbnail.jpg";
                    $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
                    WHERE `room_id`='$room_data[id]'
                    AND `thumb`='1'");
                    if(mysqli_num_rows($thumb_q)>0){
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH. $thumb_res['image'];
                    }
                $book_btn = '';
                if (!$settings_r['shutdown']) {
                    $book_btn = " <a href='#' class='btn btn-sm w-100 btn-outline-dark shadow-none mb-2'>Book Now</a>";
                }
                    echo<<<data
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0  p-3">
                                <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                                    <img src="$room_thumb" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3">$room_data[name]</h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        
                                    </div>

                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                    
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Description</h6>
                                    <p>$room_data[description]</p>
                                    </div>

                                    
                                </div>


                                <div class="col-md-2 text-center mt-4">
                                    <h6 class="mb-4">$$room_data[price]</h6>
                                   $book_btn
                                    <a href="room_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                                </div>
                            </div>
                        </div>
                    data;
                }

                ?>


            </div>

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