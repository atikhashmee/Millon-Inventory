                                    <?php include 'files/header.php'; ?>
                                    <?php include 'files/menu.php';

                                    ?>
                                    <div class="container">
                                        <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Labor Payment History</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Labor Payment History</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                                  

                                        <div class="row">
                                        <div class="col">
                                            <div class="card card-body">
                                            <form action="" method="POST">
                                                <div class="row">
                                                <div class="col"><input type="text" class="form-control mydate" name="start"></div>
                                                <div class="col"><input type="text" class="form-control mydate" name="to"></div>
                                                <div class="col"><input type="submit" value="Search" name="filter" class="btn btn-outline-primary"></div>
                                                </div>
                                                <small>(This table shows only todays data by default, if you want to see the previous data you have to select a date from the date box)</small>
                                            </form>
                                            </div>
                                        </div>

                                        </div>



                                    <div class="row" style="margin-top: 22px;">
                                    <!-- users view section starts here -->
                                    <div class="col">
                                    <?php 
                                    
                  $sql =  "SELECT  `expendituredate`, `amount`,`token` FROM `expenditure` WHERE SUBSTRING(`token`,1,5)='stuff' AND `expendituredate` = CURDATE()
          UNION 
          SELECT `purchasedate`, (`weight`+`transport`) as laboramount, `token` FROM `purchase` where  `purchasedate` = CURDATE()
          UNION
          SELECT `selldate`,(`weight` + `transport`) as khoroc, `token` FROM `sell` where  `selldate` = CURDATE()
          UNION
          SELECT `return_date`, (`weight`+`transport`) as rettotal,`token` FROM `purchase_return` where `return_date` =CURDATE()
          UNION
          SELECT `return_date`, (`weight`+ `transport`) as retotal,`token` FROM `sell_return` where `return_date` = CURDATE()";

                                            
                                            if (isset($_POST['filter'])) {

                                                //search by only name
                                                if (!empty($_POST['start']) &&  !empty($_POST['to'])) {
                                    $sql ="SELECT  `expendituredate`, `amount`,`token` FROM `expenditure` WHERE SUBSTRING(`token`,1,5)='stuff' AND `expendituredate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' 
                                    UNION 
                                    SELECT `purchasedate`, (`weight`+`transport`) as laboramount , `token` FROM `purchase` where `purchasedate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                                    UNION
                                    SELECT `selldate`,(`weight` + `transport`) as khoroc, `token` FROM `sell`  where  `selldate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                                    UNION
                                    SELECT `return_date`, (`weight`+`transport`) as rettotal,`token` FROM `purchase_return` where `return_date` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                                    UNION
                                    SELECT `return_date`, (`weight`+ `transport`) as retotal,`token` FROM `sell_return` where `return_date` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                                                }


                                                
                                            
                                            
                                                
                                                
                                            }
                                            
                                            
                                            //echo $sql;
                                            $data = $db->joinQuery($sql)->fetchAll();

                                            
                                            ?>

                                    
                                        <div class="card card-body">
                                        <table class="table table-hover table-striped table-bordered" id="datatable" >
                                            <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php 
                                                $i=0;
                                                $sum = 0;
                                                    foreach ($data as $val) {  $i++;
                                if  (substr( $val['token'], 0,5) == 'stuff') {
                                    $sum  += (int)$val['amount'];
                                }else if($val['token'] == 's'){
                                     $sum  += (int)$val['amount'];
                                }else if($val['token'] == 'sr'){
                                    $sum  -= (int)$val['amount'];
                                }else if($val['token'] == 'p'){
                                     $sum  += (int)$val['amount'];
                                }else if($val['token'] == 'pr'){
                                     $sum  -= (int)$val['amount'];
                                }
                                                       
                                                    ?>
                                                <tr>
                                                <th scope="row"><?=$i?></th>
                                                <td><?=$val['expendituredate']?></td>
                                                <td><?=$val['amount']?></td>
                                                <td>
                            <?php 
                                if (substr( $val['token'], 0,5) == 'stuff') {
                                    echo "Labour Payment";
                                }else if($val['token'] == 's'){
                                    echo "Labour Payment on sale";
                                }else if($val['token'] == 'sr'){
                                    echo "return Payment on sale return";
                                }else if($val['token'] == 'p'){
                                    echo "Labour Payment on purchase";
                                }else if($val['token'] == 'pr'){
                                    echo "return Payment on purchase return";
                                }

                            ?>


                                                  </td>
                                                
                                    
                                                </tr>
                                                <?php   }
                                                ?>
                                                
                                                
                                                
                                            </tbody>
                                            <tr>
                                                <td></td>
                                                <td><b>Total Amount</b></td>
                                                <td><?=$sum?></td>
                                                
                                    
                                                </tr>
                                        </table>
</div>
                                        
                                    </div>
                                    </div>
                                    </div>
                                    <?php include 'files/footer.php'; ?>
