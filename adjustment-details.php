<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active">Customer adjustment History</li>
               </ol>
            </div>
            <h4 class="page-title">Lists of all adjustments</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card m-b-30">
            <div class="card-body">
                  <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                       <tr>
                         <th>#SL</th>
                         <th>Date</th>
                         <th>Amount</th>
                       </tr>
                       </thead>
                       <tbody>
                           <?php
                              $details =  json_decode($_GET['details']);
                               $i=0;
                               $sum = 0;
                              foreach ($details as $each) 
                              {
                                $i++;
                                $sum  += intval($each->amount);
                                ?>
                                <tr>
                                  <td><?=$i?></td>
                                  <td><?=$each->date?></td>
                                  <td><?=$each->amount?></td>
                                </tr>
                                <?php
                                
                              }
                              /*echo "<pre>";
                              print_r($details);
                              echo "</pre>";*/

                           ?>
                            <tr>
                              <td></td>
                              <td></td>
                              <td ><?=$sum?></td>
                            </tr>
                       </tbody>

                  </table>
            </div>
         </div>
       
      </div>
   </div>
</div>
<?php include 'files/footer.php';?>