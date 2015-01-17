<!doctype html>
<html>
<head>
	<title>Look at me Login</title>
</head>
<body background = 'http://www.newburytaxi.biz/communities/9/004/011/308/709//images/4582545841.gif'>

	{{ Form::open(array('url' => 'login')) }}
		<h1 style="color:white">Login</h1>

		<!-- if there are login errors, show them here -->
		@if (Session::get('loginError'))
		<div class="alert alert-danger">{{ Session::get('loginError') }}</div>
		@endif

		<p style="color:white">
			{{ $errors->first('email') }}
			{{ $errors->first('password') }}
		</p>

		<p style="color:white">
			{{ Form::label('email', 'Email Address') }}
			{{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
		</p>

		<p style="color:white">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p style="color:white">{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}

</body>
</html>