<?php
define("task1", true);

$db= [
    'host'=>'localhost',
    'user'=>'task1',
    'pass'=>'task1',
    'db'=>'task1',
];

require_once "includes/common.php";
$start = 'task1';

$ajax = false;
if (isset($_GET['a'])) {
    $ajax = true;
}

if (isset($_GET['s'])) {
    $show = $_GET['s'];
} else {
    $show = $start;
}

$dos = array('task1', 'add_row', 'remove_row');

$view = false;

//если есть права на просмотр этой страницы  общие права
if (in_array($show, $dos)) {
    $view = true;
}

if ($view) {
    //подключаем соответствующий модуль
    if ($ajax){
        include_once("includes/ajax/" . $show . ".php");
    }else {
        include_once("includes/" . $show . ".php");
    }

} else {
    //если доступ закрыт перенаправляем на стартовую страницу
    redirect("index.php?s=task1");
}





