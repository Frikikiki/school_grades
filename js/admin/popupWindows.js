$(document).ready(function(){
  clickToOpenAddPopupWindow();
  closePopupWindow('#popup_window_add', '#window_add_close');
  closePopupWindow('#popup_window_teacher', '#window_teacher_close');
})


function clickToOpenAddPopupWindow(){
  $('.add_button').click(function() {
    $('body').css('overflowY', 'hidden');
    $('#popup_window_add').css('display', 'block');
  })
}



////////////////////////////////////////////////////////////////////////
function closePopupWindow(window_id, window_close_icon_id) {  
  $(window_close_icon_id).click(function() {
    $('body').css('overflowY', 'auto');
    $(window_id).css('display', 'none');
  })
  
  $(document).mouseup(function (e) {
    var container = $(window_id);
    if (container.has(e.target).length === 0){
        container.hide();
        $('body').css('overflowY', 'auto');
    }
  })
}