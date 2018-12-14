<!DOCTYPE html>
<html>
	<head>
		<meta name="_token" content="{{csrf_token()}}" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

		<link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopReset.css')}}">
	</head>

	<body>

<h1>
	Reset Password
</h1>
<div id="reset">
<form method="post" action="{{url('/forgotpassword')}}">
	@csrf
  <div class="form-group">
    <label for="formGroupExampleInput"><strong>Email:</strong></label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Email" name="email">
  </div>
  
  <div class="form-group">
    <label for="formGroupExampleInput"><strong>New Password:</strong></label>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="New Password" name="password">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput"><strong>Confirm Password:</strong></label>
    <input type="password" class="form-control" id="formGroupExampleInput" placeholder="Confirm Password" name="password_confirmation">
  </div>
	
  <div class="resetBtn">
  	<button type="submit" class="btn btn-primary">Send Password Reset Email</button>
  </div>
</form>
</div>

@if (session('alert'))

<div id="message" class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ session('alert') }}</strong>
</div>

@endif

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>

</html>
