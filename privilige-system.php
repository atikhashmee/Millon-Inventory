

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

 

  /*echo "<pre>";
  print_r($datahead);
  echo "</pre>";
  echo count($datahead);*/
    $priviligearray = [];

     
     $qrry = $db->joinQuery('SELECT DISTINCT `user_id` FROM `role_base_access_system`')->fetchAll();
      
    
     foreach ($qrry as $kv)
     {

        $qry = $db->joinQuery("SELECT * FROM `role_base_access_system` WHERE `user_id`='".$kv['user_id']."'")->fetchAll();
        $varray  = [];
        foreach ($qry as $ke)
         {
             array_push($varray ,  [
              "userid"   => $ke['user_id'],
              "pagename" => $ke['pagename'],
              "roles"    => $ke['roles']
              ]);
        }
        $priviligearray[$kv['user_id']] = $varray;
        
     }
 ?>






   <div class="container">
     <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Privilige System</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Privilige System</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                
     <div class="row">
       <div class="col">
          <div class="card card-body">
            <form action="" method="post">
              
                          <div class="form-group">
                     <label for="sel1">Select list:</label>
                     <select class="form-control" id="usertype" name="usertype" onchange="mynextdata()" style="width: 50%;">
                        <option> Choose option</option>
                        <option value="1">Customer</option>
                        <option value="2">Supplier</option>
                        <option value="3">Customer & supplier</option>
                        <option value="4">Employee</option>
                     </select>
                  </div>
                  <div id="formshow" style="display: none;">
                    
                      
                     
                    <select class="form-control" name="emtype" id="emtype">
                        <option value="">Employee type</option>
                        <?=$dm->getEmployeeType()?>
                     </select>

                  
                  <a href="employee-type.php" class="btn btn-outline-info"><i class="fa fa-hashtag"></i></a>
                    
                   
                  </div>
                        
              <div class="form-group">
              <select name="userid" id="userid" onchange="updateuserinformation()" class="form-control" style="width: 50%;">
                      <option value="">Select a user</option>
                     <?php 
                        $cat  =  $db->joinQuery("SELECT * FROM `users` ")->fetchAll();
                        foreach ($cat as $cater)
                         {   ?>
                              <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                             <?php  
                        }
                        ?>
                </select>
              </div>
            <table class="table table-bordered" id="datatable">
              
              <tbody>
              <?php 

                 /* echo "<pre>";
    print_r($ss['priviliges']);

    echo "</pre>";*/

                  for ($i=0,$j=1; $i <count($ss['priviliges']); $i++,$j++)
                   {  ?>
                          <tr>
                            <td><?=$j?></td>
                              <td> <input type="hidden" value="<?=$ss['priviliges'][$i]['priv_id']?>"> <h5> <b><?=$ss['priviliges'][$i]['priv_name']?></b></h5> </td>
                              <?php
                              
                                for ($k=0; $k <count($ss['priviliges'][$i]['subdata']); $k++) { ?>

                                    <td> 
                          <div class="custom-control custom-checkbox">
                <input type="checkbox" name="provilig[<?=$ss['priviliges'][$i]['priv_id']?>][<?=$k?>]" class="custom-control-input checkuncheck" id="customCheck_<?=$ss['priviliges'][$i]['priv_id']?>_<?=$k?>" value="<?=$k?>">
  <label class="custom-control-label" for="customCheck_<?=$ss['priviliges'][$i]['priv_id']?>_<?=$k?>"><?=$ss['priviliges'][$i]['subdata'][$k]?></label>
</div>

                                     </td> 
                                    
                              <?php   }
                              
                               ?>

                          </tr>

               <?php     }

              ?>
              </tbody>
            </table>
            <div class="form-group">
              <button class="btn btn-outline-warning" name="btnupdatedata">Update</button>
            </div>
            
            </form>
            <?php 
              if (isset($_POST['btnupdatedata'])) {
               if (!empty($_POST['userid'])) {
                       //check if exists
           $db->delete("role_base_access_system","user_id = ".$_POST['userid']); //delete the previous data if already there is user's data
                 foreach ($_POST['provilig'] as $key1 => $value1) {
                      foreach ($_POST['provilig'][$key1] as $key => $value) {
                        $data = array(
                          'user_id' => $_POST['userid'],
                          'pagename'=> $key1,
                          'roles'   => $key
                           );
                         /*echo "<pre>";
                print_r($data);
                echo "</pre>";*/
                          $db->insert('role_base_access_system',$data);
                      }
                 }
               }else {
                echo "<h1 style='color:red'>User id is empty</h1>";
               }
              
              }
            ?>
            </div>
       </div>
     </div>
   </div>

<?php include 'files/footer.php'; ?>
<script>

 function mynextdata() {
       var dd = document.getElementById('usertype').value;
       var ddd =  document.getElementById("opendingforemployee");
       var formshow = document.getElementById('formshow');
       if (dd === "4") {
           formshow.style.display = 'inline-block';
           ddd.style.display = "none";
       } else {
           formshow.style.display = 'none';
       }
   }





   var valuearray = <?=json_encode($priviligearray);?>;
 
   function updateuserinformation()
   {

       var userid = document.getElementById('userid').value;
       valueupdate(userid);
   }

   function valueupdate (id) 
   {
    var checkitem = document.getElementsByClassName("checkuncheck");

      if(valuearray[id] !== undefined)
      {
         //check item if already checked
         
         for (var i = 0; i < checkitem.length; i++)
         {
              if (checkitem[i].checked === true) 
              {
                checkitem[i].checked = false;
              }
         }
       
        for (var i = 0; i <valuearray[id].length; i++) 
        {
           var ele =  document.getElementById('customCheck_'+valuearray[id][i].pagename+'_'+valuearray[id][i].roles);
           ele.checked = true;
        }
      }
      else
      {
        //check item if already checked
         
         for (var i = 0; i < checkitem.length; i++)
         {
              if (checkitem[i].checked === true) 
              {
                checkitem[i].checked = false;
              }
         }
          
        console.log("there is no such as value");
      }   
 }

   var userid = new Set();
   var pagename = new Set();

</script>