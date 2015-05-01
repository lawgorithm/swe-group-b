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
    $( ".ui-state-default" ).tooltip({
        items: "li",
        show: {
            delay: 700
        },
        tooltipClass: "right",
        position: {
            my: "left+250 top-32",
            at: "left"
        },
       content: function() {
            var element = $( this );
            var val = element.attr('value');
            var vals = val.split("|");
            val = vals[1];
            return $("#info-" + val + ".hidden").html();
        }

    });
});