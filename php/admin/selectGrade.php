<?php

require ('../connectToDB.php');


$id_grade = $_POST['id_grade'];

$sql_get_pupils = "SELECT * FROM pupil WHERE id_grade = {$id_grade};";
$pupils_data = mysqli_query($link, $sql_get_pupils);

$output = '';
while($row = mysqli_fetch_array($pupils_data))
{
  $output .= '
    <tr">
      <th scope="row">'.$row["last_name"].' '.$row["name"].' '.$row["middle_name"].'</th>
      <td><button type="submit" class="remove_button" title="Click to remove the pupil" value="'.$row["id_pupil"].'"></button></td>
    </tr>';
}
echo $output;
?>