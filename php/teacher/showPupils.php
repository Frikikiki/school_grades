<?php

require ('../connectToDB.php');


$id_grade = $_POST['id_grade'];
$id_subject = $_POST['id_subject'];

$sql_get_pupils = "SELECT * FROM pupil WHERE id_grade = {$id_grade} ORDER BY id_pupil;";
$get_pupils_result = mysqli_query($link, $sql_get_pupils);



$output = '';
while($pupil = mysqli_fetch_array($get_pupils_result))
{
  $sql_get_marks = "SELECT * FROM mark WHERE id_pupil = {$pupil['id_pupil']} AND id_subject = {$id_subject}";
  $get_marks_result = mysqli_query($link, $sql_get_marks);
  
  $output .= "
        <tr>
          <th scope='row'>{$pupil['last_name']} {$pupil['name']} {$pupil['middle_name']}</th>
          <td>
          <input type='text' id='{$pupil['id_pupil']}' name='grade' class='marks_field active_field input_text field_text' value='";
  while($mark_row = mysqli_fetch_array($get_marks_result))
  {
    $output .= "{$mark_row['value']} ";
  }
  $output .= "'/></td></tr>";
}
echo $output;
?>