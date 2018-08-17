<!DOCTYPE html>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Database
    </title>

<!-- Chartist JS stylesheets -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<!-- CSS -->
    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopDatabase.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopNavBar.css')}}">
        
</head>

<body>

@include('navbar')
@include('footervarview')

<div ng-app="dataApp" ng-controller="dataCtrl">

    <div id="filterColumns">
        <div class="filterTypes">
            <p><i>Filter by movement</i></p>
            <p><i>Filter by plant type</i></p>
        </div>
        
        <div class="buttonColOne filterColumn">
            <button type="button" class="filterBtn" id="movementOne">Circumnutation</button>
            <button type="button" class="filterBtn" id="plantTypeOne">Mutant</button>
        </div>
        
        <div class="buttonColTwo filterColumn">
            <button type="button" class="filterBtn" id="movementTwo">Gravitropism</button>
            <button type="button" class="filterBtn" id="plantTypeTwo">Wild Type</button>
        </div>
        
        <div id="greenBarContainer"><img id="greenBar" src="img/Green%20Bar.png"></div>
        
        <div class="secondColumn">
            <div class="secondcolumnRow">
                <div id="accessionSearch"><input id="accession" type="text" ng-model="accession" placeholder="Accession number"></div>
                <p><i>Search by accession number</i></p>
            </div>
            <div class="secondcolumnRow">
                <div id="researcherSearch"><input id="researcher" type="text" ng-model="researcher" placeholder="Researcher/Username"></div>
                <p><i>Search by researcher or user name</i></p>
            </div>
        </div>
        
        <div id="greenBarContainer"><img id="greenBar" src="img/Green%20Bar.png"></div>
        
        <div class="thirdColumnRow">
                    
            <div class="thirdColumn">
                <p id="amplitude">Amplitude</p>
                <div><input class="thirdColInput" type="text" ng-model="min_amp"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-model="max_amp"></div>
                <p>mm</p>
            </div>

            <div class="thirdColumn">
                <p id="rate">Rate</p>
                <div><input class="thirdColInput" type="text" ng-model="min_rate"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-model="max_rate"></div>
                <p>mm/sec</p>
            </div>

            <div class="thirdColumn">
                <p id="angle">Angle</p>
                <div><input class="thirdColInput" type="text" ng-model="min_angle"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-model="max_angle"></div>
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
            <a ng-repeat="user in users | filter:{arabiposisAccession:accession, researcher:researcher}" href="#" id="dataBtn">

                <span id="researcherName" ng-model="my.researcher">@{{user.researcher}}</span><br>
                <span id="movement" ng-model="my.movement">@{{user.movement}}</span> - <span id="gene" ng-model="my.genotype">@{{user.gene}}</span> - <span id="geneID" ng-model="my.geneID">@{{user.geneID}}</span><br><span id="date" ng-model="my.date">@{{user.dateLogged}}</span>

                <!-- Hidden attributes for data binding-->
                <span style="display: none;">@{{user.arabiposisAccession}}</span>
                <span style="display: none;">@{{user.amplitude}}</span>
                <span style="display: none;">@{{user.rate}}</span>
                <span style="display: none;">@{{user.angle}}</span>

                <!-- Graph Stuff -->
                <span id="xAxis" style="display: none;">@{{user.graphTime}}</span>
                <span id="graphOneY" style="display: none;">@{{user.graphX}}</span>
                <span id="graphTwoY" style="display: none;">@{{user.graphY}}</span>

            </a>
        </div>
    </div>

    <div class="ct-chart" id="chart1"></div>
    <div class="ct-chart" id="chart2"></div>

    <div id="userProfile">
        <div class="profileContent">
            <img id="userAvatar" src="img/Database_Avatar.png" alt="User Avatar">
        </div>
        <div class="profileContent" id="expDetails">
            <p><strong>Experiment Details</strong></p>
            <p>Movement: <span id="movementDetail">@{{my.movement}}</span></p>
            <p>Genotype: <span id="genotype">@{{my.genotype}}</span></p>
            <p>Gene: <span id="geneDetail">@{{my.geneID}}</span></p>
            <p>Upload Date: <span id="uploadDate">@{{my.date}}</span></p>
        </div>
    </div>

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

        var app = angular.module('dataApp',[]);

        app.controller('dataCtrl', function($scope) {
            $scope.users = windowvar.users;

            $scope.my = {researcher: windowvar.researcher, movement:windowvar.movement, genotype: windowvar.genotype, geneID: windowvar.geneID, date: windowvar.date};

            //$scope.researcher = angular.element(document.querySelector(".content a")).find('#movement');
            
            $scope.ampFilter = function (minAmp,maxAmp) {
                return function(user){
                    return (user.amplitude >= minAmp && user.amplitude <= maxAmp);
                };

            };
            
            $scope.rateFilter = function (minRate,maxRate) {
                return function(user){
                    return (user.rate >= minRate && user.rate <= maxRate);
                };

            };

            $scope.angleFilter = function (minAngle,maxAngle) {
                return function(user){
                    return (user.angle >= minAngle && user.angle <= maxAngle);
                };

            };

        });
        /*
        | filter:ampFilter(min_amp,max_amp) | filter:rateFilter(min_rate,max_rate) | filter:angleFilter(min_angle,max_angle)
        */
        $(document).ready(function(){
            $("#movementOne").on("click",function(){
                toggleActive($("#movementOne"),$("#movementTwo")); 
            });

            $("#movementTwo").on("click",function(){
                toggleActive($("#movementTwo"),$("#movementOne"));
            });

            $("#plantTypeOne").on("click",function(){
                toggleActive($("#plantTypeOne"),$("#plantTypeTwo"));
            });

            $("#plantTypeTwo").on("click",function(){
                toggleActive($("#plantTypeTwo"),$("#plantTypeOne"));
            });
            
        });

        function toggleActive(button1,button2){
                var filteredMovement = $(this).text();
                console.log(filteredMovement);
                button1.addClass("active");
                    if((button2).hasClass("active")){
                        button2.removeClass("active");
                }
        }

        function chart(array1, array2, array3){

                var options = {
                    width: 380,
                    height: 380
                };

                new Chartist.Line('#chart1', {
                    labels: array1,
                    series:[
                        array2
                    ],


                }, options);

                new Chartist.Line('#chart2', {
                    labels: array1,
                    series: [
                        array3
                    ]
                }, options);
        }

        chart(windowvar.xAxis,windowvar.graphOnePoints,windowvar.graphTwoPoints);        

// CHANGE USER INFO BOX TO REFLECT INFO OF CURRENTLY PRESSED DATA BUTTON

        $(document).ready(function(){
            $(".content a").on("click",function(){

                var movement = $(this).find("#movement");
                var gene = $(this).find("#gene");
                var geneID = $(this).find("#geneID");
                var date = $(this).find("#date");

                $("#movementDetail").text(movement.text());
                $("#genotype").text(gene.text());
                $("#geneDetail").text(geneID.text());
                $("#uploadDate").text(date.text());

                //CHARTS

                //Turn the graphTime into an array that can be used as the graphs' X-axis
                var xAxisString = $(this).find("#xAxis");
                var xAxis = xAxisString.text();
                xAxis = xAxis.split(",");
                console.log("X Axis: " +xAxis);

                //Same for first graph's Y-Axis
                var graphOneString = $(this).find("#graphOneY");
                var yAxisOne = graphOneString.text();
                yAxisOne = yAxisOne.split(",");
                console.log("Graph One Y: "+yAxisOne);

                //Same for second graph's Y-Axis
                var graphTwoString = $(this).find("#graphTwoY");
                var yAxisTwo = graphTwoString.text();
                yAxisTwo = yAxisTwo.split(",");
                console.log("Graph Two Y: "+yAxisTwo);

                chart(xAxis,yAxisOne,yAxisTwo);

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


