$( "#student-list" ).change(function() {
    var str = "";
    $( "select option:selected" ).each(function() {
      str += $( this ).text() + " ";
    });
    $( "#student-name" ).text( str );
  })
  .trigger( "change" );

$('[name="course-list"]').change(function() {
    $(this).closest('form').submit();
});