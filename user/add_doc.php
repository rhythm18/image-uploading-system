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
    <title>Add Document</title>
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
          <h1><i class="fa fa-dashboard"></i>Add Document</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="manage_documents.php">Go Back</a></li>
        </ul>
      </div>
       <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add</h3>

          
<?php
if (isset($_POST['submit']))
 {
  $id=$_SESSION['user_id'];
$title=mysqli_real_escape_string($conn,$_POST['title']);
$details=mysqli_real_escape_string($conn,$_POST['details']);


$dt=date("Y-m-d h:i:s");

$n=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$n."-".basename($_FILES["fileToUpload"]["name"]);
if(basename($_FILES["fileToUpload"]["name"])=="")
  {
    $filename="";
  }
else
  {
    $filename=$n."-".basename($_FILES["fileToUpload"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }


$m=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$m."-".basename($_FILES["fileToUpload2"]["name"]);
if(basename($_FILES["fileToUpload2"]["name"])=="")
  {
    $filename2="";
  }
else
  {
    $filename2=$m."-".basename($_FILES["fileToUpload2"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) 
      {
        echo "The image file 2 ".basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $o=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$o."-".basename($_FILES["fileToUpload3"]["name"]);
if(basename($_FILES["fileToUpload3"]["name"])=="")
  {
    $filename3="";
  }
else
  {
    $filename3=$o."-".basename($_FILES["fileToUpload3"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) 
      {
        echo "The image file 3 ".basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $p=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$p."-".basename($_FILES["fileToUpload4"]["name"]);
if(basename($_FILES["fileToUpload4"]["name"])=="")
  {
    $filename4="";
  }
else
  {
    $filename4=$p."-".basename($_FILES["fileToUpload4"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload4"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $q=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$q."-".basename($_FILES["fileToUpload5"]["name"]);
if(basename($_FILES["fileToUpload5"]["name"])=="")
  {
    $filename5="";
  }
else
  {
    $filename5=$q."-".basename($_FILES["fileToUpload5"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload5"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $r=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$r."-".basename($_FILES["fileToUpload6"]["name"]);
if(basename($_FILES["fileToUpload6"]["name"])=="")
  {
    $filename6="";
  }
else
  {
    $filename6=$r."-".basename($_FILES["fileToUpload6"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload6"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload6"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $s=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$s."-".basename($_FILES["fileToUpload7"]["name"]);
if(basename($_FILES["fileToUpload7"]["name"])=="")
  {
    $filename7="";
  }
else
  {
    $filename7=$s."-".basename($_FILES["fileToUpload7"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload7"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload7"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $t=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$t."-".basename($_FILES["fileToUpload8"]["name"]);
if(basename($_FILES["fileToUpload8"]["name"])=="")
  {
    $filename8="";
  }
else
  {
    $filename8=$t."-".basename($_FILES["fileToUpload8"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload8"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload8"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $u=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$u."-".basename($_FILES["fileToUpload9"]["name"]);
if(basename($_FILES["fileToUpload9"]["name"])=="")
  {
    $filename9="";
  }
else
  {
    $filename9=$u."-".basename($_FILES["fileToUpload9"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload9"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload9"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }

      $v=rand(10,999999);

$target_dir = "../uploads/";
$target_file = $target_dir.$v."-".basename($_FILES["fileToUpload10"]["name"]);
if(basename($_FILES["fileToUpload10"]["name"])=="")
  {
    $filename10="";
  }
else
  {
    $filename10=$v."-".basename($_FILES["fileToUpload10"]["name"]);
  }
    if (move_uploaded_file($_FILES["fileToUpload10"]["tmp_name"], $target_file)) 
      {
        echo "The image file ".basename( $_FILES["fileToUpload10"]["name"]). " has been uploaded.";
      } 

    else 
      {
        echo "No img Uploaded";
      }


  $sql="insert into documents (user_id,title,details,post_date,update_date,image,image2,image3,image4,image5,image6,image7,image8,image9,image10,status) values ('$id','$title','$details','$dt','$dt','$filename','$filename2','$filename3','$filename4','$filename5','$filename6','$filename7','$filename8','$filename9','$filename10','1')";
  echo $sql;

    if (mysqli_query($conn,$sql))
      {
        $sql="select email from users where user_id=".$id;
        $email=ReturnAnyValue($conn,$sql);
        include("doc_uploaded.php");
        gotopage("manage_documents.php");
      }

    else
      {
        echo "Sorry there was a problem in adding your article";
        echo "<br>".$sql;
      }
}
else 
{
 

?>


              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
               
               

                 <div class="form-group row">
                  <label class="control-label col-md-3">Title</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" name="title" id="title">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Details</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="20" cols="80" name="details" id="details"></textarea>
                  </div>
                </div>

          


                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload2" id="fileToUpload2">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload3" id="fileToUpload3">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload4" id="fileToUpload4">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload5" id="fileToUpload5">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload6" id="fileToUpload6">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload7" id="fileToUpload7">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload8" id="fileToUpload8">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload9" id="fileToUpload9">
                  </div>
                </div>

                 <div class="form-group row">
                  <label class="control-label col-md-3">Image</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload10" id="fileToUpload10">
                  </div>
                </div>
            
            <div class="form-group row">
                  <div class="col-md-4 ">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="submit" name="submit" value="ADD" class="btn btn-primary">
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