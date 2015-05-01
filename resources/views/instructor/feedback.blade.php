@extends('instructor/instructor')

@section('headers')
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@endsection

@section('content')
<form id="feedback" action="#" method="post">
    <div id="main">
        <div id="comments">
            <div class="student-info">
                <button type="button" class="btn btn-primary btn-sm cstm-btn" onclick="applicantInfo()" data-toggle="modal" data-target="#studentInfo">Student Info</button>
            </div>
            <div id="student-name">
                <strong class="student-name"></strong>
            </div>
            <hr class="fancy-line" />
            <textarea name="feedback" id="textArea" rows="6" class="comment" placeholder="Comment here..."></textarea>
            <br />
            <div style="padding-left: 25px;">
                <label class="radio">
                <input type="radio" name="recommendation" id="recommend" value="1" checked>
                        Recommend
                </label>
                <label class="radio">
                <input type="radio" name="recommendation" id="norecommend" value="-1">
                    Do Not Recommend
                </label>
                <div class="form-actions feedback-button">
                    <button type="button" class="btn btn-primary submit">Save feedback</button>
                </div>
            </div>
        </div>
        <div id="students">
                <span class="courseapplicantsheader">Applicants</span>
                <hr class="fancy-line"/>
                <select id="student-list" name="student-list" class="form-control applicant-list">
                {{--*/ $count = 0 /*--}}
                @foreach($applicants as $applicant)
                        <option id="{{ $count }}" class="applicant" data-userid="{{$applicant->id}}" data-program="{{$applicant->program}}" data-graddate="{{$applicant->graddate}}" data-feedback="{{$applicant->feedback}}" data-courseid="{{$applicant->courseid}}" data-gpa="{{$applicant->gpa}}" data-sso="{{$applicant->sso}}" data-username="{{$applicant->name}}">{{$applicant->name}}</option>
                {{--*/ $count++ /*--}}
                @endforeach
                </select>
        </div>
        <div id="accepted">
            <span class="courseapplicantsheader">Accepted:</span>
            <hr class="fancy-line"/>
            <ul class="list-group custom-list">
                <li class="list-group-item list-group-item-success">Student 1</li>
                <li class="list-group-item list-group-item-success">Student 2</li>
                <li class="list-group-item list-group-item-success">Student 3</li>
                <li class="list-group-item list-group-item-success">Studnet 4</li>
            </ul>
        </div>
        <input type="hidden" id="csrf_tok" name="_token" value="<?php echo csrf_token(); ?>">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="studentInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Student Information</h4>
                </div>
                <div id="modal-body" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('scripts')
    <script src="/js/feedback.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
