@extends('admin/rank')

@section('rank_course')
    <h3 class="course_header">Applicant Ranking for {{$cid}}</h3>
    <meta name="csrf-token" content="<?PHP echo csrf_token() ?>">
    <meta name="courseid" content="{{$cid}}">
    @if (count($applied) == 0)
        <br><br><br><br>
        <div class="alert alert-info" role="alert">
            <strong>No Applicants for {{$cid}}</strong>
        </div>
    @else
        <ul id="sortable">
            @foreach($applied as $apply)
                <li class="ui-state-default " id="sort-{{$apply->sso}}" value="{{$apply->rank}}|{{$apply->sso}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$apply->name}}</li>
            @endforeach
        </ul>
        <br>
        <h5 id="submit_space" style="font-color: #dff0d8;"></h5>
        <a href="/admin/submit/{{$cid}}"><button id="course_button" >Submit</button></a>
        @foreach($applied as $apply)
            <div class="hidden" id="info-{{$apply->sso}}" hidden>
                <p>Name: {{$apply->name}}</p>
                <p>Email: {{$apply->email}}</p>
                <p>Phone: {{$apply->phone}}</p>
                <p>GPA: {{$apply->gpa}}</p>
                <p>Graduates: {{$apply->graddate}}</p>
                <p>Program: {{$apply->program}}</p>
                @if (isset($apply->speakscore))
                    <p>International Student</p>
                    <p> Speak Score: {{$apply->speakscore}}
                    <p> Speak Date: {{$apply->speakdate}}</p>
                @endif
                <p>Experience: {{$apply->previouswork}}</p>
                @if (isset($apply->rank))
                    <p>Rank: {{$apply->rank}}</p>
                @endif
                @if (isset($apply->feedback))
                    <p>Feedback by {{\App\Course::getInstructor($cid)}}: "{{$apply->feedback}}"</p>
                @endif
                @if ($apply->recommendation != 0)
                    <p>Recommended: {{$apply->recommendation}}</p>
                @endif
            </div>
        @endforeach
    @endif
@endsection