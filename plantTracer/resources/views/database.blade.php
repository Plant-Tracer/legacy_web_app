<!DOCTYPE html>

<html>
    
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Database
    </title>

    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopDatabase.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopNavBar.css')}}">
        
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
            <li><a href="{{'/index'}}">Home</a></li>
            <li><a href="{{'/usingplanttracer'}}">Using Plant Tracer</a></li>
            <li><a href="{{'/database'}}">Database</a></li>
            <li><a href="{{'/forums'}}">Forums</a></li>
            <li><a href="{{'/plantliteracy'}}">Plant Literacy</a></li>
        </ul>           
    </div>
</div>

<div class="navBar">
    <div id="homeBtn"><p id="homeLogoBtn"><a href="index.php">Plant Tracer</a></p></div>
    
    <div id="notHomeBtns">
        <div class="navItem"><a href="{{url('/usingplanttracer')}}">Using Plant Tracer</a></div>
        <div id="firstLine" class="line"><p>|</p></div>
        <div class="navItem"><a href="{{url('/database')}}">Database</a></div>
        <div class="line"><p>|</p></div>
        <div class="navItem"><a href="{{url('/forums')}}">Forums</a></div>
        <div class="line"><p>|</p></div>
        <div class="navItem" id="plantLiteracy"><a href="{{url('/plantliteracy')}}">Plant Literacy</a></div>
        <div class="line"><p>|</p></div>
        <div class="navItem" id="about"><a href="{{url('/about')}}">About</a></div>
    </div>
    
    <div id="userBtns">
        <div id="contactBtn"><button id="contact" type="button"><a href="mailto:brennerbotany@gmail.com?" target="_top">Contact</a></button></div>
        <div id="accountBtn"><button id="account" type="button">My Account</button></div>
    </div>
</div>
    
    <div id="filterColumns">
        <div class="filterTypes">
            <p><i>Filter by movement</i></p>
            <p><i>Filter by plant type</i></p>
        </div>
        
        <div class="buttonColOne filterColumn">
            <button type="button" class="filterBtn">Circumnutation</button>
            <button type="button" class="filterBtn">Mutant</button>
        </div>
        
        <div class="buttonColTwo filterColumn">
            <button type="button" class="filterBtn">Gravitropism</button>
            <button type="button" class="filterBtn">Wild Type</button>
        </div>
        
        <div id="greenBarContainer"><img id="greenBar" src="img/Green%20Bar.png"></div>
        
        <div class="secondColumn">
            <div class="secondcolumnRow">
                <div id="accessionSearch"><input id="accession" type="text" placeholder="Accession number"></div>
                <p><i>Search by accession number</i></p>
            </div>
            <div class="secondcolumnRow">
                <div id="researcherSearch"><input id="researcher" type="text" placeholder="Researcher/Username"></div>
                <p><i>Search by researcher or user name</i></p>
            </div>
        </div>
        
        <div id="greenBarContainer"><img id="greenBar" src="img/Green%20Bar.png"></div>
        
        <div class="thirdColumnRow">
                    
            <div class="thirdColumn">
                <p id="amplitude">Amplitude</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>mm</p>
            </div>

            <div class="thirdColumn">
                <p id="rate">Rate</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>mm/sec</p>
            </div>

            <div class="thirdColumn">
                <p id="angle">Angle</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text"></div>
                <p>deg.</p>
            </div>
        
        </div>
        
    </div>
    <hr>
    <div class="vertical-menu">
        <div class="header">
            <div class="headerText">My Data</div>
        </div>
        <div class="content">
            <a href="#">Some Link 1</a>
            <a href="#">Some Link 2</a>
            <a href="#">Some Link 3</a>
            <a href="#">Some Link 4</a>
            <a href="#">Some Link 5</a>
            <a href="#">Some Link 6</a>
            <a href="#">Some Link 7</a>
            <a href="#">Some Link 8</a>
            <a href="#">Some Link 9</a>
        </div>
    </div>

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
        var $toggleButton = $('.toggle-button');
        var $menuWrap = $('.menu-wrap');
        
        $toggleButton.on('click', function() {
            $(this).toggleClass('button-open');
            $menuWrap.toggleClass('menu-show');
        });
    });
    </script>

</html>