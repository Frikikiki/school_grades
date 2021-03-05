$(document).ready(function(){
  var body = document.body;
  var popup_window = document.getElementById('popup_window_error');
  var close_icon = document.getElementById('window_close');
  
  close_icon.addEventListener('click', function() {
    body.style.overflowY = 'auto';
    popup_window.style.display = 'none';
  })

  window.onclick = function(event){
    if (event.target == popup_window){
      body.style.overflowY = 'auto';
      popup_window.style.display = 'none';
    }
  }
})