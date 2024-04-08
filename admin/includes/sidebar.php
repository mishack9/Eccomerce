<div id="layoutSidenav_nav">
    <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($page = ($_SERVER['SCRIPT_NAME']), "/" )+1)  ?>
                <nav class="sb-sidenav accordion sb-sidenav-dark text-info bg-secondary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link <?php echo $page == 'index.php' ? 'active' : ''  ?>" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed <?php echo $page == 'users.php' ||   $page == 'order.php' || $page == 'view_order.php' || $page == 'all_order.php'  ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsusers" aria-expanded="false" aria-controls="collapseLayoutsusers">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                USERS
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php echo $page == 'users.php' ||  $page == 'order.php' || $page == 'view_order.php' || $page == 'all_order.php' ? 'show' : '' ?>" id="collapseLayoutsusers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link <?php echo $page == 'users.php' ? 'active' : ''  ?>" href="users.php">Manage_Users</a>
                                    <a class="nav-link <?php echo $page == 'order.php' ? 'active' : ''  ?>" href="order.php">Manage_Orders</a>
                                    <a class="nav-link <?php echo $page == 'all_order.php' ? 'active' : ''  ?>" href="all_order.php">Manage_All_Orders</a>
                                    
                                </nav>
                            </div>

                            <a class="nav-link collapsed <?php echo  $page == 'manage_catergory.php' || $page == 'visible_catergory.php' || $page == 'hidden_catergory.php' ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                CATERGORIES
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse <?php echo  $page == 'manage_catergory.php' || $page == 'visible_catergory.php' || $page == 'hidden_catergory.php' ? 'show' : '' ?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link <?php echo $page == 'manage_catergory.php' ? 'active' : ''  ?>" href="manage_catergory.php">Manage_Catergories</a>
                                    <a class="nav-link <?php echo $page == 'visible_catergory.php' ? 'active' : ''  ?>" href="visible_catergory.php">View_Visible Catergories</a>
                                    <a class="nav-link <?php echo $page == 'hidden_catergory.php' ? 'active' : ''  ?>" href="hidden_catergory.php">View_Hidden Catergories</a>
                                </nav>
                            </div>

                               <a class="nav-link collapsed <?php echo  $page == 'manage_product.php'  ? 'active' : '' ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsproduct" aria-expanded="false" aria-controls="collapseLayoutsproduct">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                PRODUCTS
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse  <?php echo $page == 'manage_product.php' ? 'show' : ''  ?>" id="collapseLayoutsproduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link  <?php echo $page == 'manage_product.php' ? 'active' : ''  ?>" href="manage_product.php">Manage_Products</a>
                                </nav>
                            </div>
                     
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <?php
                       if(isset($_SESSION['auth'])):
                        ?>
                        <div class="small">Logged in as:</div>
                         <?php echo $_SESSION['email'];  ?>
                    </div>
                    <?php endif; ?>
                </nav>
            </div>