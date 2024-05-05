<?php
require('include/essentials.php');
require('include/db_config.php');
adminLogin();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Rooms</title>
    <?php require('include/links.php');
    ?>
</head>

<body class="bg-light">
    <?php
    require('include/header.php');
    ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room ">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height:450px;overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data">

                                </tbody>
                            </table>
                        </div>


                        <!-- Add Room Modal -->
                        <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                            <form id="add_room_form" autocomplete="off">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Room</h5>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Name</label>
                                                    <input type="text" name="name" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Area</label>
                                                    <input type="number" min="1" name="area" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Price</label>
                                                    <input type="number" min="1" name="price" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Quantity</label>
                                                    <input type="number" min="1" name="quantity" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Adult(max.)</label>
                                                    <input type="number" min="1" name="adult" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Children(max.)</label>
                                                    <input type="number" min="1" name="children" text class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Children(max.)</label>
                                                    <div class="row">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="carousel_picture.value=''" class="btn btn-secondary shadow-none text-white" data-bs-dismiss="modal">Cancel</button>
                                            <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                                            <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('include/scripts.php');
    ?>
</body>

</html>