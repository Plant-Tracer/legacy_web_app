<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopIndex.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopNavBar.css') }}" />
        <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
        <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileIndex.css')}}">

    </head>
    <body>

@include('navbar')

<!-- login modal -->
    
<div id="login" class="modal noDisplay">
  
  <form class="modal-content animate" method="POST" action="/database">
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
        
      <button type="submit" name="login" id="loginBtn" class="modalSubmit">Login</button>
    </div>

    <div class="container psw" style="background-color:#f1f1f1">
      <a href="#">Forgot password?</a>
    </div>
  </form>
</div>  
    
<!--
New User Modal
-->

<div id="newUser" class="modal noDisplay">
  
  <form class="modal-content-newUser animate" method="POST" action="/database">
    {{ csrf_field() }}
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
          <input type="text" placeholder="Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>

          <label for="psw"><b>Confirm Password</b></label>
          <input type="password" placeholder="Confirm Password" name="password_confirmation" required>

          <button type="submit" id="registerBtn" name="register" class="modalSubmit">Finished Registering</button>
        </div>
        
        <div class="iPhone">
            <img id="iPhone" src="img/iPhone.png" alt="iPhone">
        </div>
      
    </div>

    <div class="container psw" style="background-color:#f1f1f1">
      <a href="#">Forgot password?</a>
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

<script type="text/javascript">

  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
    
// When the user clicks anywhere outside of the modal, close it
    var loginModal = document.getElementById('login');
    var registerModal = document.getElementById('newUser');

    window.onclick = function(event){
        if(event.target == loginModal){
            loginModal.style.display = "none";
        }

        if(event.target == registerModal){
            registerModal.style.display = "none";
        }
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        
        $(document).ready(function() {
        $(".navBar a").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
    });
});
    
    //Change navbar button color to different color when active
        $(document).ready(function(){
            $(".menu-wrap a").each(function() {
                if(this.href == window.location.href) {
                    $(this).addClass("active");
                }
            })
        });
    
    //Redirect to App store when downloadbtn is clicked
    $("#downloadBtn").on('click', function (){
        if(navigator.userAgent.toLowerCase().indexOf("android") > -1){
            window.location.href = 'http://play.google.com/store/apps/details?id=com.truecaller&hl=en';
        }
        if((navigator.userAgent.toLowerCase().indexOf("iphone") > -1) || (navigator.platform.toUpperCase().indexOf('MAC') >= 0) || (navigator.userAgent.toLowerCase().indexOf("ipad") >= -1)){
            window.location.href = 'http://itunes.apple.com/lb/app/truecaller-caller-id-number/id448142450?mt=8';
        }
    });

    //Open mailing client in another window depending on resize
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

    //open hamburger button when clicked
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
