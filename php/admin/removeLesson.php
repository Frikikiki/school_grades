<?php

require ('../connectToDB.php');


$id_lesson = $_POST['id_object'];

$sql_delete = "DELETE FROM lesson WHERE id_lesson = {$id_lesson};";
$result = mysqli_query($link, $sql_delete);
?>