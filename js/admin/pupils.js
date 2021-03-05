$(document).ready(function(){
    $('#button_pupils').click(function(){
        $('.selected_button').toggleClass('selected_button');
        $('#button_pupils').toggleClass('selected_button');
    
        $('#grades_select').css('display', 'inline-block');
      
        $('.add_button').css('display', 'none');
        $('#add_pupil_button').css('display', 'block');
      
        $('.add_form').css('display', 'none');
        $('#add_pupil_form').css('display', 'block');
      
        $('#add_pupil_form').empty();
        $('#add_pupil_form').load('js/admin/add_pupil_form.html');
      
        $.ajax({
          url:"php/admin/fillSelectGradeField.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            $('#grades_select').empty();
            $('#grades_select').html(data);
            showPupils();
          }
        })
    
        $.ajax({
          url:"php/admin/fillSelectGradeField.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            $('#add_pupil_form select').empty();
            $('#add_pupil_form select').html(data);
          }
        })
    })
})


$('#add_pupil_form').on('submit', function(e){
  e.preventDefault();

  var id_grade = $('#add_pupil_form select').val();
  var last_name = $('#pupil_last_name').val();
  var name = $('#pupil_name').val();
  var middle_name = $('#pupil_middle_name').val();
  $('#add_pupil_form input[type="text"]').val('');
  
  
  $.ajax({
    url:"php/admin/addPupil.php",
    method:"post",
    data:{id_grade:id_grade, last_name:last_name, name:name, middle_name:middle_name},
    dataType:"text",
    success:function(data)
    {
      $('#grades_select').val(id_grade);
      updateTable('#table tbody', data);
      addRemoveRowListener('php/admin/removePupil.php');
    }
  })
})


$('#grades_select').change(function(){
  showPupils();
})    



//////
function showPupils(){
  var id_grade = $('#grades_select').val();
  $.ajax({
    url:"php/admin/showPupils.php",
    method:"post",
    data:{id_grade:id_grade},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table tbody', data);
      addRemoveRowListener('php/admin/removePupil.php');
    }
  })
}