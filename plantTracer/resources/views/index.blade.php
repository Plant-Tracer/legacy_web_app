<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopIndex.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopNavBar.css') }}" />
        <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
        <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileIndex.css')}}">

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
            <!-- <li><a href="database.html">Database</a></li>
            <li><a href="forums.html">Forums</a></li>
-->
            <li><a href="{{url('/plantliteracy')}}">Plant Literacy</a></li>
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
    
<div id="login" class="modal">
  
  <form class="modal-content animate" method="POST" action="/">
    {{ csrf_field() }}
    <div class="imgcontainer">
      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/leaf.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Password" name="password" required>
        
      <button type="submit" name="login" class="modalSubmit">Login</button>
    </div>

    <div class="container psw" style="background-color:#f1f1f1">
      <a href="#">Forgot password?</a>
    </div>
  </form>
</div>  
    
<!--
New User Modal
-->

<div id="newUser" class="modal">
  
  <form class="modal-content-newUser animate" method="POST" action="/users">
    {{ csrf_field() }}
      <?/*php include('php/errors.php'); */?>
    <div class="imgcontainer-newUser">
      <span onclick="document.getElementById('newUser').style.display='none'" class="close-newUser" title="Close Modal">&times;</span>
    </div>

    <div class="registerContainer">
        <div class="container register">
          <p>
                <strong>1)</strong> Download Plant Tracer app. Run an experiment and upload experiment data.<br><br>
                <strong>2)</strong> Use a valid email address to upload the data. Use this email address in order to make an account on this page. <br>
            </p>

          <label for="uname"><b>Email</b></label>
          <input type="text" placeholder="Email" name="email">

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password">

          <label for="psw"><b>Confirm Password</b></label>
          <input type="password" placeholder="Confirm Password" name="password_confirmation">

          <button type="submit" name="register" class="modalSubmit">Finished Registering</button>
        </div>
        
        <div class="iPhone">
            <img id="iPhone" src="img/iPhone.png" alt="iPhone">
        </div>
      
    </div>

    <div class="container psw" style="background-color:#f1f1f1">
      <a href="#">Forgot password?</a>
      @include('errors')
    </div>
  </form>
</div>   

<img id="homePlant" src="img/Main%20Menu/Main%20Menu_Plant-11.png">
<div id="homepage">
    <div id="homePageRight">
        <img id="homeLogo" src="img/Plant%20Tracer%20Logo.png">
        <p id="description">A method to explore the genetics of plant movement.</p> 
        <button onclick="document.getElementById('newUser').style.display='block'" class="optionBtn" type="button">New User</button>
        <button onclick="document.getElementById('login').style.display='block'" class="optionBtn" type="button">Login</button>
        <!--
        <img id="greenBar" src="Imgs/Green%20Bar.png">
-->
        <button class="optionBtn" type="button"><a id="seedOrder" href="mailto:brennerbotany@gmail.com?Subject=Order%20for%20Seeds" target="_top">Order Seeds</a></button>
        
        <div id="download"><button id="downloadBtn" type="button">Download Coming Soon</button></div>

    </div>
    </div>

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
        
        $(document).ready(function(){
            $(".menu-wrap a").each(function() {
                if(this.href == window.location.href) {
                    $(this).addClass("active");
                }
            })
        });

        var modal = document.getElementById('login');
        window.onclick = function(event){
            if(event.target == modal){
                modal.style.display = "none";
            }
        }
    
    $("#downloadBtn").on('click', function (){
        if(navigator.userAgent.toLowerCase().indexOf("android") > -1){
            window.location.href = 'http://play.google.com/store/apps/details?id=com.truecaller&hl=en';
        }
        if((navigator.userAgent.toLowerCase().indexOf("iphone") > -1) || (navigator.platform.toUpperCase().indexOf('MAC') >= 0) || (navigator.userAgent.toLowerCase().indexOf("ipad") >= -1)){
            window.location.href = 'http://itunes.apple.com/lb/app/truecaller-caller-id-number/id448142450?mt=8';
        }
    });

        $(window).resize(function(){
            if(window.innerWidth<601){
                mailTo();
            }
        });
        
            if(window.innerWidth<601){
                mailTo();
            }
        
        function mailTo(){
            $("#login").html("Contact");
            $("#login").on("click", function(){
                window.location = "mailto:brennerbotany@gmail.com?Subject=Order%20for%20Seeds";
                });
        }
        
        $(window).resize(function(){
            if(window.innerWidth>600){
                $("#login").html("Login");
            }
        });
    
    $(document).ready(function() {
        var $toggleButton = $('.toggle-button');
        var $menuWrap = $('.menu-wrap');
        
        $toggleButton.on('click', function() {
            $(this).toggleClass('button-open');
            $menuWrap.toggleClass('menu-show');
        });
    });
   
    var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}    
    
    </script>
</html>
