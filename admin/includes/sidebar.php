<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="images/images.png" class="img-circle" width="80"></a></p>
          <?php
$aid=$_SESSION['acrsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$aid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <h5 class="centered"><?php  echo $row['AdminName'];?></h5><?php } ?>
          <li class="mt">
            <a  href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Brand</span>
              </a>
            <ul class="sub">
              <li><a href="add-brand.php">Add Brand</a></li>
              <li><a href="manage-brand.php">Manage Brand</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Technician</span>
              </a>
            <ul class="sub">
              <li><a href="add-technician.php">Add Technician</a></li>
              <li><a href="manage-technician.php">Manage Technician</a></li>

            </ul>
          </li>
      <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-desktop"></i>
              <span>Service Requests</span>
              <span class="dcjq-icon"></span></a>
            <ul class="sub" style="display: block;">
              <li><a href="notassign-service-request.php">Not Assign Request</a></li>
              <li><a href="assign-service-request.php">Assign Request</a></li>
               <li><a href="cancelled-request.php">Cancelled Request</a></li>
            </ul>
          </li>
          <li class="mt">
            <a href="completed-servicebytech.php">
              <i class="fa fa-dashboard"></i>
              <span>Completed Service</span>
              </a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-desktop"></i>
              <span>Page</span>
              <span class="dcjq-icon"></span></a>
            <ul class="sub" style="display: block;">
              <li><a href="aboutus.php">About Us</a></li>
              <li><a href="contactus.php">Contact Us</a></li>

            </ul>
          </li>
          <li class="mt">
           <a href="mail.php">
             <i class="fa fa-search"></i>
             <span>Search</span>
             </a>
         </li>


           <li class="mt">
            <a href="reg-users.php">
              <i class="fa fa-users"></i>
              <span>Reg Users</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Report</span>
              </a>
            <ul class="sub">
              <li><a href="between-dates-reports.php">B/W dates report</a></li>
              <li><a href="employeewise-report.php">Employee wise report</a></li>
              <li><a href="sales-report.php">Sales Report</a></li>
            </ul>
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
