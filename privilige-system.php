

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

 

  /*echo "<pre>";
  print_r($datahead);
  echo "</pre>";
  echo count($datahead);*/
    $priviligearray = [];

     
     $qrry = $db->joinQuery('SELECT DISTINCT `user_id` FROM `role_base_access_system`')->fetchAll();
      
    
     foreach ($qrry as $kv) {

        $qry = $db->joinQuery("SELECT * FROM `role_base_access_system` WHERE `user_id`='".$kv['user_id']."'")->fetchAll();
        $varray  = [];
        foreach ($qry as $ke) {
           array_push($varray ,  [
            "userid"   => $ke['user_id'],
            "pagename" => $ke['pagename'],
            "roles"    => $ke['roles']
         ]);
        }
        $priviligearray[$kv['user_id']] = $varray;
        
     }

    /* echo "<pre>";
     print_r($priviligearray);*/


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
                <select name="userid" id="userid" onchange="updateuserinformation()" class="form-control" style="width: 50%;">
                      <option value="">Select a user</option>
                     <?php 
                        $cat  =  $db->joinQuery("SELECT * FROM `users` ")->fetchAll();
                        foreach ($cat as $cater) { ?>
                     <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                     <?php   }
                        ?>
                </select>
              </div>
            <table class="table table-bordered" id="datatable">
              
              <tbody>
              <?php 

                 /* echo "<pre>";
    print_r($ss['priviliges']);

    echo "</pre>";*/

                  for ($i=0,$j=1; $i <count($ss['priviliges']); $i++,$j++) {  ?>
                          <tr>
                            <td><?=$j?></td>
                              <td> <input type="hidden" value="<?=$ss['priviliges'][$i]['priv_id']?>"> <h5> <b><?=$ss['priviliges'][$i]['priv_name']?></b></h5> </td>
                              <?php
                              
                                for ($k=0; $k <count($ss['priviliges'][$i]['subdata']); $k++) { ?>

                                    <td> 
                          <div class="custom-control custom-checkbox">
  <input type="checkbox" name="provilig[<?=$ss['priviliges'][$i]['priv_id']?>][<?=$k?>]" class="custom-control-input" id="customCheck_<?=$ss['priviliges'][$i]['priv_id']?>_<?=$k?>" value="<?=$k?>">
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
              <button class="btn btn-warning" name="btnupdatedata">Update</button>
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


var valuearray = <?=json_encode($priviligearray);?>;
//console.log(valuearray);
 

   function updateuserinformation() {

       var userid = document.getElementById('userid').value;
       
       valueupdate(userid);
   }

   function valueupdate (id) {

      if(valuearray[id] !== undefined){
       // window.location.reload(true);
        for (var i = 0; i <valuearray[id].length; i++) {
       // console.log(valuearray[id]);

        var ele =  document.getElementById('customCheck_'+valuearray[id][i].pagename+'_'+valuearray[id][i].roles);
        ele.checked = true;
       /*userid.add(valuearray[id][i].userid);
       pagename.add( valuearray[id][i].pagename);*/

       
   }
 }else{
 // window.location.reload(true);
  console.log("there is no such as value");
 }
      
 }

   var userid = new Set();
   var pagename = new Set();
   
// console.log(valuearray);

</script>