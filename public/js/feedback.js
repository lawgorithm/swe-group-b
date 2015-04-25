$(".applicant").click(function(){
    $("strong.student-name").replaceWith($(this).attr("name"));

    $("strong.student-name").remove($(this).attr("name"));
});