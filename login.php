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
        <input type="email" id="email" name="email" placeholder="example@gmail.com" onBlur="Email()"  />
        <p id="format">Invalid email format. Please use the following format: example@gmail.com</p>
      </div>
      <div class="input-wrapper divPassword">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" onChange="password()" />
        <p id="pass"></p>
        <!-- <span class="toggle-password"><i class="far fa-eye"></i></span> -->
        <a href="#" class="forgot-password">Forgot password?</a>
      </div>
     <!--Remember me-->
      <div class="signin">
        <button type="submit">Sign in</button>
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

<?php
  function connection(){
    if(mysqli_connect("localhost", "root", "")){
      mysqli_select_db("e-commerce");

    }else{
      die("couldn't connect to database, refresh the page");
    }
  }
  if(isset($_POST["submit"])){
    connection();//connect to the database
    if(isset($_POST["email"])){
        $query="SELECT user_email FROM customers WHERE user_email={$_POST['email']}";
        if($answer=mysqli_query($query)){
          if(mysqli_num_row($answer)==1){
            if(isset($_POST["password"])){
            $query="SELECT password FROM customers WHERE password={$_POST['password']}";
            if($answerpass=mysqli_query($query)){
              if(mysqli_num_row($answerpass)==1){
                echo "Password exist in database";
              }else{
                echo "Password doesn't exist in database";
              }
            }else{
              die("Wrong query syntax");
            }  
          }
          }else{
            echo "Email not found. New User? Sign up";
          }
          
        }else{
          die("wrong query syntax");
        }
    }

  }
?>

