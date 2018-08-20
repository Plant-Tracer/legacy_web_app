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
            <button type="button" class="filterBtn" id="movementOne" ng-click="changeMovement('circumnutation')">Circumnutation</button>
            <button type="button" class="filterBtn" id="plantTypeOne" ng-click="changeType('Mutant')">Mutant</button>
        </div>
        
        <div class="buttonColTwo filterColumn">
            <button type="button" class="filterBtn" id="movementTwo" ng-click="changeMovement('gravitropism')">Gravitropism</button>
            <button type="button" class="filterBtn" id="plantTypeTwo" ng-click="changeType('Wild Type')">Wild Type</button>
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
                <div><input class="thirdColInput" type="text" ng-change="checkAmp()" ng-model="min_amp"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-change="checkAmp()" ng-model="max_amp"></div>
                <p>mm</p>
            </div>

            <div class="thirdColumn">
                <p id="rate">Rate</p>
                <div><input class="thirdColInput" type="text" ng-change="checkRate()" ng-model="min_rate"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-change="checkRate()" ng-model="max_rate"></div>
                <p>mm/sec</p>
            </div>

            <div class="thirdColumn">
                <p id="angle">Angle</p>
                <div><input class="thirdColInput" type="text" ng-change="checkAngle()" ng-model="min_angle"></div>
                <p>to</p>
                <div><input class="thirdColInput" type="text" ng-change="checkAngle()" ng-model="max_angle"></div>
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
            <a ng-repeat="user in users | filter:{arabiposisAccession:accession, researcher:researcher} | filter:checkAmp() | filter:checkRate() | filter:checkAngle() | filter:filterMovement()" href="#" id="dataBtn" ng-click="changeData(user.movement,user.gene,user.geneID,user.dateLogged); changeGraphData(user.graphTime,user.graphX,user.graphY)">

                <span id="researcherName">@{{user.researcher}}</span><br>
                <span id="movement">@{{user.movement}}</span> - <span id="gene">@{{user.gene}}</span> - <span id="geneID">@{{user.geneID}}</span><br><span id="date">@{{user.dateLogged}}</span>

                <!-- Hidden attributes for data binding-->
                <span style="display: none;">@{{user.arabiposisAccession}}</span>
                <span style="display: none;">@{{user.amplitude}}</span>
                <span style="display: none;">@{{user.rate}}</span>
                <span style="display: none;">@{{user.angle}}</span>

                <!-- Graph Data -->
                <span id="xAxis" style="display: none;">@{{user.graphTime}}</span>
                <span id="graphOneY" style="display: none;">@{{user.graphX}}</span>
                <span id="graphTwoY" style="display: none;">@{{user.graphY}}</span>

            </a>
        </div>
    </div>

    <div class="ct-chart" id="chart1"></div>
    <div class="ct-chart" id="chart2"></div>

    <div id="userProfile">
        <div class="profileAvatar">
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

            $scope.my = {researcher: windowvar.researcher, movement:windowvar.movement, genotype: windowvar.genotype, geneID: windowvar.geneID, date: windowvar.date, xAxis: windowvar.xAxis, graphOneY: windowvar.graphOnePoints, graphTwoY: windowvar.graphOnePoints};

            $scope.min_amp = '';
            $scope.max_amp = '';
            $scope.min_rate = '';
            $scope.max_rate = '';
            $scope.min_angle = '';
            $scope.max_angle = '';

            $scope.activeMovement = '';
            $scope.activeType = '';

            $scope.changeData = function(movementString,geneString,geneIDString,dateString){
                $scope.my = {movement:movementString,genotype: geneString, geneID: geneIDString, date: dateString};
            };

            $scope.changeMovement = function(movementString){
                    $scope.activeMovement = movementString;
            }

            $scope.changeGraphData = function(xAxisString,YStringOne,YStringTwo){
                    var xAxisArray = xAxisString.split(',');
                    var yArrayOne = YStringOne.split(',');
                    var yArrayTwo = YStringTwo.split(',');

                    chart(xAxisArray,yArrayOne,yArrayTwo);
            }

            $scope.filterMovement = function(){
                return function(user){
                    if($scope.activeMovement.length !== 0 && typeof $scope.activeMovement !== 'undefined'){
                        return (user.movement === $scope.activeMovement);
                    }
                    else{
                        return user;
                    }
                }
            }

            $scope.changeType = function(typeString){
                    $scope.activeType = typeString;
            }

            $scope.filterType = function(){
                return function(user){
                    if($scope.activeType.length !== 0 && typeof $scope.activeType !== 'undefined'){
                        return (user.gene === $scope.activeType);
                    }
                    else{
                        return user;
                    }
                }
            }

            $scope.checkAmp = function(){
                return function(user){
                    if(($scope.min_amp.length !== 0 && typeof $scope.min_amp !== 'undefined') && ($scope.max_amp.length !== 0 && typeof $scope.max_amp !== 'undefined') ){
                            return (user.amplitude >= $scope.min_amp && user.amplitude <= $scope.max_amp);
                    }
                    else{
                        return user;
                    }
                }
            };

            $scope.checkRate = function(){
                return function(user){
                    if(($scope.min_rate.length !== 0 && typeof $scope.min_rate !== 'undefined') && ($scope.max_rate.length !== 0 && typeof $scope.max_rate !== 'undefined') ){
                            return (user.rate >= $scope.min_rate && user.rate <= $scope.max_rate);
                    }
                    else{
                        return user;
                    }
                }
            };

            $scope.checkAngle = function(){
                return function(user){
                    if(($scope.min_angle.length !== 0 && typeof $scope.min_angle !== 'undefined') && ($scope.max_angle.length !== 0 && typeof $scope.max_angle !== 'undefined') ){
                            return (user.angle >= $scope.min_angle && user.angle <= $scope.max_angle);
                    }
                    else{
                        return user;
                    }
                }
            };

        });

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

        var chart = function(array1, array2, array3){

                var options = {
                    width: 420,
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

        $(document).ready(function(){
            if(windowvar.isLoggedIn === true){
                $("#navLogin").text("Logout");
                $("#navLoginBtn").on('click',function(){
                    
                })
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
    
    </script>

</html>


