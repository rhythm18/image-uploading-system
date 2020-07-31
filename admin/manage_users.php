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
      <?php

      if(isset($_GET['st']) && $_GET['st']=='s')
            {
                echo "<div class='alert alert-success bm-2'><b>".$_GET['msg']."</b></div>";
            }

      if(isset($_GET['st']) && $_GET['st']=='f' )
            {
                echo "<div class='alert alert-danger bm-2'><b>".$_GET['msg']."</b></div>";

            }

       if(isset($_GET['info']) && $_GET['info']=='s')
            {
                echo "<div class='alert alert-primary bm-2'><b>".$_GET['msg']."</b></div>";
            }
            
      if(isset($_GET['info']) && $_GET['info']=='f' )
            {
                echo "<div class='alert alert-danger bm-2'><b>".$_GET['msg']."</b></div>";

            }      
  if(isset($_GET['stu']) && $_GET['stu']=='s')
            {
                echo "<div class='alert alert-success bm-2'><b>".$_GET['msg']."</b></div>";
            }

      if(isset($_GET['stu']) && $_GET['stu']=='f' )
            {
                echo "<div class='alert alert-danger bm-2'><b>".$_GET['msg']."</b></div>";

            }
      ?>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Reg Date</th>
                      <th>Status</th>
                      <th>Action</th>
                      <th>Subscription</th>
                      <th>Verification</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
$sql="select * from users";
$rs=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($rs))
{
if ($row['status']==1) 
  $sts="<a href=user_status.php?sts=0&uid=".$row['user_id'].">DeActivate</a>";
else 
  $sts="<a href=user_status.php?sts=1&uid=".$row['user_id'].">Activate</a>";
  ?>
                    <tr>
                      <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <?php
                      if($row['mobile']=="")
                      {
                        ?>
                          <td><?php echo "NA";?></td>
                          <?php
                      }
                      else
                      {
                        ?>
                      <td><?php echo $row['mobile'];?></td>
                      <?php
                      }
                      ?>
                      <td><?php echo $row['created_at'];?></td>
                       <td><?php echo $sts;?></td>
                      <?php echo "<td>"."<a href=delete_user.php?id=".$row['user_id'].">Delete</a>"." | "."<a href=edit_user.php?id=".$row['user_id'].">Edit</a>"."</td>";?>
<?php
                      if ($row['sub_status']==1)  $s_sts="Subscribed";
                      if ($row['sub_status']==0)  $s_sts="Not Subscribed";
  ?>
                                             <td><?php echo $s_sts;?></td>
      <?php 
                      if ($row['email_verify']==1) 
                        {
                          if($row['google_id']=="")
                          {
                            $mail="Verified";
                          }

                          else
                            $mail="Verified- Google";
                        }
                      if ($row['email_verify']==0)  $mail="Not Verified";
      ?>
                                        <td><?php echo $mail;?></td>



                    </tr>
<?php
}
?>
                  </tbody>
                </table>
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