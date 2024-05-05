<?php


require('../admin/include/db_config.php');
require('../admin/include/essentials.php');


if (isset($_POST['register'])) {
    $data = filteration($_POST);
    if ($data['pass'] !== $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }
    // $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` = ? LIMIT 1",
    //     [$data['email'], $data['phonenum']],"ss");

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
    // $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`,`dob`, `password`) VALUES (?,?,?,?,?,?)";
    // $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['dob'], $data['password']];

    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`) VALUES (?,?,?,?)";
    $values = [$data['name'], $data['email'], $data['address'], $data['phonenum']];


    // if(insert($query,$values,'ssss'))
    // {
    //     alert('success',"data inserted");
    // }
    // else{
    //     echo 'ins_failed';
    // }



    // print_r($values);
    // insert($query,$values,'ssss');
    //    if(insert($query,$values,'ssssss'))
    //    {
    //        echo 1;
    //    }
    //    else
    //    {
    //        echo 'ins_failed';
    //    }
}


?>
