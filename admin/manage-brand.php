<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    // Code for deleting product from cart
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblbrand where ID=$rid");

 echo "<script>alert('Data deleted');</script>";
  echo "<script>window.location.href = 'manage-brand.php'</script>";


}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Kibe  Reparing System :: Manage Brand</title>


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
        <h3><i class="fa fa-angle-right"></i> Manage Brand</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
           <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>S.NO</th>
                    <th>Brand Name</th>
                    <th>Brand Logo</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
$ret=mysqli_query($con,"select * from tblbrand");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <tr class="gradeX">
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['BrandName'];?></td>
                    <td><img src="images/<?php  echo $row['BrandLogo'];?>" width="100" height="100"></td>
                    <td class="hidden-phone"><?php  echo $row['CreationDate'];?></td>
                    <td class="center hidden-phone"><a href="manage-brand.php?delid=<?php echo ($row['ID']);?>" onclick="return confirm('Do you really want to Delete ?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a> <a href="edit-brand-detail.php?editid=<?php echo htmlentities ($row['ID']);?>">  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>

                  </tr>
                  <?php
$cnt=$cnt+1;
}?>
                </tbody>

              </table>
            </div>
          </div>
          <!-- page end-->
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
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */


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

    });
  </script>
</body>

</html>
<?php  } ?>
