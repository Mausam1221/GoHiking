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
    <title> <?php echo $settings_r['site_title'] ?> - Contact</title>


    <!-- swiperJs CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <?php
    require('include/header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Contact Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus nulla
            ducimus quas quos! Quaerat repellat voluptates fugit nihil corrupti.</p>
    </div>


    <?php
    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` =?";
    $values = [1];
    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    // print_r ($contact_r); //this code is used in index.php so we can you it here too

    ?>






    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <iframe class="w-100 rounded mb-4" src="<?php echo $contact_r['iframe'] ?>" height="320px" loading="lazy">
                    </iframe>
                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-geo-alt-fill"></i><?php echo $contact_r['address'] ?></a>
                    <h5 class="mt-4">Call Us</h5>

                    <a href="tel:+<?php echo $contact_r['ph1'] ?>" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-telephone-fill me-2"></i><?php echo $contact_r['ph1'] ?></a><br />

                    <?php
                    if ($contact_r['ph2'] != '') {
                        echo <<<data
                        <a href="tel:+$contact_r[ph2]" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-telephone-fill me-2"></i>$contact_r[ph2]</a>
                    data;
                    }
                    ?>




                    <h5 class="mt-4">Email:</h5>
                    <a href="<?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark mb-2"><i class="bi bi-envelope-fill me-2"></i><?php echo $contact_r['email'] ?></a>

                    <h5>Follow Us</h5>
                    <span>
                        <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-2 text-dark fs-4 me-3">
                            <i class="bi bi-facebook me-1"></i></a>
                    </span>
                    <span>
                        <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-2 text-dark fs-4 me-3">
                            <i class="bi bi-instagram me-1"></i></a>
                    </span>
                    <span>
                        <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-2 text-dark fs-4 me-3">
                            <i class="bi bi-twitter-x me-1"></i></a>
                    </span>

                </div>


            </div>


            <div class="col-lg-6 col-md-5 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 ">
                    <form method="POST">
                        <h5>Send us a message:</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">
                                Name:
                            </label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">
                                Email:
                            </label>
                            <input type="text" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">
                                Subject:
                            </label>
                            <input type="text" name="subject" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500">
                                Message:
                            </label>
                            <textarea class="form-control shadow-none " required name="message" rows="5" style="resize:none;"></textarea>
                            <button type="submit" name="send" class="btn btn-dark shadow-none mt-2">
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['send'])) {
                $frm_data = filteration($_POST);
                $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
                $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
                $res = insert($q, $values, 'ssss');
                if ($res == 1) {
                    alert('success', "Message sent!");
                } else {
                    alert('error', "Something went wrong Try again!");
                }
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