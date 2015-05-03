@extends('admin/admin')

@section('headers')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content')
    <div id="main">
        <div id="course_list">
            <h3 class="course_header">Courses Not Submitted</h3>
            <ul id="list_course">
                @foreach($courses as $course)
                    @if (!\App\Course::checkIfCourseComplete($course['courseid']))
                        <a href="{{action('AdminController@rankShow', $course['courseid'])}} "><li class="single_course">{{$course['courseid']}}</li></a>
                    @endif
                @endforeach
            </ul>
        </div>
        <div id="course_ranking">
            @yield('rank_course')
            @yield('rank_home')
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/overcast/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <script src="/js/rank.js"></script>
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection