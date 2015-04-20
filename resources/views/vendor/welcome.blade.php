@extends('app')

@section('content')
<div class="container">
	<form id="msForm" action="/" method="POST">
		<div class="form-group">
			<label for="Username">Username</label>
		    <input type="text" class="form-control" id="username" name="Pawprint" placeholder="bjt2p3">

		    <label for="Password">Password</label>
		    <input type="password" class="form-control" id="password" name="Password" placeholder="********">
		</div>
	</form>
</div>
@endsection