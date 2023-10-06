<?php
$localhost = 'localhost';
$login = 'root';
$password = '';
$db_name = 'molyaks_carriage';

$connect = mysqli_connect($localhost, $login, $password, $db_name);

if(!$connect) {
    die('Error connect to DataBase');
}
?>