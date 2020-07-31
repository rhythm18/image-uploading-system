<?php 



include("../admin/inc/connect.php");



include("inc/chkAuth.php");



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



    <title>Be Technical- Dashboard</title>



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Main CSS-->



    <link rel="stylesheet" type="text/css" href="css/main.css">



    <!-- Font-icon css-->



    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  </head>



  <body class="app sidebar-mini rtl">



    <!-- Navbar-->



    <header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php 



include("inc/company_name.php");



?></a>



      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>



      <!-- Navbar Right Menu-->



      <ul class="app-nav">



        <!--<li class="app-search">



          <input class="app-search__input" type="search" placeholder="Search">



          <button class="app-search__button"><i class="fa fa-search"></i></button>



        </li>-->



       



        <!-- User Menu-->



        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>



          <ul class="dropdown-menu settings-menu dropdown-menu-right">



            <!--<li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>



            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>-->



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



          <h1><i class="fa fa-dashboard"></i> <?php


      echo "Welcome, ".$_SESSION['name'];?></h1>



      



       <?php







$sql="select last_activity,login_ip from users where user_id=".$_SESSION['user_id'];


$rs=mysqli_query($conn,$sql);



$cnt=mysqli_num_rows($rs);



while($row=mysqli_fetch_array($rs))



{ 



  //echo "<div style='text-align:right'>";


  echo "<br>Last Login: ".$row['last_activity'];



  echo "<br> From IP: ".$row['login_ip']."";



}







?>



        </div>



        <ul class="app-breadcrumb breadcrumb">



          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>






        </ul>



		



      </div>






<div class="row">



       <div class="col-md-6 col-lg-3">



                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>



                      <div class="info">



                        



                        <?php 



                          $sql="SELECT COUNT('*') as cntArt from documents WHERE user_id=".$_SESSION['user_id'];

                          $cntArt=ReturnAnyValue($conn,$sql);



                          if($cntArt==0)

                          {


                            $cntArt="No Articles Yet";

                          }

                        ?>


                        




                           <h4>My Documents:</h4>



                      <p><b><?php echo $cntArt;?></b></p>



                        

                        



        



       



                      </div>



                    </div>



                  </div>

                  

 


          </div>



        </div>



      </div>


    </main>



    <!-- Essential javascripts for application to work-->



    <script src="js/jquery-3.2.1.min.js"></script>



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