<?php


$host="";
$user="";
$pass="";
$db="";
$link = mysqli_connect("localhost", "root", "");
if($link) {
//    echo 'connected';
}

else {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

