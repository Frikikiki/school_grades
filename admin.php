<?php
session_start();
if(!isset($_SESSION['role']) || !isset($_SESSION['id_user'])) {
  header('Location: login.php');
}
else if($_SESSION['role'] == 'teacher') {
  header('Location: teacher.php');
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
		<link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/bootstrap.css">
	</head>
	<body>
		<div class="all_content">
          <div class="contingent" id="contingent_buttons">
            <button class="unselected_button selected_button button contingent_button" id="button_grades"><span>Grades</span></button>
            <button class="unselected_button button contingent_button" id="button_teachers"><span>Teachers</span></button>
            <button class="unselected_button button contingent_button" id="button_pupils"><span>Pupils</span></button>
            <button class="unselected_button button contingent_button" id="button_subjects"><span>Subjects</span></button>
          </div>
          <select name=grades_select class="active_field grades_select select input_text input_text_main field_text" id="grades_select"> 
		  </select>
          <table class="table" id="table">
            <tbody>          
            </tbody>
          </table>
          <div class="popup_window" id="popup_window_teacher">            
              <div class="popup_window_container">
                  <img src="images/close.png" alt="" class="popup_window_close" id="window_teacher_close">
                  <div class="add_form_container" id="add_lesson_form_container">
                      <form name="add_form" class="form_user" id="add_lesson_form">
                          <label class="label_text field_title" teacher_id="" id="teacher_form_name"></label><br>
                          <table class="table_lessons" id="table_lessons">
                          </table>
                          <div class="choose_lesson_main">
                            <div class="choose_lesson_select choose_lesson_grade">
                              <label for="" class="label_text field_title">Класс</label><br>
                              <select name=grades_select class="active_field select input_text input_text_popup_lesson field_text" id="pupils_select"></select><br>
                            </div>
                            <div class="choose_lesson_select choose_lesson_subject">
                              <label for="" class="label_text field_title">Предмет</label><br>
                              <select name=subjects_select class="active_field select input_text input_text_popup_lesson field_text" id="subjects_select"></select><br>
                            </div>
                          </div>
                          <input type="submit" value="Add" class="submit button cursor_pointer" id="add_lesson_submit">
                      </form>
                  </div>    
              </div>
          </div>
          <div class="add_buttons_container" id="add_buttons">
            <button class="add_grade_button add_button button" id="add_grade_button"><span>Add</span></button>
            <button class="add_teacher_button add_button button" id="add_teacher_button"><span>Add</span></button>
            <button class="add_pupil_button add_button button" id="add_pupil_button"><span>Add</span></button>
            <button class="add_subject_button add_button button" id="add_subject_button"><span>Add</span></button>
          </div>
          <div class="popup_window" id="popup_window_add">            
            <div class="popup_window_container">
                <img src="images/close.png" alt="" class="popup_window_close" id="window_add_close">
                <div class="add_form_container" id="add_form_container">
                    <form name="add_form" class="form_user add_form" id="add_grade_form">
                    </form>
                    <form name="add_form" class="form_user add_form" id="add_teacher_form">
                    </form>
                    <form name="add_form" class="form_user add_form" id="add_pupil_form">
                    </form>
                    <form name="add_form" class="form_user add_form" id="add_subject_form">
                    </form>
                </div>    
            </div>
          </div> 
        </div>
        <a href="php/logout.php">Log out</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <script src="js/admin/grades.js"></script>
        <script src="js/admin/subjects.js"></script>
        <script src="js/admin/pupils.js"></script>
        <script src="js/admin/teachers.js"></script>
        <script src="js/admin/popupWindows.js"></script>
        <script src="js/logout.js"></script>
	</body>
</html>