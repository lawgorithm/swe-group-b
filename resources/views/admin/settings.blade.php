@extends('admin/admin')

@section('header')
<!-- <link href="maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" /> -->
@endsection

@section('content')

<div class="container">
{!! BootForm::open() !!}
  {!! BootForm::date('Open', 'open') !!}
  {!! BootForm::date('Transition', 'transition') !!}
  {!! BootForm::date('Close', 'close') !!}
  {!! BootForm::submit('Submit') !!}
{!! BootForm::close() !!}
</div>

@endsection

@section('scripts')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
@endsection

