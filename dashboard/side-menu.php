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
                            <h5>Hi, <?php echo $_SESSION['userName']; ?>!</h5>
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

                        
                        <li class="<?php if ($filename == 'add-product' or $filename == 'update-product' or $filename == 'add-category' or $filename == 'update-category' or $filename == 'add-sub-category' or $filename == 'update-sub-category' or $filename == 'manage-product' or $filename == 'add-option-group' or $filename == 'update-option-group' or $filename == 'option-group'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-basket"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="catalog.php" class="<?php if ($filename == 'add-product' or $filename == 'update-product' or $filename == 'manage-product'): ?>active<?php endif ?>">Catalog</a></li>
                                <li><a href="categories.php" class="<?php if ($filename == 'add-category' or $filename == 'update-category'): ?>active<?php endif ?>">Categories</a></li>
                                <li><a href="sub-categories.php" class="<?php if ($filename == 'add-sub-category' or $filename == 'update-sub-category'): ?>active<?php endif ?>">Sub Categories</a></li>

                       
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'orders'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="orders.php" class="<?php if ($filename == 'orders' or $filename == 'edit-match-sanctioning'): ?>active<?php endif ?>">View All</a></li>
                                
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


                        <li class="<?php if ($filename == 'add-user' or $filename == 'update-user'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-users.php" class="<?php if ($filename == 'add-user' or $filename == 'update-user'): ?>active<?php endif ?>">Manage</a></li>
                                
                            </ul>
                        </li>


                        <li class="<?php if ($filename == 'list-of-customers' or $filename == 'feedbacks'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-note-text"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="list-of-customers.php" class="<?php if ($filename == 'list-of-customers'): ?>active<?php endif ?>">List of Customers</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Collection</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Orders</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Cancelled Orders</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Over Due</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Customer Pending Payments</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Available Stocks</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Re-order Point</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Stock-in</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Stock-out</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">List of Acknowledgement Reciept</a></li>
                                <li><a href="#.php" class="<?php if ($filename == 's'): ?>active<?php endif ?>">Reviews</a></li>
                                <li><a href="feedbacks.php" class="<?php if ($filename == 'feedbacks'): ?>active<?php endif ?>">Feedbacks</a></li>
                                
                            </ul>
                        </li>

                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
