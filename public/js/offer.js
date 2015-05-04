$("document").ready(function(){
    $(".email-send").click(function(e){
        e.preventDefault();

        $email = $(this).data("email");
        $courseid = $(this).data("course");
        $sso = $(this).data("sso");

        var tok = document.getElementById("csrf_tok");
        var csrf = tok.value;
        var url = "/admin/offer/";

        var email = {
            email: $email,
            course: $courseid,
            sso: $sso,
            _token: csrf
        };

        $.ajaxSetup({
            headers: {'X-CSRF-Token': csrf}
        });

        $.ajax({
            type: "POST",
            url: url,
            data: email,
            beforeSend: function() {
                $(".email-send").toggleClass('active');
            },
            success: function (data) {
                if (data.status != 'failure') {
                    location.reload(true);
                }
            }
        }, "json");
    })
});
