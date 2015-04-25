@extends('app')

@section('headers')
    <link href="/css/feedback.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@endsection

@section('content')
    <div id="main">
        <div id="comments">
            <div id="student-name">
                <strong class="student-name"></strong>
            </div>
            <hr class="fancy-line" />
            <textarea rows="8" class="comment" placeholder="Comment here..."></textarea>
            <br />
            <div style="padding-left: 25px;">
                <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Accept
                </label>
                <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Deny
                </label>
            </div>
        </div>
        <div id="students">
            @foreach($applicants as $applicant)
                <select multiple="multiple" class="multiple">
                    <option class="applicant" name="{{$applicant->firstname}} {{$applicant->lastname}}">{{$applicant->firstname}} {{$applicant->lastname}}</option>
                    <option class="applicant" name="Someone Else">Someone Else</option>
                    <option class="applicant" name="Bill Johnson">Bill Johnson</option>
                    <option class="applicant" name="Butch Coolidge">Butch Coolidge</option>
                    <option class="applicant" name="Andy">Andy</option>
                    <option class="applicant" name="Randy">Randy</option>
                    <option class="applicant" name="A blue guy">A blue guy</option>
                    <option class="applicant" name="More people">More people</option>
                    <option class="applicant" name="Someone Else">Someone Else</option>
                    <option class="applicant" name="Someone Else">Someone Else</option>

                </select>
            @endforeach
        </div>

        {{--@if(TODO Check that all students have been selected)--}}
        <div class="form-actions feedback-button">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Save changes</button>
        </div>
        {{--@endif--}}

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

                    @foreach($applicants as $applicant)
                        <ul>
                            <li>{{$applicant->firstname}} {{$applicant->lastname}}</li>
                        </ul>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="/js/feedback.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
