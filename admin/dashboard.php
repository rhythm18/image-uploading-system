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
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>
            <?php 
            
                      $sql="select * from admin where admin_id=".$_SESSION["adminID"];
                      $rs=mysqli_query($conn,$sql);
                      $row=mysqli_fetch_array($rs);
                      echo "Your last login was at  ".$row['login_date'];
                      echo "<br>Login IP  ".$row['login_ip'];
            ?>
          </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Users</h4>
              <p><b><?php 
                          $sql="select count(*) from users";
                      ?>
                      <a href="manage_users.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Activated Users</h4>
              <p><b><?php 
                          $sql="select count(*) from users where status=1";
                       
                      ?>
                      <a href="manage_active_users.php"><?php echo ReturnAnyValue($conn,$sql);?></a>
              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>De-Activated Users</h4>
              <p><b><?php 
                          $sql="select count(*) from users where status=0";
                      ?>
                        <a href="manage_not_active_users.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

         <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Category</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from category";
                  ?>
                          <a href="manage_category.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>



        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Total Blogs</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Blogs by admin</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles where user_id=0";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

         <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Blogs by users</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles where user_id>0";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>


         <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Approved Blogs</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles where status=1 and user_id>0";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Pending Blogs</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles where status=2 and user_id>0";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Rejected Blogs</h4>
              <p><b>
                <?php 
                          $sql="select count(*) from articles where status=0 and user_id>0";
                    ?>
                              <a href="manage_article.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

       

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Approved Comments</h4>
              <p><b>
                <?php 
                            $sql="SELECT COUNT(*) FROM `comments` where cmt_status=1";
                  ?>
                              <a href="manage_approved_comment.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Rejected comments</h4>
              <p><b>
                 <?php 
                            $sql="SELECT COUNT(*) FROM `comments` where cmt_status=0";
                  ?>
                              <a href="manage_rejected_comment.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>


       
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Subscribers</h4>
              <p><b>
                <?php 
                            $sql="select count(*) from subscribers where status=1";
                  ?>
                            <a href="manage_sub.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Unsubscribers</h4>
              <p><b>
                <?php 
                            $sql="select count(*) from subscribers where status=0";
                  ?>
                            <a href="manage_unsub.php"><?php echo ReturnAnyValue($conn,$sql);?></a>

              </b></p>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
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