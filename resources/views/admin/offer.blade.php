@extends('admin/admin')

@section('headers')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link href="/css/offer.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
@endsection

@section('content')
    <form id="offer" action="#" method="post">
    <div id="main">
        <div class="offerRankedApplicants">
            <h3 class="offer-header">Top Ranked Applicants:</h3>
                <table class="table table-hover">
                    <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Course Name</th>
                    <th>Action</th>
                </tr>
                @foreach($topTen as $top)
                        <tr class="person-row" id="person-row" data-email="{{$top->email}}" data-name="{{$top->name}}">
                        <td>{{$top->rank}}</td>
                        <td>{{$top->name}}</td>
                        <td>{{$top->courseid}}</td>
                        <td>{{$top->coursename}}</td>
                        @foreach($offersSent as $offers)
                            @if($offers->courseid == $top->courseid && $offers->rank != $top->rank)
                        <td>
                            <button type="button" id="submit" data-sso="{{$top->sso}}" data-course="{{$top->courseid}}" data-email="{{$top->email}}" class="btn btn-success email-send has-spinner">
                                <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
                                Send Email
                            </button>
                        </td>
                            @else
                                <td><span>Email Sent</span></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
        <input type="hidden" id="csrf_tok" name="_token" value="<?php echo csrf_token(); ?>">
    </div>
    </form>
@endsection

@section('scripts')
    <script src="/js/offer.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endsection

