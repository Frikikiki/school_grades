window.onload = function() {
  $.ajax({
    url:"php/pupil/showMarks.php",
    method:'post',
    data:{},
    dataType:"text",
    success: function(data)
    {
      $('#table tbody').html(data);
    }
  })
}