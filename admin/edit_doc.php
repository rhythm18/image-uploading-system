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
    <title>Admin - Edit Doc</title>
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
          <h1><i class="fa fa-dashboard"></i>Edit Article</h1>
          <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="add_article.php">Add Articles</a></li>
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


    if (basename($_FILES["fileToUpload2"]["name"])!="")
     {
      $m=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$m."-".basename($_FILES["fileToUpload2"]["name"]);
      $filename2=$m."-".basename($_FILES["fileToUpload2"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename2!="") 
    {
        $str2=",image2='$filename2'";
    }
    else  
    {
      $str2="";
    }


     if (basename($_FILES["fileToUpload3"]["name"])!="")
     {
      $o=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$o."-".basename($_FILES["fileToUpload3"]["name"]);
      $filename3=$o."-".basename($_FILES["fileToUpload3"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename3!="") 
    {
        $str3=",image3='$filename3'";
    }
    else  
    {
      $str3="";
    }


    if (basename($_FILES["fileToUpload4"]["name"])!="")
     {
      $p=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$p."-".basename($_FILES["fileToUpload4"]["name"]);
      $filename4=$p."-".basename($_FILES["fileToUpload4"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload4"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename4!="") 
    {
        $str4=",image4='$filename4'";
    }
    else  
    {
      $str4="";
    }

    if (basename($_FILES["fileToUpload5"]["name"])!="")
     {
      $q=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$q."-".basename($_FILES["fileToUpload5"]["name"]);
      $filename5=$q."-".basename($_FILES["fileToUpload5"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload5"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename5!="") 
    {
        $str5=",image5='$filename5'";
    }
    else  
    {
      $str5="";
    }

    if (basename($_FILES["fileToUpload6"]["name"])!="")
     {
      $r=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$r."-".basename($_FILES["fileToUpload6"]["name"]);
      $filename6=$r."-".basename($_FILES["fileToUpload4"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload6"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload6"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename6!="") 
    {
        $str6=",image6='$filename6'";
    }
    else  
    {
      $str6="";
    }

    if (basename($_FILES["fileToUpload7"]["name"])!="")
     {
      $s=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$s."-".basename($_FILES["fileToUpload7"]["name"]);
      $filename7=$s."-".basename($_FILES["fileToUpload7"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload7"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload7"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename7!="") 
    {
        $str7=",image7='$filename7'";
    }
    else  
    {
      $str7="";
    }

    if (basename($_FILES["fileToUpload8"]["name"])!="")
     {
      $t=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$t."-".basename($_FILES["fileToUpload8"]["name"]);
      $filename8=$t."-".basename($_FILES["fileToUpload8"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload8"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload8"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename8!="") 
    {
        $str8=",image8='$filename8'";
    }
    else  
    {
      $str8="";
    }

    if (basename($_FILES["fileToUpload9"]["name"])!="")
     {
      $u=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$u."-".basename($_FILES["fileToUpload9"]["name"]);
      $filename9=$u."-".basename($_FILES["fileToUpload9"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload9"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload9"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename9!="") 
    {
        $str9=",image9='$filename9'";
    }
    else  
    {
      $str9="";
    }

    if (basename($_FILES["fileToUpload10"]["name"])!="")
     {
      $v=rand(10,999999);
      $target_dir = "../uploads/";
      $target_file = $target_dir.$v."-".basename($_FILES["fileToUpload10"]["name"]);
      $filename10=$v."-".basename($_FILES["fileToUpload10"]["name"]);
        
        if (move_uploaded_file($_FILES["fileToUpload10"]["tmp_name"], $target_file)) 
        {
          echo "The image file ".basename( $_FILES["fileToUpload10"]["name"]). " has been uploaded.";
        } 

        else 
        {
          //$fileError=1;
          echo "Sorry, there was an error uploading your file.";
        }
    }
    if ($filename10!="") 
    {
        $str10=",image10='$filename10'";
    }
    else  
    {
      $str10="";
    }

  $sql="update documents set title='$title',details='$details',status='1',update_date='$dt' ".$str1.$str2.$str3.$str4.$str5.$str6.$str7.$str8.$str9.$str10." where doc_id=$doc_id";
  //echo $sql;

  if (mysqli_query($conn,$sql))
    {

      $msg="Document updated Successfully";
      $url="manage_doc.php?st=s&msg=$msg";
      gotopage($url);

    }
  
  else
    { 
        $msg="There was a problem ";
        $url="manage_doc.php?st=f&msg=$msg";
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
                        <img src="../uploads/<?php echo $row['image'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 2</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload2" id="fileToUpload2">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image2']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image2'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 3</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload3" id="fileToUpload3">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image3']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image3'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 4</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload4" id="fileToUpload4">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image4']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image4'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 5</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload5" id="fileToUpload5">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image5']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image5'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 6</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload6" id="fileToUpload6">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image6']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image6'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 7</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload7" id="fileToUpload7">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image7']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image7'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 8</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload8" id="fileToUpload8">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image8']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image8'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 9</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload9" id="fileToUpload9">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image9']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image9'];?>" width="100" height="100">
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
                  <label class="control-label col-md-3">Image 10</label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="fileToUpload10" id="fileToUpload10">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Current Image</label>
                  <div class="col-md-8">
                    <p>
                 <?php if ($row['image10']!=null) {
                        ?>
                        <img src="../uploads/<?php echo $row['image10'];?>" width="100" height="100">
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