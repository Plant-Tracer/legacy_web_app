<!DOCTYPE html>
<html>
<head>
	<title>About</title>

	 <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopNavBar.css')}}">
	 <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
	 <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopAbout.css')}}">
   <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileAbout.css')}}">

<!-- Bootstrap -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
</head>
<body>

	@include('navbar')
	@include('footervarview')
  @include('loginModal')

<div class="about">
	<h3>

	<strong><span id="downloadBtn">”Plant Tracer”</span> is a new App designed to enable the analysis of plant movement from time-lapse movies. Use Plant Traceras part of a crowd-sourced method to search for novel mutant plants that do not move properly. This will  help the scientific community identify new genes involved in plant movement and  help reveal the genetic signals regulating plant movement.
  <p></p>
	<p>
	Little is known about plant movement.  More is known about gravitropism, the response of plants to gravity.  Less is known about circumnutation, the continuous waving motion in plant parts (leaves, flowers, shoots)  that was described by Charles Darwin over 100 years ago. Identification of mutant Arabidopsis (the genetic model plant) lines that are abnormal in plant movement sets the stage to understand the mechanics of plant movement.
	</p></strong>

	</h3>
</div>

@if (session('alert'))

<div id="message" class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ session('alert') }}</strong>
</div>

@endif

  <div class="footer">
    <p><strong>Eric Brenner</strong> - PI and PlantTracer project head
    <strong>Al Olsen</strong> - Lead Developer
    <strong>Yao Wang</strong> - Video Analysis Algorithm supervision
    <strong>Yixiang</strong> - Video Analysis Algorithm
    <strong>Jan L. Plass</strong> - UI/UX Supervison
    <strong>Keisha Milsom</strong> - Lead UI/UX Design
    <strong>Javiera Valle</strong> - Graphics Design
    <strong>Jean Jeon</strong> - Web Developer
    <strong>Jonathan Prosperi</strong> - Design coordinator</p>
  </div>
</body>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>

            $(document).ready(function() {
              $(".navBar a").each(function() {
              if (this.href == window.location.href) {
                  $(this).addClass("active");
              }
          });
    });
            $(document).ready(function(){
            $(".menu-wrap a").each(function() {
                if(this.href == window.location.href) {
                    $(this).addClass("active");
                }
            })
        });

        $(document).ready(function() {
            var $toggleButton = $('.toggle-button');
            var $menuWrap = $('.menu-wrap');
        
            $toggleButton.on('click', function() {
                    $(this).toggleClass('button-open');
                    $menuWrap.toggleClass('menu-show');
                });
            });

        $(document).ready(function(){
            if(windowvar.isLoggedIn === true){
              $(".navLogin").text("Logout");
              $(".navLogin").on('click',function(e){
                  e.stopPropagation();
                  window.location.href="/logout";
                });
            }
        });

	    //Redirect to App store when downloadbtn is clicked
        $(document).ready(function (){
          $("#downloadBtn").on("click", function(){
            var mac = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ? true : false;

            if(mac){
             window.location.href = 'https://itunes.apple.com/us/app/plant-tracer-app/id1421866105?mt=8';
     }
          else{
             window.location.href = 'https://itunes.apple.com/us/app/plant-tracer-app/id1421866105?mt=8';
     }
          });
      });

</script>
</html>
