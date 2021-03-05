<?php

require ('../connectToDB.php');


session_start();

$sql_get_id_teacher = "SELECT id_teacher FROM teacher WHERE id_user = {$_SESSION['id_user']};";
$id_teacher = mysqli_fetch_array(mysqli_query($link, $sql_get_id_teacher))['id_teacher'];


$sql_select = "SELECT id_grade FROM lesson WHERE id_teacher = {$id_teacher};";
$select_result = mysqli_query($link, $sql_select);

$output = '';
$grades = array();
while($row = mysqli_fetch_array($select_result))
{
  $sql_get_grade_name = "SELECT name FROM grade WHERE id_grade = {$row['id_grade']};";
  $grade = mysqli_fetch_array(mysqli_query($link, $sql_get_grade_name))['name'];
  
  if(!in_array($grade, $grades)) {
    $output .= '<option value="'.$row["id_grade"].'">'.$grade.'</option>';
    array_push($grades, $grade);
  }
}
echo $output;
?>