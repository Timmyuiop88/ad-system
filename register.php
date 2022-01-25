<!DOCTYPE html>
<html lang="en" class="h-100">

<?php include('db_conn.php')?>

<!-- Mirrored from fasto.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jun 2021 08:39:44 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $site_name?> - Sign Up </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="user2/images/favicon.png">
	<link rel="stylesheet" href="user2/vendor/chartist/css/chartist.min.css">
    <link href="user2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="user2/css/style.css" rel="stylesheet">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<img src="images/logo-full.png" alt="">
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form action="validitaion.php" method="post">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Firstname</strong></label>
                                            <input type="text" class="form-control"  name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Lastname</strong></label>
                                            <input type="text" class="form-control"  name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Phone Number</strong></label>
                                            <input type="number" class="form-control" name="phone" >
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Wallet</strong></label>
                                            <input type="text" class="form-control" name="wallet" >
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Country</strong></label>
                                            <input type="text" class="form-control" name="country" >
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="user2/vendor/global/global.min.js"></script>
	<script src="user2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="user2/js/custom.min.js"></script>
    <script src="user2/js/deznav-init.js"></script>
	<script src="user2/js/demo.js"></script>
    <script src="user2/js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from fasto.dexignzone.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Jun 2021 08:42:21 GMT -->
</html>