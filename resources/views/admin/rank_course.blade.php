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
        <h5 id="submit_space" style="font-color: #dff0d8;">Changes Saved</h5>
        <a href="/admin/submit/{{$cid}}"><button id="course_button" >Submit</button></a>
        @foreach($applied as $apply)
            <div class="hidden" id="info-{{$apply->sso}}" style="font-weight: 100;" hidden>
                <span>Name: {{$apply->name}}</span><br>
                <span>Email: {{$apply->email}}</span><br>
                <span>Phone: {{$apply->phone}}</span><br>
                <span>GPA: {{$apply->gpa}}</span><br>
                <span>Graduates: {{$apply->graddate}}</span><br>
                <span>Program: {{$apply->program}}</span><br>
                @if (($prevs = \App\Applicant_Course::getPrevTaught($apply->sso)) != NULL)
                    <span>Previously Taught:</span><br>
                    @foreach ($prevs as $prev)
                        {{$prev['courseid']}}
                    @endforeach
                    <br>
                @endif
                @if (($currs = \App\Applicant_Course::getCurrTaught($apply->sso)) != NULL)
                    <span>Currently Teaching:</span><br>
                    @foreach ($currs as $curr)
                        {{$curr['courseid']}}
                    @endforeach
                    <br>
                @endif
                @if (isset($apply->speakscore))
                    <span>International Student</span><br>
                    <span> Speak Score: {{$apply->speakscore}}</span><br>
                    <span> Speak Date: {{$apply->speakdate}}</span><br>
                @endif
                <span>Experience: {{$apply->previouswork}}</span><br>
                @if (isset($apply->rank))
                    <span>Rank: {{$apply->rank}}</span><br>
                @endif
                @if (isset($apply->feedback))
                    <span>Feedback by {{\App\Course::getInstructor($cid)}}: "{{$apply->feedback}}"</span><br>
                @endif
                @if ($apply->recommendation == 1)
                    <span>Recommended by {{\App\Course::getInstructor($cid)}}</span>
                @elseif ($apply->recommendation == -1)
                    <span>Not recommended by {{\App\Course::getInstructor($cid)}}</span>
                @endif
            </div>
        @endforeach
    @endif

@endsection