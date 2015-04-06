@extends('app')

@section('headers')
<link href="/css/form.css" rel="stylesheet" />
@endsection

@section('content')
<form class="form-inline">
  <div class="form-group">
    <div class="col-md-3">
      <label for="studentName">Full Name</label>
      <input type="text" class="form-control" id="studentName" placeholder="Full Name">
    </div>

    <div class="col-md-3">
      <label for="studentPhone">Phone Number</label>
      <input type="text" class="form-control" id="studentName" placeholder="Full Name">
    </div>

    <div class="col-md-3">
      <label for="studentId">Student Id</label>
      <input type="text" class="form-control" id="studentId" placeholder="Student Id">
    </div>

    <div class="col-md-3">
      <label for="studentGPA">Grade Point Average</label>
      <input type="text" class="form-control" id="studentGPA" placeholder="3.14">
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-3">
      <label for="studentEmail">Email</label>
      <input type="text" class="form-control" id="studentEmail" placeholder="Student Id">
    </div>
  </div>
</form>
<div class="submit-button">
  <button type="submit" class="btn btn-primary">Submit Application</button>
</div>
@endsection
