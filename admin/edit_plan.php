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
    include('../db_conn.php');

    if(isset($_REQUEST['pin'])){
    $sql = "SELECT * FROM plans WHERE pin='$_REQUEST[pin]'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    }
 ?>


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $site_name;?> Edit Plans</title>
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
          <?php
      if(isset($_POST['submit'])){
       
        
        
		


		
//update table data
$sql1  = "UPDATE plans SET plan_name='$_POST[plan_name]', price='$_POST[price]', total_earnings_per_day='$_POST[total_earnings_per_day]', 
duration='$_POST[duration]', ref_bonus='$_POST[ref_bonus]'  WHERE pin='$_REQUEST[pin]'";

mysqli_query($conn,$sql1) or die (mysqli_error($conn));
$num=mysqli_insert_id($conn);
					if(mysqli_affected_rows($conn)!=1){
						$message= "Error inserting the application information.";
						}
						 
$result1 = mysqli_query($conn, $sql1);

// if successfully update
if($result1) {
	echo "<script>alert('Plan Updated Successfully')
	location.href='plans.php'</script>";
	}
	else{
		echo "<script>alert('Sorry! Update Not Successful!')
	location.href='plans.php'</script>";
	}
}
?>
            <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                Edit User
                </h3>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit User</h4>
                  
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Plan Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Plan Name" value="<?php echo $row['plan_name']?>"  name="plan_name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Price</label>
                      <input type="number" class="form-control" id="exampleInputUsername1"  value="<?php echo $row['price']?>"  name="price" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">price per ad  $</label>
                      <input type="number" class="form-control" id="exampleInputUsername1"   name="total_earnings_per_day" value="<?php echo $row['total_earnings_per_day']?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">duration (DAYS)</label>
                      <input type="number" class="form-control" id="exampleInputUsername1" placeholder="duration"  name="duration" required value="<?php echo $row['duration']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Refferal Bonus %</label>
                      <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Referral Bonus"  name="ref_bonus" required value="<?php echo $row['ref_bonus']?>">
                    </div>
                   
                    
                    
                    
                    
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit" >Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
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
