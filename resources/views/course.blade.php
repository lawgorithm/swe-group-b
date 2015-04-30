@extends('app')

@section('headers')
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <form id="feedback" action="#" method="post">
            <div id="courses">
                <span class="courseapplicantsheader">Courses:</span>
                <hr class="fancy-line"/>
                <select name="course-list" class="form-control applicant-list">
                    <option id="default" class="courses"></option>
                    @foreach($courses as $course)
                        <option id="{{$course->courseid}}" class="courses" name="{{$course->courseid}}">{{$course->courseid}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            </div>
@endsection

@section('scripts')
    <script src="/js/feedback.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
