
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
      <h3 id="formatDatabase"></h3>
      <div class="input-wrapper">
        <label for="email">Email</label>
        <input type="email" class="input" id="email" name="email" placeholder="example@gmail.com" onBlur="Email()" 
        value="<?php if(isset($_POST["submit"])){echo $_POST["email"];}else{echo "";}?>"/>
        <p id="format">Invalid email format. Please use the following format: example@gmail.com</p>
      </div>
      <div class="input-wrapper divPassword">
        <label for="password">Password</label>
        <input type="password" class="input" name="password" id="password" placeholder="password" onChange="password()"
         value="<?php if(isset($_POST["submit"])){echo $_POST["password"];}else{echo "";}?>"/>
        <p id="pass"></p>
        <!-- <span class="toggle-password"><i class="far fa-eye"></i></span> -->
        <a href="forget-pass.php" class="forgot-password">Forgot password?</a>
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
    <?php
  function connection(){
    $conn=mysqli_connect("localhost", "root", "");
    if($conn){
      mysqli_select_db($conn, "e-commerce");
      return $conn;
    }else{
      die("<h1>Connection to database failed, Refresh the page</h1>");
    }
  }
  if(isset($_POST["submit"])){
    $conn=connection();
    $query = "SELECT * FROM customers WHERE email='{$_POST["email"]}'";
    $response=mysqli_query($conn, $query);
    if($response){
      $rowcount=mysqli_num_rows($response);
      if($rowcount>0){//email found, check password
        $password_query="SELECT * FROM customers WHERE email='{$_POST["email"]}' AND password='{$_POST["password"]}'";
        $password_respond=mysqli_query($conn, $password_query);
        if($password_respond){
          $password_row_count=mysqli_num_rows($password_respond);
          if($password_row_count>0){
            //if both are right, go to the home page
            header("Location: home.html");
            exit();//to stop furthur execution
          }else{?>
            //password is wrong
            <script>
              document.getElementById("formatDatabase").innerHTML="Password not found. Try again";
              document.getElementById("formatDatabase").style.fontSize="14px";
              document.getElementById("formatDatabase").style.color="red";

          </script>;
          <?php
          }
        }else{
          die("Query syntax is wrong, refresh the page");
        }
      }else{?>
        //email not found sign in
        <script>document.getElementById("formatDatabase").innerHTML="Email not found. Try again";
        document.getElementById("formatDatabase").style.fontSize="14px";
              document.getElementById("formatDatabase").style.color="red";
      </script>;
      <?php
      }
    }else{
      die("<h1>Query is wrong, refresh the page</h1>");
    }
  }
?>
  </body>
</html>

