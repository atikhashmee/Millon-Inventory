

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>



<?php 

    $pagearrray = array();
    $usertype = $db->joinQuery("SELECT DISTINCT `role_id` FROM `access_privilige`")->fetchAll();
    foreach ($usertype as $d) 
    {
          $pages =  $db->selectAll("access_privilige","role_id='".$d['role_id']."'")->fetchAll();
          $valuearry = array();
          foreach ($pages as $p) 
          {
              array_push($valuearry,$p['page_id']);
          }
          $pagearrray[$d['role_id']] = $valuearry;
    }

    /*echo "<pre>";
      print_r($pagearrray);
    echo "</pre>";*/


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
                            <h4 class="page-title">Access Privilige System</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                
     <div class="row">
       <div class="col">
          <div class="card card-body">
              
              <form class="form" method="post">

                <div class="form-group">
                     <label for="sel1">Select list:</label>
                     <select class="form-control" id="usertype" name="usertype" onchange="updatetherow()">
                        <option value=""> Choose option</option>
                        <option value="1">Customer</option>
                        <option value="2">Supplier</option>
                        <option value="3">Customer & supplier</option>
                        <option value="4">Employee</option>
                     </select>
                  </div>

                 <div class="row">
                  <?php 
                  for ($i=0; $i <count($ss['priviliges']); $i++)
                   {  ?>  

                        <div class="col-4">
                          <input type="checkbox" class="checkboxitem" name="accpriviligename[]" 
                        value="<?=$ss['priviliges'][$i]['priv_id']?>"
                         id="customcheck_<?=$ss['priviliges'][$i]['priv_id']?>"> 
                          <b><?=$ss['priviliges'][$i]['priv_name']?></b>
                        </div>  
                        
            <?php  }

              ?>
              </div>
              <button type="submit" name="btnsave" class="btn btn-outline-warning">Save <i class="fa fa-floppy-o"></i> </button>

              </form>  

              <?php 
                if (isset($_POST['btnsave'])) {
                        /*delete the existing one at first*/
             $db->delete("access_privilige","role_id='".$_POST['usertype']."'");
                         for ($i=0; $i <count($_POST['accpriviligename']); $i++) { 
                               $data = array(
                                'role_id' => $_POST['usertype'], 
                                'page_id' => $_POST['accpriviligename'][$i] , 
                              );
                               $db->insert("access_privilige",$data);
                         }
                }

              ?>
                
          </div>
       </div>
     </div>
   </div>

<?php include 'files/footer.php'; ?>
<script>
  var databytype =  <?=json_encode($pagearrray);?>;

  //console.log(databytype);
  function updatetherow()
  {    

     var roleid =  document.getElementById("usertype").value;
     var checkboxed = document.getElementsByClassName("checkboxitem");

       for (var i = 0; i < checkboxed.length; i++) 
       {
            if (checkboxed[i].checked === true) 
              {
                checkboxed[i].checked = false;
              }
       }

      for (var i = 0; i <databytype[roleid].length; i++) 
      {
        
        var ele  = document.getElementById("customcheck_"+databytype[roleid][i]);
        ele.checked = true;
      }


  }
</script>
