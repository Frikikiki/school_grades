<?php

require ('../connectToDB.php');


$id_grade = $_POST['id_grade'];

$output = '';
$sql_select = "SELECT * FROM pupil WHERE id_grade = {$id_grade};";
$select_result = mysqli_query($link, $sql_select);

if(!$select_result) {
  echo '';
  exit;
}


while($row = mysqli_fetch_array($select_result))
{
  $output .= '
    <tr">
      <th scope="row">'.$row["last_name"].' '.$row["name"].' '.$row["middle_name"].'</th>
      <td><button type="submit" class="remove_button" title="Click to remove the pupil" value="'.$row["id_pupil"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>