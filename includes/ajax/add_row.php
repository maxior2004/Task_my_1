<?php
if (!defined("task1")) { die("Access Denied"); }

if ($_POST['sku'] !='' && $_POST['name']!='') {
    $sql = "INSERT INTO `products` set 
            `sku` = '" . mysqli_escape_string($conn,$_POST['sku']) . "',
            `name`= '" . mysqli_escape_string($conn,$_POST['name']) . "'       
                         ";
    if ($result = $conn->query($sql)){
        echo response_ok('Данные добавлены', get_one_product($conn->insert_id));

    }else{
        echo response_error('Ошибка добавления данных в БД');

    }
}else {
    echo response_error('Заполните все поля');
}




