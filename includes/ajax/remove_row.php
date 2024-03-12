<?php
if (!defined("task1")) { die("Access Denied"); }

if ($_POST['id'] !='' ) {
    $tmp = explode('_',$_POST['id']);
    $id = $tmp[1];
    $sql = "DELETE  FROM `products`  WHERE
            `id` = '" . mysqli_escape_string($conn,$id) . "'    
                         ";

    if ($result = $conn->query($sql)){
        echo response_ok('');

    }else{
        echo response_error('');

    }
}


