<?php
session_start();
if(!isset($_SESSION['role']) || !isset($_SESSION['id_user'])) {
  header('Location: login.php');
}
else if($_SESSION['role'] == 'admin') {
  header('Location: admin.php');
}
else if($_SESSION['role'] == 'pupil') {
  header('Location: pupil.php');
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>sChOOL</title>
        <link rel="icon" type="image/png" href="images/favicon.png">
        <link rel="icon" type="image/png" href="images/favicon.png">
		<link rel="stylesheet" href="css/teacher.css">
        <link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<div class="all_content">
          <div class="choose_lesson_main">
            <div class="choose_lesson_select choose_lesson_grade">
              <label for="" class="label_text field_title">Класс</label><br>
              <select name=grades_select class="active_field select input_text field_text" id="grades_select"></select><br>
            </div>
            <div class="choose_lesson_select choose_lesson_subject">
              <label for="" class="label_text field_title">Предмет</label><br>
              <select name=subjects_select class="active_field select input_text input_text_popup_lesson field_text" id="subjects_select"></select><br>
            </div>
          </div>
          <table class="table" id="table">
            <tbody>  
            </tbody>
          </table>
          <div class="popup_window" id="popup_window_error">            
              <div class="popup_window_container">
                  <img src="images/close.png" alt="" class="popup_window_close" id="window_close">
                  <span>Форма заполнения: оценки от 1 до 5, разделенные пробелами</span>
              </div>
          </div>
        </div>
        <a href="php/logout.php">Log out</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/teacher/addMarksChangeListener.js"></script>
        <script src="js/teacher/popupWindow.js"></script>
        <script src="js/teacher/load.js"></script>
        <script src="js/logout.js"></script>
        <script src="js/teacher/changeSelectFileds.js"></script>
	</body>
</html>