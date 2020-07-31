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
    <title>BMS Admin - Reply</title>
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
          <h1><i class="fa fa-dashboard"></i>Reply</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="add_category.php">Add Reply</a></li>
        </ul>
      </div>
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Reply</h3>

          
<?php
if (isset($_POST['submit']))
 {
$cmtID=$_POST['cmtid'];
$reply=$_POST['reply'];

 

  $sql="update comments set reply='$reply' where cmt_id='$cmtID'";
  if (mysqli_query($conn,$sql))
  {
    gotopage("manage_comment.php");
    }
  else{
    echo "Sorry there was a problem in adding your reply";
    echo "<br>".$sql;
  }
}
else {
  $cmtID=$_GET['cmtid'];
 $sql="select * from comments where cmt_id=$cmtID";
 $rs=mysqli_query($conn,$sql);
 $row=mysqli_fetch_array($rs);

?>

              <div class="tile-body col-md-12">
              <form class="" method="post" action="">
                <input type="hidden" name="cmtid" id="cmtid" value="<?php echo $cmtID;?>">
                <div class="form-group row">
                  <label class="control-label col-md-3">Comment</label>
                  <div class="col-md-9">
                    <?php echo $row['comment'];?>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Reply</label>
                  <div class="col-md-9">
<textarea class="form-control" type="textbox" rows="4" name="reply" id="reply" ><?php echo $row['reply'];?></textarea>
                  </div>
                </div>
              
<div class="form-group row">
                  <div class="col-md-12">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                      </label>
                    </div>
                  </div>
                </div>
              </form>
              <?php
              }
              ?>


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