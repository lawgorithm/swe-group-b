@extends('admin/admin')


@section('headers')
    <link href="/css/instructorHome.css" rel="stylesheet" />
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <style>

        .phase-statement {
            text-align: center;
        }
        a {
            color: inherit;
        }
        a:hover {
            color: inherit;
        }

        a.settings-link {
            -webkit-animation: breathing 3s ease-out infinite normal;
            animation: breathing 3s ease-out infinite normal;
            -webkit-font-smoothing: antialiased;
        }

        @-webkit-keyframes breathing {
            0% {
                -webkit-transform: scale(1);
                transform: scale(1);

            }

            50% {
                -webkit-transform: scale(1.05);
                transform: scale(1.05);
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }

        }

        @keyframes breathing {
            0% {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }


            50% {
                -webkit-transform: scale(1.05);
                -ms-transform: scale(1.05);
                transform: scale(1.05);
            }

            100% {

                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong class="welcome-message">Welcome, {{ \Auth::user()->name }}!</strong></div>
                    <div class="panel-body">
                        <p class="phase-statement">We are currently in Phase {{$phaseCode}}: {{$phaseDefinition}}</p>
                        @if ($phaseCode !== 0)
                            <div class="alert alert-info text-center natural-dates" role="alert">
                                <p>We will <strong>begin collecting applications</strong> on <u>{{$open}}</u>.</p>
                                <p><u>{{$transition}}</u> is the <strong>deadline for student submissions</strong>.</p>
                                <p><u>{{$close}}</u> is the <strong>deadline for instructor feedback</strong>.</p>
                            </div>
                        @else
                            <div class="alert alert-warning text-center" role="alert">
                                <p>Configure your application phases in <strong><a class="settings-link" href="/admin/settings">settings</a></strong></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection