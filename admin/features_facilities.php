<?php
require('include/essentials.php');
require('include/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
    // echo $_GET['seen'];//1
    $frm_data = filteration($_GET);

    if ($frm_data['seen'] == 'all') {
        $q = "UPDATE `user_queries` SET `seen`=?";
        $values = [1];
        if (update($q, $values, 'i')) {
            alert('success', 'Marked all as readed');
        } else {
            alert('error', 'error!');
        }
    } else {
        $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
        $values = [1, $frm_data['seen']];
        if (update($q, $values, 'ii')) {
            alert('success', 'Marked as readed');
        } else {
            alert('error', 'error!');
        }
    }
}


if (isset($_GET['del'])) {
    // echo $_GET['seen'];//1
    $frm_data = filteration($_GET);

    if ($frm_data['del'] == 'all') {
        $q = "DELETE FROM `user_queries`";
        // $values = [$frm_data['del']];
        if (mysqli_query($con, $q)) {
            alert('success', 'All Data Deleted');
        } else {
            alert('error', 'error!');
        }
    } else {
        $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
        $values = [$frm_data['del']];
        if (delete($q, $values, 'i')) {
            alert('success', 'Deleted');
        } else {
            alert('error', 'error!');
        }
    }
}


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
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 mb-3">Management Team</h5>
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>





                        <div class="table-responsive-md" style="height:350px;overflow-y:scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
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
            </div>
        </div>
    </div>

    <!-- Management Team Modal -->
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
                        <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                        <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                    </div>
                </div>
        </form>
    </div>

    <?php
    require('include/scripts.php');
    ?>

    <script>
        let feature_s_form = document.getElementById('feature_s_form');

        feature_s_form.addEventListener('submit', function(e) {
            e.preventDefault(); //prevent submission of form
            add_feature();
        });

        function add_feature() {

            // console.log(feature_s_form.elements['feature_name'].value);
            let data = new FormData();
            data.append('name', feature_s_form.elements['feature_name'].value); //we are not using id to append data
            data.append('add_feature', '');

            //AJAX CALL TO HANDLE FORM SUBMISSION
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);

            xhr.onload = function() {
                console.log(this.responseText);

                var myModel = document.getElementById("feature-s");
                var model = bootstrap.Modal.getInstance(myModel);
                model.hide();

                if (this.responseText == 1) {
                    alert('success', "New Feature Added!");
                    feature_s_form.elements['feature_name'].value = '';
                    get_features();
                } else {
                    alert('error', "Server Down!")

                }
            }
            xhr.send(data); //data will be send from here---->settings_crud
        }

        function get_features() {

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                // console.log(12);
                document.getElementById('features-data').innerHTML = this.responseText;
            }

            xhr.send("get_features"); //this will hits the features_facilities.php

        }

        function rem_feature(val) {
            // console.log(val);
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/features_facilities.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.responseText == 1) {
                    alert('success', "Feature Removed Successfully!");
                    get_features();
                } else {
                    alert('error', "Member Removed Failed")
                }
            }

            xhr.send('rem_feature=' + val);
        }







        window.onload = function() {
            get_features();
        }
    </script>
</body>

</html>