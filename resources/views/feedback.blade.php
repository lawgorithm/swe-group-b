@extends('app')

@section('headers')
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@endsection

@section('content')
<form id="feedback" action="#" method="post">
    <div id="main">
        <div id="comments">
            <div id="student-name">
                <strong class="student-name"></strong>
            </div>
            <hr class="fancy-line" />
            <textarea name="feedback" rows="8" class="comment" placeholder="Comment here..."></textarea>
            <br />
            <div style="padding-left: 25px;">
                <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="accept" checked>
                        Accept
                </label>
                <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="deny">
                    Deny
                </label>
                <div class="form-actions feedback-button">
                    <button type="submit" class="btn btn-primary">Save feedback</button>
                </div>
            </div>
        </div>
        <div id="students">
                <span class="courseapplicantsheader">Applicants for 'course':</span>
                <hr class="fancy-line"/>
                <select name="students" class="form-control applicant-list">
                    @foreach($applicants as $applicant)
                        <option id="{{$applicant->name}}" class="applicant" name="{{$applicant->name}}">{{$applicant->name}}</option>
                    @endforeach
                </select>
        </div>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Whoops!</h4>
                </div>
                <div class="modal-body">
                    The following students did not receive any feedback.
                    Are you sure you want to continue?

                    {{--@foreach($applicants as $applicant)--}}
                        {{--<ul>--}}
                            {{--<li>{{$applicant->firstname}} {{$applicant->lastname}}</li>--}}
                        {{--</ul>--}}
                    {{--@endforeach--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
