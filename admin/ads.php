<!DOCTYPE html>
<html lang="en">
<?php
include('../db_conn.php');
 session_start();
 if(!isset($_SESSION['loggedin_a'])){
	echo "<script>alert('You have to login first')
	location.href='login.php'</script>";

 }
 else{
     
 ?>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $site_name;?> Ads</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <span style="font-size: 30px; font-family: calibri; font-weight: 1000000000;"><?php echo $site_name;?></span>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="#">
              <span class="btn btn-primary">+ Create new Admin</span>
            </a>
          </li>
          <li class="nav-item dropdown d-none d-lg-flex">
            
          </li>
          
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include_once('nav_bar.php')?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
           Ads
            </h3>
            <li class="nav-item  d-lg-flex">
            <a class="nav-link" href="new_ad.php">
              <span class="btn btn-primary">+ Create new Ad</span>
            </a>
          </li>
          </div>
                    <div class="row grid-margin">
                    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Ads</h4>
                  
                  <div class="table-responsive">
                 

                    <table class="table table-bordered">
                   
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Ad title
                          </th>
                          <th>
                           Ad Image
                          </th>
                          <th>
                          Ad Write Up
                          </th>
                          <th>
                            Date Posted
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

 
$sql="SELECT * FROM `ad` ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
   while($row = mysqli_fetch_array($result)) {

?>
                        <tr>
                          <td>
                            <?php echo $row['id']?>
                          </td>
                          <td>
                          <?php echo $row['ad_title'];?>
                          </td>
                          <td>
                          <?php echo $row['ad_image']?>
                          </td>
                          <td>
                          <?php echo $row['ad_write_up']?>
                          </td>
                          <td>
                            <?php echo $row['date']?>
                          </td>
                          <td>
                              <a href="edit_user.php?uin=<?php echo $row['unique_id']?>">
                            Edit AD
                            </a>       
                                <p>    </p>  
                            <a href="view_history.php?uin=<?php echo $row['unique_id']?>">
                            View Ad
                            </a>
                          </td>
                        </tr>
                        
                        
                       
                        <?php 
                    }
                    }
                    
                
                ?>
                        
                       
                      </tbody>
                      
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
                        </div>
 </div>
          </div>
         
          
          
          
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
<?php
 }
 mysqli_close($conn);
	?>

</html>
