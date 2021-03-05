<?php

require ('../connectToDB.php');


$id_grade = $_POST['id_grade'];

session_start();
$sql_get_id_teacher = "SELECT id_teacher FROM teacher WHERE id_user = {$_SESSION['id_user']};";
$id_teacher = mysqli_fetch_array(mysqli_query($link, $sql_get_id_teacher))['id_teacher'];


$sql_select = "SELECT id_subject FROM lesson WHERE id_teacher = {$id_teacher} AND id_grade = {$id_grade};";
$select_result = mysqli_query($link, $sql_select);

$output = '';
while($row = mysqli_fetch_array($select_result))
{
  $sql_get_subject_name = "SELECT name FROM subject WHERE id_subject = {$row['id_subject']};";
  $subject = mysqli_fetch_array(mysqli_query($link, $sql_get_subject_name))['name'];
  
  $output .= '<option value="'.$row["id_subject"].'">'.$subject.'</option>';
}

echo $output;
?>