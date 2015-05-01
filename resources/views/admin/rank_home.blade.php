@extends('admin/rank')

@section('rank_home')
    <h3 class="course_header">Courses Still Need Ranking</h3>
    <ul id="list_course">
        @foreach($courses as $course)
            <a href="{{action('AdminController@rankShow', $course['courseid'])}} "><li class="single_course"><strong>{{$course['coursename']}}</strong></li></a>
        @endforeach
    </ul>
    <br>
@endsection