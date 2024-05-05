<?php
    require('include/essentials.php');
    require('include/db_config.php');


 
    session_start();
    if((isset($_SESSION['adminLogin'])&& $_SESSION['adminLogin']==true))//after log in you cannot go to index.php page which is login form page.
    {
        redirect('dashboard.php');
    }

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php require('include/links.php')?>
    <style>
    .login-form {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
    }
    </style>
</head>

<body class="bg-light">


    <div class="login-form text-center rounded shadow overflow-hidden bg-white">
        <form method="POST">
            <h5 class="text-white bg-dark fs-4 py-3 bt">Admin Login Panel</h5>
            <div class="p-4 bt">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control shadow-none text-center"
                        placeholder="Username">
                </div>

                <div class="mb-4">
                    <input name="admin_pass" required type="password" class="form-control shadow-none text-center"
                        placeholder="Password">
                </div>

                <button name="login" type="submit" class="btn btn-dark text-white shadow-none ">
                    LOGIN
                </button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['login'])){

        $frm_data=filteration($_POST);
        // echo "<h1>$frm_data[admin_name]</h1>";
        // echo "<h1>$frm_data[admin_pass]</h1>";
        // print_r($frm_data);

        $query="SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
        $values=[$frm_data['admin_name'],$frm_data['admin_pass']];
        // $datatypes="ss";//s=admin_name=string,s=admin_pass=string
        $res=select($query,$values,"ss");
        // print_r($res);
        if($res->num_rows==1){
            $row = mysqli_fetch_assoc($res) ;
            // session_start();//ONLY ONE TIME which we started earlier
            $_SESSION[ 'adminLogin'] = true;
            $_SESSION[ 'adminId'] = $row['sr_no'];
            alert('success','Login Successful');
            redirect('dashboard.php');
        }
        else{
            alert('error','Login failed - Invalid Credintials');
        }
    } ;
    
    
    ?>










    <?php require('include/scripts.php')?>
</body>

</html>