@extends('app')

@section('header')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content')

    <div id="course_list">
        <h3 class="course_header">List of Courses</h3>

        <ul id="list_course">
            @foreach($courses as $course)
                <a href="{{action('RankController@show', $course['courseid'])}} "><li class="single_course"><strong>{{$course['coursename']}}</strong></li></a>
            @endforeach
        </ul>
    </div>
    <div id="course_ranking">
        @if (isset($applied))
            <h3 class="course_header">Applicant Ranking</h3>

            <ul id="sortable">
                @foreach($applied as $apply)
                    <li class="ui-state-default" value="{{$apply->rank}}|{{$apply->sso}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$apply->name}}</li>
                @endforeach
            </ul>
            </br>
            <button id="course_button">Submit</button>
            <p id="submit_space"></p>
            @foreach($applied as $apply)
                <div class="hidden" id="info-{{$apply->sso}}" hidden>
                    <p>Email: {{$apply->email}}</p>
                    <p>Phone: {{$apply->phone}}</p>
                    <p>GPA: {{$apply->gpa}}</p>
                    <p>Graddate: {{$apply->graddate}}</p>
                    <p>Program: {{$apply->program}}</p>
                    <p>Experience: {{$apply->previouswork}}</p>
                    <p>Rank: {{$apply->rank}}</p>
                    <p>Feedback: {{$apply->feedback}}</p>
                </div>
            @endforeach
        @else
            <h3 class="course_header">Courses Still Need Ranking</h3>
            <ul id="list_course">
                @foreach($courses as $course)
                    <a href="{{action('RankController@show', $course['courseid'])}} "><li class="single_course"><strong>{{$course['coursename']}}</strong></li></a>
                @endforeach
            </ul>
            </br>
        @endif

    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/flick/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="/js/rank.js"></script>
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>

@endsection