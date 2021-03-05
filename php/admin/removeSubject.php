<?php

require ('../connectToDB.php');


$id_subject = $_POST['id_object'];


$sql_delete_subject = "DELETE FROM subject WHERE id_subject = {$id_subject};";

$delete_subject_result = mysqli_query($link, $sql_delete_subject);

?>