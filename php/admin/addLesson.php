<?php

require ('../connectToDB.php');


$id_teacher = $_POST['id_teacher'];
$id_grade = $_POST['id_grade'];
$id_subject = $_POST['id_subject'];


$sql_insert = "INSERT lesson(id_teacher, id_grade, id_subject) VALUES ({$id_teacher},{$id_grade},{$id_subject});";
$insert_result = mysqli_query($link, $sql_insert);

$sql_get_lessons = "SELECT * FROM lesson WHERE id_teacher = {$id_teacher}";
$select_result = mysqli_query($link, $sql_get_lessons);

$output = '';
while($row = mysqli_fetch_array($select_result))
{
  
  $sql_get_grade = "SELECT name FROM grade WHERE id_grade = {$row['id_grade']};";
  $sql_get_subject = "SELECT name FROM subject WHERE id_subject = {$row['id_subject']};";
  $grade = mysqli_fetch_array(mysqli_query($link, $sql_get_grade))['name'];
  $subject = mysqli_fetch_array(mysqli_query($link, $sql_get_subject))['name'];
  
  $output .= '
    <tr>
	 <td class="grade_cell">'.$grade.'</td>
	 <td class="subject_cell">'.$subject.'</td>
	 <td class="close_cell"><button type="button" class="remove_button" title="Click me to clear the input field" value="'.$row['id_lesson'].'">&times;</button></td>
    </tr>';
}
echo $output;
?>