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

                        
                        <li class="<?php if ($filename == 'add-catalog' or $filename == 'update-catalog' or $filename == 'add-category' or $filename == 'update-category' or $filename == 'add-option' or $filename == 'update-option' or $filename == 'add-sub-category' or $filename == 'update-sub-category'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-crosshairs-gps"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="catalog.php">Catalog</a></li>
                                <li><a href="categories.php" class="<?php if ($filename == 'add-category' or $filename == 'update-category'): ?>active<?php endif ?>">Categories</a></li>
                                <li><a href="sub-categories.php" class="<?php if ($filename == 'add-sub-category' or $filename == 'update-sub-category'): ?>active<?php endif ?>">Sub Categories</a></li>
                                <li><a href="options.php" class="<?php if ($filename == 'add-option' or $filename == 'update-option'): ?>active<?php endif ?>">Options</a></li>
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'view-match-sanctioning' or $filename == 'edit-match-sanctioning'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-crosshairs-gps"></i><span class="hide-menu">Inventory</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-match-sanctioning.php">Add</a></li>
                                <li><a href="all-match-sanctioning.php" class="<?php if ($filename == 'view-match-sanctioning' or $filename == 'edit-match-sanctioning'): ?>active<?php endif ?>">View All</a></li>
                                
                            </ul>
                        </li>

                        <li class="<?php if ($filename == 'add-user' or $filename == 'update-user'): ?>
                            active
                        <?php endif ?>"> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-crosshairs-gps"></i><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage-users.php" class="<?php if ($filename == 'add-user' or $filename == 'update-user'): ?>active<?php endif ?>">Manage</a></li>
                                
                            </ul>
                        </li>

                        

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
