<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
    
      $userdetails =  $db->selectAll('users','u_id="'.$_GET['detail'].'"')->fetch(PDO::FETCH_ASSOC);
 ?>
<div class="container">
  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Person</a></li>
                                  <li class="breadcrumb-item active">Users Details</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Users Details</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

     
     <div class="row">
       <div class="col-md-4"></div>
       <div class="col-md-8">
        <div class="card card-body">
         <table class="table table-bordered">
           <tr>
             <th>Titles</th>
             <th>Informations</th>
           </tr>
           <tr>
             <td> <b>UserName</b> </td>
             <td><?=$userdetails['name']?></td>
           </tr>
           <tr>
             <td> <b>Passsword</b> </td>
             <td><?=$userdetails['password']?></td>
           </tr>
           <tr>
             <td> <b>E-mail</b> </td>
             <td><?=$userdetails['email']?></td>
           </tr>
           <tr>
             <td> <b>Contact Number</b> </td>
             <td><?=$userdetails['contact_number']?></td>
           </tr>
           <tr>
             <td> <b>Address</b> </td>
             <td><?=$userdetails['address']?></td>
           </tr>
           <tr>
             <td> <b>UserType</b> </td>
             <td><?=$fn->userType($userdetails['user_role'])?></td>
           </tr>
           <?php 

              if ($userdetails['user_role'] == 4) { ?>
                  <tr>
             <td> <b>Employee type</b> </td>
             <td><?=$fn->employeeType($userdetails['employeetype'])?></td>
           </tr>
           <?php    } else { ?>
            
             <tr>
             <td> <b>Opening Balance</b> </td>
             <td><?=$userdetails['opening_balance']?></td>
           </tr>

          <?php  }

           ?>
           <tr>
             <td> <b>User Created at</b> </td>
             <td><?=$userdetails['created_at']?></td>
           </tr>
         </table>
         </div>
       </div>
       
     </div>


</div>
<?php include 'files/footer.php'; ?>
