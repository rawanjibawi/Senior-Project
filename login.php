<?php
  if(isset($_POST["submit"])){
    
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
      rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="LoginStyleSheet.css" />
    <title>Login</title>
  </head>
  <body>
    <form action="" method="POST" onsubmit="return validateForm(event)">
      <h1>Login</h1>
      <div class="input-wrapper">
        <label for="email">Email</label>
        <input type="email" class="input" id="email" name="email" placeholder="example@gmail.com" onBlur="Email()" />
        <p id="format">Invalid email format. Please use the following format: example@gmail.com</p>
      </div>
      <div class="input-wrapper divPassword">
        <label for="password">Password</label>
        <input type="password" class="input" name="password" id="password" placeholder="password" onChange="password()" />
        <p id="pass"></p>
        <!-- <span class="toggle-password"><i class="far fa-eye"></i></span> -->
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>
     <!--Remember me-->
      <div class="signin">
        <input type="submit" class="signin-input" value="submit" name="submit">
      </div>
      <div>
        <span class="Google">Or</span>
      </div>
      <div class="btn_google">
        <button type="button" class="google-button">
        <span class="icon"><i class="fab fa-google"></i></span> 
        <span>Sign in with Google</span>
      </button>
      </div>
      
      <div class="no-account">
        <span>No account?</span>
        <a href="#" class="no_account">Sign up</a>
        |
        <span class="admin">Admin?</span>
        <a href="#">Login as Admin</a>
      </div>
      <div id="root"></div>
      <script src="../src/index.js"></script>
    </form>
    <script src="login-signup.js"></script>
    
  </body>
</html>

