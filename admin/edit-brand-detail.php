<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $bname=$_POST['brandname'];
$eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblbrand set BrandName='$bname' where ID='$eid'");
    if ($query) {

    echo '<script>alert("Brand name has been updated")</script>';
    echo "<script>window.location.href ='manage-brand.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kibe Repairing System :: Update Brand Detail</title>
  <!-- Bootstrap core CSS -->
 <?php include_once('includes/css.php'); ?>

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
        <h3><i class="fa fa-angle-right"></i> Update Brand Detail</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Update Brand Detail</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <?php
                $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblbrand where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Brand Name</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="brandname" value="<?php  echo $row['BrandName'];?>" required='true'>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Brand Logo</label>
                  <div class="col-lg-10">
                    <img src="images/<?php  echo $row['BrandLogo'];?>" width="100" height="100"> <a href="changeimage.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a>
                  </div>
                </div>
               <?php
$cnt=$cnt+1;
}?>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="submit">Update</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>

    <!--footer start-->
   <?php include_once('includes/footer.php');?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
   <?php include_once('includes/js.php');?>
</body>

</html>
<?php }  ?>
