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

$("document").ready(function() {
    $(".submit").click(function (e) {
        e.preventDefault();

        var x = document.getElementById("student-list");
        var userId = x.options[x.selectedIndex].dataset.userid;
        var sso = x.options[x.selectedIndex].dataset.sso;
        var gpa = x.options[x.selectedIndex].dataset.gpa;
        var course = x.options[x.selectedIndex].dataset.courseid;
        var username = x.options[x.selectedIndex].dataset.username;
        var feedback = document.getElementById("textArea").value;
        var url = "http://swe.dev/instructor/feedback/" + course;

        var option;
        if (document.getElementById("recommend").checked) {
             option = document.getElementById("recommend").value;
        }
        else if (document.getElementById("norecommend").checked) {
            option = document.getElementById("norecommend").value;
        }

        var tok = document.getElementById("csrf_tok");
        var csrf = tok.value;

        var applicant = {userId: userId, sso: sso, gpa: gpa, username: username,courseid: course, feedback: feedback, option: option, _token:csrf};

        $.ajaxSetup({
            headers: {'X-CSRF-Token': csrf}
        });

        $.ajax({
            type: "POST",
            url: url,
            data: applicant,
            success: function (data) {
                if(data.status != 'failure') {location.reload(true);}
                else {window.alert(data.msg);}
            }
        }, "json");
    });
});

function applicantInfo() {
    var x = document.getElementById("student-list");
    var program = x.options[x.selectedIndex].dataset.program;
    var graduation = x.options[x.selectedIndex].dataset.graddate;
    var gpa = x.options[x.selectedIndex].dataset.gpa;
    var feedback = x.options[x.selectedIndex].dataset.feedback;
    var username = x.options[x.selectedIndex].dataset.username;


    document.getElementById("modal-body").innerHTML='<span>Applicant: '+ username +'</span><br />' + '<span>GPA: ' + gpa + '</span><br />' + '<span>Program: '+ program + '</span><br />' + '<span>Graduation Date: ' + graduation + '</span><br />' + '<span>Feedback: '+ feedback + '</span><br />';
}


