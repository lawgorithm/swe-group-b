@extends('admin/admin')

@section('headers')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
@endsection

@section('content')
    <form id="offer" action="#" method="post">
    <div id="main">
        <div class="offerRankedApplicants">
            <h3 style="padding-left: 450px; padding-bottom: 25px; margin: 5px 5px 5px 5px;">Top Ranked Applicants:</h3>
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
                        <td><button type="button" id="submit" data-email="{{$top->email}}" class="btn-primary email-send" id="user_email" class="btn-primary">Send Email</button></td>
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
@endsection

