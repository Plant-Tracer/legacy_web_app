<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

	@if(Auth::check())
		<h1>{{Auth::user()->email}}</h1>
	@endif
</body>
</html>