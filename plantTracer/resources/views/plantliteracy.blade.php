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
        
</head>

<body>
    
    @include('navbar')
    @include('footervarview')
    
    <h1 id="literacyHeading">
        Links to the Plant World
    </h1>
    
    <h2>
        <a class="literacyLink" href="https://botany.org/" target="_blank">Botanical Society of America</a>
        <a class="literacyLink" href="https://plantae.org/" target="_blank">Plantae</a>
        <a class="literacyLink" href="http://plantsinmotion.bio.indiana.edu/index.html" target="_blank">Plants in Motion</a>
    </h2>
</body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        
        $(document).ready(function() {
        $(".navBar a").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });
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
                $("#navLogin").text("Logout");
            }
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
    </script>

</html>