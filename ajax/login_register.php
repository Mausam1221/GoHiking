<?php


require('../admin/include/db_config.php');
require('../admin/include/essentials.php');


if (isset($_POST['register'])) {
    $data = filteration($_POST);
    // echo $data['name'];


    if ($data['pass'] !== $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }


    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
        [$data['email'], $data['phonenum']],
        'ss'
    );

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // upload image to server
    $img = uploadUserImage($_FILES['profile']);

        if ($img == 'inv_img') {
            echo 'inv_img';
            exit;
        } else if ($img == 'upd_failed') {
            echo 'upd_failed';
            exit;
        }

    //send confirmation link to user's gmail

    $password = password_hash($data['pass'], PASSWORD_BCRYPT);


    $query= "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`) VALUES (?,?,?,?,?,?,?,?)";
    $values = [$data['name'], $data['email'], $data['address'],$data['phonenum'],$data['pincode'], $data['dob'], $img, $password];


    if(insert($query,$values,'ssssssss'))
    {
        echo 1;
    }
    else{
        echo 'ins_failed';
    }
}

if(isset($_POST['login']))
$data = filteration($_POST);
// echo $data['pass'];
$u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1",
[$data['email_mob'], $data['email_mob']], "ss");

if(mysqli_num_rows($u_exist)==0){
    echo 'inv_email_mob';
}
else{
    // echo "user found";
    $u_fetch = mysqli_fetch_assoc($u_exist);
    if(password_verify($data['password'], $u_fetch['password']))
    {
        session_start();
        $_SESSION['login']=true;
        $_SESSION['uId'] = $u_fetch['id'];
        $_SESSION ['uName']= $u_fetch['name'];
         $_SESSION['uPic'] = $u_fetch['profile'];
        $_SESSION['uPhone'] = $u_fetch['phonenum'];
        echo 1;

    }

    else
    {
        echo 'inv_pass';
    }
}

?>
