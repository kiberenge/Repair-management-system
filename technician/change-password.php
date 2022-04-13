<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrstid']==0)) {
  header('location:logout.php');
  } else{
 if(isset($_POST['submit']))
{
$adminid=$_SESSION['acrsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbltechnician where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbltechnician set Password='$newpassword' where ID='$adminid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Kibe Repairing System :: Change Password</title>
  <!-- Bootstrap core CSS -->
  <?php include_once('includes/css.php'); ?>
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}

</script>
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
        <h3><i class="fa fa-angle-right"></i> Change Password</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Change Password</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post"  name="changepassword" onsubmit="return checkpass();">

                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Current Password</label>
                  <div class="col-lg-10">
                   <input type="password" id="currentpassword" name="currentpassword" value="" class="form-control" required="true">
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">New Password</label>
                  <div class="col-lg-10">
                    <input type="password" id="newpassword" name="newpassword" value="" class="form-control" required="true">
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Confirm Password</label>
                  <div class="col-lg-10">
                   <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" value="" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="submit">Submit</button>
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
 <?php include_once('includes/js.php');?>

</body>

</html>
<?php }  ?>
