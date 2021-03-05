<?php

require ('../connectToDB.php');


session_start();

$sql_get_id_pupil = "SELECT id_pupil FROM pupil WHERE id_user = {$_SESSION['id_user']};";
$id_pupil = mysqli_fetch_array(mysqli_query($link, $sql_get_id_pupil))['id_pupil'];

$sql_get_marks = "SELECT * FROM mark WHERE id_pupil = {$id_pupil} ORDER BY id_subject;";
$get_marks_result = mysqli_query($link, $sql_get_marks);


$marks;
$output = '';


$id_subject = 0;
while($mark_row = mysqli_fetch_array($get_marks_result))
{
  if ($id_subject != $mark_row['id_subject']) {
    $sql_get_subject_name = "SELECT name FROM subject WHERE id_subject = {$mark_row['id_subject']};";
    $subject_name = mysqli_fetch_array(mysqli_query($link, $sql_get_subject_name))['name'];
    if($id_subject != 0) {
      $output .= "
          </td>
        </tr>";
    }   
    $output .= "
      <tr>
        <th scope='row'>{$subject_name}</th>
        <td>{$mark_row['value']}";
    $id_subject = $mark_row['id_subject'];
  }
  else {
    $output .= ", {$mark_row['value']}";
  }
}
echo $output;
?>