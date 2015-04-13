$(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
});
$(function() {
    $( "button#course_button" )
        .button()
        .click(function( event ) {
            $("p#submit_space").text("Applicant Choice Submitted");
        });
});
$(function() {
    $( "ul#cl" )
        .click(function( event ) {

        });
});