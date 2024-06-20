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
    <title> <?php echo $settings_r['site_title'] ?> - Confirm Booking</title>


    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>
    <?php
    if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
        redirect('rooms.php');
    } else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('rooms.php');
    }

    $data = filteration($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }
    $room_data = mysqli_fetch_assoc($room_res);
    $_SESSION['room'] = [
        "id" => $room_data['id'],
        "name" => $room_data['name'],
        "price" => $room_data['price'],
        "payment" => null,
        "available" => false,
    ];

    $user_res = select(
        "SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",
        [$_SESSION['uId']],
        "i"
    );
    $user_data = mysqli_fetch_assoc($user_res);


    ?>


    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold">CONFIRM BOOKING</h2>
                <div style="font-size:14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
                    <span class="text-secondary"> > </span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">CONFIRM</a>

                </div>
            </div>

            <div class="col-lg-7 col-md-12 ">
                <?php
                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
                    WHERE `room_id`='$room_data[id]'
                    AND `thumb`='1'");
                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }
                echo <<<data
                    <div class="card p-3 shadow-sm rounded">
                    <img
                    src="$room_thumb" class="img-fluid rounded mb-3">
                    <h5>$room_data[name]</h5>
                    <h6>Rs.$room_data[price] per trip</h6>
                    </div> 
                    data;

                ?>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 shadow-sm rounded-3 border-0">
                    <div class="card-body">
                        <form action="pay_now.php" method="POST" id="booking_form">
                            <h6 class="mb-3">BOOKING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone number</label>
                                    <input name="phone" type="number" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control shadow-none " required rows="1"><?php echo $user_data['address'] ?></input>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Choose Date</label>
                                    <input name="date" type="date" class="form-control shadow-none" required>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Destination ID</label>
                                    <input name="destination_id" type="number" value="25" class="form-control shadow-none" readonly>
                                </div>
                                <div class="col-md-12">
                                    <h6>Total amount to pay:<?php echo "$$room_data[price]" ?></h6>
                                    <button name="pay_now" onclick="paynow()" class="btn w-100 text-white bg-success shadow-none mb-1">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                function paynow(room_id) {
                    alert("hello");
                }
            </script>

            <!-- Footer -->

            <?php require('include/footer.php'); ?>



            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

            <script>
                var swiper = new Swiper(".", {
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    effect: "fade",
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    }
                });
            </script>
</body>

</html>