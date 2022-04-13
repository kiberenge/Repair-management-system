<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <?php
$tid=$_SESSION['acrstid'];
$ret=mysqli_query($con,"select * from tbltechnician where ID='$tid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <p class="centered"><a href="profile.php"><img src="../admin/images/<?php  echo $row['ProfilePic'];?>" class="img-circle" width="80"></a></p>
          
          <h5 class="centered"><?php  echo $row['Name'];?></h5><?php } ?>
          <li class="mt">
            <a class="active" href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
       
        
      <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-desktop"></i>
              <span>Assigin Services</span>
              <span class="dcjq-icon"></span></a>
            <ul class="sub" style="display: block;">
              <li><a href="new-service-request.php">New Request</a></li>
             
              <li><a href="service-request-completed.php">Request Completed</a></li>
             
            </ul>
          </li>
           <li class="mt">
            <a href="between-dates-reports.php">
             <i class="fa fa-tasks"></i>
              <span>Report</span>
              </a>
          </li>
         <li class="mt">
            <a href="search.php">
             <i class="fa fa-search"></i>
              <span>Search</span>
              </a>
          </li>
          
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>