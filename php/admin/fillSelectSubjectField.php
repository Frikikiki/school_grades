<?php

require ('../connectToDB.php');

$output = '';
$sql_select = "SELECT * FROM subject;";
$select_result = mysqli_query($link, $sql_select);
while($row = mysqli_fetch_array($select_result))
{
  $output .= '<option value="'.$row["id_subject"].'">'.$row['name'].'</option>';
}
echo $output;
?>