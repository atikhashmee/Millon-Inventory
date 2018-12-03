
        
                            <?php
                              include("php/dboperation.php");
                              include("php/functions.php");
                              include("php/dbmodels.php");
                              include("php/privilige_funtionality.php");
                              $db = new Db();
                              $fn = new Functions();
                              $dm = new DbModels();
                              session_start();
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

    /*echo "<pre>";
    print_r($ss);
    echo "</pre>";*/



                              $rbas = new RBAS();
                              $rbas->setUserid($_SESSION['u_id']);
                               /*echo "<pre>";
                               
                               echo $rbas->getdatatest();
                               echo "</pre>";*/
                               $settingsquery = $db->joinQuery("SELECT * FROM `settings` WHERE `adminid`='".$_SESSION['u_id']."'");

                                $setdata = $settingsquery->fetch(PDO::FETCH_ASSOC);
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

        <!-- jquery datepicker -->
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       

         

    <title><?=$setdata['webtitle']?></title>

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>