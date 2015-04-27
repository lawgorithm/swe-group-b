/*$(".applicant-list:option").select(function(){
    $("student-name").text($(this).attr("name"));
});*/

$( "select" ).change(function() {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( "#student-name" ).text( str );
  })
  .trigger( "change" );