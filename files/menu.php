
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                      
                        <a href="home.php" class="logo">
                            <img src="assets/images/logos/<?=$setdata['logo']?>" alt="" height="22" class="logo-small">
                            <img src="assets/images/logos/<?=$setdata['logo']?>" alt="" height="24" class="logo-large">
                            <?=$setdata['webname']?>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <!-- Search input -->
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input" type="search" placeholder="Search" />
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle"></i>
                                </a>
                            </div>
                        </div>

                        <ul class="list-inline float-right mb-0">
                            <!-- Search -->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link waves-effect toggle-search" href="#"  data-target="#search-wrap">
                                    <i class="mdi mdi-magnify noti-icon"></i>
                                </a>
                            </li>
                            <!-- Messages-->
                           <!--  <li class="list-inline-item dropdown notification-list">
                               <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                  aria-haspopup="false" aria-expanded="false">
                                   <i class="mdi mdi-email-outline noti-icon"></i>
                                   <span class="badge badge-danger noti-icon-badge">3</span>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                   item
                                   <div class="dropdown-item noti-title">
                                       <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                                   </div>
                           
                                   item
                                   <a href="javascript:void(0);" class="dropdown-item notify-item">
                                       <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                       <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                   </a>
                           
                                   item
                                   <a href="javascript:void(0);" class="dropdown-item notify-item">
                                       <div class="notify-icon"><img src="assets/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                       <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                                   </a>
                           
                                   item
                                   <a href="javascript:void(0);" class="dropdown-item notify-item">
                                       <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                       <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                   </a>
                           
                                   All
                                   <a href="javascript:void(0);" class="dropdown-item notify-item">
                                       View All
                                   </a>
                           
                               </div>
                           </li> -->
                            <!-- notification-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-danger noti-icon-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Notification (3)</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        View All
                                    </a>

                                </div>
                            </li>
                            <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    
                               <a class="dropdown-item" href="changepassword.php"><i class="dripicons-user text-muted"></i>Password</a>
                                    
                                    <a class="dropdown-item" href="settings.php"><i class="dripicons-gear text-muted"></i> Settings</a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php"><i class="dripicons-exit text-muted"></i> Logout</a>
                                </div>
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="home.php"><i class="ti-home"></i>Dashboard</a>
                            </li>
                            <li class="has-submenu">
                                <a href="addnew_users.php"><i class="fa fa-user-o"></i>Person</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="ti-light-bulb"></i>Settings</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                         <li><a  href="category.php">Product Category</a></li>
                                         <li><a  href="brand.php">Product Brand</a></li>
                                         <li><a  href="size.php">Product Size</a></li>
                                         <li><a  href="salerykeys.php">Salery keys</a></li>
                                        </ul>
                                    </li> 
                                    <li>
                                        <ul>
                                    <li><a  href="employee-target.php">Employee Target</a></li>
                         <li><a  href="employeesalerymodule.php">Employee Salery</a></li>

                         <li><a  href="privilige-system.php">Privilige System</a></li>
               
          
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                  <li><a  href="accounce_heads.php">Account Category</a></li>
                                  <li><a  href="accounce_charts.php">Account </a></li>
                                  <li><a  href="expensecategory.php">Expense category</a></li>
                                             
          
         
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </li> 
                          <!--   <li class="has-submenu">
                              <a href="#"><i class="ti-light-bulb"></i>User Interface</a>
                              <ul class="submenu megamenu">
                                  <li>
                                      <ul>
                                          <li><a href="ui-buttons.html">Buttons</a></li>
                                          <li><a href="ui-cards.html">Cards</a></li>
                                          <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                          <li><a href="ui-modals.html">Modals</a></li>
                                          <li><a href="ui-images.html">Images</a></li>
                                          <li><a href="ui-alerts.html">Alerts</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <ul>
                                          <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                          <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                          <li><a href="ui-lightbox.html">Lightbox</a></li>
                                          <li><a href="ui-navs.html">Navs</a></li>
                                          <li><a href="ui-pagination.html">Pagination</a></li>
                                          <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <ul>
                                          <li><a href="ui-badge.html">Badge</a></li>
                                          <li><a href="ui-carousel.html">Carousel</a></li>
                                          <li><a href="ui-video.html">Video</a></li>
                                          <li><a href="ui-typography.html">Typography</a></li>
                                          <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                          <li><a href="ui-grid.html">Grid</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li> -->

                            <li class="has-submenu">
                                <a href="#"><i class="ti-crown"></i>Accounce</a>
                                <ul class="submenu">
                          <li><a href="recieve-collection.php">Recieve and collection</a></li>
                          <li><a href="payment-to-supplier.php">Payment</a></li>
                          <li><a href="cash-transfer.php">Cash Transfar</a></li>
                          <li><a href="reconcillation.php">Bank Reconcillation</a></li>
                         <li> <a href="expenditure.php">Expenditure</a></li>
                                    
                                </ul>
                            </li>

                             <li class="has-submenu">
                                <a href="#"><i class="ti-crown"></i>Products</a>
                                <ul class="submenu megamenu">
                                  <li>
                                    <ul>
                                      <li><a  href="product.php">Add new Product</a></li>
                                    
                                    <li><a  href="purchase.php">Product Purchase</a></li>
                                    
                                    <li><a  href="purchase_return.php">Purchase Return</a></li>
                                    
                                    <li><a  href="sellproduct.php">Product Sell</a></li>
                                
                                    <li><a  href="sell_return.php">Sell Return</a></li>
                                    </ul>
                                  </li>
                                    
                                    
                                    <li>
                                      <ul>
                                        <li><a  href="product-view.php">View All product</a></li>
                                        <li><a  href="purchase-history.php">Purchase History</a></li>
                                        <li><a  href="purchase_return_history.php">Purchase Return History</a></li>
                                      
                                      <li><a  href="product-sale-history.php">Product sale history</a></li>
                                      <li><a  href="sell_return_history.php">Sell Return History</a></li>
                                      
                                      
                                    </ul>
                                  </li>
                                </ul>
                            </li> 
                            <li class="has-submenu">
                                <a href="#"><i class="ti-light-bulb"></i>Report</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                            <li><a  href="bankstatement.php">Bank Statement</a></li>
                             <li><a  href="stock-report.php">Stock Report</a></li>
                            <li><a  href="customer-wise-report.php">Customerwise product Report</a></li>
                            <li><a  href="customer-wise-payment-report.php">Customer Payment Report</a></li>
          
          
          
          
                                        </ul>
                                    </li> 
                                    <li>
                                        <ul>
                                            <li><a  href="supplier-product-report.php">Supplierwise Product Report </a></li>
                                            <li><a  href="supplier-payment-report.php">Supplierwise Payment Report </a></li>
                                     
          

               
          
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
               <li><a  href="employee_target_report.php"> Employee Target Report</a></li>
               <li><a  href="labour_payment_statement.php"> See the labour payment</a></li>
               <li><a  href="employee_salery_report.php"> Salery Report</a></li>
           
          
          
                                             
          
         
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </li> 
                            
                            <!-- <li class="has-submenu">
                                <a href="#"><i class="ti-crown"></i>Advanced UI</a>
                                <ul class="submenu">
                                    <li><a href="advanced-animation.html">Animation</a></li>
                                    <li><a href="advanced-highlight.html">Highlight</a></li>
                                    <li><a href="advanced-rating.html">Rating</a></li>
                                    <li><a href="advanced-nestable.html">Nestable</a></li>
                                    <li><a href="advanced-alertify.html">Alertify</a></li>
                                    <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                                    <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                                </ul>
                            </li> -->

                            

                           <!--  <li class="has-submenu">
                               <a href="#"><i class="ti-bookmark-alt"></i>Components</a>
                               <ul class="submenu">
                                   <li class="has-submenu">
                                       <a href="#">Forms</a>
                                       <ul class="submenu">
                                           <li><a href="form-elements.html">Form Elements</a></li>
                                           <li><a href="form-validation.html">Form Validation</a></li>
                                           <li><a href="form-advanced.html">Form Advanced</a></li>
                                           <li><a href="form-editors.html">Form Editors</a></li>
                                           <li><a href="form-uploads.html">Form File Upload</a></li>
                                           <li><a href="form-mask.html">Form Mask</a></li>
                                           <li><a href="form-summernote.html">Summernote</a></li>
                                           <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                       </ul>
                                   </li>
                                   <li class="has-submenu">
                                       <a href="#">Icons</a>
                                       <ul class="submenu">
                                           <li><a href="icons-material.html">Material Design</a></li>
                                           <li><a href="icons-ion.html">Ion Icons</a></li>
                                           <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                           <li><a href="icons-themify.html">Themify Icons</a></li>
                                           <li><a href="icons-dripicons.html">Dripicons</a></li>
                                           <li><a href="icons-typicons.html">Typicons Icons</a></li>
                                       </ul>
                                   </li>
                                   <li>
                                       <a href="calendar.html">Calendar</a>
                                   </li>
                                   <li class="has-submenu">
                                       <a href="#">Charts</a>
                                       <ul class="submenu">
                                           <li><a href="charts-morris.html">Morris Chart</a></li>
                                           <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                           <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                           <li><a href="charts-flot.html">Flot Chart</a></li>
                                           <li><a href="charts-c3.html">C3 Chart</a></li>
                                           <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                                       </ul>
                                   </li>
                                   <li class="has-submenu">
                                       <a href="#">Tables </a>
                                       <ul class="submenu">
                                           <li><a href="tables-basic.html">Basic Tables</a></li>
                                           <li><a href="tables-datatable.html">Data Table</a></li>
                                           <li><a href="tables-responsive.html">Responsive Table</a></li>
                                           <li><a href="tables-editable.html">Editable Table</a></li>
                                       </ul>
                                   </li>
                                   <li class="has-submenu">
                                       <a href="#">Maps</a>
                                       <ul class="submenu">
                                           <li><a href="maps-google.html"> Google Map</a></li>
                                           <li><a href="maps-vector.html"> Vector Map</a></li>
                                       </ul>
                                   </li>
                               </ul>
                           </li> -->

                          <!--   <li class="has-submenu">
                              <a href="#"><i class="ti-files"></i>Pages</a>
                              <ul class="submenu megamenu">
                                  <li>
                                      <ul>
                                          <li><a href="pages-timeline.html">Timeline</a></li>
                                          <li><a href="pages-invoice.html">Invoice</a></li>
                                          <li><a href="pages-directory.html">Directory</a></li>
                                          <li><a href="pages-login.html">Login</a></li>
                                          <li><a href="pages-register.html">Register</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <ul>
                                          <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                          <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                          <li><a href="pages-blank.html">Blank Page</a></li>
                                          <li><a href="pages-404.html">Error 404</a></li>
                                          <li><a href="pages-500.html">Error 500</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li> -->

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper"> <!-- it holds the inner contents -->
