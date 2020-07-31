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
    <title>BMS Admin - Manage Newsletter</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://cdn.tiny.cloud/1/ktomx7x1moj0r5piswj1emsafuodupnih4nica0kztl6m1i1/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#details'
    });
  </script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include("inc/top_menu.php");?>
    <!-- Sidebar menu-->
    <?php include("inc/left_menu.php");?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Edit Newsletter</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="add_newsletter.php">Add Newsletter</a></li>
        </ul>
      </div>
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit</h3>
             <?php
if (isset($_POST['submit']))
 {
$n_id=$_GET['nID'];
$title=$_POST['title'];
$content=$_POST['content'];
$dt=date("Y-m-d h:i:s");



  $sql="update newsletters set title='$title',content='$content',update_date='$dt' where n_id=$n_id";
  echo $sql;
  if (mysqli_query($conn,$sql))
  {
    gotopage("manage_newsletter.php");
    }
  else{
    echo "Sorry there was some error";
    echo "<br>".$sql;
}
}
else {
$sql="select * from newsletters where n_id=".$_GET['nID'];
echo $sql;
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);


?>



              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  
                 
             

                   <div class="form-group row">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $row['title'];?>" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="20" cols="80" name="content" id="content"><?php echo $row['content'];?></textarea>
                  </div>
                </div>
                
            
            
            <div class="form-group row">
                  <div class="col-md-4 ">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
              </div>
          </form>
          <?php
        }
        ?>
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