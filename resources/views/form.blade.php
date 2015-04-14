@extends('app')

@section('headers')
<link href="/css/form.css" rel="stylesheet" />
@endsection

@section('content')
<form id="msForm" action="/" method="POST">
  <fieldset id="fs1">
    <div class="form-group">
      <label for="studentName">Full Name</label>
      <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Brendon Tiszka">

      <label for="studentPhone">Phone Number</label>
      <input type="text" class="form-control" id="studentPhone" name="studentPhone" placeholder="(816) 555-3272">

      <label for="studentId">Student Id</label>
      <input type="text" class="form-control" id="studentId" name="studentId" placeholder="1603133769">

      <label for="studentEmail">Student Email</label>
      <input type="text" class="form-control" id="studentEmail" name="studentEmail" placeholder="bjt5n5@mail.missouri.edu">

      <div class="form-inline" style="margin-top: 11px;">
        <select class="form-control" name="studentStatus">
          <option value="Und">Undergraduate</option>
          <option value="Gra">Graduate</option>
        </select>

        <label for="studentGPA">Grade Point Average</label>
        <input type="text" class="form-control" id="studentGPA" placeholder="3.14">
      </div>
      <div class="submit-button">
        <button id="next1" class="btn btn-primary" style="float: right;">Next</button>
      </div>
    </div>
  </fieldset>
  
  <fieldset id="fs2">
    <div class="form-group">
      <label for="pal">Program and Level</label>
      <input type="text" class="form-control" id="studentId" name="studentId" placeholder="CS BA jr">

      <label for="work">*Other places you work</label>
      <input type="text" class="form-control" id="work" name="studentWork" placeholder="Google, Apple, Taco Bell">
            
      <div class="form-inline">
        <label for="opt">*SPEAK/OPT score</label>
        <input type="text" class="form-control" style="width: 80px; margin-right: 20px;" id="opt" name="studentOpt" placeholder="4">

        <label for="prevTaught">Semester of last test</label>
        <select class="form-control" name="studentTaught">
          <option value="F14">Fall 2014</option>
          <option value="S14">Spring 2014</option>
        </select>
      </div>


      <label for="studentGday">Graduation Date</label>
      <input type="date" name="gradDate"/>
      
      <div class="submit-button">
        <button class="btn btn-primary" id="prev1">Previous</button>
        <button class="btn btn-primary" style="float: right;" id="next2">Next</button>
      </div>
    </div>
  </fieldset>

  <fieldset id="fs3">
    <div class="form-group">
      <label for="prevTaught">*Previously taught</label>
      <div class="form-inline">
        <select class="form-control" name="prevTaught">
          <option value="1040">1040</option>
          <option value="1050">1050</option>
        </select>
      </div>

      <label for="currTaught">*Currently teaching</label>
      <div class="form-inline">
        <select class="form-control" name="currTaught">
          <option value="1040">1040</option>
          <option value="1050">1050</option>
        </select>
      </div>

      <label for="likeTeach">Would like to teach</label>
      <div class="form-inline">
        <select class="form-control" name="likeTeach">
          <option value="1040">1040</option>
          <option value="1050">1050</option>
        </select>
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
<script src="/js/form.js"></script>
@endsection
