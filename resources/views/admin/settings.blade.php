@extends('admin/admin')
@section('headers')
    <style>
        .natural-dates {
            font-size: 18px;
            margin: 15px;
            padding: 5px;
        }
        div {
            font-size: 18px;
        }
        .natural-dates p {
            margin: 10px;
        }

        p.phase-statement {
            text-align: center;
        }

        div.alert {
            margin-bottom: 45px;
            margin-left: 25%;
            margin-right: 25%;
        }
        .settings-form {
            text-align: center;
            margin-left: 33%;
            margin-right: 33%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <p class="phase-statement">We are currently in Phase {{$phaseCode}}: {{$phaseDefinition}}</p>
        @if ($phaseCode !== 0)
            <div class="alert alert-info text-center natural-dates" role="alert">

                <p>We will <strong>begin collecting applications</strong> on <u>{{$open}}</u>.</p>
                <p><u>{{$transition}}</u> is the <strong>deadline for student submissions</strong>.</p>
                <p><u>{{$close}}</u> is the <strong>deadline for instructor feedback</strong>.</p>
                <p><small>Set By: {{$author}}</small></p>
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                <p>Your application phases have not been set.</p>

            </div>
        @endif
        <div class="settings-form">
            {!! BootForm::open() !!}
            {!! BootForm::date('Begin Collecting Applications', 'open') !!}
            {!! BootForm::date('Application Submission Deadline', 'transition') !!}
            {!! BootForm::date('Instructor Feedback Deadline', 'close') !!}
            {!! BootForm::submit('Submit') !!}
            {!! BootForm::close() !!}
        </div>
    </div>
    <br>
    <br>
@endsection

@section('scripts')
    <script>

        var s = now();

        var open = document.getElementById("open");
        var trans = document.getElementById("transition");
        var close = document.getElementById("close");


        open.setAttribute("onInput", "enableTransition()");
        transition.setAttribute("onInput", "enableClose()");

        trans.setAttribute("disabled", "disabled");
        close.setAttribute("disabled", "disabled");

        open.setAttribute("min", s["min"]);

        open.setAttribute("max", s["max"]);
        trans.setAttribute("max", s["max"]);
        close.setAttribute("max", s["max"]);

        open.setAttribute("required", "required");
        trans.setAttribute("required", "required");
        close.setAttribute("required", "required");

        function enableTransition() {
            var open = document.getElementById("open");
            var trans = document.getElementById("transition");

            trans.removeAttribute("disabled");
            trans.setAttribute("min", open.value);
        }

        function enableClose(){
            var trans = document.getElementById("transition");
            var close = document.getElementById("close");

            close.removeAttribute("disabled");
            close.setAttribute("min", trans.value);
        }


        function now() {
            var date = new Date();
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            var d = date.getDate();

            var s = "";

            s += y;
            s += "-";
            s += m < 10 ? "0" + m : m;
            s += "-";
            s += d < 10 ? "0" + d : d;

            var temp = s.split("-");
            var temp2 = 0 + + temp[0];
            temp2 += 1;
            temp[0] = temp2;
            temp.join("-");

            hold = [];
            hold["min"] = s;
            hold["max"] = temp.join("-");

            return hold;
        }

    </script>


@endsection