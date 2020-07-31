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
    <title>BMS Admin - Dashboard</title>
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
          <h1><i class="fa fa-dashboard"></i>Manage Users</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Users</a></li>
        </ul>
      </div>
       <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit</h3>
            <?php
if (isset($_POST['submit']))
 {
$user_id=$_GET['id'];
$name=$_POST['first_name'];
$lname=$_POST['last_name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];

$sql="update users set first_name='$name',last_name='$lname',email='$email',mobile='$mobile' where user_id=$user_id";

if (mysqli_query($conn,$sql))
 {
      $msg="User's info Updated Successfully";
      echo $msg;
      $url="manage_users.php?info=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_users.php?info=f&msg=$msg";
        gotopage($url); 
    }
}
else {
$user_id=$_GET['id'];
$sql="select * from users where user_id=$user_id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);


?>

<!----------->


            <div class="tile-body">
              <form class="form-horizontal" name="blog" method="post" action="">
                <div class="form-group row">
                  <label class="control-label col-md-3">First Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $row['first_name'];?>">
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Last Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="last_name" id="last_name"  value="<?php echo $row['last_name'];?>">
                  </div>
                </div>


                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" name="email" id="email" value="<?php echo $row['email'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Mobile</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="mobile" name="mobile" id="mobile" value="<?php echo $row['mobile'];?>">
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
              <?php
            }
            ?>
            </div>
              </div>
            </div>
          </div>
        </div>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>