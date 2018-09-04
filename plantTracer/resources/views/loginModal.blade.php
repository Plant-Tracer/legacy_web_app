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
        <a href="{{url('/forgotpassword')}}">Forgot password?</a>
        </div>
    </div>
  </div>
</div>
  </form>
</div>