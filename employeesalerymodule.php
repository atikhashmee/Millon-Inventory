  

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
  

     <div class="container">
       <div class="row ">
      <div class="col">
         <div class="bg-light card card-body header-wrapper" style=" background: #b4c6d8 !important">
            <h1 style="text-align: center;">Set Employee Salery</h1>
         </div>
      </div>
   </div>
      <div class="row">
              
      
         <!-- users view section starts here -->
<div class="col">
                
                    
                    <?php 

                      $sql =  "SELECT * FROM `users` where  `user_role`='4' ORDER BY `u_id` DESC";
                      $i =0;
                      
                      
                        //echo $sql;
                      $data = $db->joinQuery($sql)->fetchAll();

                    ?>
                    <table class="table table-bordered table-active table-hover table-striped" id="myTable" >
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Contact Number</th>
                          <th>Address</th>
                          <th>Opening Balance</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody> 

                        <?php 


                            foreach ($data as $val) {  $i++; ?>
                          <tr>
                          <th scope="row"><?=$i?></th>
                          <td><?=$val['name']?></td>
                          <td><?=$val['email']?></td>
                          <td><?=$val['contact_number']?></td>
                          <td><?=$val['address']?></td>
                          <td><?=$val['opening_balance']?></td>
                          <td>

                             <a class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
      
      <a href="pay_salery.php?eid=<?=$val['u_id']?>" class="dropdown-item btn btn-danger btn-sm">Pay salery</a>
      <a class="dropdown-item btn btn-success btn-sm" href="salerysetup.php?eid=<?=$val['u_id']?>">Setup Salery</a>
      
    </div>
  </a>

                            </td>
                          </tr>
                          <?php   }

                        ?>
                        
                       
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
<?php include 'files/footer.php'; ?>
             

