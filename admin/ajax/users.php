<?php
        require('../include/db_config.php');
        require('../include/essentials.php');
        adminLogin();



if (isset($_POST['get_users'])) {
        $res = selectAll('user_cred');
        $i = 1;
        $path=USERS_IMG_PATH;
        $data='';

        $date=date("d-m-Y",strtotime($row['datentime']));

        while ($row = mysqli_fetch_assoc($res)) {
                $del_btn="<button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i>
                </button>";
                echo <<<data

        <tr class="align-middle">
            <td>$i</td>
            <td>
            <img src="$path$row[profile]"width='50px'>
            <br>
            $row[name]</td>
            <td>$row[email]</td>
            <td>$row[phonenum]</td>
            <td>$row[address]</td>
            <td></td>
            <td></td>
            <td>$row[dob]</td>
            <td>$del_btn</td>
            <td>$date</td>
        

        

        </tr>
        data;
                $i++;
        }
}

if (isset($_POST['remove_user'])) {
        $frm_data = filteration($_POST);

        $res = delete("DELETE FROM `user_cred` WHERE `id`=?", [$frm_data['user_id']], 'i');
        
        if($res)
        {
                echo 1;
        }
        else
        {
                echo 0;
        }
}


if (isset($_POST['search_user'])) {
        $frm_data=filteration($_POST);
        $query="SELECT * FROM `user_cred` WHERE `name`LIKE ?";//like looks for pattern in name column
        $res = select($query,["%$frm_data[name]%"],'s');
        $i = 1;
        $path = USERS_IMG_PATH;
        $data = '';

        $date = date("d-m-Y", strtotime($row['datentime']));

        while ($row = mysqli_fetch_assoc($res)) {
                $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger btn-sm shadow-none'><i class='bi bi-trash'></i>
                </button>";
                echo <<<data

        <tr class="align-middle">
            <td>$i</td>
            <td>
            <img src="$path$row[profile]"width='50px'>
            <br>
            $row[name]</td>
            <td>$row[email]</td>
            <td>$row[phonenum]</td>
            <td>$row[address]</td>
            <td></td>
            <td></td>
            <td>$row[dob]</td>
            <td>$del_btn</td>
            <td>$date</td>
        

        

        </tr>
        data;
                $i++;
        }
}


?>