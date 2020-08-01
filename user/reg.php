<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Sign Up</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>

<?php
session_start();
include("../admin/inc/connect.php");


if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $cpass=$_POST['c_user_pass'];
  
  $join_date=date("Y-m-d h:i:s");

  if($pass!=$cpass)
          {
            echo "<div class='alert alert-danger bm-2'>Passwords does not match !</div>"; 
          }


  else
  {
      $sql="insert into users(name,email,password,join_date) values ('$name','$email','$pass','$join_date')";

      if(mysqli_query($conn,$sql))
         
          { 


                  header("Location:index.php");
                  //include("send_welcomeletter.php");
                  
         }

      else 
            {
                echo "<div class='alert alert-danger bm-2'><b>There was some error !</b> Please Contact Admin !</div>";
            }


  }

  

  
}
else
{
?>  



    <section class="login-content">
      <div class="logo">
        <h1>Safron Republic</h1>
      </div>
      <div class="login-box">

        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3>

          <div class="form-group">
          <label for="name">Name:</label>
          <input name="name" type="text" class="form-control" id="name" required>
        </div>
        
          <div class="form-group">
            <label for="email">Email-ID:</label>
            <input name="email" type="text" class="form-control" id="email" required>
          </div>


          <div class="form-group">
            <label for="password">Password:</label>
            <input name="password" type="password" class="form-control" id="password" required>
          </div>

          <div class="form-group">
            <label for="c_user_pass">Confirm Password:</label>
            <input name="c_user_pass" type="password" class="form-control" id="c_user_pass" required>
          </div>

      
      <?php } ?>
          <!--<div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>-->
        
      
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
                  <a href="index.php">Already a Member? Sign in</a>

        </form>

        <!--<form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" name="username">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
  </body>
</html>