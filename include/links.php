<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- bootstrap icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- fontawesome-icon cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">



<link rel="stylesheet" href="css/common.css">

<?php
session_start();




require('admin/include/db_config.php'); //we dont need to use ../ because we use header in index.php it relocate its position from index.php
require('admin/include/essentials.php');


$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no` =?";
$settings_q = "SELECT * FROM `settings` WHERE `sr_no` =?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i')); //move this lines to link.php
$settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i')); //move this lines to link.php


if($settings_r['shutdown']==1)
{
    echo<<<alertbar
    <div class='bg-danger text-center p-2 fw-bold'>
    <i class="bi bi-exclamation-triangle-fill"></i>
        Bookings are temporarily closed!
    </div> 
    alertbar;
}

?>