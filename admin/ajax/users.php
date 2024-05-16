<?php
        require('../include/db_config.php');
        require('../include/essentials.php');
        adminLogin();



if (isset($_POST['get_users'])) {
        $res = selectAll('user_idpw');
        $i = 1;

        while ($row = mysqli_fetch_assoc($res)) {

                echo <<<data

        <tr class="align-middle">
            <td>$i</td>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phonenum]</td>
            <td>$row[address]</td>
        

        

        </tr>
        data;
                $i++;
        }
}

 


?>