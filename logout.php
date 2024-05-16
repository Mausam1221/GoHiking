<?php
// include 'include/essentials.php';
include 'admin/include/essentials.php';//to use redirect function
session_start();
session_destroy();
redirect('index.php');
?>

