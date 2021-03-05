<?php

require ('../connectToDB.php');


$id_teacher = $_POST['id_object'];


$sql_get_user_id = "SELECT id_user FROM teacher WHERE id_teacher = {$id_teacher};";
$id_user = mysqli_fetch_array(mysqli_query($link, $sql_get_user_id))['id_user'];

$sql_delete_user = "DELETE FROM users WHERE id_user = {$id_user};";
$delete_user_result = mysqli_query($link, $sql_delete_user);

$sql_delete_teacher = "DELETE FROM teacher WHERE id_teacher = {$id_teacher};";
$delete_teacher_result = mysqli_query($link, $sql_delete_teacher);
?>