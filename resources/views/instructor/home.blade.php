@extends('instructor/instructor')

@section('headers')
    <link href="/css/instructorHome.css" rel="stylesheet" />
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong class="welcome-message">Welcome, {{ $instructorName }}!</strong></div>
                    <div class="panel-body">
                        <div class="status-msg">
                        <?php
                            date_default_timezone_set('America/Chicago');
                            $curDate = getdate();
                            $curDate = $curDate[0];

                            $app_open_time = strtotime('2015-5-2 17:58:00');
                            $app_close_time = strtotime('2015-5-2 17:58:20');
                            $feedback_open_time = strtotime('2015-5-2 17:58:21');
                            $feedback_close_time = strtotime('2015-5-2 17:58:40');
                            $rank_open_time = strtotime('2015-5-2 17:58:41');
                            $rank_close_time = strtotime('2015-5-2 17:58:59');

                            if($curDate >= $app_open_time && $curDate < $app_close_time){
                               echo '<strong class="welcome-message fa fa-times-circle isa_info"> Applicants are still applying! </strong>';
                            }
                            else if($curDate >= $feedback_open_time && $curDate < $feedback_close_time){
                                echo '<strong class="welcome-message fa fa-times-circle isa_warning"> Feedback is now open! </strong>';
                            }
                            else if($curDate >= $rank_open_time && $curDate < $rank_close_time) {
                                echo '<strong class="welcome-message fa fa-times-circle isa_info"> Feedback is now closed! </strong>';
                            }
                            else{
                                echo '<strong class="welcome-message fa fa-times-circle isa_error"> This session is currently closed. Check back soon... </strong>';
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection