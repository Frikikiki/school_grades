<?php

require ('../connectToDB.php');


$id_grade = $_POST['id_object'];


$sql_delete_grade = "DELETE FROM grade WHERE id_grade = {$id_grade};";
$delete_grade_result = mysqli_query($link, $sql_delete_grade);

?>