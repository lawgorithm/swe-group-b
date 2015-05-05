@extends('admin/admin')


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
                    <div class="panel-heading"><strong class="welcome-message">Welcome, {{ \Auth::user()->name }}!</strong></div>
                    <div class="panel-body">
                        <div class="status-msg">
                            <strong class="welcome-message fa fa-times-circle">Make a message</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection