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
    <title>Admin Panel-Features and Facilities</title>
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
                <h3 class="mb-4">FEATURES & FACILITIES</h3>
                <!-- Features  -->
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 mb-3">Features</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>

                        <div class="table-responsive-md" style="height:350px;overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead>
                                    <tr class="bg-dark text-white">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="features-data">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- features Modal -->
                <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                    <form id="feature_s_form">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Feature</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="feature_name" class="form-control shadow-none" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary shadow-none text-white" data-bs-dismiss="modal">Cancel</button>
                                    <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data   -->
                                    <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

            <!-- Facilities -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 mb-3">Facilities</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-md" style="height:350px;overflow-y:scroll;">
                        <table class="table table-hover border">
                            <thead class>
                                <tr class="bg-dark text-white">
                                    <th scope="col">#</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"width="40%">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="facilities-data">

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- facility Modal -->

            <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                <form id="facility_s_form">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Facility</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name</label>
                                    <input type="text" name="facility_name" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Icon(<small>.svg only</small>)</label>
                                    <input type="file" name="facility_icon" id="member_picture_inp" accept=".svg" class="form-control shadow-none" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="facility_desc" class="form-control shadow-none " required rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary shadow-none text-white" data-bs-dismiss="modal">Cancel</button>
                                <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                                <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                            </div>
                        </div>
                </form>
            </div>


            <?php
            require('include/scripts.php');
            ?>

            <script src="scripts/features_facilities.js"></script>
        </div>
    </div>

</body>

</html>