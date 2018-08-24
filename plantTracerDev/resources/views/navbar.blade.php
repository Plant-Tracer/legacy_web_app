
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

        <div class="navItem"><a href="{{url('database')}}">Database</a></div>
<!--    <div class="navItem"><a id="forums" href="forums.html">Forums</a></div> -->
        <div class="line"><p>|</p></div>
        <div class="navItem" id="plantLiteracy"><a href="{{url('plantliteracy')}}">Plant Literacy</a></div>
        <div class="line"><p>|</p></div>
        <div class="navItem" id="about"><a href="{{url('/about')}}">About</a></div>
    </div>
    
    <div id="userBtns">
        <div id="contactBtn"><button id="contact" type="button"><a href="mailto:brennerbotany@gmail.com?" target="_top">Contact</a></button></div>
        <div id="navLoginBtn"><button type="button" id="navLogin" data-toggle="modal" data-target="#loginModal" id="open">Login</button><a href="#" id="logoutLink"></a></div>
    </div>
</div>
