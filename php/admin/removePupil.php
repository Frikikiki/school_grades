<?php

require ('../connectToDB.php');


$id_pupil = $_POST['id_object'];

$sql_get_user_id = "SELECT id_user FROM pupil WHERE id_pupil = {$id_pupil};";
$id_user = mysqli_fetch_array(mysqli_query($link, $sql_get_user_id))['id_user'];

$sql_delete_user = "DELETE FROM users WHERE id_user = {$id_user};";
$delete_user_result = mysqli_query($link, $sql_delete_user);

$sql_delete_pupil = "DELETE FROM pupil WHERE id_pupil = {$id_pupil};";
$delete_pupil_result = mysqli_query($link, $sql_delete_pupil);
?>