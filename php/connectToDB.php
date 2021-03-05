<?php

$host = 'localhost';
$database = 'school';
$user = 'root';
$password = '';
$link = mysqli_connect($host, $user, $password, $database) 
	or die("Ошибка: " . mysqli_error($link));

?>