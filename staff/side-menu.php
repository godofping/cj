<?php $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php'); ?>

<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="assets/images/users/profile.png" alt="user" /> 
                             <!-- this is blinking heartbit-->
                             <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                                             
                        
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                            <h5>Hi, <?php 



                            $db->select('staffs_view','*',NULL,'userId = "' . $_SESSION['userId'] . '"', NULL); 
                            $res = $db->getResult(); $res = $res[0];

                            echo $res['userFirstName'] . " " . $res['userLastName']; ?>!</h5>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENU</li>

                        <li class="<?php if ($filename == 'shopping-cart' or $filename == 'dashboard'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="shopping-cart.php">Shopping Cart</a></li>
                       
                                
                            </ul>
                        </li>


                        <li class="<?php if ($filename == 'orders'  or $filename == 'manage-order'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="orders.php" class="<?php if ($filename == 'orders' or $filename == 'manage-order'): ?>active<?php endif ?>">My Orders</a></li>
                                
                            </ul>
                        </li>

                        

                     

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
