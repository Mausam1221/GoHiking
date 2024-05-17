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
    <title>Dashboard-Destination</title>
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
                <h3 class="mb-4">Destination</h3>
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



                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- Add Room Modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <form id="add_room_form" autocomplete="off">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Destination</h5>
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
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none text-white" data-bs-dismiss="modal">Cancel</button>
                        <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                        <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- edit room modal -->
    <div class="modal fade" id="edit-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <form id="edit_room_form" autocomplete="off">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit destination</h5>
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
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <input type="hidden" name="room_id">
                            <!--will get the value from js  -->
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary shadow-none text-white" data-bs-dismiss="modal">Cancel</button>
                        <!-- onclick function is used to reset the entered name and picture if the user click on cancel after putting data  -->
                        <button type="submit" class="btn btn-success shadow-none text-white">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Add image Modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Destination Name</h1>
                    </h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image-alert"></div>
                    <div class="border-bottom border-3 pb-3 mb-3">
                        <form id="add_image_form">
                            <label class="form-label fw-bold">Picture</label>
                            <input type="file" name="image" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none mb-3" required>
                            <button class="btn btn-success shadow-none text-white">Add</button>
                            <input type="hidden" name="room_id">

                        </form>
                    </div>
                    <div class="table-responsive-lg" style="height:350px;overflow-y:scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light sticky-top">
                                    <th scope="col" width="60%">Image</th>
                                    <th scope="col">Thumb</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody id="room-image-data">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('include/scripts.php');
    ?>
    <script src="scripts/rooms.js"></script>
    <script>
        let edit_room_form = document.getElementById('edit_room_form');

        function edit_details(id) 
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                let data = JSON.parse(this.responseText); //everything that comes from ajax is in text form
                edit_room_form.elements['name'].value = data.roomdata.name; //setting data in modal data ko roomdata=>name
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
                    if (data.facilities.includes(Number(el.value))) { //conver to number because data that comes from ajax is always in text form.
                        el.checked = true;
                    }
                });
                edit_room_form.elements['features'].forEach(el => {
                    if (data.features.includes(Number(el.value))) {
                        el.checked = true;
                    }
                });

            }
            xhr.send('get_room='+id);
        }


        edit_room_form.addEventListener('submit', (e) => {
            e.preventDefault();
            submit_edit_room();
        })

        function submit_edit_room() {

            let data = new FormData();
            data.append('edit_room', '');
            data.append('room_id', edit_room_form.elements['room_id'].value);
            data.append('name', edit_room_form.elements['name'].value); //on name basis
            data.append('area', edit_room_form.elements['area'].value);
            data.append('price', edit_room_form.elements['price'].value);
            data.append('quantity', edit_room_form.elements['quantity'].value);
            data.append('adult', edit_room_form.elements['adult'].value);
            data.append('children', edit_room_form.elements['children'].value);
            data.append('desc', edit_room_form.elements['desc'].value);

            let features = [];

            edit_room_form.elements['features'].forEach(el => {
                if (el.checked) {
                    // console.log(el.value);
                    features.push(el.value)
                }
            });
            let facilities = [];

            edit_room_form.elements['facilities'].forEach(el => {
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

                var myModel = document.getElementById("edit-room");
                var model = bootstrap.Modal.getInstance(myModel);
                model.hide();

                if (this.responseText == 1) {
                    alert('success', "Room Data Edited!");
                    edit_room_form.reset();
                    get_all_rooms();
                    // get_features();
                } else {
                    alert('error', "Server Down!")

                }
            }
            xhr.send(data); //data will be send from here---->rooms.php
        }





        let add_image_form = document.getElementById('add_image_form');

        add_image_form.addEventListener('submit', (e) => {
            e.preventDefault();
            add_image();
            // console.log("clicked")
        })

        function add_image() {
            // console.log("cl");
            let data = new FormData();
            data.append('image', add_image_form.elements['image'].files[0]);
            data.append('room_id', add_image_form.elements['room_id'].value);
            data.append('add_image', '');

            //AJAX CALL TO HANDLE FORM SUBMISSION
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                // console.log(this.responseText);

                if (this.responseText == 'inv_img') {
                    alert("error, Only JPG, WEBP and PNG file allowed");


                } else if (this.responseText == 'inv_size') {
                    alert('error', "image size must be less than 2MB!", 'image-alert')

                } else if (this.responseText == 'upd_failed') {
                    alert('error', "uploading failed Server Down!", 'image-alert')

                } else {
                    alert('success', "New Image Added!", 'image-alert');
                    room_images(add_image_form.elements['room_id'].value, document.querySelector("#room-images .modal-title").innerText)
                    add_image_form.reset()
                    // get_carousel();
                }
            }
            xhr.send(data);
        }

        function room_images(id, rname) {
            document.querySelector("#room-images .modal-title").innerText = rname;
            add_image_form.elements['room_id'].value = id;
            add_image_form.elements['image'].value = '';


            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onload = function() {
                document.getElementById('room-image-data').innerHTML = this.responseText;
            };
            xhr.send('get_room_images=' + id);
        }

        function rem_image(img_id, room_id) {
            let data = new FormData();
            data.append('image_id', img_id);
            data.append('room_id', room_id);
            data.append('rem_image', '');

            //AJAX CALL TO HANDLE FORM SUBMISSION
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                // console.log(this.responseText);

                if (this.responseText == 1) {
                    alert('success', " Image Removed!", 'image-alert');
                    room_images(add_image_form.elements['room_id'].value, document.querySelector("#room-images .modal-title").innerText)


                } else {
                    alert('error', "Failed Removing Image!", 'image-alert');

                    add_image_form.reset()
                    // get_carousel();
                }
            }
            xhr.send(data);
        }

        function thumb_image(img_id, room_id) {
            let data = new FormData();
            data.append('image_id', img_id);
            data.append('room_id', room_id);
            data.append('thumb_image', '');

            //AJAX CALL TO HANDLE FORM SUBMISSION
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                // console.log(this.responseText);

                if (this.responseText == 1) {
                    alert('success', " Thumbnail updated successfully!", 'image-alert');
                    room_images(add_image_form.elements['room_id'].value, document.querySelector("#room-images .modal-title").innerText)


                } else {
                    alert('error', "Thumbnail update failed!", 'image-alert');

                    add_image_form.reset()
                    // get_carousel();
                }
            }
            xhr.send(data);
        }

        function remove_room(room_id) {

            if (confirm("Are you sure want to delete this room?")) {
                let data = new FormData();
                data.append('room_id', room_id);
                data.append('remove_room', '');

                //AJAX CALL TO HANDLE FORM SUBMISSION
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/rooms.php", true);

                xhr.onload = function() {
                    // console.log(this.responseText);

                    if (this.responseText == 1) {
                        alert('success', " Room removed successfully!");
                        get_all_rooms();


                    } else {
                        alert('error', "Cannot Delete!");

                        add_image_form.reset()
                        // get_carousel();
                    }
                }
                xhr.send(data);
            }


        }
    </script>

</body>

</html>