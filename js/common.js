function updateTable(selector, data) {
  $(selector).empty();
  $(selector).html(data);
}

function addRemoveRowListener(url) {
  $('.remove_button').click(function(){
    var id_object = $(this).val();
    $(this).closest('tr').remove();
    $.ajax({
      url:url,
      method:"post",
      data:{id_object:id_object},
      dataType:"text",
      success:function(data)
      { 
      }
    })
  })
}