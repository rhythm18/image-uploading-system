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
          <h1><i class="fa fa-dashboard"></i>Manage Article</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="add_article.php">Add Articles</a></li>
        </ul>
      </div>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Posted By</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Post Date</th>
                      <th>Update Date</th>
                      <th>Views</th>
                      <th>Action</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
<?php 
//$sql="SELECT a.*,c.cat_name FROM articles a, category c where a.cat_id=c.cat_id order by 'a'.'art_id' DESC";
$sql="SELECT a.*,c.cat_name FROM articles a, category c where a.cat_id=c.cat_id ORDER BY `a`.`art_id` DESC";
$rs=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($rs))
{
if ($row['status']==2) 
  $sts="<a href=article_status.php?sts=1&artid=".$row['art_id'].">A</a>"." | "."<a href=article_status.php?sts=0&artid=".$row['art_id'].">R</a>";
if($row['status']==1) 
  $sts="A"." | "."<a href=article_status.php?sts=0&artid=".$row['art_id'].">R</a>";

if($row['status']==0) 
    $sts="<a href=article_status.php?sts=1&artid=".$row['art_id'].">A</a>"." | "."R";


  ?>
                    <tr>
                                <td><?php echo $row['art_id'];?></td>

                      <?php if($row['user_id']==0) 
                                {
                                  $sql="select name from admin where admin_id=".$_SESSION['adminID'];
                                  $postedBy=ReturnAnyValue($conn,$sql);
                                }
                              else 
                                {
                                  $sql="select first_name from users where user_id=".$row['user_id'];
                                  $postedBy=ReturnAnyValue($conn,$sql);
                                } ?>
                      <td><?php echo $postedBy;?></td>
                      <td><?php echo $row['cat_name'];?></td>
                      <?php if ($row['pic1']!=null) {
                        ?>
                        <td><img src="../uploads/<?php echo $row['pic1'];?>" width="50" height="50"> </td>
                      <?php
                    }
                    else {
                          
                      ?>
                      <td>NA</td>
                      <?php
                    }
                    ?>
                      <td><a href="show_article.php?id=<?php echo $row['art_id'];?>"><?php echo $row['title'];?></a></td>
                      <td><?php echo $row['post_date'];?></td>
                    <?php
                          if($row['update_date']=="")
                          {
                            echo "<td>NA</td>";
                          }
                          else
                          {
                            ?>
                      <td><?php echo $row['update_date'];?></td>
                      <?php
                          }
                    ?>
                      <td><?php echo $row['views'];?></td>

                      <?php echo "<td>"."<a href=delete_article.php?id=".$row['art_id'].">Delete</a>"." | "."<a href=edit_article.php?id=".$row['art_id'].">Edit</a>"."</td>";?>
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