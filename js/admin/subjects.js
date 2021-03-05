$(document).ready(function(){
    $('#button_subjects').click(function(){
        $('.selected_button').toggleClass('selected_button');
        $('#button_subjects').toggleClass('selected_button');
    
        $('#grades_select').css('display', 'none');
    
        $('.add_button').css('display', 'none');
        $('#add_subject_button').css('display', 'block');
      
        $('.add_form').css('display', 'none');
        $('#add_subject_form').css('display', 'block');
      
        $('#add_subject_form').empty();
        $('#add_subject_form').load('js/admin/add_subject_form.html');
      
        $.ajax({
          url:"php/admin/showSubjects.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            updateTable('#table tbody', data);
            addRemoveRowListener('php/admin/removeSubject.php');
          }
        })
    })
})


$('#add_subject_form').on('submit', function(e){
  
  e.preventDefault();

  var subject = $('#subject').val();
  $('#add_subject_form input[type="text"]').val('');

  $.ajax({
    url:"php/admin/addSubject.php",
    method:"post",
    data:{subject:subject},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table tbody', data);
      addRemoveRowListener('php/admin/removeSubject.php');
    }
  })
})