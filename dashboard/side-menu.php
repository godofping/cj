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
                            <h5>Hi, <?php echo $_SESSION['administratorfullName']; ?>!</h5>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENU</li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                       
                                
                            </ul>
                        </li>

                        
                        <li class="<?php if ($filename == 'add-product' or $filename == 'update-product' or $filename == 'add-category' or $filename == 'update-category' or $filename == 'add-sub-category' or $filename == 'update-sub-category' or $filename == 'manage-product' or $filename == 'add-option-group' or $filename == 'update-option-group' or $filename == 'option-group' or $filename == 'reviews'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-basket"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="catalog.php" class="<?php if ($filename == 'add-product' or $filename == 'update-product' or $filename == 'manage-product'): ?>active<?php endif ?>">Catalog</a></li>
                                <li><a href="categories.php" class="<?php if ($filename == 'add-category' or $filename == 'update-category'): ?>active<?php endif ?>">Categories</a></li>
                                <li><a href="sub-categories.php" class="<?php if ($filename == 'add-sub-category' or $filename == 'update-sub-category'): ?>active<?php endif ?>">Sub Categories</a></li>
                                <li><a href="reviews.php" class="<?php if ($filename == 'add-sub-category' or $filename == 'update-sub-category'): ?>active<?php endif ?>">Reviews</a></li>

                       
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'orders' or $filename == 'manage-order'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="orders.php" class="<?php if ($filename == 'orders' or $filename == 'manage-order'): ?>active<?php endif ?>">All Orders</a></li>
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'inventory' or $filename == 'manage-stocks'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-format-list-bulleted"></i><span class="hide-menu">Inventory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="inventory.php" class="<?php if ($filename == 'inventory' or $filename == 'manage-stocks'): ?>active<?php endif ?>">View all</a></li>
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'feedbacks'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Customers</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="customers.php" class="<?php if ($filename == 'add-user' or $filename == 'update-user'): ?>active<?php endif ?>">View All</a></li>
                                <li><a href="feedbacks.php" class="<?php if ($filename == 'feedbacks'): ?>active<?php endif ?>">Feedbacks</a></li>
                    
                                
                            </ul>
                        </li>


                        <li class="<?php if ($filename == 'add-staff' or $filename == 'update-staff'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Staffs</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-staffs.php" class="<?php if ($filename == 'add-staff' or $filename == 'update-staff'): ?>active<?php endif ?>">Manage</a></li>
                                
                            </ul>
                        </li>


                        <li class="<?php if ($filename == 'list-of-customers' or $filename == 'list-of-orders-daily' or $filename == 'list-of-cancelled-orders' or $filename == 'list-of-collections' or $filename == 'list-of-pending-customer-payments' or $filename == 'list-of-overdue' or $filename == 'list-of-available-stocks' or $filename == 'list-of-reoder-point' or $filename == 'list-of-stock-in' or $filename == 'list-of-stock-out' or $filename == 'list-of-acknowledgement-receipt' or $filename == 'list-of-reviews' or $filename == 'list-of-feedbacks'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-note-text"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="list-of-customers.php" class="<?php if ($filename == 'list-of-customers'): ?>active<?php endif ?>">List of Customers</a></li>
                                <li class="<?php if ($filename == 'list-of-collections' and ($_GET['period'] == 'Daily' or $_GET['period'] == 'Weekly' or $_GET['period'] == 'Monthly')): ?>active<?php endif ?>"> <a class="<?php if ($filename == 'list-of-collections'): ?>active<?php endif ?> has-arrow" href="#" aria-expanded="false">List of Collections</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a class="<?php if ($filename == 'list-of-collections' and $_GET['period'] == 'Daily'): ?>active<?php endif ?>" href="list-of-collections.php?period=Daily&date=<?php echo date('Y-m-d') ?>">Daily</a></li>
                                        <li><a class="<?php if ($filename == 'list-of-collections' and $_GET['period'] == 'Weekly'): ?>active<?php endif ?>" href="list-of-collections.php?period=Weekly&date=<?php echo date('Y-') . "W" . date('W'); ?>">Weekly</a></li>
                                        <li><a class="<?php if ($filename == 'list-of-collections' and $_GET['period'] == 'Monthly'): ?>active<?php endif ?>" href="list-of-collections.php?period=Monthly&date=<?php echo date('Y-m'); ?>">Monthly</a></li>
                                    </ul>
                                </li>
                                <li><a href="list-of-orders-daily.php?date=<?php echo date('Y-m-d') ?>" class="<?php if ($filename == 'list-of-orders-daily'): ?>active<?php endif ?>">List of Orders (Daily)</a></li>
                                <li><a href="list-of-cancelled-orders.php" class="<?php if ($filename == 'list-of-cancelled-orders'): ?>active<?php endif ?>">List of Cancelled Orders</a></li>
                                <li><a href="list-of-overdue.php" class="<?php if ($filename == 'list-of-overdue'): ?>active<?php endif ?>">List of Overdue</a></li>
                                <li><a href="list-of-pending-customer-payments.php" class="<?php if ($filename == 'list-of-pending-customer-payments'): ?>active<?php endif ?>">List of Customer Pending Payments</a></li>
                                <li><a href="list-of-available-stocks.php" class="<?php if ($filename == 'list-of-available-stocks'): ?>active<?php endif ?>">List of Available Stocks</a></li>
                                <li><a href="list-of-reorder-point.php" class="<?php if ($filename == 'list-of-reoder-point'): ?>active<?php endif ?>">List of Reorder Point</a></li>
                                <li><a href="list-of-stock-in.php" class="<?php if ($filename == 'list-of-stock-in'): ?>active<?php endif ?>">List of Stock-in</a></li>
                                <li><a href="list-of-stock-out.php" class="<?php if ($filename == 'list-of-stock-out'): ?>active<?php endif ?>">List of Stock-out</a></li>
                                <!-- <li><a href="list-of-acknowledgement-receipt.php" class="<?php if ($filename == 'list-of-acknowledgement-receipt'): ?>active<?php endif ?>">List of Acknowledgement Receipt</a></li> -->
                                <li><a href="list-of-reviews.php" class="<?php if ($filename == 'list-of-reviews'): ?>active<?php endif ?>">List of Reviews</a></li>
                                <li><a href="list-of-feedbacks.php" class="<?php if ($filename == 'list-of-feedbacks'): ?>active<?php endif ?>">List of Feedbacks</a></li>
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'backup' or $filename == 'restore'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Back up and Restore</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="backup.php" class="<?php if ($filename == 'backup'): ?>active<?php endif ?>">Back up</a></li>
                                <li><a href="restore.php" class="<?php if ($filename == 'restore'): ?>active<?php endif ?>">Restore</a></li>
                                
                            </ul>
                        </li>

                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
