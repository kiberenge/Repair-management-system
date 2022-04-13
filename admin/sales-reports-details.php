<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>KIbe Reparing System :: Sales Report</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">

    <!--header start-->
   <?php include_once('includes/header.php');?>

    <!--sidebar start-->
  <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Sales Reports</h3>
        <div class="row mb">


<div class="col-md-12">

                                       <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];

?>

<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
    <h4 class="header-title m-t-0 m-b-30">Sales Report Month Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>

              <hr>
              <table class="table">

               <thead>
                  <tr>
                    <th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>

                  </tr>
                </thead>

                <tbody>
                           <?php

$ret=mysqli_query($con,"select month(tblrequest.ReqDate) as lmonth,year(tblrequest.ReqDate) as lyear,sum(tblrequest.ServiceCharge+tblrequest.PartCharge+tblrequest.OtherCharge) as total from tblrequest
  where (date(tblrequest.ReqDate) between '$fdate' and '$tdate') && tblrequest.Status='Completed' group by lmonth,lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <tr class="gradeX">
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
                    <td><?php  echo $total= $row['total'];?></td>

                  </tr>
                 <?php
$ftotal+=$total;


}?>
<tr>
                  <th colspan="2" style="text-align:center">Total </th>
              <td><?php  echo $ftotal;?></td>

              </tr>
                </tbody>

              </table>
            </div>
          </div>
 <div class="row mb">


<div class="col-md-12">

                                       <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];

?>

<?php } else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
    ?>
    <h4 class="header-title m-t-0 m-b-30">Sales Report Year Wise</h4>
<h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>

              <hr>
              <table class="table">

               <thead>
                  <tr>
                    <th>S.NO</th>
<th>Year </th>
<th>Sales</th>

                  </tr>
                </thead>

                <tbody>
                           <?php

$ret=mysqli_query($con,"select year(tblrequest.ReqDate) as lyear,sum(tblrequest.ServiceCharge+tblrequest.PartCharge+tblrequest.OtherCharge) as total from tblrequest
  where (date(tblrequest.ReqDate) between '$fdate' and '$tdate') && tblrequest.Status='Completed' group by lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <tr class="gradeX">
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['lyear'];?></td>
                    <td><?php  echo $total= $row['total'];?></td>

                  </tr>
                 <?php
$ftotal+=$total;


}?>
<tr>
                  <th colspan="2" style="text-align:center">Total </th>
              <td><?php  echo $ftotal;?></td>

              </tr>
                </tbody>

              </table>
              <?php } ?>
            </div>
          </div>


        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
<?php include_once('includes/footer.php');?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>

  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="../lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "../lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "../lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
<?php  } ?>
