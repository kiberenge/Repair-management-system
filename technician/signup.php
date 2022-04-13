<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['contactno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

echo "<script>alert('This email or Contact Number already associated with another account');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName,MobileNumber,Email,Password) value('$fname','$lname','$contno','$email','$password' )");
    if ($query) {

    echo "<script>alert('You have successfully registered');</script>";
  }
  else
    {

      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title> Kibe Repairing System :: Sign up Page</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

</head>

<body>

  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post" onsubmit="return checkpass();">
        <h2 class="form-login-heading">sign up now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="First Name" autofocus name="firstname" required="true">
          <br>
          <input type="text" class="form-control" placeholder="Last Name" autofocus name="lastname" required="true">
          <br>
          <input type="email" class="form-control" placeholder="Email" autofocus name="email" required="true">
          <br>
          <input type="text" class="form-control" placeholder="Mobile Number" autofocus name="contactno" required="true" maxlength="10" pattern="[0-9]+">
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password">


          <label class="checkbox">

            <span class="pull-right">
            <a  href="login.php"> Already have an account</a>
            </span>
            </label>

          <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN UP</button>
          <hr>

        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
