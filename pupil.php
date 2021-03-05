<?php
session_start();
if(!isset($_SESSION['role']) || !isset($_SESSION['id_user'])) {
  header('Location: login.php');
}
else if($_SESSION['role'] == 'teacher') {
  header('Location: teacher.php');
}
else if($_SESSION['role'] == 'admin') {
  header('Location: admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>sChOOL</title>
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/pupil.css">
        <link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<div class="all_content">
          <table class="table" id="table">
            <tbody>
            </tbody>
          </table>
        </div>
        <a href="php/logout.php">Log out</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/logout.js"></script>
        <script src="js/pupil/load.js"></script>
	</body>
</html>