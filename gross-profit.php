<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';




/*by product i have total asset calculation */

 

/*fetching all the product */

    $pros  =  $db->selectAll('product_info')->fetchAll();
    $sum  = 0;
    foreach ($pros as $pro) 
    {
      $sum += getPurchaseById($pro['pro_id']);
      $sum -= getSellById($pro['pro_id']);
        
    }



     function getPurchaseById($proid)
    {
        $sum = 0;
        $onlybilchallan =  $GLOBALS['db']->joinQuery("SELECT DISTINCT `billchallan` FROM `purchase` WHERE `productid`='{$proid}'")->fetchAll();
        foreach ($onlybilchallan as $bil) 
        {
            
           $sum +=  pur($bil['billchallan'],$proid);
           $sum -=  purReturn($bil['billchallan'],$proid);
        }
        return $sum;

    } 

     function getSellById($proid)
    {
        $sum =0;
        $onlybilchallan =  $GLOBALS['db']->joinQuery("SELECT DISTINCT `billchallan` FROM `sell` WHERE `productid`='{$proid}'")->fetchAll();
        foreach ($onlybilchallan as $bil) 
        {
            
           $sum += sell($bil['billchallan'],$proid);
           $sum -= sellReturn($bil['billchallan'],$proid);

        }
        return $sum;

    }

     function pur($invoi,$proid)
    {
      $pur = $GLOBALS['db']->joinQuery("SELECT * FROM `purchase` WHERE `billchallan`='{$invoi}' AND `productid`='{$proid}'")->fetch(PDO::FETCH_ASSOC);
      return  ((int)$pur['quantity'] * (int)$pur['price']);
    }

     function purReturn($invoi,$proid)
    {
      $sum = 0;
      $pur = $GLOBALS['db']->joinQuery("SELECT * FROM `purchase_return` WHERE `memono`='{$invoi}' AND `productid`='{$proid}'");
       if ($pur->rowCount()>0) 
      {
        $data = $pur->fetchAll();

         foreach ($data as $dbi) 
         {
             $sum += (int)$dbi['quntity'] * (int)$dbi['price'];
         }
      }
      return  $sum;
    }

     function sell($invoi,$proid)
    {
      $pur = $GLOBALS['db']->joinQuery("SELECT * FROM `sell` WHERE `billchallan`='{$invoi}' AND `productid`='{$proid}'")->fetch(PDO::FETCH_ASSOC);
      return  ((int)$pur['quantity'] * (int)$pur['price']);
    }
     function sellReturn($invoi,$proid)
    {
      $sum =0;
      $pur = $GLOBALS['db']->joinQuery("SELECT * FROM `sell_return` WHERE `memono`='{$invoi}' AND `productid`='{$proid}'");
      if ($pur->rowCount()>0) 
      {
        $data = $pur->fetchAll();

         foreach ($data as $dbi) 
         {
             $sum += (int)$dbi['quntity'] * (int)$dbi['price'];
         }
      }
      return $sum;
    }

    /* end of product calculations  */


    /*supplier payment report starts */
    $users = $db->selectAll("users","user_role='2'")->fetchAll();
    $allsupplierpt = 0;
    foreach ($users as $user) 
    {
        $allsupplierpt += $fn->getSupplierPayment($user['u_id']);
    }
    /*end of supplier payment*/

      /*start of customer reveneu*/
      $userscus = $db->selectAll("users","user_role='1'")->fetchAll();
      $customersum = 0;
      foreach ($userscus as $customer) 
      {
         $customersum+= $fn->getCustomerPayments($customer['u_id']);
      }

      /*end  of customer reveneu*/


    /*start of total counting expenses*/
    $expenses = $db->selectAll("expenditure")->fetchAll();
    $expensesum = 0;
    foreach ($expenses as $expense) 
    {
      $expensesum +=  $expense['amount'];
    }
    /* end of supplier payment */


 ?>
<div class="container">

  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Gross Profit Report</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Gross Profit Report</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

     <div class="row">
       <div class="col">
            <div class="card card-body">
              <div class="row">
                <div class="col">
                  <h4>Company Assets</h4>
                  <p><strong>Cash : <?php echo number_format($fn->cashAmount()); ?> </strong></p>
                  <p><strong>By Products : <?=$sum?> </strong></p>
                  <p><strong>By Bank Accounts :  </strong></p>
                </div>
                <div class="col">
                  <h4>Liability</h4>
                  <p><strong>Supplier Payment :</strong> <?=$allsupplierpt?></p>
                  <p><strong>Bank Loan :</strong> </p>
                </div>
                <div class="col">
                  <h4>Expense</h4>
                   <p><strong>Total Expenses:</strong> <?=$expensesum?> </p>
                </div>
                <div class="col">
                  <h4>revenue</h4>
                  <p><strong>From Customer:</strong> <?=$customersum?> </p>
                </div>
              </div>
              
            </div>
       </div>

     </div>




</div>
<?php include 'files/footer.php'; ?>
