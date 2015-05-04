@extends('applicant/applicant')


@section('headers')
<link href="/css/applicant.css" rel="stylesheet" />
@endsection
<!-- This needs to  -->

@section('content')
<div class="wrapper centered">
	<div>Welcome {{ $name }}</div>
	<div>{{ $message }}</div>
</div>
@endsection

@section('script')
    <script src="/js/konami.js"></script>
@endsection