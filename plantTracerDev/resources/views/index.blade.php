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
        
        </div>

            <div class="iPhone">
              <img id="iPhone" src="img/iPhone.png" alt="iPhone">
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

<!-- Alert Modal
<div id="alertModal" class="modal">
-->
  <!-- Modal content
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>{{ session('alert') }}</p>
  </div>

</div>
-->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('alert') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<!-- Login Modal -->
<div class="container">
    <form class="modal-content-newUser animate" method="post" action="{{url('/index')}}" id="form">
        @csrf
  <!-- Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="labels login">

            <div class="loginLabel">
              <img class="avatar" src="img/leaf.png">
            </div>

            <div class="loginLabel">
              <label for="Email"><strong>Email:</strong></label>
              <input type="text" class="form-control" name="email" id="email">
            </div>

            <div class="loginLabel">
              <label for="Password"><strong>Password:</strong></label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
  
            <div class="loginLabel loginBtn">
              <button type="submit" class="btn btn-success">Login</button>
            </div>
        
        </div>
      </div>
      <div class="modal-footer" style="background-color:#f1f1f1">
        <a href="#">Forgot password?</a>
        </div>
    </div>
  </div>
</div>
  </form>
</div>

<img id="homePlant" src="img/Main%20Menu/Main%20Menu_Plant-11.png">
<div id="homepage">
    <div id="homePageRight">
        <img id="homeLogo" src="img/Plant%20Tracer%20Logo.png">
        <p id="description">A method to explore the genetics of plant movement.</p> 
    
        <button type="button" class="optionBtn" data-toggle="modal" data-target="#registerModal" id="open">New User</button>

        <button type="button" class="optionBtn" data-toggle="modal" data-target="#loginModal" id="open">Login</button>
        <!--
        <img id="greenBar" src="Imgs/Green%20Bar.png">
-->
        <button class="optionBtn" type="button"><a id="seedOrder" href="mailto:brennerbotany@gmail.com?Subject=Order%20for%20Seeds" target="_top">Order Seeds</a></button>
        
        <div id="download"><button id="downloadBtn" type="button">Download Coming Soon</button></div>

    </div>
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
            if(windowvar.isLoggedIn === true){
                $("#navLogin").text("Logout");
            }
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
                      //$('#myModal').data('modal',null);
                    }
                    else
                    {
                      console.warn(result);
                      jQuery('.alert-danger').hide();
                      $('#open').hide();
                      $('#myModal').modal('hide');
                      //$('#myModal').data('modal',null);
                      window.location.href="/database";
                    }
                  }});
               });
            });
      </script>

</body>
</html>