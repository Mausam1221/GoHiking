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
                            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal"
                                data-bs-target="#add-room ">
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
                        <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

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
                                                    <input type="text" name="name" text class="form-control shadow-none"
                                                        required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Area</label>
                                                    <input type="number" min="1" name="area" text
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Price</label>
                                                    <input type="number" min="1" name="price" text
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Quantity</label>
                                                    <input type="number" min="1" name="quantity" text
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Adult(max.)</label>
                                                    <input type="number" min="1" name="adult" text
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-bold">Children(max.)</label>
                                                    <input type="number" min="1" name="children" text
                                                        class="form-control shadow-none" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label fw-bold">Features</label>
                                                    <div class="row">
                                                        <?php
                                                        $res = selectAll('features');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'> $opt[name]
                                                            </label>
                                                            </div>
                                                            ";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label fw-bold">Facilities</label>
                                                    <div class="row">
                                                        <?php
                                                        $res = selectAll('facilities');
                                                        while ($opt = mysqli_fetch_assoc($res)) {
                                                            echo "
                                                            <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'> $opt[name]
                                                            </label>
                                                            </div>
                                                            ";
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label fw-bold">Description</label>
                                                    <textarea name="desc" rows="4" class="form-control shadow-none"
                                                        required></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary shadow-none text-white"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                                            <button type="submit"
                                                class="btn btn-success shadow-none text-white">Submit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- edit room modal -->
                    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                        <form id="edit_room_form" autocomplete="off">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Room</h5>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Name</label>
                                                <input type="text" name="name" text class="form-control shadow-none"
                                                    required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Area</label>
                                                <input type="number" min="1" name="area" text
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Price</label>
                                                <input type="number" min="1" name="price" text
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Quantity</label>
                                                <input type="number" min="1" name="quantity" text
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Adult(max.)</label>
                                                <input type="number" min="1" name="adult" text
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Children(max.)</label>
                                                <input type="number" min="1" name="children" text
                                                    class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label fw-bold">Features</label>
                                                <div class="row">
                                                    <?php
                                                    $res = selectAll('features');
                                                    while ($opt = mysqli_fetch_assoc($res)) {
                                                        echo "
                                                            <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='features' value='$opt[id]' class='form-check-input shadow-none'> $opt[name]
                                                            </label>
                                                            </div>
                                                            ";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label fw-bold">Facilities</label>
                                                <div class="row">
                                                    <?php
                                                    $res = selectAll('facilities');
                                                    while ($opt = mysqli_fetch_assoc($res)) {
                                                        echo "
                                                            <div class='col-md-3 mb-1'>
                                                            <label>
                                                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'> $opt[name]
                                                            </label>
                                                            </div>
                                                            ";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label fw-bold">Description</label>
                                                <textarea name="desc" rows="4" class="form-control shadow-none"
                                                    required></textarea>
                                            </div>
                                            <input type="hidden" name="room_id">
                                            <!--will get the value from js  -->
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary shadow-none text-white"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                                        <button type="submit"
                                            class="btn btn-success shadow-none text-white">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('include/scripts.php');
    ?>
    <script>
    let add_room_form = document.getElementById('add_room_form');
    add_room_form.addEventListener('submit', (e) => {
        e.preventDefault();
        add_room();
    })

    function add_room() {

        let data = new FormData();
        data.append('add_room', '');
        data.append('name', add_room_form.elements['name'].value); //on name basis
        data.append('area', add_room_form.elements['area'].value);
        data.append('price', add_room_form.elements['price'].value);
        data.append('quantity', add_room_form.elements['quantity'].value);
        data.append('adult', add_room_form.elements['adult'].value);
        data.append('children', add_room_form.elements['children'].value);
        data.append('desc', add_room_form.elements['desc'].value);

        let features = [];

        add_room_form.elements['features'].forEach(el => {
            if (el.checked) {
                // console.log(el.value);
                features.push(el.value)
            }
        });
        let facilities = [];

        add_room_form.elements['facilities'].forEach(el => {
            if (el.checked) {
                // console.log(el.value);
                facilities.push(el.value)
            }
        });

        data.append('features', JSON.stringify(features));
        data.append('facilities', JSON.stringify(facilities));


        //AJAX CALL TO HANDLE FORM SUBMISSION
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function() {
            console.log(this.responseText);

            var myModel = document.getElementById("add-room");
            var model = bootstrap.Modal.getInstance(myModel);
            model.hide();

            if (this.responseText == 1) {
                alert('success', "New Room Added!");
                add_room_form.reset();
                // get_features();
            } else {
                alert('error', "Server Down!")

            }
        }
        xhr.send(data); //data will be send from here---->rooms.php
    }

    function get_all_rooms() {

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        xhr.onload = function() {
            document.getElementById('room-data').innerHTML = this.responseText;
            // get_all_rooms();

        }
        xhr.send('get-all-rooms');
    }

    let edit_room_form = document.getElementById('edit_room_form');

    function edit_details(id) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        xhr.onload = function() {
            let data = JSON.parse(this.responseText);//everything that comes from ajax is in text form
            edit_room_form.elements['name'].value = data.roomdata
            .name; //setting data in modal data ko roomdata=>name
            edit_room_form.elements['area'].value = data.roomdata.area;
            edit_room_form.elements['price'].value = data.roomdata.price;
            edit_room_form.elements['quantity'].value = data.roomdata.quantity;
            edit_room_form.elements['name'].value = data.roomdata.name;
            edit_room_form.elements['name'].value = data.roomdata.name;
            edit_room_form.elements['adult'].value = data.roomdata.adult;
            edit_room_form.elements['children'].value = data.roomdata.children;
            edit_room_form.elements['desc'].value = data.roomdata.description;
            edit_room_form.elements['room_id'].value = data.roomdata.room_id;


            edit_room_form.elements['facilities'].forEach(el => {
                if (data.facilities.includes(Number(el.value))) {//conver to number because data that comes from ajax is always in text form.
                    el.checked = true;
                }
            });
            edit_room_form.elements['features'].forEach(el => {
                if (data.features.includes(Number(el.value))) {
                    el.checked = true;
                }
            });

        }
        xhr.send('get_room=' + id);
    }

    function toggle_status(id, val) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');


        xhr.onload = function() {
            if (this.responseText == 1) {
                alert("success", "Successfully toggled.")
                get_all_rooms();
            } else {
                alert("error", " toggle failed.")

            }
        }
        xhr.send('toggle_status=' + id + '&value=' + val);
    }










    window.onload = function() {
        get_all_rooms();
    }
    </script>
</body>

</html>