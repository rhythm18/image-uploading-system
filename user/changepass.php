<?php

include("../admin/inc/connect.php");
include("inc/chkAuth.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php 
include("inc/company_name.php");
?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"></a>
          
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
	<?php
	include("inc/menu.php");
	?>
     <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Change Password</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Change Password</li>
        </ul>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			
      <?php

if(isset($_POST['submit']))
{
  
  $pass=$_POST['password'];
  $npass=$_POST['npass'];
  $cpass=$_POST['cpass'];
  $id=$_SESSION['user_id'];
  

  $sql="select * from users where user_id='$id' and password='$pass'";
  
  $rs=mysqli_query($conn,$sql);

  $cnt=mysqli_num_rows($rs);

  if($cnt==0)
  {
    echo "<div class='alert alert-danger bm-2'><b>Sorry Invalid Password !</b></div>";
    echo "<a href='changepass.php'><div class='text-primary'>Click here to go back</a></div>";

  }

  else
  {
    if($cpass!=$npass)
    {
      echo "<div class='alert alert-danger bm-2'><b>Both Passwords Must be same !</b></div>";
      echo "<a href='changepass.php'><div class='text-primary'>Click here to go back</a></div>";
    }
    else
    {
      $sql="update users set password='$npass' where user_id=$id";
        if(mysqli_query($conn,$sql))
          {
               echo "<div class='alert alert-success bm-2'><b>Password Updated Successfully !</b></div>";
               echo "<a href='dashboard.php'><div class='text-primary'>Click here to go back</a></div>";
          }
        else
        {
          echo "There was some error ";
        }
    }
  }
}
else
  
{
?>  
  
  <form class="form-horizontal" id="userprofile" enctype="multipart/form-data" method="post" action="">
				
     <div class="form-group row">
    <label for="password" class="control-label col-md-3">Old Password: </label>
        <div class="col-md-8">
    <input name="password" type="password" class="form-control" id="password" required>
  </div>
</div>
 <div class="form-group row">
    <label for="npass" class="control-label col-md-3">New Password: </label>
        <div class="col-md-8">
    <input name="npass" type="password" class="form-control" id="npass"required>
  </div>
</div>

  <div class="form-group row">
    <label for="cpass" class="control-label col-md-3">Confirm Password: </label>
        <div class="col-md-8">
          <input name="cpass" type="password" class="form-control" id="cpass" required>
  </div>
</div>

  
         
				
				<div class="form-group row">
                  <div class="col-md-8 col-md-offset-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Change Password" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
				
				
				
              </form>
            </div>
            <?php
          }
          ?>
            </div>
            
          </div>
        </div>
        <div class="clearix"></div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      
    </script>
  </body>
</html>