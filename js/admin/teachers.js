$(document).ready(function(){
    $('#button_teachers').click(function(){
                
        $('.selected_button').toggleClass('selected_button');
        $('#button_teachers').toggleClass('selected_button');
    
        $('#grades_select').css('display', 'none');
  
        $('.add_button').css('display', 'none');
        $('#add_teacher_button').css('display', 'block');
        
        $('.add_form').css('display', 'none');
        $('#add_teacher_form').css('display', 'block');
      
        $('#add_teacher_form').empty();
        $('#add_teacher_form').load('js/admin/add_teacher_form.html');
      
        $.ajax({
          url:"php/admin/fillSelectGradeField.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            $('#pupils_select').empty();
            $('#pupils_select').html(data);
          }
        })
      
        $.ajax({
          url:"php/admin/fillSelectSubjectField.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            $('#subjects_select').empty();
            $('#subjects_select').html(data);
          }
        })
      
        $.ajax({
          url:"php/admin/showTeachers.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            updateTable('#table tbody', data);
            addRemoveRowListener('php/admin/removeTeacher.php');
            addOpenTeacherLessonsListener();
          }
        })
    })
})

$('#add_lesson_form').on('submit', function(e){

  e.preventDefault();

  var id_subject = $('#subjects_select').val();
  var id_grade = $('#pupils_select').val();
  var id_teacher = $('#teacher_form_name').attr('teacher_id');


  $.ajax({
    url:"php/admin/addLesson.php",
    method:"post",
    data:{id_teacher:id_teacher, id_grade:id_grade, id_subject:id_subject},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table_lessons', data);
      addRemoveRowListener('php/admin/removeLesson.php');
    }
  })
})



$('#add_teacher_form').on('submit', function(e){
  
  e.preventDefault();

  var last_name = $('#teacher_last_name').val();
  var name = $('#teacher_name').val();
  var middle_name = $('#teacher_middle_name').val();
  
  $('#add_teacher_form input[type="text"]').val('');
  
  $.ajax({
    url:"php/admin/addTeacher.php",
    method:"post",
    data:{last_name:last_name, name:name, middle_name:middle_name},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table tbody', data);
      addOpenTeacherLessonsListener();
      addRemoveRowListener('php/admin/removeTeacher.php');
      $(".list_button").on('click', function(){
        $('#popup_window_teacher').css('display', 'block');
        $('#table_lessons').css('display', 'block');
        $('body').css('overflowY', 'hidden');
      })
    }
  })
})




//////
function addOpenTeacherLessonsListener() {
  $('.list_button').click(function(){
    var id_teacher = $(this).val();

    $.ajax({
      url:"php/admin/showLessons.php",
      method:'post',
      data:{id_teacher:id_teacher},
      dataType:"text",
      success:function(data)
      {
        $('#teacher_form_name').attr('teacher_id', id_teacher);

        updateTable('#table_lessons', data);

        addRemoveRowListener('php/admin/removeLesson.php');
        $('#popup_window_teacher').css('display', 'block');
        $('#table_lessons').css('display', 'block');
        $('body').css('overflowY', 'hidden');
      }
    })
  })
}