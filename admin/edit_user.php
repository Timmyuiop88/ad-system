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

    if(isset($_REQUEST['uin'])){
    $sql = "SELECT * FROM users WHERE unique_id='$_REQUEST[uin]'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($result);
    }
 ?>



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $site_name;?> Site Settings</title>
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
          <?php
      if(isset($_POST['submit'])){
        $firstname = $_POST['first_name'];
        $lastname =   $_POST['last_name'];
        $phonenumber= $_POST['phone_number'];
        $wallet = $_POST['wallet'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $account_balance = $_POST['account_balance'];
        $total_earnings = $_POST['total_earnings'];
        $total_investment = $_POST['total_investment'];
        $current_plan = $_POST['current_plan'];
        $account_type = $_POST['account_type'];
        if(empty($_POST['password'])){
          $p = $row['password'];

      }
      else{
          $rawpassword = $_POST['password'];
          $password = password_hash($rawpassword, PASSWORD_DEFAULT);
          $p = $password;
      }
        
        
		


		
//update table data
$sql1  = "UPDATE users SET first_name='$firstname', last_name='$lastname', phone_number='$phonenumber', wallet='$wallet', 
country='$country', email='$email', Balance='$account_balance', Total_earnings='$total_earnings', Total_investment='$total_investment', current_plan='$current_plan', account_type='$account_type', password='$p'  WHERE unique_id='$_REQUEST[uin]'";

mysqli_query($conn,$sql1) or die (mysqli_error($conn));
$num=mysqli_insert_id($conn);
					if(mysqli_affected_rows($conn)!=1){
						$message= "Error inserting the application information.";
						}
						 
$result1 = mysqli_query($conn, $sql1);

// if successfully update
if($result1) {
	echo "<script>alert('profile Updated Successfully')
	location.href='edit_user.php?uin=".$_REQUEST['uin']."'</script>";
	}
	else{
		echo "<script>alert('Sorry! Update Not Successful!')
	location.href='edit_user.php?uin=".$_REQUEST['uin']."'</script>";
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
                      <label for="exampleInputUsername1">First Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="First Name" value="<?php echo $row['first_name']?>" name="first_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Last Name" value="<?php echo $row['last_name']?>" name="last_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone Number</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Phone Number" value="<?php echo $row['phone_number']?>" name="phone_number">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Bitcoin Wallet Id</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Wallet Id" value="<?php echo $row['wallet']?>" name="wallet">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Country</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Country" value="<?php echo $row['country']?>" name="country">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?php echo $row['email']?>" name="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Account Type</label>
                      <select name="account_type" class="form-control" name="account_type">
                                <option value="<?php echo $row['account_type']?>"><?php echo $row['account_type']?></option>
                                <option value="Admin">Admin</option>
                                <option Value="user">user</option>

                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Account Balance</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Account_balance" value="<?php echo $row['Balance']?>" name="account_balance">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Total Earnings</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $row['Total_earnings']?>" name="total_earnings">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Total Investment</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $row['Total_investment']?>" name="total_investment">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Current Plan</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $row['current_plan']?>" name="current_plan">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
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
