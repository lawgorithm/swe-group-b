@extends('admin/admin')
@section('headers')
<style>
.natural-dates {
	font-size: 24px;
}
div {
	font-size: 18px;
}
.natural-dates p {
	margin: 15px;
}
.settings-form {
	
	text-align: center;
}
</style>
@endsection
@section('content')
<div class="container">
	<div class="alert alert-info text-center natural-dates" role="alert">
		<p>We will <strong>begin collecting applications</strong> on <u>{{$open}}</u>.</p>
		<p><u>{{$transition}}</u> is the <strong>deadline for student submissions</strong>.</p>
		<p><u>{{$close}}</u> is the <strong>deadline for instructor feedback</strong>.</p>
	</div>
	<div class="settings-form">
		{!! BootForm::open() !!}
		{!! BootForm::date('Begin Collecting Applications', 'open') !!}
		{!! BootForm::date('Application Submission Deadline', 'transition') !!}
		{!! BootForm::date('Instructor Feedback Deadline', 'close') !!}
		{!! BootForm::submit('Submit') !!}
		{!! BootForm::close() !!}
	</div>
</div>
@endsection