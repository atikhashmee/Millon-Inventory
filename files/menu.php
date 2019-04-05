<style>
  .app-notify-style{
      transform: translate3d(-181px, 58px, 0px) !important;
      width: 400px;
}
.app-style-list{
  border: none;
    box-shadow: -1px 2px 3px 7px #ddd;
}
.app-card-body{
  padding: 10px 5px;
}
</style>


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
               <li class="list-inline-item dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                     aria-haspopup="false" aria-expanded="false">
                  <i class="mdi mdi-bell-outline noti-icon"></i>
                  <span class="badge badge-danger noti-icon-badge" id="cnt">0</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg app-notify-style" id="notify">
                     <!-- item-->
                     
                     <!-- item-->
                     <!-- <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                     </a>
                     item
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                     </a>
                     item
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                     </a> -->
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
                     <?php 
                        if ($_SESSION['role'] == 0) 
                        {
                           ?>
                     <a class="dropdown-item" href="settings.php"><i class="dripicons-gear text-muted"></i> Settings</a>
                     <a  class="dropdown-item"  href="privilige-system.php">Privilige System</a>
                     <a class="dropdown-item" href="access_privilige.php"><i class="dripicons-gear text-muted"></i> Access Privilige</a>
                     <?php
                        }
                        
                        ?>
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
      </div>
      <!-- end container -->
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
               <style>
                  .displaymenu{
                  display: none;
                  }
               </style>
               <li class="has-submenu">
                  <a href="#">Registration</a>
                  <ul class="submenu">
                     <li class="<?=(!$mp->getUsers())?"displaymenu":""?>"><a href="addnew_users.php">Person</a></li>
                     <li class="<?=(!$mp->getAccountname())?"displaymenu":""?>" ><a href="accounce_charts.php">Account </a></li>
                  </ul>
               </li>
               <li class="has-submenu">
                  <a href="#">Accounce</a>
                  <ul class="submenu">
            <li class="<?=(!$mp->getRecievecollection())?"displaymenu":""?>">
                  <a href="recieve-collection.php">Recieve and collection</a>
            </li>
            <li class="<?=(!$mp->getPaymenttosupplier())?"displaymenu":""?>">
              <a href="payment-to-supplier.php">Payment</a>
            </li>
            <li class="<?=(!$mp->getCashtransfer())?"displaymenu":""?>">
              <a href="cash-transfer.php">Cash Transfar</a>
            </li>
            <li class="<?=(!$mp->getReconcilation())?"displaymenu":""?>">
              <a href="reconcillation.php">Bank Reconcillation</a>
            </li>
            <li class="<?=(!$mp->getExpense())?"displaymenu":""?>"><a href="expenditure.php">Expenditure</a>
            </li>
                  </ul>
               </li>
               <li class="has-submenu">
                  <a href="#">Products</a>
                  <ul class="submenu megamenu">
                     <li>
                        <ul>
                     <li class="<?=(!$mp->getProducts())?"displaymenu":""?>">
                      <a  href="product.php">Add new Product</a>
                    </li>
                    <li class="<?=(!$mp->getPurchase())?"displaymenu":""?>">
                      <a  href="purchase.php">Product Purchase</a>
                    </li>
                <li class="<?=(!$mp->getPurchaseReturn())?"displaymenu":""?>">
                      <a  href="purchase_return.php">Purchase Return</a>
                </li>
                <li class="<?=(!$mp->getSale())?"displaymenu":""?>">
                  <a  href="sellproduct.php">Product Sell</a>
                </li>
                <li class="<?=(!$mp->getSaleReturn())?"displaymenu":""?>">
                  <a  href="sell_return.php">Sell Return</a>
                </li>
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
                  <a href="#">Report</a>
                  <ul class="submenu megamenu">
                     <li>
                        <ul>
                     <li> <a  href="cash-report-history.php">Cash History</a></li>
                           <li> <a  href="bankstatement.php">Banks Accoutns History</a></li>
                           <li> <a  href="stock-report.php">Stock Report</a></li>
                           
                           <li> <a  href="customer-history.php">Customer History</a></li>
                        </ul>
                     </li>
                     <li>
                        <ul>
                           <li><a  href="supplier-product-report.php">Supplierwise Product Report </a></li>
                           <li>
                          <a  href="supplier-history-1.php">Supplier History </a>
                          </li>
                          <li>
                          <a  href="employee_wise_customer_report.php">Employee wise customer report </a>
                          </li>
                        </ul>
                     </li>
                     <li>
                        <ul>
                           <li>
                            <a  href="check-history.php">Cheque History</a>
                          </li>
                            <li><a  href="employee_target_report.php">Target Report</a></li>
                           <li><a  href="labour_payment_statement.php"> See the labour payment</a></li>
                           <li><a  href="employee_report.php">Employee Report</a></li>
                           <li><a href="gross-profit.php">Gross Profit</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
               <li class="has-submenu">
                  <a href="#">More <i class="fa fa-angle-down"></i></a>
                  <ul class="submenu megamenu">
                     <li>
                        <ul>
           <li class="<?=(!$mp->getProductcategory())?"displaymenu":""?>" >
            <a  href="category.php">Product Category</a>
           </li>
           <li class="<?=(!$mp->getBrand())?"displaymenu":""?>">
            <a  href="brand.php">Product Brand</a>
          </li>
          <li class="<?=(!$mp->getSize())?"displaymenu":""?>">
            <a  href="size.php">Product Size</a>
          </li>
          <li class="<?=(!$mp->getSaleryKeys())?"displaymenu":""?>">
            <a  href="salerykeys.php">Salery keys</a>
          </li>
         <li class="<?=(!$mp->getEmployeetarget())?"displaymenu":""?>">
          <a  href="employee-target.php">Employee Target</a>
        </li>
        <li class="<?=(!$mp->getEmployeesalry())?"displaymenu":""?>">
          <a  href="employeesalerymodule.php">Employee Salery</a>
        </li>
        <li class="<?=(!$mp->getEmployeetype())?"displaymenu":""?>">
          <a  href="employee-type.php">Employee Type</a>
        </li>
        <li class="<?=(!$mp->getExpensecategory())?"displaymenu":""?>">
          <a  href="expensecategory.php">Expense category</a>
        </li>
                           <!-- <li><a  href="accounce_heads.php">Account Category</a></li> -->
                        </ul>
                     </li>
                  </ul>
               </li>
            </ul>
            <!-- End navigation menu -->
         </div>
         <!-- end #navigation -->
      </div>
      <!-- end container -->
   </div>
   <!-- end navbar-custom -->
</header>
<!-- End Navigation Bar-->
<div class="wrapper">
<!-- it holds the inner contents -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $.ajax({
    url: 'ajax/notifications.php'
  })
  .done(function(res) {
    //console.log(res);
    var data =  JSON.parse(res);
    var text = '<div class="card"><div class="card-header">Notification</div><div class="card-body app-card-body" style="height:300px; overflow: auto;">';
    for (var i = 0; i <data.length; i++) {
      text += '<a href="purchase.php"  class="list-group-item app-style-list"><b>Product Stock is out</b><small> Product = '+data[i].productsid+' Quantity = '+data[i].proquantity+'</small></a>';
     
    } 
    text += "</div><div class='card-footer'>See ALL</div></div>";
    $("#notify").html(text);
    $("#cnt").text(data.length);
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
</script>