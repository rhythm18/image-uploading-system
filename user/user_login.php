<?php session_start();

include("../admin/inc/connect.php");

$sts='';

if(isset($_POST['submit'])){

	$email=$_POST['email'];

  $pass=$_POST['password'];

  $ip=$_SERVER['REMOTE_ADDR'];


  //$sql="select * from users where (email='$email' or mobile='$email' or member_id='$email') and password='$pass'";
  $sql="select status from users where email='$email'";
  $status=ReturnAnyValue($conn,$sql);

      if($status==0)
        {
            echo "<div class='alert alert-danger bm-2'><b>Your Login has been disabled </b>Please Contact Admin !!! </div>";

        }
      else
        {

             $sql="select * from users where email='$email' and password='$pass'";
              $rs=mysqli_query($conn,$sql);

              $cnt=mysqli_num_rows($rs);

              $row = mysqli_fetch_array($rs);

              if($cnt>0)
                {

                
                  $_SESSION['user_id']=$row['user_id'];

                  $_SESSION['name']=$row['name'];

                  $sql="update users set last_activity=now(),login_ip='$ip' where user_id=".$_SESSION['user_id'];
                  mysqli_query($conn,$sql);


                 header('Location:dashboard.php');

                }
        


              else
                {


                  $sts=1;

                }
        }


  

}

else {



}



?>





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

    <title>User Login</title>

  </head>

  <body>

    <section class="material-half-bg">

      <div class="cover"></div>

    </section>

    <section class="login-content">

      <div class="logo">

        <h1><?php 

include("inc/company_name.php");

?>
  
</h1>

      </div>

      <div class="login-box">

        <form class="login-form" action="" method="post">

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>

          <div class="form-group">

            <label class="control-label">Username</label>

            <input class="form-control" type="text" name="email">

          </div>

          <div class="form-group">

            <label class="control-label">Password</label>

            <input class="form-control" type="password" name="password">

          </div>

		  <?php 

		  if($sts==1) {

		  ?>

			<div class="alert alert-danger" role="alert" id="msg">

			<strong>Sorry!</strong> Invalid Username or Password

			</div>

		  <?php } ?>

        

          <div class="form-group btn-container">

            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>

            <a href="reg.php">Don't Have an account ?</a>


          </div>

        </form>

        

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