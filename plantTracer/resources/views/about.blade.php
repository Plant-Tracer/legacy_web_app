<!DOCTYPE html>
<html>
<head>
	<title>About</title>

	 <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopNavBar.css')}}">
	 <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
	 <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopAbout.css')}}">
</head>
<body>

	@include('navbar')

	<h3>

	<span id="downloadBtn">”Plant Tracer”</span> is a new App designed to enable the analysis of plant movement from time-lapse movies. Use Plant Traceras part of a crowd-sourced method to search for novel mutant plants that do not move properly. This will  help the scientific community identify new genes involved in plant movement and  help reveal the genetic signals regulating plant movement.

	<p>
	Little is known about plant movement.  More is known about gravitropism, the response of plants to gravity.  Less is known about circumnutation, the continuous waving motion in plant parts (leaves, flowers, shoots)  that was described by Charles Darwin over 100 years ago. Identification of mutant Arabidopsis (the genetic model plant) lines that are abnormal in plant movement sets the stage to understand the mechanics of plant movement.
	</p>

	</h3>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>
	    //Redirect to App store when downloadbtn is clicked
    $("#downloadBtn").on('click', function (){
        if(navigator.userAgent.toLowerCase().indexOf("android") > -1){
            window.location.href = 'http://play.google.com/store/apps/details?id=com.truecaller&hl=en';
        }
        if((navigator.userAgent.toLowerCase().indexOf("iphone") > -1) || (navigator.platform.toUpperCase().indexOf('MAC') >= 0) || (navigator.userAgent.toLowerCase().indexOf("ipad") >= -1)){
            window.location.href = 'http://itunes.apple.com/lb/app/truecaller-caller-id-number/id448142450?mt=8';
        }
    });
</script>
</html>
