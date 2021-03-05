<?php

require ('../common.php');
require ('../connectToDB.php');

$id_pupil = $_POST['id_pupil'];
$id_subject = $_POST['id_subject'];
$value = $_POST['value'];

$allowable_values = array("1", "2", "3", "4", "5");

$marks = convertStringToArray($value, ' ');

foreach($marks as $mark) {
  if(!in_array($mark, $allowable_values)) {
    echo "false";
    exit;
  }
}

$sql_delete = "DELETE FROM mark WHERE id_pupil = {$id_pupil} AND id_subject = {$id_subject};";
$delete_result = mysqli_query($link, $sql_delete);

foreach($marks as $mark) {
  $sql_insert = "INSERT mark(value, id_pupil, id_subject) VALUES({$mark}, {$id_pupil}, {$id_subject});";
  $insert_result = mysqli_query($link, $sql_insert);
}
?>