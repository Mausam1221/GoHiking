<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login Model -Rooms
    </title>
    <style>


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
        <h2 class="fw-bold text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio accusamus nulla
            ducimus quas quos! Quaerat repellat voluptates fugit nihil corrupti.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 px-4">
                <nav class="navbar navbar-expand-lg  rounded bg-white navbar-light shadow bg-body-tertiary">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4>FILTERS</h4>
                        <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded ">
                                <h5 class="mb-3" style="font-size:18px">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check in</label>
                                <input type="date" class="form-control shadow-none mb-2">
                                <label class="form-label">Check out</label>
                                <input type="date" class="form-control shadow-none ">
                            </div>

                            <div class="border bg-light p-3 rounded mt-2">
                                <h5 class="mb-3" style="font-size:18px">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check in</label>
                                <input type="date" class="form-control shadow-none mb-2">
                                <label class="form-label">Check out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 rounded mt-2">
                                <h5 class="mb-3" style="font-size:18px">FACILITIES</h5>
                                <div class="mb-2">
                                    <input type="checkbox" name="" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f1">Facility 1</label>
                                </div>
                                <!-- wherever you click,check will be triggered -->
                                <div class="mb-2">
                                    <input type="checkbox" name="" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f2">Facility 2</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" name="" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f3">Facility 3</label>

                                </div>
                            </div>
                            <div class="border bg-light p-3 rounded mt-2">
                                <h5 class="mb-3" style="font-size:18px">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0  p-3">
                        <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/4.jpeg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofa </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill-bg-light text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>
                        </div>


                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0  p-3">
                        <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/4.jpeg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofa </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill-bg-light text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>
                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4  text-center">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0  p-3">
                        <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/4.jpeg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofa </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill-bg-light text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>
                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4  text-center">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0  p-3">
                        <div class="col-md-3 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/about/4.jpeg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Simple Room Name</h5>
                            <div class="features mb-3">
                                <h6 class="mb-1">Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    2 Rooms </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Bathroom </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Balcony </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Sofa </span>
                            </div>

                            <div class="facilities mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Wifi </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Television </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    AC
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Room heater
                                </span>
                            </div>

                            <div class="guests">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    5 Adults
                                </span>
                                <span class="badge rounded-pill-bg-light text-dark text-wrap">
                                    4 Children
                                </span>
                            </div>
                        </div>


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4  text-center">
                            <h6 class="mb-4">$200 per night</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <!-- Footer -->

    <?php require('include/footer.php');?>



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