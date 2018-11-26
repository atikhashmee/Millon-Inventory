<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
    
      $userdetails =  $db->selectAll('users','u_id="'.$_GET['detail'].'"')->fetch(PDO::FETCH_ASSOC);
 ?>
<div class="container">
   <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #b4c6d8 !important">
          <h1 style="text-align: center;">Person Details</h1>
         </div>
       </div>
     </div>

     
     <div class="row">
       <div class="col-md-4"></div>
       <div class="col-md-4">
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
       <div class="col-md-4"></div>
     </div>


</div>
<?php include 'files/footer.php'; ?>
