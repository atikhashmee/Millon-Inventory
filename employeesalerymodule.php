  

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
  

     <div class="container">
       <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Employee Salery Option</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Employee for Salery </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
      <div class="row">
              
      
         <!-- users view section starts here -->
<div class="col">
                
                    
                    <?php 

                      $sql =  "SELECT * FROM `users` where  `user_role`='4' ORDER BY `u_id` DESC";
                      $i =0;
                      
                      
                        //echo $sql;
                      $data = $db->joinQuery($sql)->fetchAll();

                    ?>
                    <div class="card card-body">
                    <table class="table table-bordered table-hover table-striped" id="datatable" >
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

                            <div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i> 
  </button>
  <div class="dropdown-menu">
    
     <a href="pay_salery.php?eid=<?=$val['u_id']?>" class="dropdown-item">Pay salery</a>
      <a class="dropdown-item" href="salerysetup.php?eid=<?=$val['u_id']?>">Setup Salery</a> 
      <a class="dropdown-item" href="salery-history.php?eid=<?=$val['u_id']?>"> Salery History</a>
    
  </div>
</div>


                         

                            </td>
                          </tr>
                          <?php   }

                        ?>
                        
                       
                      </tbody>
                    </table>
                    </div>

                  </div>
                </div>
              </div>
<?php include 'files/footer.php'; ?>
             

