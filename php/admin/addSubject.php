<?php

require ('../connectToDB.php');


$subject = $_POST['subject'];


$sql_insert = "INSERT subject(name) VALUES ('{$subject}');";
$insert_result = mysqli_query($link, $sql_insert);


$output = '';
$sql_select = "SELECT * FROM subject;";
$select_result = mysqli_query($link, $sql_select);

while($row = mysqli_fetch_array($select_result))
{
  $output .= '
    <tr>
      <th scope="row">'.$row["name"].'</th>
      <td><button type="submit" class="remove_button" title="Click to remove the subject" value="'.$row["id_subject"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>