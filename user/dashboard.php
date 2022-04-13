<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsuid']==0)) {
  header('location:logout.php');
  } else{


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title> Kibe Repairing System:: Dashboard</title>

  <!-- Bootstrap core CSS -->
  <?php include_once('includes/css.php'); ?>
</head>

<body>
  <section id="container">

    <!--header start-->
<?php include_once('includes/header.php');?>
    <!--header end-->

    <!--sidebar start-->
    <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->


            <!--custom chart end-->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
              <div class="col-md-3 col-sm-3 mb">
                <?php
                $uid=$_SESSION['acrsuid'];
                 $query=mysqli_query($con,"Select * from tblrequest where UserID='$uid'");
$totserreq=mysqli_num_rows($query);
?>
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>Total Request</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 100,
                        color: "#FF6B6B"
                      },
                      {
                        value: 0,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Total Request: <?php echo $totserreq;?></p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <a href="requets-history.php"><h5 style="color: red">View all</h5></a>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4-->
              <div class="col-md-3 col-sm-3 mb">
                <?php
                $uid=$_SESSION['acrsuid'];
                 $query=mysqli_query($con,"Select * from tblrequest where UserID='$uid' && Status is null");
$totpenreq=mysqli_num_rows($query);
?>
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>Pending Request</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                  </script>

                  <footer>
                     <div class="col-sm-6 col-xs-6 goleft">
                      <h5>Pending Request <?php echo $totpenreq;?></h5>
                    </div>

                    <div class="col-sm-6 col-xs-6">
                      <a href="pending-request.php"><h5 style="color: red">View all</h5></a>
                    </div>
                  </footer>
                </div>
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-3 col-sm-3 mb">
                <?php
                $uid=$_SESSION['acrsuid'];
                 $query=mysqli_query($con,"Select * from tblrequest where UserID='$uid' && Status='Approved'");
$totappreq=mysqli_num_rows($query);
?>
                <div class="green-panel pn donut-chart">
                  <div class="green-header">
                    <h5>Approved Request</h5>
                  </div>
                  <canvas id="serverstatus03" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 100,
                        color: "#FF6B6B"
                      },
                      {
                        value: 0,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Approved Request: <?php echo $totappreq;?></p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <a href="approved-request.php"><h5 style="color: red">View all</h5></a>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-3 col-sm-3 mb">
                <?php
                $uid=$_SESSION['acrsuid'];
                 $query=mysqli_query($con,"Select * from tblrequest where UserID='$uid' && Status='Completed'");
$totcomreq=mysqli_num_rows($query);
?>
                <div class="darkblue-panel pn donut-chart">
                  <div class="darkblue-header">
                    <h5>Completed Request</h5>
                  </div>
                  <canvas id="serverstatus04" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 100,
                        color: "#FF6B6B"
                      },
                      {
                        value: 0,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus04").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Completed Request: <?php echo $totcomreq;?></p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <a href="completed-request.php"><h5 style="color: red">View all</h5></a>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>
            </div>

          </div>


          <!-- /col-lg-3 -->
        </div>
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->


            <!--custom chart end-->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
        <div class="col-md-3 col-sm-3 mb">
                <?php
                $uid=$_SESSION['acrsuid'];
                 $query=mysqli_query($con,"Select * from tblrequest where UserID='$uid' && Status='Request Cancelled'");
$totcanreq=mysqli_num_rows($query);
?>
                <div class="darkblue-panel pn donut-chart">
                  <div class="darkblue-header">
                    <h5>Request Cancelled</h5>
                  </div>
                  <canvas id="serverstatus05" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 100,
                        color: "#FF6B6B"
                      },
                      {
                        value: 0,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus05").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Request Cancelled: <?php echo $totcanreq;?></p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <a href="request-cancelled.php"><h5 style="color: red">View all</h5></a>
                    </div>
                  </div>
                </div>
                <!-- /grey-panel -->
              </div>

            </div>

          </div>


          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
   <?php include_once('includes/footer.php');?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
 <?php include_once('includes/js.php');?>


</body>

</html>
<?php  } ?>
