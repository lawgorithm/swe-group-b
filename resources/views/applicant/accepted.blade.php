@extends('applicant/applicant')

@section('headers')
    <link href="/css/rank.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link href="/css/offer.css" rel="stylesheet" xmlns="http://www.w3.org/1999/html"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
@endsection

@section('content')
    <form id="respond" action="#" method="post">
        <div id="main" style="width: 30%; margin-left: 430px;">
            <div class="offerRankedApplicants" style="width: 100%;">
                <div class="panel panel-success">
                    <h3 class="offer-header" style="font-family: 'Ubuntu', sans-serif; margin: 5px 5px 2px 40px;">Courses Offered To TA: </h3>
                </div>
                <table class="table table-hover">
                    <tr>
                        <th>Course</th>
                        <th>Response</th>
                    </tr>
                    @foreach($offers as $offer)
                            @if($offer->offeraccepted == false)
                        <tr class="person-row" id="person-row">
                            <td style="padding-top: 15px;">{{$offer->courseid}}</td>
                            <td>
                                <button type="submit" class="btn btn-success" name="yesBtn" value="yes">Yes</button>
                                <button type="submit" class="btn btn-success" name="noBtn" style="margin-left: 15px;" value="no">No</button>
                                <input type="hidden" name="course" value="{{$offer->courseid}}">
                            </td>
                        </tr>
                            @else
                            <tr>
                                <td style="font-family: 'Ubuntu', sans-serif; padding-left: 25px;">Thank you for submitting feedback!</td>
                            </tr>
                            @endif
                    @endforeach
                </table>
            </div>
            <input type="hidden" name="email" value="{{\Auth::user()->email}}">
            <input type="hidden" name="name" value="{{\Auth::user()->name}}">
            <input type="hidden" name="sso" value="{{\Auth::user()->sso}}">
            <input type="hidden" id="csrf_tok" name="_token" value="<?php echo csrf_token(); ?>">
        </div>
    </form>
@endsection

@section('scripts')
    <script src="/js/offer.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endsection