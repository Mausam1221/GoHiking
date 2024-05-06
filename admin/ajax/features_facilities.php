<?php
        require('../include/db_config.php');
        require('../include/essentials.php');
        adminLogin();

if (isset($_POST['add_feature']))
{
    echo $_POST['add_feature'];
    // echo "1";
    $frm_data = filteration($_POST);

    $q= "INSERT INTO `features`(`name`) VALUES (?)";
    $values = [$frm_data['name']];
    $res = insert($q, $values, 's');
    echo $res;

}

if(isset($_POST['get_features'])){
    $res = selectAll('features');
    $i=1;

    while($row=mysqli_fetch_assoc($res)){
        
        echo <<<data

        <tr class="align-middle">
            <td>$i</td>
            <td>$row[name]</td>
            <td>
                    <button type="button" onclick="rem_feature($row[id])" class="btn btn-sm btn-danger shadow-none"><i class="bi bi-trash"></i>Delete</button>
            </td>

        </tr>
        data;
        $i++;
    }
    
    
}

if(isset($_POST['rem_feature'])){
    
    // echo "<script>console.log('hello');</script>";
    $frm_data= filteration($_POST);
    $values=[$frm_data['rem_feature']];

    $pre_q= "SELECT * FROM `features` WHERE `id`=?";
    $q="DELETE FROM `features` WHERE `id`=?";
    $res=delete($q,$values,'i');
    echo $res;
}

if (isset($_POST['add_facility'])) {
    $frm_data = filteration($_POST);
    $img_r = uploadSVGImage($_FILES['icon'], FACILITIES_FOLDER);//here is image
    // echo $img_r;
    if ($img_r == 'inv_img') {
        echo $img_r;
    } else if ($img_r == 'inv_size') {
        echo $img_r;
    } else if ($img_r == 'upd_failed') {
        echo $img_r;
    } else {
        $q= "INSERT INTO `facilities`(`name`, `icon`, `Description`) VALUES (?,?,?)";
        $values = [ $frm_data['name'], $img_r, $frm_data['desc']];
        $res = insert($q, $values, 'sss');
        echo $res;
    }
}

if (isset($_POST['get_facilities'])) {
    $res = selectAll('facilities');
    $i = 1;
    $path = FACILITIES_IMG_PATH;

    while ($row = mysqli_fetch_assoc($res)) {

        echo <<<data

        <tr class="align-middle">
            <td>$i</td>
            <td><img src="$path$row[icon]"width="30px"</td>
            <td>$row[name]</td>
            <td>$row[Description]</td>
            <td>
                    <button type="button" onclick="rem_facility($row[id])" class="btn btn-sm btn-danger shadow-none"><i class="bi bi-trash"></i>Delete</button>
            </td>

        </tr>
        data;
        $i++;
    }
}

// if (isset($_POST['rem_facility'])) {

//     // echo "<script>console.log('hello');</script>";
//     $frm_data = filteration($_POST);
//     $values = [$frm_data['rem_facility']];

//     $pre_q = "SELECT * FROM `facilities` WHERE `id`=?";
//     $q = "DELETE FROM `facilities` WHERE `id`=?";
//     $res = delete($q, $values, 'i');
//     echo $res;
// }

if (isset($_POST['rem_facility'])) {
    // echo "<script>console.log('hello');</script>";
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_facility']];

    $pre_q = "SELECT * FROM `facilities` WHERE `id`=?";
    // echo $values;
    $res = select($pre_q, $values, 'i');
    $img = mysqli_fetch_assoc($res);

    if (deleteImage($img['icon'], FACILITIES_FOLDER)) {
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q, $values, 'i');
        echo $res;
    } else {
        echo 0;
    }

    
}


?>