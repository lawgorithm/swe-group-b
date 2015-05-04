@extends('admin/rank')

@section('rank_home')
    <h3 class="course_header">All Courses</h3>
    <div class="btn-group-vertical" role="group" aria-label="...">
    <ul id="list_course">
        @foreach($courses as $course)
            @if (!\App\Course::checkIfCourseComplete($course['courseid']))
                @if (\App\Applicant_Course::checkIfCourseHasApps($course['courseid']))
                    <a href="{{action('AdminController@rankShow', $course['courseid'])}} "><button type="button" class="btn btn-default" style="background-color: #D4F7FF;"><li class="single_course">{{$course['courseid']}} - {{$course['coursename']}}</li></button></a>
                @else
                    <a href="{{action('AdminController@rankShow', $course['courseid'])}} "><button type="button" class="btn btn-default" style="background-color: rgba(0, 0, 0, 0.13);"><li class="single_course">{{$course['courseid']}} - {{$course['coursename']}}</li></button></a>
                @endif
            @else
                <a href="{{action('AdminController@rankShow', $course['courseid'])}} "><button type="button" class="btn btn-default" style="background-color: rgba(0, 0, 0, 0.13);"><li class="single_course">{{$course['courseid']}} - {{$course['coursename']}}</li></button></a>
            @endif
        @endforeach
    </ul>
    </div>
    <br>

@endsection