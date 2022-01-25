<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php" ><i class="fa fa-fw fa-home"></i>Dashboard </a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?uin=<?php echo $_SESSION['uin'];?>" ><i class="fa fa-fw fa-user-circle"></i>Profile</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-credit-card"></i>Deposit</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="fund_wallet.php">Fund Wallet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="deposit_history.php">Deposit history</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ads.php" ><i class="fa fa-fw fa-fire"></i>Daily Ads</a>
                                
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-chart-bar"></i>Upgrade Account</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="invest.php">Ugrade</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="investment_history.php">Upgrade History</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fa fa-usd"></i>Withdraws</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="withdraw.php">withdraw</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ref_withdraw.php">Referral Earnings Withdraw</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="withdraw_history.php">withdraw History</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="downlines.php" ><i class="fa fa-fw fa-user-circle"></i>Downlines</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php" ><i class="fa fa-fw fa-info"></i>Logout</a>
                                
                            </li>
                            
                            
                            
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>