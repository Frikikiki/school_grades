<?php
session_start();

if(isset($_SESSION['role'])) {
  if($_SESSION['role'] == 'admin') {
  header('Location: admin.php');
  }
  else if($_SESSION['role'] == 'teacher') {
    header('Location: teacher.php');
  }
  else if($_SESSION['role'] == 'pupil') {
    header('Location: pupil.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>sChOOL</title>
        <link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/login.css">
	</head>
	<body>
		<form class="login_form" id="login_form">
			<label for="username" class="field_title">USERNAME</label>
			<input type="text" id="username" name="username" class="active_field field_text input_text" required>
			<label for="password" class="field_title">PASSWORD</label>
			<input type="password" id="password" name="password" class="active_field field_text input_text" required>
			<input type="submit" value="LOG IN" class="submit" id="login_submit">
            <span id="message_incorrect_input">Incorrect username or/and password</span>
		</form> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/login.js"></script>
	</body>
</html>