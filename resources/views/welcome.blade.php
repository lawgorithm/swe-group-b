<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome!</title>

        <link href="/css/welcome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="welcome">
           <div class="welcome-wrap">
               <h4 class="welcome-msg">Mizzou TA Application</h4>
               <div class="grid-3">
                    <div class="fmcircle_out">
                        <a href="/auth/login">
                            <div class="fmcircle_border">
                                <div class="fmcircle_in fmcircle_green">
                                    <span id="get-started">Get Started!</span><img src="https://s3.amazonaws.com/sweworkspace/athletics.png" alt="" />
                                </div>
                            </div>
                        </a>
                    </div>
               </div>
           </div>
        </div>
    </body>
</html>

<script>
    $(window).on('resize', function(){

        $('.welcome').each(function(){

            var box = $(this);
            var width = box.width();
            var height = box.height();

            box.find('.welcome-wrap').html(width+'x'+height+' (r: '+(width/height).toFixed(3)+')');

        });
    }).trigger('resize');
</script>

