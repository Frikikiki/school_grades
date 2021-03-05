<?php

require ('../connectToDB.php');

$output = '';
$sql_select = "SELECT * FROM teacher;";
$select_result = mysqli_query($link, $sql_select);
while($row = mysqli_fetch_array($select_result))
{
  $output .= '
    <tr>
      <th scope="row"><button class="list_button title="Click to add a lesson" value="'.$row["id_teacher"].'">'.$row["last_name"].' '.$row["name"].' '.$row["middle_name"].'</button></th>
      <td><button type="submit" class="remove_button" title="Click to remove the theacher" value="'.$row["id_teacher"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>