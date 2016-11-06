<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>{{ config('app.name') }}</title>
			
			<link href="/css/style.css" rel="stylesheet">
			<link href="/css/semantic.css" rel="stylesheet">
	</head>
	
	<body>
	<div class="register-master-div">
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
			{{ csrf_field() }}
			<div>
				<div class="seven wide column grid">
					<h1 class="head-font title-logo">
						<span class="color-yellow">W</span><span class="color-red">I</span><span class="color-blue">L</span><span class="color-green">D</span>
						CARD
					</h1>
				</div>
			</div>
			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} ui one centered column grid">

				<div class="ui input max-input multi-space">
					<input placeholder="Name" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} ui one centered column grid">

				<div class="ui input max-input multi-space">
					<input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group ui one centered column grid multi-space">
				<div class="ui checkbox row">
						<input type="checkbox" name="remember"> 
						<label>Remember Me</label>
				</div>
			</div>

			<div class="form-group ui one centered column grid multi-space">
				<div class="col-md-8 col-md-offset-4 row">
					<button type="submit" class="ui button btn btn-primary">
						Login
					</button>

					<a class="btn btn-link" href="{{ url('/password/reset') }}">
						Forgot Your Password?
					</a>
				</div>
			</div>
		</form>
	</div>
	</body>
</html>