    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="dashboard.php" class="logo"><b>KA<span>RS</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="profile.php">
              <i class="fa fa-tasks"></i>
              <span style="color: white">Admin Account</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green"></p>
              </li>
              <li>
                <a href="profile.php">
                  <div class="task-info">
                    <div class="desc">Admin Profile</div>
                  </div>
                </a>
              </li>
              <li>
                <a href="change-password.php">
                  <div class="task-info">
                    <div class="desc">Change Password</div>

                  </div>

                </a>
              </li>
              <li>
                <a href="logout.php">
                  <div class="task-info">
                    <div class="desc">Logout</div>
                  </div>
                </a>
              </li>

            </ul>
          </li>
          <!-- settings end -->

          <!-- notification dropdown start-->
         <li id="header_notification_bar" class="dropdown">
            <?php
$ret1=mysqli_query($con,"select tblrequest.ID,tblrequest.ServiceNumber,tblrequest.ServiceNumber from tblrequest where tblrequest.Status is null");

$num=mysqli_num_rows($ret1);

?>
            <a data-toggle="dropdown" class="dropdown-toggle" href="">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning"><?php echo $num;?></span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have <?php echo $num;?> new notifications</p>
              </li>
              <li>
                <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
                <a href="view-service-detail.php?viewid=<?php echo htmlentities ($result['ServiceNumber']);?>">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  #<?php echo $result['ServiceNumber'];?>

                  </a>
              </li>
            <?php }}?>
              <li>
                <a href="notassign-service-request.php">See all new service request</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
