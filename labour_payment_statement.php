                                    <?php include 'files/header.php'; ?>
                                    <?php include 'files/menu.php';

                                    ?>
                                    <div class="container">

                                    <div class="row">
                                        <div class="col">
                                            <div class="bg-light card card-body" style=" background: #b4c6d8 !important">
                                            <h1 style="text-align: center;">Labour Payment Report</h1>
                                            <small>(This table shows only todays data by default, if you want to see the previous data you have to select a date from the date box)</small>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                        <div class="col">
                                            <div class="bg-light card card-body" style=" background: #060202 !important;">
                                            <form action="" method="POST">
                                                <div class="row">
                                                <div class="col"><input type="date" class="form-control" name="start"></div>
                                                <div class="col"><input type="date" class="form-control" name="to"></div>
                                                <div class="col"><input type="submit" value="Search" name="filter" class="btn btn-default"></div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>

                                        </div>



                                    <div class="row" style="margin-top: 22px;">
                                    <!-- users view section starts here -->
                                    <div class="col">
                                    <?php 
                                    
                  $sql =  "SELECT  `expendituredate`, `amount`,`islabor` FROM `expenditure` WHERE `islabor`='yes' AND `expendituredate` = CURDATE()
          UNION 
          SELECT `purchasedate`, (`weight`+`transport`) as laboramount , `token` FROM `purchase` where  `purchasedate` = CURDATE()
          UNION
          SELECT `selldate`,(`weight` + `transport`) as khoroc, `token` FROM `sell` where  `selldate` = CURDATE()
          UNION
          SELECT `return_date`, (`weight`+`transport`) as rettotal,`token` FROM `purchase_return` where `return_date` =CURDATE()
          UNION
          SELECT `return_date`, (`weight`+ `transport`) as retotal,`token` FROM `sell_return` where `return_date` = CURDATE()";

                                            
                                            if (isset($_POST['filter'])) {

                                                //search by only name
                                                if (!empty($_POST['start']) &&  !empty($_POST['to'])) {
                                    $sql ="SELECT  `expendituredate`, `amount`,`islabor` FROM `expenditure` WHERE `islabor`='yes' AND `expendituredate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' 
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

                                    
                                        
                                        <table class="table table-hover table-striped table-bordered" id="myTable" >
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
                                if ($val['islabor'] == 'yes') {
                                    $sum  += (int)$val['amount'];
                                }else if($val['islabor'] == 's'){
                                     $sum  += (int)$val['amount'];
                                }else if($val['islabor'] == 'sr'){
                                    $sum  -= (int)$val['amount'];
                                }else if($val['islabor'] == 'p'){
                                     $sum  += (int)$val['amount'];
                                }else if($val['islabor'] == 'pr'){
                                     $sum  -= (int)$val['amount'];
                                }
                                                       
                                                    ?>
                                                <tr>
                                                <th scope="row"><?=$i?></th>
                                                <td><?=$val['expendituredate']?></td>
                                                <td><?=$val['amount']?></td>
                                                <td>
                            <?php 
                                if ($val['islabor'] == 'yes') {
                                    echo "Labour Payment";
                                }else if($val['islabor'] == 's'){
                                    echo "Labour Payment on sale";
                                }else if($val['islabor'] == 'sr'){
                                    echo "return Payment on sale return";
                                }else if($val['islabor'] == 'p'){
                                    echo "Labour Payment on purchase";
                                }else if($val['islabor'] == 'pr'){
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
                                    <?php include 'files/footer.php'; ?>
