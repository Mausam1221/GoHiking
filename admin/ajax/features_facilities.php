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

        <tr>
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


?>