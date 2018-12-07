<!DOCTYPE html>

<html>
    
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Plant Literacy
    </title>

    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileLiteracy.css') }}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopNavBar.css') }}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopLiteracy.css') }}"> 

    <!-- Bootstrap -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 
        
</head>

<body>
    
    @include('navbar')
    @include('footervarview')
    @include('loginModal')
    
    <h1 id="literacyHeading">
        Links to the Plant World
    </h1>
    
@if (session('alert'))

<div id="message" class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ session('alert') }}</strong>
</div>

@endif

    <h2>
        <a class="literacyLink" href="https://botany.org/" target="_blank">Botanical Society of America</a>
        <a class="literacyLink" href="https://plantae.org/" target="_blank">Plantae</a>
        <a class="literacyLink" href="http://plantsinmotion.bio.indiana.edu/index.html" target="_blank">Plants in Motion</a>
        <a class="literacyLink" href="https://blog.oup.com/2015/08/studying-botany-plants-college/" target="_blank">Studying Botany in College</a>
        <a class="literacyLink" href="http://www.mbgnet.net/bioplants/main.html" target="_blank">Biology of Plants</a>
        <a class="literacyLink" href="http://www.metropolitannaturalhistory.org/taxon-of-the-month/" target="_blank">Taxon of the Month</a>
        <a class="literacyLink" href="https://www.seedyourfuture.org/" target="_blank">Seed your Future</a>
        <a class="literacyLink" href="https://plantingscience.org/mentorjoin/mentorjoinmain#howitworks" target="_blank">Planting Science</a>
        <a class="literacyLink" href="https://www.bgci.org/usa/PlantConservationDay" target="_blank">Plant Conservation Day</a>
    </h2>

    <h1 id="literacyHeading">
        Botanical Gardens
    </h1>

    <h2>
        <a class="literacyLink" href="https://www.usbg.gov/about-us" target="_blank">United States Botanical Garden</a>
        <a class="literacyLink" href="https://www.nybg.org/" target="_blank">New York Botanical Garden</a>
        <a class="literacyLink" href="https://www.bbg.org/" target="_blank">Brooklyn Botanical Garden</a>
    </h2>
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
              $("#navLogin").text("Logout");
              $("#navLogin").on('click',function(e){
                  e.stopPropagation();
                  window.location.href="/logout";
                });
            }
        }); 

        $(document).ready(function() {
        $("h2 a").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });
});
        $(document).ready(function(){
            if(windowvar.isLoggedIn === true){
                $(".navLogin").text("Logout");
                $(".navLogin").on('click',function(){
                    window.location.href="/logout";
                });
            }
        }); 
    
    </script>

</html>