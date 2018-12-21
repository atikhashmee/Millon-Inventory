
        
                            <?php
                              include("php/dboperation.php");
                              include("php/functions.php");
                              include("php/dbmodels.php");
                              include("php/privilige_funtionality.php");
                              include("php/basic_calculation.php");

                              include("php/menu_privilige.php");
                              $db = new Db();
                              $fn = new Functions();
                              $dm = new DbModels();
                              
                              session_start();

                              /* little work with session*/

                            if (!isset($_SESSION['u_id'])) 
                            {
                               ?>
                               <script>
                                 window.location.href='logout.php?msg=Please do login again';
                               </script>
                               <?php
                            }
                            else 
                            {
                               $now = time();
                               if ($now > $_SESSION['expire']) 
                               {
                                   session_destroy();
                                   ?>
                                   <script>
                                     window.location.href='logout.php?msg=session has expired login again';
                                   </script>
                                   <?php
                               }
                            }

                              
/*  defined data heads for the role base access system  */



     $datahead = [    

      "Products",
      "Purchase",
      "Purchase Return",
      "Sale",
      "Sale Return",
      "Category",
      "Brand"
  ];
  $subdata = [
        "Create",
        "View",
        "Update",
        "Delete"
  ];


    $str  = file_get_contents("json/privilige.json");
    $ss = json_decode($str,true);

    /*class that controlling menu acess privilige*/
    $mp = new MPS($_SESSION['role']);  

   /* echo "<pre>";
    print_r($ss);
    echo "</pre>";*/



                              $rbas = new RBAS();
                              $rbas->setUserid($_SESSION['u_id']);
                               /*echo "<pre>";
                               
                               echo $rbas->getdatatest();
                               echo "</pre>";*/
                               $settingsquery = $db->joinQuery("SELECT * FROM `settings` WHERE `adminid`='".$_SESSION['u_id']."'");
                               $setdata = $settingsquery->fetch(PDO::FETCH_ASSOC);

                               /*
                                  Select the users to find out there due and credits
                               */
             $users =  $db->selectAll("users")->fetchAll();
             $customersb = [];
             $suppliersb = [];
             foreach ($users as $ur) {
                 if ($ur['user_role'] == '1') {
                    $customersb[$ur['u_id']] = $fn->getCustomerPurchasedAmount($ur['u_id']) - $fn->getCustomerPayments($ur['u_id']);
                 }
                  if ($ur['user_role'] == '2') {
                    $suppliersb[$ur['u_id']] = $fn->getSupllierdueby($ur['u_id']) - $fn->getSupplierPayment($ur['u_id']);
                 }
             }

             /*echo "<pre>";
             print_r($customersb);
             print_r($suppliersb);
             echo "</pre>";*/


             /*   product stock finding */

             $pro = $db->selectAll('product_info')->fetchAll();
             $prod = [];
             foreach ($pro as $p) 
             {
                 $prod[$p['pro_id']] = $fn->getStockByProId($p['pro_id']);
             }
        ?>


<!DOCTYPE html>
<html>
    
<!-- Mirrored from themesdesign.in/upcube/layouts/horizontal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Nov 2018 15:46:22 GMT -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- alertify plugin -->
        <link href="assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">

        <!-- search select -->
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

        <!-- jquery datepicker -->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       

         

    <title><?=$setdata['webtitle']?></title>

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>