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
    <title>BMS Admin - Manage Approved Comments</title>
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
          <h1><i class="fa fa-dashboard"></i>Manage Approved Comments</h1>
          <p></p>
        </div>
        <!--<ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Users</a></li>
        </ul>-->
      </div>
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
                      <th>Article</th>
                      <th>Comments</th>
                      <th>Reply</th>
                      <th>Comment Date</th>
                      <th>Action</th>
                      <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
<?php 
//$sql="select * from comments where cmt_status=1 ORDER BY `comments`.`cmt_id` DESC";
$sql="select c.*,a.title from comments c,articles a where cmt_status=1 and a.art_id=c.art_id order by `c`.`cmt_id` DESC";

$rs=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($rs))
{
if ($row['cmt_status']==1) 
  $sts="<a href=comment_status.php?sts=0&cmtid=".$row['cmt_id'].">DeActivate</a>";
else 
  $sts="<a href=comment_status.php?sts=1&cmtid=".$row['cmt_id'].">Activate</a>";
  ?>
                    <tr>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo substr($row['comment'],0,100)."...";?></td>
                      <?php
                      if ($row['reply']==null) {
                        echo "<td><a href=reply.php?cmtid=".$row['cmt_id'].">Reply</a></td>";
                      }
                      else
                      {
                        echo "<td><a href=edit_reply.php?cmtid=".$row['cmt_id'].">".substr($row['reply'],0,100)."...</a></td>";
                      }
                      ?>
                      <td><?php echo $row['cmt_date'];?></td>
                      <?php echo "<td>"."<a href=delete_comment.php?id=".$row['cmt_id'].">Delete</a>"."</td>";?>
                      <td><?php echo $sts;?></td>

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