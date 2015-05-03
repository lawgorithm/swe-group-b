$("document").ready(function(){
    $(".email-send").click(function(e){
        e.preventDefault();

        $email = $(this).data("email");

        var tok = document.getElementById("csrf_tok");
        var csrf = tok.value;
        var url = "/admin/offer/";

        var email = {
            email: $email,
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
