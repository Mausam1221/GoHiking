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
    <title>Admin Panel-users</title>
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
                <h3 class="mb-4">Users</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-3">
                            <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to Search...">
                        </div>


                        <div class="table-responsive" style="min-width:'1300px';">
                            <table class="table table-hover border text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Verified</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require('include/scripts.php');
    ?>
    <script src="scripts/users.js"></script>
    <script>
        function get_users() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('users-data').innerHTML = this.responseText;
            }

            xhr.send('get_users');

        }


        function remove_user(user_id) {
            if (confirm("Are you sure want to remove this user?")) {
                let data = new FormData();
                data.append('user_id', user_id);
                data.append('remove_user', '');

                //AJAX CALL TO HANDLE FORM SUBMISSION
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/users.php", true);

                xhr.onload = function() {
                    // console.log(this.responseText);

                    if (this.responseText == 1) {
                        alert('success', " User removed successfully!");
                        get_users();


                    } else {
                        alert('error', "Cannot Delete!");

                    }
                }
                xhr.send(data);
            }
        }


        function search_user(username) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/users.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                document.getElementById('users-data').innerHTML = this.responseText;
            }

            xhr.send('search_user&name='+username);

        }
        window.onload = function() {
            get_users();
        }
    </script>
</body>

</html>