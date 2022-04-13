<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['acrsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];

     $query=mysqli_query($con, "update tbladmin set AdminName='$aname', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
    if ($query) {

    echo '<script>alert("Profile has been updated")</script>';
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
  <title>kibe Repairing System :: Profile</title>
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
        <h3><i class="fa fa-angle-right"></i> Admin Profile</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Admin Profile</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post">
                <?php

$ret=mysqli_query($con,"select * from tbladmin");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Admin Name</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="adminname" value="<?php  echo $row['AdminName'];?>" required='true'>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">User Name</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" name="username" value="<?php  echo $row['UserName'];?>" required='true'>

                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Email</label>
                  <div class="col-lg-10">
                   <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" readonly='true'>

                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Contact Number</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength='10'>

                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Admin Registration Date</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" id="email2" name="" value="<?php  echo $row['Regdate'];?>" readonly="true">
                  </div>
                </div>
                <?php } ?>
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
