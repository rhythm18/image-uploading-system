<?php include ("inc/connect.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Be Technical</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="images/title-icon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><img src="img/title-icon copy.jpg" height="40" width="40" style="margin-right: 5px;"><a href="index.html" class="navbar-brand">Be Technical</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="index.php" class="nav-link active ">Home</a>
              </li>
              <!--<li class="nav-item"><a href="blog.html" class="nav-link ">Blog</a>
              </li>-->
              
              <?php 
                              
                        $sql="select * from category where cat_on_top=1";
                            $rs1=mysqli_query($conn,$sql);
                            
                            while ($row1=mysqli_fetch_array($rs1))
                            {
                               
                                 $cid=$row1['cat_id'];
                                 $cname=$row1['cat_name'];
                                 echo "<li class='nav-item'>";
                                 echo  "<a class='nav-link' href=index.php?id=$cid>$cname</a>";
                                 echo "</li>";
                            
                            }

                            if(isset($_SESSION['user_id']))
                            {
                              ?>
                              <li class="nav-item">
                                <a class="nav-link" href="user/dashboard.php"><b>Dashboard</b></a>
                            </li>
                                    <li class="nav-item">
                                <a class="nav-link" href="user/logout.php"><b>Logout</b></a>
                            </li>
                              <?php
                            }
                          else
                          {
                        ?>
                            
                            <li class="nav-item">
                                <a class="nav-link hover" href="user/user_login.php"><b>Login</b></a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link color-grey-hover" href="" data-toggle="modal" data-target="#myModal"><b>Register</b></a>
                          <?php
                          }
                      ?>

                      <!-- The Modal -->

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Write with us...</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
 
  <div class="container">

          <!--Grid row-->
          <div class="row">
        
            <!--Grid column-->
            <div class="col-md-12">
        
              <!--Title--><?php

              if (isset($_GET['refid']))
              {
                  $spid=$_GET['refid'];
              }
             else
             {
                  $spid="";
             }
                          ?>
              
        
              <!--Section: Live preview-->
              <section style="padding: 0px;">
        
                <!-- Default form register -->
                <form method="post" action="reg.php" class="text-center border border-light p-5">
        
        
                  <div class="form-row mb-4">
                    <div class="col">
                      <!-- First name -->
                       <input type="text" name="refid" id="refid" class="form-control mb-4" style="width: 335px;
" placeholder="Refered By (Optional)" value="<?php echo $spid;?>">
                      <input type="text" name="first_name" id="first_name" class="form-control mb-4" placeholder="First name"  required="">
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input type="text" name="last_name" id="last_name" class="form-control mb-4" placeholder="Last name" required="">

                      <input type="text" name="city" id="city" class="form-control mb-4" placeholder="City" required="">

                      <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Phone number (Optional)" aria-describedby="defaultRegisterFormPhoneHelpBlock">

                      <input type="text" name="paytm" id="paytm" class="form-control" style="margin-top: 25px;" placeholder="Paytm number (Optional)" aria-describedby="defaultRegisterFormPhoneHelpBlock">

                        <input type="email" name="email" id="email" class="form-control mb-4" style="margin-top: 25px;" placeholder="E-mail" required="">
                        <input type="password" name="user_pass" id="user_pass" class="form-control mb-4" placeholder="Password" required="">
                        <input type="password" name="c_user_pass" id="c_user_pass" class="form-control mb-4" placeholder="Confirm Password" required="">

                  <!-- Password -->
                  
                  <small class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                  </small>
                    </div>
                  </div>
        
                  <!-- E-mail -->
                
        
                  
                 
                  <!-- Sign up button -->
                  <button class="btn btn-info my-4 btn-block waves-effect waves-light" name="submit" type="submit">Sign up</button>
        
                  <hr>
        
                 </form>
               </section>

            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Hero Section-->
    <!-- Intro Section-->

    
<?php


$email=$_GET['eMail'];

$sql="update users set email_verify='1',status='1' where email='$email'";
//echo $sql;
//echo $sql;

if(mysqli_query($conn,$sql))
{
    echo "<div class='alert alert-success bm-2'><b>Congratulations !</b> Your Email has been Verified</div>";

    $sql="select ref_id from users where email='$email'";
    $id=ReturnAnyValue($conn,$sql);

    if($id=="")
    {

    }

    else
    {
        $dt=date('Y-m-d h:i:s');

    $sql="select ref_pt from settings where id=1";
    $ref_pt=ReturnAnyValue($conn,$sql);

    $sql="select user_id from users where email='$email'";
    $pt_from=ReturnAnyValue($conn,$sql);



        $sql="insert into user_points(user_id,pt_type,points,pt_from,pt_dt) values('$id','3','$ref_pt','$pt_from','$dt')";

        mysqli_query($conn,$sql);
    }
}


?>
<!--</div>
</div>
</div>

        

        <?php //include("inc/about-author.php");?>

        <?php //include("inc/inner-right-panel.php");?>

        <?php //include("inc/site-footer.php");?>

        <div class="dmtop">Scroll to Top</div>
        
    </div> end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <!-- Gallery Section-->

    <!-- Page Footer-->

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>