<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$aid=$_SESSION['acrsaid'];
$email=$_POST['email'];
 $mobnum=$_POST['mobnum'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$con->real_escape_string($_POST['pagedes']);

 $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',PageDescription='$pagedes',Email='$email',MobileNumber='$mobnum' where  PageType='contactus'");

    if ($query) {

    echo '<script>alert("Contact Us has been updated.")</script>';
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
  <title> Kibe  Repairing System :: Contact Us</title>
  <!-- Bootstrap core CSS -->
 <?php include_once('includes/css.php'); ?>
<script src="nic.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
        <h3><i class="fa fa-angle-right"></i> Contact Us</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Contact Us</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post">
                <?php

$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Page Title</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="pagetitle" value="<?php  echo $row['PageTitle'];?>" required='true'>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Page Description</label>
                  <div class="col-lg-10">
                   <textarea  name="pagedes" required='true' cols="140" rows="10"><?php  echo $row['PageDescription'];?></textarea>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Email Address</label>
                  <div class="col-lg-10">
                   <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required='true'>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Mobile Number</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="mobnum" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength="10" pattern='[0-9]+'>
                  </div>
                </div>
               <?php
$cnt=$cnt+1;
}?>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="submit" >Update</button>
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
