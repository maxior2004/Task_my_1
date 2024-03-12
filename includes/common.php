<?php
if (!defined("task1")) { die("Access Denied"); }

$conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['db']);

if ($conn->connect_error) {
    die("Ошибка: невозможно подключиться: " . $conn->connect_error);
}

function get_all_product(){
    global $conn;
    $sql = 'SELECT * FROM `products`';
    $products = [];
    if($result = $conn->query($sql)){
        foreach($result as $row){
            $products[$row["id"]] = $row;
        }
    }
    return $products;
}

function template_one_product($product){
    return '<tr id="product_'.$product['id'].'" class="one_product">
      <td>'.$product['sku'].'</td>
      <td>'.$product['name'].'</td>
    </tr>';
}

function get_one_product($id){
    global $conn;
    $sql = 'SELECT * FROM `products` WHERE id='.mysqli_escape_string($conn,$id);
    if($result = $conn->query($sql)){
        foreach($result as $row){
            $product = $row;
        }
    }
    return template_one_product($product);
}
function response_ok($text,$row = ''){
    echo json_encode(['status'=>'ok',
        'text'=>$text,
        'row'=>$row,
    ]);
}

function response_error($text){
    echo json_encode(['status'=>'error',
        'text'=>$text]);
}