@extends('applicant/applicant')

@section('headers')
<link href="/css/form.css" rel="stylesheet" />
@endsection

@section('content')
<!-- I'll make this prettier later -->
@if(Session::has('Validation_Error'))
  <p>{{ Session::get('Validation_Error') }}</p>
@endif
<form id="msForm" action="form" method="POST">
  <fieldset id="fs1">
    <div class="form-group">

      <label for="studentPhone">Phone Number</label>
      <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="(816) 830-5123">

      <div class="form-inline" style="margin-top: 11px;">
        <select id="gradSelect" class="form-control" name="studentStatus">
          <option value="Und">Undergraduate</option>
          <option id="gradOption" value="Gra">Graduate</option>
        </select>

        <label id="gpaLabel" for="studentGPA">Grade Point Average</label>
        <input type="text" class="form-control" id="studentGPA" name="studentGPA" placeholder="3.14">
      </div>
      <div class="submit-button">
        <button id="next1" class="btn btn-primary" style="float: right;">Next</button>
      </div>
      
      <label id="programLabel" for="prevTaught">Program and Level</label>
      <div class="form-inline">
        <select id="studentMajor" class="form-control" name="studentMajor">
          <option value=''></option>
          <option value="CS">CS</option>
          <option value="IT">IT</option>
        </select>
        <select id="studentField" class="form-control" name="studentField">
          <option value=''></option>
          <option value="BS">BS</option>
          <option value="BA">BA</option>
        </select>
        <select id="studentYear" class="form-control" name="studentYear">
          <option value=''></option>
          <option value="freshman">Fresh</option>
          <option value="sophomore">Sophmore</option>
          <option value="junior">Junior</option>
          <option value="senior">Senior</option>
        </select>
      </div>

      <div class="form-inline">
        <label for="work">*Other places you work</label>
        <br />
        <input type="text" class="form-control" id="work" name="studentWork[]" style="width: 110px" placeholder="Google">
        <div class="btn btn-success" id="moreJobs">+</div>
      </div>
               
      <div class="form-inline">
        <label for="opt">*SPEAK/OPT score</label>
        <input type="text" class="form-control" style="width: 80px; margin-right: 20px;" id="opt" name="studentOpt" placeholder="4">

        <label for="prevTaught">Semester of last test</label>
        <select class="form-control" name="speakDate">
          <option value=''></option>
          <option value="F12">Fall 2012</option>
          <option value="S13">Spring 2013</option>
          <option value="F13">Fall 2013</option>
          <option value="S14">Spring 2014</option>
          <option value="F14">Fall 2014</option>
          <option value="S15">Spring 2015</option>
        </select>
      </div>

      <div class="form-inline">

        <label for="prevTaught">Graduation Date</label>
        <select class="form-control" name="gradDate">
          <option value=''></option>
          <option value="F15">Fall 2015</option>
          <option value="S16">Spring 2016</option>
          <option value="F16">Fall 2016</option>
          <option value="S17">Spring 2017</option>
          <option value="F17">Fall 2017</option>
          <option value="S18">Spring 2018</option>
        </select>
      </div>

    </div>
  </fieldset>

  <fieldset id="fs3">
    <div class="form-group">
      <label for="prevTaught">*Previously taught</label>
      <div id="previouslyTaught" class="form-inline">
        <select id="prevTaught" class="form-control" name="prevTaught[]">
          <option value=""></option>
            @foreach ($courses as $course)
                <option value="{{$course['courseid']}}">{{$course['courseid']}}</option>
            @endforeach
        </select>
        <div class="btn btn-success" id="moreTaught">+</div>
      </div>

      <label for="currTaught">*Currently teaching</label>
      <div id="currentlyTeaching" class="form-inline">
        <select id="currTaught" class="form-control" name="currTaught[]">
          <option value=""></option>
            @foreach ($courses as $course)
                <option value="{{$course['courseid']}}">{{$course['courseid']}}</option>
            @endforeach
        </select>
        <div class="btn btn-success" id="moreCurrent">+</div>
      </div>

      <label for="likeTeach">Would like to teach</label>
      <div id="likeToTeach" class="form-inline">
        <select id="likeTeach" class="form-control" name="likeTeach[]">
          <option value=""></option>
            @foreach ($courses as $course)
                <option value="{{$course['courseid']}}">{{$course['courseid']}}</option>
            @endforeach
        </select>
        <div class="btn btn-success" id="moreWant">+</div>
      </div>
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="submit-button">
        <button class="btn btn-primary" id="prev2">Previous</button>
        <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
@endsection

@section('scripts')
<script src="/js/formatter.js"></script>
<script src="/js/form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@endsection
