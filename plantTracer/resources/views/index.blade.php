<!-- create.blade.php -->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Style -->

    <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopIndex.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/desktop/desktopNavBar.css') }}" />
    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileNavBar.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/mobile/mobileIndex.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type = "text/css" href="{{url('/css/desktop/desktopModal.css')}}">

<!-- Boostrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 

  </head>
  <body>

@include('navbar')
@include('footervarview')

<!-- Registration Modal -->
  <div class="container">
    <form class="modal-content-newUser animate" method="post" action="{{url('/index')}}" id="form">
        @csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="registerModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="labels register">
          <p>
                <strong>1)</strong> Download Plant Tracer app. Run an experiment and upload experiment data.<br><br>
                <strong>2)</strong> Use a valid email address to upload the data. Use this email address in order to make an account on this page. <br>
            </p>

            <label for="Email"><strong>Email:</strong></label>
            <input type="text" class="form-control" name="email" id="email">

            <label for="Password"><strong>Password:</strong></label>
            <input type="password" class="form-control" name="password" id="password">
       
            <label for="Password"><strong>Confirm Password:</strong></label>
            <input type="password" class="form-control" name="password_confirmation" id="passwordconf">

            <!--
            <input type="radio" name="download" value="yesApp"> I have downloaded the Plant Tracer App<br>
            <input type="radio" name="download" value="noApp"> I have not downloaded the Plant Tracer App
          -->
        
        </div>

            <div class="iPhone">
              <img id="iPhone" src="img/lapse%20it%20phone.jpg" alt="iPhone">
            </div>
      </div>
      
      <div class="modal-footer" style="background-color:#f1f1f1">
        <div id="registerBtn"><button class="btn btn-success" id="ajaxSubmit">Register</button></div>
        </div>
        
    </div>
  </div>
</div>
  </form>
</div>
@if (session('alert'))

<div id="message" class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ session('alert') }}</strong>
</div>

@endif

@include('loginModal')

<div id="homepage">
  <img id="homePlant" src="img/Plant-Animation.gif">
    <div id="homePageRight">
        <img id="homeLogo" src="img/Plant%20Tracer%20Logo.png">
        <p id="description">A method to explore the genetics of plant movement.</p> 
    
      <div class="optionBtns">
        <button type="button" class="optionBtn" data-toggle="modal" data-target="#registerModal" id="open">New User</button>

        <button type="button" class="optionBtn hideLogin" data-toggle="modal" data-target="#loginModal" id="open">Login</button>

        <button class="optionBtn" type="button"><a id="seedOrder" href="mailto:brennerbotany@gmail.com?Subject=Order%20for%20Seeds" target="_top">Order Seeds</a></button>
      </div>  
      <!--
        <div id="download"><button id="downloadBtn" type="button">Download</button></div>
      -->
    <div id="downloadIcons">
      <img id="downloadApple" src="img/downloadApple.png">
      <a id="matLab" href="https://drive.google.com/drive/folders/1Q6pUmlyx7Qe4bNUI3mlTL8RngnoKUSus" target="_blank"><img id="matLabImg" src="img/matLab.png"></a>
    </div>
    </div>
    <img id="nsf" src="img/nsf.png">
</div>

</body>
</html>

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
              $(".navLogin").text("Logout");
              $(".hideLogin").hide();
              $(".navLogin").on('click',function(e){
                  e.stopPropagation();
                  window.location.href="/logout";
                });
            }
        }); 

        $(document).ready(function (){
          $("#downloadApple").on("click", function(){
            var mac = navigator.platform.match(/(Mac|iPhone|iPod|iPad)/i) ? true : false;

            if(mac){
             window.location.href = 'https://itunes.apple.com/us/app/plant-tracer-app/id1421866105?mt=8';
     }
          else{
             window.location.href = 'https://itunes.apple.com/us/app/plant-tracer-app/id1421866105?mt=8';
     }
          });
      });

         jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/index') }}",
                  method: 'POST',
                  data: {
                     email: jQuery('#email').val(),
                     password: jQuery('#password').val(),
                     password_confirmation: jQuery('#passwordconf').val()
                  },
                  success: function(result){
                    if(result.errors)
                    {
                      jQuery('.alert-danger').html('');
                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });
                    }
                    else
                    {
                      console.warn(result);
                      jQuery('.alert-danger').hide();
                      $('#open').hide();
                      window.location.href="{{ url('/database') }}";
                    }
                  }
                  
                });
               });
            });
      </script>

</body>
</html>