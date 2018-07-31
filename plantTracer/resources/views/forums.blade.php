<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
	<h2>The forums page.</h2>

	@if(Auth::check())
		<h1>{{Auth::user()->email}}</h1>
	@endif
</body>
</html>