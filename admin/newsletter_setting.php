<?php include ("inc/security.php");
include ("inc/connect.php");
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
    <title>Setting</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include("inc/top_menu.php");?>
    <!-- Sidebar menu-->
    <?php include("inc/left_menu.php");?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Setting</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"></li>
        </ul>
      </div>
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
              <?php



if(isset($_POST['submit']))

{



  

  



  $mailPerHr=$_POST['mail_per_hr'];

  $mailFrom=$_POST['mail_from'];

  $r_pt=$_POST['read_pt'];

  $w_pt=$_POST['write_pt'];

  $pt_value=$_POST['pt_value'];

  $ref_pt=$_POST['ref_pt'];

  $min_payout=$_POST['min_payout'];


  $dt=date('Y-m-d h:i:s');

  





 $sql="update settings set mail_per_hr='$mailPerHr',mail_from='$mailFrom',read_pt='$r_pt',ref_pt='$ref_pt',write_pt='$w_pt',pt_value='$pt_value',min_payout='$min_payout',update_date='$dt'";


   if(mysqli_query($conn,$sql))

   {

      echo "Setting Updated !";    

   }

   else

   {

    echo "There was some error!!";

   }



}

else

{

  $sql="select * from settings";

  

  $rs=mysqli_query($conn,$sql);

  $row=mysqli_fetch_array($rs);



  



?>

  

  <form class="form-horizontal" id="setting" enctype="multipart/form-data" method="post" action="">

        

     









<div class="form-group row">

    <label for="mail_per_hr" class="control-label col-md-3">Mail Per Hour:  </label>

    <div class="col-md-8">

    <input name="mail_per_hr" type="text" class="form-control" id="mail_per_hr" value="<?php echo $row['mail_per_hr'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="mail_from" class="control-label col-md-3">Mail From:  </label>

    <div class="col-md-8">

    <input name="mail_from" type="text" class="form-control" id="mail_from" value="<?php echo $row['mail_from'];?>" required>

  </div>

</div>



<div class="form-group row">

    <label for="read_pt" class="control-label col-md-3">Reading Points:  </label>

    <div class="col-md-8">

    <input name="read_pt" type="text" class="form-control" id="read_pt" value="<?php echo $row['read_pt'];?>" required>

  </div>

</div>


<div class="form-group row">

    <label for="write_pt" class="control-label col-md-3">Writing Points:  </label>

    <div class="col-md-8">

    <input name="write_pt" type="text" class="form-control" id="write_pt" value="<?php echo $row['write_pt'];?>" required>

  </div>

</div>

<div class="form-group row">

    <label for="ref_pt" class="control-label col-md-3">Refer Points:  </label>

    <div class="col-md-8">

    <input name="ref_pt" type="text" class="form-control" id="ref_pt" value="<?php echo $row['ref_pt'];?>" required>

  </div>

</div>

<div class="form-group row">

    <label for="pt_value" class="control-label col-md-3">Point Value (in Paise):  </label>

    <div class="col-md-8">

    <input name="pt_value" type="text" class="form-control" id="pt_value" value="<?php echo $row['pt_value'];?>" required>

  </div>

</div>

<div class="form-group row">

    <label for="min_payout" class="control-label col-md-3">Minimium Payout (in Rupees):  </label>

    <div class="col-md-8">

    <input name="min_payout" type="text" class="form-control" id="min_payout" value="<?php echo $row['min_payout'];?>" required>

  </div>

</div>
         

        

        <div class="form-group row">

                  <div class="col-md-8 col-md-offset-9">

                    <div class="form-check">

                      <label class="form-check-label">

                        <input type="submit" name="submit" value="Update" class="btn btn-primary">

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