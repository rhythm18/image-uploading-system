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
    <title>BMS Admin - Add Newsletter</title>
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
    //  selector: '#details'
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
          <h1><i class="fa fa-dashboard"></i>Add Newsletter</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        </ul>
      </div>
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add</h3>

          
<?php
 
 
 

  $sql="select * from articles order by art_id desc LIMIT 5";
  $rs=mysqli_query($conn,$sql);

  $msg="";
  $nTitle=date('Y-m-d')."- Newsletter";

  while($row=mysqli_fetch_array($rs))
  {
    $detail=substr($row['details'],0,350);
     $msg=$msg."<div class='row'>
  <div class='col-md-2 float-left'><img src='https://betechnical.in/uploads/".$row['pic1']."' class='img-fluid'></div>";
    $msg=$msg."<div class='col-md-10 float-right'>
<b><a href=https://betechnical.in/show_article.php?artID=".$row['art_id'].">".$row['title']."</a></b>";
    $msg=$msg."<p>".mysqli_real_escape_string($conn,$detail)."</p><hr></div></div>";
   
  }
   $body="<html><head><title>Blog-Newsletter</title><meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
  </head>
  <body>
  <div class='container-fluid bg-muted'>
  <div class='row'>

<div class='col-md-12'>
    <img src='https://betechnical.in/images/logo6.jpeg' class='img-fluid' width='700' height='120'>
</div>
</div>
<div class='row mt-4'>
  <div class='col-md-9'>";

   $body=$body.$msg;
   $body=$body."</div>
<div class='col-md-3'>
  <h3></h3>
  <div><a href=https://betechnical.in/unsub.php>Unsubscribe</a></div>
</div>
</div><div class='row mt-4'>

<div class='col-md-12'>

<div class='jumbotron text-center text-white bg-dark'>
<h5>© 2020. All Rights Reserved | Design by betechnical.in</h5>

</div>
</div>
</div>
</div></body></html>";


$body=mysqli_real_escape_string($conn,$body);
$dt=date("Y-m-d h:i:s");


  $sql="insert into newsletters(title,content,create_date) values ('$nTitle','$body','$dt')";
  if (mysqli_query($conn,$sql))
    {
      gotopage("manage_newsletter.php");
    }
  else{
    echo "Sorry there was a problem in Generating your Newsletter";
    echo "<br>".$sql;
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