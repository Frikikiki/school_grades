<?php

require ('../connectToDB.php');


session_start();

$sql_get_id_pupil = "SELECT id_pupil FROM pupil WHERE id_user = {$_SESSION['id_user']};";
$id_pupil = mysqli_fetch_array(mysqli_query($link, $sql_get_id_pupil))['id_pupil'];

$sql_get_marks = "SELECT * FROM mark WHERE id_pupil = {$id_pupil};";
$marks = mysqli_query($link, $sql_get_marks);

$output = '';

while($mark_row = mysqli_fetch_array($marks))
{
  $sql_get_subject_name = "SELECT name FROM subject WHERE id_subject = {$mark_row['id_subject']};";
  $subject_name = mysqli_fetch_array(mysqli_query($link, $sql_get_subject_name))['name'];
  
  $output .= '<option value="'.$mark_row['id_subject'].'">'.$subject_name.'</option>';
}
echo $output;
?>