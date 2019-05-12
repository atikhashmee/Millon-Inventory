<?php include 'files/header.php';
 include 'files/menu.php';


 function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

          
           $revieve_collection = $db->joinQuery('SELECT * FROM `recevecollection` WHERE `recol_id`= "'.$_GET['item-id'].'"')->fetch(PDO::FETCH_ASSOC);
           $is_checked = " ";

           $chequeno = '';
           $bankName = '';
           $issuedate= '';
         if ($revieve_collection['bycashcheque'] == 'rac_Cheque') 
            {
                $is_checked  = "(This money receipt will not be valid unless the cheque is passed)";
                $cheque_history = $db->joinQuery('SELECT * FROM `cheque` WHERE `parent_table_id`= "rac_'.$_GET['item-id'].'"')->fetch(PDO::FETCH_ASSOC);
                $chequeno = $cheque_history['accountno'];
                $bankName = $cheque_history['bankname'];
                $issuedate = $cheque_history['expiredate'];
            } 

            $totaldue =  $customersb[$revieve_collection['cusotmer_id']]+$revieve_collection['amounts'];

 ?>


<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Accounts</a></li>
                                  <li class="breadcrumb-item active">Recieve and collection</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Print Money Reciept</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

         <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="row" style="margin-bottom:  71px;">
                                    <div class="col-12">
                                        <div class="row">
                                             <div class="col-md-12">
                                                  <div class="text-center line-height-0 font-12">
                                                        <h3> <strong> Janata Steel Corporation </strong></h3>
                                                        <p> <strong>Ka-24/1, Sohid Abdul Aziz Road, Jagannathpur, vatara, Dhaka 1229</strong>  </p>
                                                        <p> <strong>+88 01554327812,+88 01682409301,+88 01912 541124</strong> </p>
                                                        <div style="width: 100%; overflow: hidden; font-size: 14">
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>(Offical Copy)</strong></h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>(Money Reciept)</strong></h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>Date : <?=$revieve_collection['recievedate']?></strong></h6>
                                                            </div>
                                                        </div>
                                                         
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-12">
                                              <div style="width: 100%; height: auto; border: 1px solid #000; ">
                                                    <div style="width: 100%; padding: 3px; font-size: 14px;">
                                                       <p>Received with thanks TK  <strong><?= number_format($revieve_collection['amounts'],2,'.','') ?></strong> </p>
                                                      
                                                          <p>In Words : <?=convertNumberToWord($revieve_collection['amounts'])?> </p>
                                                        <div>  Customer Info : <br>  <?=$dm->getUserFullDetails($revieve_collection['cusotmer_id'])?> </div> 
                                                       
                                                      
                                                    </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>
                                                        <div style="width: 100%; overflow: auto;">
                                                            <div style="width: 50%;padding: 3px; font-size: 14px; float:left;">
                                                                <p>Pre Due Balance <strong> <?=$totaldue?> </strong> </p>
                                                            </div>
                                                             <div style="width: 50%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>Due Balance <strong><?=$totaldue - $revieve_collection['amounts'] ?></strong> </p>
                                                            </div>
                                                        </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>
                                                        <div style="width: 100%; overflow: auto;">
                                                            <div style="width: 33.33%;padding: 3px; font-size: 14px; float:left;">
                                                                <p>Cheque No <strong> <?=$chequeno?> </strong> </p>
                                                            </div>
                                                             <div style="width: 33.33%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>Bank <strong><?=$bankName?></strong> </p>
                                                            </div>
                                                            <div style="width: 33.33%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>issue Date <strong> <?=$issuedate?> </strong> </p>
                                                            </div>
                                                        </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>

                                                        <div style="width: 100%; height: 50px; text-align: center;">
                                                             <div style="text-align: right;"> <p style="padding:3px;">Total Balance : <?=number_format($revieve_collection['amounts'],2,'.','')?> </p> </div>
                                                             <small> <?=$is_checked?> </small>
                                                        </div>
                                                        <div style="width: 100%; padding-left: 3px; padding-bottom: 10px;">
                                                           <p style="padding: 0; margin:0px;">Mr. Millon Mazda(Managing Directior)</p>
                                                           <div style="width: 70%;border-top: 1px solid #000;"></div>
                                                           <p style="padding: 0; margin:0px;">Posted by : </p>
                                                        </div>
                                                         
                                              </div>
                                                 <div style="text-align: center;"> <h5> Thank You</h5> </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>  
                               
                               <div style="width: 100%; border: 1px dashed  #000;"></div>
                                <div class="row" style="margin-top:  71px; margin-bottom: 25px;">
                                    <div class="col-12">
                                        <div class="row">
                                             <div class="col-md-12">
                                                  <div class="text-center line-height-0 font-12">
                                                        <h3> <strong> Janata Steel Corporation </strong></h3>
                                                        <p> <strong>Ka-24/1, Sohid Abdul Aziz Road, Jagannathpur, vatara, Dhaka 1229</strong>  </p>
                                                        <p> <strong>+88 01554327812,+88 01682409301,+88 01912 541124</strong> </p>
                                                        <div style="width: 100%; overflow: hidden; font-size: 14">
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>(Customer Copy)</strong></h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>(Money Reciept)</strong></h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>Date : <?=$revieve_collection['recievedate']?></strong></h6>
                                                            </div>
                                                        </div>
                                                         
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-md-12">
                                              <div style="width: 100%; height: auto; border: 1px solid #000; ">
                                                    <div style="width: 100%; padding: 3px; font-size: 14px;">
                                                       <p>Received with thanks TK  <strong><?= number_format($revieve_collection['amounts'],2,'.','') ?></strong> </p>
                                                      
                                                          <p>In Words : <?=convertNumberToWord($revieve_collection['amounts'])?> </p>
                                                        <div>  Customer Info : <br>  <?=$dm->getUserFullDetails($revieve_collection['cusotmer_id'])?> </div> 
                                                       
                                                      
                                                    </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>
                                                        <div style="width: 100%; overflow: auto;">
                                                            <div style="width: 50%;padding: 3px; font-size: 14px; float:left;">
                                                                <p>Pre Due Balance <strong> <?=$totaldue?> </strong> </p>
                                                            </div>
                                                             <div style="width: 50%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>Due Balance <strong><?=$totaldue - $revieve_collection['amounts'] ?></strong> </p>
                                                            </div>
                                                        </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>
                                                        <div style="width: 100%; overflow: auto;">
                                                            <div style="width: 33.33%;padding: 3px; font-size: 14px; float:left;">
                                                                <p>Cheque No <strong> <?=$chequeno?> </strong> </p>
                                                            </div>
                                                             <div style="width: 33.33%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>Bank <strong><?=$bankName?></strong> </p>
                                                            </div>
                                                            <div style="width: 33.33%;padding: 3px; font-size: 14px;  float:left;">
                                                                <p>issue Date <strong> <?=$issuedate?> </strong> </p>
                                                            </div>
                                                        </div>
                                                        <div style="width: 100%;border-top: 1px solid #000;"></div>

                                                        <div style="width: 100%; height: 50px; text-align: center;">
                                                             <div style="text-align: right;"> <p style="padding:3px;">Total Balance : <?=number_format($revieve_collection['amounts'],2,'.','')?> </p> </div>
                                                             <small> <?=$is_checked?> </small>
                                                        </div>
                                                        <div style="width: 100%; padding-left: 3px; padding-bottom: 10px;">
                                                           <p style="padding: 0; margin:0px;">Mr. Millon Mazda(Managing Directior)</p>
                                                           <div style="width: 70%;border-top: 1px solid #000;"></div>
                                                           <p style="padding: 0; margin:0px;">Posted by : </p>
                                                        </div>
                                                         
                                              </div>
                                                 <div style="text-align: center;"> <h5> Thank You</h5> </div>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-12">
                                        <div class="panel panel-default">
                                          
                                            <div class="">
                     
                                        

        <div class="d-print-none mo-mt-2">
        <div class="pull-right">
          
       <!--  <a href="product-return.php?invoice=<?=$_GET['invo']?>&isEnabled=true&token=sell" class="btn btn-outline-info waves-effect waves-light">Return <i class="fa fa-minus-square-o"></i></a> -->
        <!-- <a href="#" 
        onclick="deleteItem('product-sale-history','<?=$_GET['invo']?>')"
         class="btn btn-outline-danger waves-effect waves-light">Delete <i class="fa fa-trash"></i></a> -->
        
        <a href="javascript:window.print()" class="btn btn-outline-success waves-effect waves-light">Print <i class="fa fa-print"></i></a>
      
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row -->

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
  
</div>



<?php include 'files/footer.php'; ?>
