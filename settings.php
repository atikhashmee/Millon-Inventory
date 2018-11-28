<?php include 'files/header.php';?>
<?php include 'files/menu.php';
      
      $settingsquery = $db->joinQuery("SELECT * FROM `settings` WHERE `adminid`='".$_SESSION['u_id']."'");
      $q     =  $settingsquery->rowCount();
      $datas = $settingsquery->fetch(PDO::FETCH_ASSOC);

?>



<div class="container">

  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Owner</a></li>
                                  <li class="breadcrumb-item active">Settings</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Settings </h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-7">
                    <?php
                       if ($q>0) 
                       {
                          ?>
                          <div class="card card-body">
                      <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Website Title</label>
                          <input type="text" name="webtitle" id="webtitle" class="form-control" value="<?=$datas['webtitle']?>">
                        </div>
                        <div class="form-group">
                          <label for="">Website Name</label>
                          <input type="text" name="webname" id="webname" class="form-control" value="<?=$datas['webname']?>">
                        </div>
                        <div class="form-group">
                          <label for="">Website Fevicon</label>
                          <input type="hidden" name="dbfeviname" value="<?=$datas['fevicon']?>">
                          <input type="file" name="fevifile" id="fevifile" class="form-control">
                    <img src="assets/images/fevicons/<?=$datas['fevicon']?>" width="550" height="200" id="feviviewer" >
                        </div>
                        <div class="form-group">
                          <label for="">Website Logo</label>
                          <input type="hidden" name="dblogoname" value="<?=$datas['logo']?>">
                          <input type="file" name="logofile"  id="logofile" class="form-control">
                    <img src="assets/images/logos/<?=$datas['logo']?>" width="550" height="200" id="logoviewer" >
                        </div>
                        <div class="form-group">
                          <button type="reset" class="btn btn-outline-danger">Cancel</button>
                          <button type="submit" name="updatesettings" class="btn btn-outline-warning">Update
                          <i class="fa fa-floppy-o"></i>
                          </button>
                        </div>
                      </form>
                      
                    </div>
                          <?php
                       }
                       else 
                       {
                           ?>
                           <div class="card card-body">
                      <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="">Website Title</label>
                          <input type="text" name="webtitle" id="webtitle" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">Website Name</label>
                          <input type="text" name="webname" id="webname" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">Website Fevicon</label>
                          <input type="file" name="fevifile" id="fevifile" class="form-control">
                    <img src="https://picsum.photos/550/200/?random" width="550" height="200" id="feviviewer" >
                        </div>
                        <div class="form-group">
                          <label for="">Website Logo</label>
                          <input type="file" name="logofile"  id="logofile" class="form-control">
                    <img src="https://picsum.photos/550/200/?random" width="550" height="200" id="logoviewer" >
                        </div>
                        <div class="form-group">
                          <button type="reset" class="btn btn-outline-danger">Cancel</button>
                          <button type="submit" name="savesettings" class="btn btn-outline-primary">Save
                          <i class="fa fa-floppy-o"></i>
                          </button>
                        </div>
                      </form>
                      
                    </div>
                           <?php
                       }
                    ?>
                    
                  </div>
                  <div class="col-md-2"></div>
                </div>      
</div>
<?php
                      if (isset($_POST['updatesettings']))
                      { 
                        $image1 = "";
                        $image2 = "";
                        if(empty($_FILES['fevifile']['name']))
                          {
                             $image1 = $_POST['dbfeviname'];
                          }
                          else 
                          {
                            if ($_FILES['fevifile']['error']==0)
                             {  
                              unlink("assets/images/fevicons/".$_POST['dbfeviname']);
                                 $image1 = date("mdYHis")."-".mt_rand(000,999)."-".basename($_FILES['fevifile']['name']);
                             $targetfile = "assets/images/fevicons/".$image1;
                             $fn->imageupload("fevifile",$targetfile);
                             }
                             else
                             {
                               echo "error ".$_FILES['fevifile']['error']." image 1 is not selected <br>";
                             }
                          }
                          
                          if(empty($_FILES['logofile']['name']))
                          {
                             $image2 = $_POST['dblogoname'];
                          }
                          else 
                          {
                            unlink("assets/images/logos/".$_POST['dblogoname']);
                             if ($_FILES['logofile']['error']==0)
                             {
                                 $image2 = date("mdYHis")."-".mt_rand(000,999)."-".basename($_FILES['logofile']['name']);
                             $targetfile = "assets/images/logos/".$image2;
                             $fn->imageupload("logofile",$targetfile);
                             }
                             else
                             {
                               echo "error ".$_FILES['logofile']['error']." image 1 is not selected <br>";
                             }
                         }

                           $data  = array(
                            'webtitle'  => $_POST['webtitle'],
                            'webname'   => $_POST['webname'],
                            'fevicon'   => $image1,
                            'logo'      => $image2,
                            'adminid'   => $_SESSION['u_id']
                             );
                           if ($db->update("settings",$data,"`adminid`='".$_SESSION['u_id']."'"))
                            {
                               ?>
                               <script>
                                 alert("Data has been updated");
                               </script>
                               <?php
                            }
                      }


                      if (isset($_POST['savesettings']))
                      { 
                        $image1 = "";
                        $image2 = "";
                          if ($_FILES['fevifile']['error']==0)
                           {
                               $image1 = date("mdYHis")."-".mt_rand(000,999)."-".basename($_FILES['fevifile']['name']);
                           $targetfile = "assets/images/fevicons/".$image1;
                           $fn->imageupload("fevifile",$targetfile);
                           }
                           else
                           {
                             echo "error ".$_FILES['fevifile']['error']." image 1 is not selected <br>";
                           }

                           if ($_FILES['logofile']['error']==0)
                           {
                               $image2 = date("mdYHis")."-".mt_rand(000,999)."-".basename($_FILES['logofile']['name']);
                           $targetfile = "assets/images/logos/".$image2;
                           $fn->imageupload("logofile",$targetfile);
                           }
                           else
                           {
                             echo "error ".$_FILES['logofile']['error']." image 1 is not selected <br>";
                           }

                           $data  = array(
                            'webtitle'  => $_POST['webtitle'],
                            'webname'   => $_POST['webname'],
                            'fevicon'   => $image1,
                            'logo'      => $image2,
                            'adminid'   => $_SESSION['u_id']
                             );
                           if ($db->insert("settings",$data))
                            {
                               ?>
                               <script>
                                 alert("Data has been saved");
                               </script>
                               <?php
                            }
                      }
                      ?>
<?php include 'files/footer.php'; ?>
<script>
  function readURL(input,selector) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $(selector).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#fevifile").change(function() {
  readURL(this,"#feviviewer");
});

$("#logofile").change(function() {
  readURL(this,"#logoviewer");
});
</script>