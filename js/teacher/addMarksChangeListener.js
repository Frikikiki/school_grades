function addMarksChangeListener(id_subject) {
  $('.marks_field').change(function() {
    var id_pupil = $(this).attr('id');
    var new_value = $(this).val();
    $.ajax({
      url:'php/teacher/saveMarks.php',
      method:'post',
      data:{id_pupil:id_pupil, id_subject:id_subject, value:new_value},
      dataType:'text',
      success: function(result)
      {
        if(result == "false") {
          $('#popup_window_error').css('display', 'block');
        }
      }
    })
  })
}