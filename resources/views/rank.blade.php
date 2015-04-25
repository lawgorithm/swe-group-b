@extends('app')

@section('headers')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content')

    <div id="course_list">
    <h3 class="course_header">List of Courses</h3>

        <ul id="list_course">
            @foreach($courses as $course)
                <li class="single_course"><strong>{{$course['coursename']}}</strong></li>
            @endforeach

        </ul>
    </div>
    <div id="course_ranking">
        <h3 class="course_header">Applicant Ranking</h3>

        <ul id="sortable">
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 1</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 2</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 3</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 4</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 5</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 6</li>
            <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Applicant 7</li>
        </ul>
        </br>
        <button id="course_button">Submit</button>
        <p id="submit_space"></p>
    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/flick/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="/js/rank.js"></script>

@endsection
