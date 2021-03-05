window.onload = function() {
 $.ajax({
    url:"php/admin/showGrades.php",
    method:"post",
    data:{},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table tbody', data);
      addRemoveRowListener('php/admin/removeGrade.php');
      $('#add_grade_form').load('js/admin/add_grade_form.html');
    }
  }) 
}


$(document).ready(function(){    
    $('#button_grades').click(function(){
        
        $('.selected_button').toggleClass('selected_button');
        $('#button_grades').toggleClass('selected_button');
    
        $('#grades_select').css('display', 'none');
    
        $('.add_button').css('display', 'none');
        $('#add_grade_button').css('display', 'block');
      
        $('.add_form').css('display', 'none');
        $('#add_grade_form').css('display', 'block');
      
        $('#add_grade_form').empty();
        $('#add_grade_form').load('js/admin/add_grade_form.html');
        
        $.ajax({
          url:"php/admin/showGrades.php",
          method:"post",
          data:{},
          dataType:"text",
          success:function(data)
          {
            updateTable('#table tbody', data);
            addRemoveRowListener('php/admin/removeGrade.php');
          }
        })
    })
})


$('#add_grade_form').on('submit', function(e){
  
  e.preventDefault();

  var grade = $('#grade').val();
  $('#add_grade_form input[type="text"]').val('');
  
  $.ajax({
    url:"php/admin/addGrade.php",
    method:"post",
    data:{grade:grade},
    dataType:"text",
    success:function(data)
    {
      updateTable('#table tbody', data);
      addRemoveRowListener('php/admin/removeGrade.php');
    }
  })
})