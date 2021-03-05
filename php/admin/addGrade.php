<?php

require ('../connectToDB.php');


$grade = $_POST['grade'];


$sql_insert = "INSERT grade(name) VALUES ('{$grade}');";
$insert_result = mysqli_query($link, $sql_insert);


$output = '';
$sql_select = "SELECT * FROM grade;";
$select_result = mysqli_query($link, $sql_select);
while($row = mysqli_fetch_array($select_result))
{
  $output .= '
    <tr>
      <th scope="row">'.$row["name"].'</th>
      <td><button type="submit" class="remove_button" title="Click to remove the grade" value="'.$row["id_grade"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>