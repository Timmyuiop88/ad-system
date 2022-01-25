<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="images/faces/face5.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                <?php echo $_SESSION['first_name_a']." ".$_SESSION['last_name_a'];?>
                </p>
                <p class="designation">
                <?php echo $_SESSION['Account_type_a']?>
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pending_deposit.php">
              <i class="fa fa-wallet  menu-icon"></i>
              <span class="menu-title">Pending Deposit Requests</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="deposits.php">
              <i class="fa fa-money-bill-wave menu-icon"></i>
              <span class="menu-title">Deposits</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pending_withdraw.php">
              <i class="fa fa-money-bill-wave menu-icon"></i>
              <span class="menu-title">Pending Withdraw Requests</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="pending_withdraw_man.php">
              <i class="fa fa-money-bill-wave menu-icon"></i>
              <span class="menu-title"> (Manual-Approve) Pending Withdraw Request </span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ads.php">
              <i class="fa fa-fire menu-icon"></i>
              <span class="menu-title">Ads</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="withdraws.php">
              <i class="fa fa-money-bill-wave menu-icon"></i>
              <span class="menu-title">Withdraws</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="plans.php" >
              <i class="fa fa-money-check-alt menu-icon"></i>
              <span class="menu-title">Plans</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="payments.php">
              <i class="fa fa-money-bill-wave menu-icon"></i>
              <span class="menu-title">Payment Methods</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="history.php">
              <i class="fa fa-align-justify menu-icon"></i>
              <span class="menu-title">History</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="topup.php">
              <i class="fa fa-align-justify menu-icon"></i>
              <span class="menu-title">Top-Up User</span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="newsletter.php">
              <i class="fa fa-align-justify menu-icon"></i>
              <span class="menu-title">News Letter </span>
              
            </a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="site_settings.php">
              <i class="fa fa-cog menu-icon"></i>
              <span class="menu-title">Site Settings</span>
              
            </a>
            
          </li>
          
          
          
          
          
          
          
        
          
        
         
          
         
         
          
          
        </ul>
      </nav>