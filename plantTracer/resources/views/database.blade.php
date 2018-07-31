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

@include('navbar')
    
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

    <div id="bottomHalf">

    <div class="vertical-menu">
        <div class="header">
            <div class="headerText">My Data</div>
        </div>
        <div class="content">
            @foreach($users as $user)
            <a href="#" id="dataBtn">
                <span id="researcher">{{$user->researcher}}</span><br><span id="movement">{{$user->movement}}</span> - <span id="gene">{{$user->gene}}</span> - <span id="geneID">{{$user->geneID}}</span><br><span id="date">{{$user->dateLogged}}</span>
            </a>
            @endforeach
        </div>
    </div>

    <div id="stocks-div">
        @linechart('Stocks', 'stocks-div')
    </div>

    <div id="userProfile">
        <p><strong>Experiment Details</strong></p>
        <p>Movement: <span id="movementDetail">Movement</span></p>
        <p>Genotype: <span id="genotype">Genotype</span></p>
        <p>Gene: <span id="geneDetail">Gene</span></p>
        <p>Upload Date: <span id="uploadDate">Upload</span></p>
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

            var researcherTxt = $("#researcher").text();
            var movementTxt = $("#movement").text();
            var geneTxt = $("#gene").text();
            var geneIDTxt = $("#geneID").text();
            var dateTxt = $("#date").text();
            $("#movementDetail").text(movementTxt);
            $("#genotype").text(geneTxt);
            $("#geneDetail").text(geneIDTxt);
            $("#uploadDate").text(dateTxt);

    </script>

</html>


