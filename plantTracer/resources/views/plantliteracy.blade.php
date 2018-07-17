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
    
<span class="toggle-button">
     <div class="menu-bar menu-bar-top"></div>
     <div class="menu-bar menu-bar-middle"></div>
     <div class="menu-bar menu-bar-bottom"></div>
</span>
    
<div class="menu-wrap">
    <div class="menu-sidebar">
        <ul class="menu">
            <li><a href="{{url('/index')}}">Home</a></li>
            <li><a href="{{url('/usingplanttracer')}}">Using Plant Tracer</a></li>
            <!--
            <li><a href="database.html">Database</a></li>
            <li><a href="forums.html">Forums</a></li>-->
            <li><a href="{{'/plantliteracy'}}">Plant Literacy</a></li>
        </ul>           
    </div>
</div>

<div class="navBar">
    <div id="homeBtn"><p id="homeLogoBtn"><a href="{{url('/index')}}">Plant Tracer</a></p></div>
    <div id="notHomeBtns">
        <div class="navItem">
<a href="{{url('/usingplanttracer')}}">Using Plant Tracer</a></div>
        <div class="line" id="firstLine"><p id="firstLine">|</p></div>
    <!--
        <div class="navItem"><a id="database" href="database.html">Database</a></div>
        <div class="line"><p>|</p></div>
        <div class="navItem"><a id="forums" href="forums.html">Forums</a></div>
        <div class="line"><p>|</p></div>
-->
        <div class="navItem" id="plantLiteracy"><a href="{{url('/plantliteracy')}}">Plant Literacy</a></div>
    </div>
    
    <div id="userBtns">
        <div id="contactBtn"><button id="contact" type="button"><a href="mailto:brennerbotany@gmail.com?" target="_top">Contact</a></button></div>
        <div id="accountBtn"><button id="account" type="button">My Account</button></div>
    </div>
</div>
    
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
        
                
        $("#database").on("click", function(){
            $("#database").removeAttr("href");
        });
        
        $("#forums").on("click", function(){
            $("#forums").removeAttr("href");
        });
        
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