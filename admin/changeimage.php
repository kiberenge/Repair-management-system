<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $logo=$_FILES["logo"]["name"];
$extension = substr($logo,strlen($logo)-4,strlen($logo));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$logo=md5($logo).time().$extension;
 move_uploaded_file($_FILES["logo"]["tmp_name"],"images/".$logo);
$eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblbrand set BrandLogo='$logo' where ID='$eid'");
    if ($query) {

    echo '<script>alert("Brand logo has been updated")</script>';
    echo "<script>window.location.href ='manage-brand.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kibe  Repairing System :: Change Brand Logo</title>
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
        <h3><i class="fa fa-angle-right"></i> Change Brand Logo</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Change Brand Logo</h4>
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
                   <input type="text" class="form-control" name="brandname" value="<?php  echo $row['BrandName'];?>" readonly='true'>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Old Brand Logo</label>
                  <div class="col-lg-10">
                    <img src="images/<?php  echo $row['BrandLogo'];?>" width="100" height="100">
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">New Brand Logo</label>
                  <div class="col-lg-10">
                    <input type="file" class="form-control" name="logo" value="" required="true">
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
