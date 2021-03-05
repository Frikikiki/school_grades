$('#login_form').on('submit', function(e){
  
  e.preventDefault();
  var username = $('#username').val();
  var password = $('#password').val();
  
  $.ajax({
    url:'php/login.php',
    method:'post',
    data:{username:username, password:password},
    dataType:"text",
    success:function(role){
      if(role == 'incorrect') {
        $('#message_incorrect_input').css('display', 'inline');
      }
      else {
        document.location.href = role+'.php';
      }
    }
  })
})