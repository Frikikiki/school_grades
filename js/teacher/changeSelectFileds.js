$('#grades_select').change(function(){
  var id_grade = $('#grades_select').val();
  $.ajax({
    url:"php/teacher/fillSubjectSelectField.php",
    method:'post',
    data:{id_grade:id_grade},
    dataType:"text",
    success: function(data)
    {
      $('#subjects_select').html(data);
      var id_subject = $('#subjects_select').val();
      $.ajax({
        url:"php/teacher/showPupils.php",
        method:'post',
        data:{id_grade:id_grade,id_subject:id_subject},
        dataType:"text",
        success: function(data)
        {
          updateTable("#table", data);
          addMarksChangeListener(id_subject);
        }
      })
    }
  })
})

$('#subjects_select').change(function(){
  var id_grade = $('#grades_select').val();    
  var id_subject = $('#subjects_select').val();
  $.ajax({
    url:"php/teacher/showPupils.php",
    method:'post',
    data:{id_grade:id_grade,id_subject:id_subject},
    dataType:"text",
    success: function(data)
    {
      updateTable("#table", data);
      addMarksChangeListener(id_subject);
    }
  })
})