<?php
require ('connectToDB.php');


$username = $_POST['username'];
$password = $_POST['password'];

$sql_select = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}';";
$select_result = mysqli_query($link, $sql_select);

if(mysqli_num_rows($select_result) == 0) {
  echo 'incorrect';
  exit;
}

$row = mysqli_fetch_array($select_result);

$role = $row['role'];
$id_user = $row['id_user'];

session_start();
$_SESSION['role'] = $role;
$_SESSION['id_user'] = $id_user;

echo $role;
?>