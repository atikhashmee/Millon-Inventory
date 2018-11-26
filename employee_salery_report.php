           <?php include 'files/header.php'; ?>
             <?php include 'files/menu.php';?>
                  <div class="container">
                   <div class="row">
                    <div class="col">
                      <div class="bg-light card card-body" style=" background: #b4c6d8 !important">
                       <h1 style="text-align: center;">Employee Salery Report</h1>
                         </div>
                       </div>
                   </div>

                     <div class="row">
                      <div class="col">
                            <div class="bg-light card card-body" style=" background: #060202 !important;">
                          <form action="" method="POST">
                          <div class="row">
                        <div class="col">
                <select class="form-control" name="employeeid">
                   <option value="">Select an Employee</option>
                  <?php 
                     $cat  =  $db->joinQuery("SELECT `u_id`, `name` FROM `users` WHERE `user_role`='4'")->fetchAll();
                     foreach ($cat as $c) { ?>
                        <option value="<?=$c['u_id']?>"><?=$fn->getUserName($c['u_id'])?></option>
                    <?php  }
                     
                     ?>
                </select>
              </div>
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
                                    
                                            $sql =  "SELECT * FROM `e_payment_salery`";

                                            
                                            if (isset($_POST['filter'])) {

                                                //search by only name

                                                if (!empty($_POST['employeeid'])) {
                                                      $sql = "SELECT * FROM `e_payment_salery` WHERE `employeeid`='".$_POST['employeeid']."'";
                                                }
                         if (!empty($_POST['start']) &&  !empty($_POST['to'])) {
                                    $sql ="SELECT * FROM `e_payment_salery` WHERE `payment_date` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";

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
                                                <th>Employee</th>
                                                <th>Amount</th>
                                                <th>Due</th>
                                                
                                                
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                                                <?php 
                                                $i=0;
                                                $sum = 0;
                                                    foreach ($data as $val) {  $i++;
                                                      $sum += (int) $val['amount_pay'];
                                                    ?>
                                                <tr>
                                                <th scope="row"><?=$i?></th>
                                                <td><?=$val['payment_date']?></td>
                                                <td><?=$fn->getUserName($val['employeeid'])?></td>
                                                <td><?=$val['amount_pay']?></td>
                                                <td><?=$val['payment_due']?></td>
                                                </tr>
                                                <?php   }
                                                ?>
                                            </tbody>
                                            <tr>
                                                <td></td>
                                                <td><b>Total Amount</b></td>
                                                <td><?=number_format($sum)?></td>
                                                
                                    
                                                </tr>
                                        </table>

                                        
                                    </div>
                                    </div>
                                    </div>
                                    <?php include 'files/footer.php'; ?>
