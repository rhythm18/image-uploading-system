 <?php include ("inc/chkAuth.php");
include ("../admin/inc/connect.php");
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
    <title>Edit Document</title>
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
    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php include("inc/company_name.php");?></a>

     <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

      <ul class="app-nav">

        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>

    <!-- Sidebar menu-->
    <?php
  include("inc/menu.php");
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Edit Documents</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="manage_documents.php">Go Back</a></li>
        </ul>
      </div>
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit</h3>
             <?php
if (isset($_POST['submit']))
 {
    $doc_id=$_POST['id'];
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $details=mysqli_real_escape_string($conn,$_POST['details']);
    $dt=date("Y-m-d h:i:s");
    $filename="";
    
    if (basename($_FILES["fileToUpload"]["name"])!="")
     {
      $n=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$n."-".basename($_FILES["fileToUpload"]["name"]);
      $filename=$n."-".basename($_FILES["fileToUpload"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename!="") 
    {
        $str1=",image='$filename'";
    }
    else  
    {
      $str1="";
    }

  $sql="update documents set title='$title',details='$details',status='1',update_date='$dt' ".$str1." where doc_id=$doc_id";
  //echo $sql;

  if (mysqli_query($conn,$sql))
    {

      $msg="Document updated Successfully";
      $url="manage_documents.php?st=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_documents.php?st=f&msg=$msg";
        gotopage($url); 
      //echo $sql;
    }

     
  


}
else
 {
$doc_id=$_GET['id'];
$sql="select * from documents where doc_id=$doc_id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);


?>



              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $doc_id;?>">
               
             

                   <div class="form-group row">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="title" id="title" value="<?php echo $row['title'];?>" >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="20" cols="80" name="details" id="details"><?php echo $row['details'];?></textarea>
                  </div>
                </div>
                

                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image'];?>" width="250" height="250">
                      <?php
                    }
                    else {
                          
                      ?>
                        NA
                      <?php
                    }
                    ?>
                  </p>
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