<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/payment-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<div id="home-mid" class="reg-form income-dashbord sticky-min-height2">
 <?php if ( $payment == null || (isset($payment->status) && $payment->status != "VALID") || $total_with_discount_tax != 0) : ?>
  <div class="payment-title" align="center"><h5><?=Yii::t('payment',"Please make a payment to Download your Income Tax Return in PDF")?> </h5></div>
<?php endif; ?>
<?php
  if(Yii::app()->user->hasFlash('payment_success')) {
?>
    <br />
    <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('payment_success')?></div>
<?php
    } else if(Yii::app()->user->hasFlash('payment_error')) {
?>
    <br />
    <div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('payment_error')?></div>
<?php
    }
?>
<div id="payment-method-list-upgrade" style="text-align: center;">
  <!-- Upgrade content will be load here -->
</div>

<?php $PInfo = $this->loadCPIInfo(Yii::app()->user->CPIId); 
          $Circle = array('9','10','14','15','17','19','36','41'
            ,'32','48','54','61','36','41','32','48','54','63','54','63','71','75','76','80','85','98','102','107','124',
            '114','128','120','132','129','127','142','173','186','190','195','210','212','213','208','217','219','226',
            '227','234','235','225','231','229','239','247','248','252','256','261','257','274','278','283','300','296',
            '303','305','306','296','312','328','322','330','337','282','160','326','292','214','230','276','146','203','109','103','236','110','64','295','138','196','49','60','54','106','323','151','86','218','215');
          $dhakaCity = 0;
          if($PInfo->TaxesZone>=1&&$PInfo->TaxesZone<=15){
              if(in_array(abs($PInfo->TaxesCircle), $Circle)){
                $dhakaCity = 1;
              }
          }
        ?>

<?php 
$sthowUpgradeBox = 1;
$loadUpgradebox =0;
if ( $payment == null || (isset($payment->status) && $payment->status != "VALID") || $total_with_discount_tax != 0) : ?>
<?php $sthowUpgradeBox = 0; ?>
<div class="row">
  <div class="col-lg-6">
  
    <div class="panel panel-default payment-details">
      <div class="panel-heading">
        <h3 class="panel-title text-left"> <?=Yii::t("payment","Payment Details")?> </h3>
      </div>
      <div class="panel-body">

        <table class="price-table-style payment-page ">
      <tbody>
        

        <?php
         //echo  ;
        $i=0;
        foreach($individualPlanlist as $indvplist){
            if($indvplist->id==5 || $indvplist->id==7){
              continue;
            }
          ?>
          <tr>
            <?php if($dhakaCity==1){?>
            <td class="plan-checkbox-container">

            <?php if($indvplist->id>=$NewPlanId){?>
                <input <?php if($NewPlanId==$indvplist->id){ echo 'checked' ;} ?> class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="user_plan">
            <?php }else{?>
              <input disabled class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="">
            <?php } ?>
              </td><td class="plan-text"><?php echo $indvplist->plan;?>
              <?php if($indvplist->description){?>
                <span class="plan-highlighter1">(<?php echo $indvplist->description;?>)</span>
              <?php } ?>
            </td>
          <?php }else{?>
              <td class="plan-checkbox-container">

                <?php if($indvplist->id>=$NewPlanId && ($indvplist->id!=5 && $indvplist->id!=7)){?>
                    <input <?php if($NewPlanId==$indvplist->id){ echo 'checked' ;} ?> class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="user_plan">
                <?php }else{?>
                  <input disabled class="user_plan_box" value="<?php echo $indvplist->id;?>" type="checkbox" name="">
                <?php } ?>
                  </td><td class="plan-text"><?php echo $indvplist->plan;?>
                  <?php if($indvplist->id==5 || $indvplist->id==7){?>
                    <span class="plan-highlighter1">(Dhaka City Only)</span>
                  <?php }else{ ?>
                    <span class="plan-highlighter1">(<?php echo $indvplist->description;?>)</span>
                  <?php } ?>
              </td>

          <?php } ?>
            
            <td class="plan-text"><?php echo $indvplist->price;?> <?=$this->currency?></td>
          </tr>
        <?php
        $i++;
         } ?>
        <!-- tr>
            <td class="text-right-payment">
              <span> 
                <?=Yii::t('payment',"Plan:")?> 
              </span>
            </td>
            <td class="text-left-payment">
              <?php if($serviceCharge == 799){?>
                  <b><?=Yii::t('payment',"Premier")?> </b>
              <?php }elseif($serviceCharge == 399){?> 
                  <b><?=Yii::t('payment',"Deluxe")?> </b>
              <?php }?>
            </td>
        </tr -->
        <!-- tr>
            <td  class="text-right-payment">
              <span> 
               <?=Yii::t('payment',"Plan Fee:")?> 
              </span>
            </td>
            <td class="text-left-payment">
                   <b><?=$serviceCharge?> <?=$this->currency?> </b> 
            </td>
        </tr -->
        <?php if ($voucher == null) : ?>
          <!--
          <td colspan="2" cl>
              <div class="row" style="margin-left: 10px; padding-top: 5px;">
                  <div class="col-md-offset-2">
                      <div class="col-lg-6">
                          <input type="text" id="giftVoucherCode" class="form-control" placeholder="Enter Discount Code Here "> 
                      </div>
                      <div class="col-lg-6 no-padding text-left-payment">
                          <button type="button" class="btn btn-success btn-large" onClick="submitVoucherCode('null')"> <?=Yii::t("payment","Apply")?> </button>
                      </div>
                  </div>
              </div>
          </td>
          -->
        <?php endif; ?>
        <?php if ($discount_text != "") :  ?>
        <!--  
        <tr>
            <td class="text-right-payment">
              <span> 
                <?=Yii::t('payment',"Discount:")?> 
              </span>
            </td>
            <td class="text-left-payment">
            	 <b><?=$discount_text?></b> 
            </td>
        </tr>
        -->
        <?php endif; ?>
        <!-- <tr>
            <td  class="text-right-payment">
              <span> 
               <?=Yii::t('payment',"VAT")?> (<?=$tax?>%):
              </span>
            </td>
            <td class="text-left-payment">
                   <b><?=$tax_amount?> <?=$this->currency?></b> 
            </td>
        </tr> -->
        <?php if($serviceCharge != $total_with_discount_tax):?>
        <tr>
            <td></td>
            <td  class="text-right-payment">
              <span> 
              <?=Yii::t('payment',"Already Paid")?> :
              </span>
            </td>
            <td class="text-left-payment">
                   <b> <?php echo $serviceCharge - $total_with_discount_tax?> <?=$this->currency?></b> 
            </td>
        </tr>
        <?php endif?>
        <!-- temp commented -->
        <!-- tr >
           <td class="plan-checkbox-container"></td>
            <td class="text-left-payment">
            	<span> <?//=Yii::t('payment',"")?> <?//=Yii::t('payment',"Due Fee:")?></span>
            </td>
            <td class="text-left-payment">
            	<b><span class="payment-due-container"><?//=$total_with_discount_tax?></span>
            	<?//=$this->currency?> </b>
            </td>
        </tr -->
 
      </tbody>
    </table>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
   
    <div class="panel panel-default payment-details">
      <div class="panel-heading">
        <h3 class="panel-title"><?=Yii::t("payment", "Payment Method (Click on your payment button below)") ?></h3></h3>
        
      </div>
      <div class="panel-body">
      	<div class="lock-icon"><i class="fa fa-lock"></i></div>		
        <label class="checkbox-inline">
        <input value="1" name="t_and_c" id="t_and_c" type="checkbox"> <?=Yii::t("payment", "By checking this box you agree to our") ?> <a data-target="#agreeModal" data-toggle="modal" href="#">Terms and Conditions</a>
      </label>
      <div class="clearfix"></div>
      <div id="payment-method-list">
      <?php 
        foreach ($options as $keys => $values) : 
          if ($keys == "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["bkash"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
 
      <?php 
          endif;
        endforeach; 
      ?>
      
<!-- THIS IS WITHOUT MOBILE PAYMENT -->              
      <?php 
        foreach ($options as $keys => $values) : 
          if ($keys != "mobile") :
      ?>
        
                     
          <?php foreach ($values as $key => $value) : ?>    
            <?php if (in_array(strtolower($value['name']), ["visa", "master", "amex"])) : ?>
            
            <div class="payment-methode-wrapping">
              <?=$value['link']?></br>
              <p style="text-align:center"><?=$value['name']?></p>
            </div>

            <?php endif; ?>
    
          <?php endforeach; ?>
          <div class="clearfix"></div>
 
      <?php 
          endif;
        endforeach; 
      ?>
  </div>
	<div class="payment-message">
      <?=Yii::t('payment',"Your payment will be processed by SSL Commerz. Please do not close the browser during payment processing. It may take upto 1 minute to process your payment.")?></div>
      </div>
    </div>
  
  </div>
</div>
<?php endif; ?>

<div class="row">
  <div class="col-lg-12">
    <?php if ( $allPaymentThisYear != null ) : ?>
        <div class="panel panel-default payment-details-status">
          <!--div class="panel-heading">
            <h3 class="panel-title"><?=Yii::t("payment", "User plan") ?></h3>
          </div -->
          
        <?php 
        //$sthowUpgradeBox;
        
        $userPlan = $this->userCurrentPlan();
        $individual_plan = IndividualPlan::model()->findByPk($userPlan->plan_id);
        $userCurrentPlanid = $userPlan->plan_id;
        $userPlanParentid = $individual_plan->parent_id;
        $loadUpgradebox =1;
        /*
        if($userPlan->plan_id!=5 && $userPlan->plan_id!=7){ 
            if($userPlan->plan_id==4 || $userPlan->plan_id==6){
                if($dhakaCity){ 
                    $loadUpgradebox =1;
                }
            }else{
                $loadUpgradebox =1;
            } 
        } */
        ?>
             
        <div class="panel panel-default payment-details-status">
          <div class="panel-heading">
            <h3 class="panel-title"><?=Yii::t("payment", "Last Payment") ?></h3>
          </div>
          <?php foreach($allPaymentThisYear as $payment) {?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordred table-striped">
                      <tbody>
                        <tr>
                          <th>Status</th>
                          <th><?=$payment->status?></th>
                        </tr>
                        <tr>
                          <th>Transaction Date</th>
                          <td><?=date("d/m/Y h:i A",strtotime($payment->tran_date))?></td>
                        </tr>
                        <tr>
                          <th>Tax Year</th>
                          <td><?=$payment->payment_year?></td>
                        </tr>
          
                        <tr>
                          <th>Transaction ID</th>
                          <td><?=$payment->tran_id?></td>
                        </tr>
                        <tr>
                          <th>Amount</th>
                          <td><?=$payment->amount?></td>
                        </tr>
                        <tr>
                          <th>Currency</th>
                          <td><?=$payment->currency?></td>
                        </tr>
                        <tr>
                          <th>Card Type</th>
                          <td><?=$payment->card_type?></td>
                        </tr>
                        <tr>
                          <th>Card Issuer</th>
                          <td><?=$payment->card_issuer?></td>
                        </tr>
                        
                        <tr>
                          <th>Bank Transaction ID</th>
                          <td><?=$payment->bank_tran_id?></td>
                        </tr>
                        
                        <?php if ($payment->error != "") : ?>
                        <tr>
                          <th>Error</th>
                          <td><?=$payment->error?></td>
                        </tr>
                        <?php endif; ?>
                        
                      </tbody>
          
                    </table>
                  </div>
            </div>
          <?php }?>
        </div>
        
        <div class="login-button input-group">

      
      <div class="back pull-right">
        <a class="btn btn-success for-clr"  href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/finalReview/print" "><i class="fa"><span class="previous-text"> <?=Yii::t("liability", "Go to Submit") ?></span></i> <i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="clearfix"></div>

      </div>
    <?php endif; ?>
  </div>
</div>
    


</div>

<?php 
$PlanId = '';
if(Isset($NewPlanId)){
    $PlanId = $NewPlanId;
}else{
    $PlanId = $individualPlanlist[0]['plan_id'];
}

?>
<script type="text/javascript">

  $(document).ready(function() {
    $('.payment-methode-wrapping a').attr('onclick','stopMoving(this)');
    $('.payment-methode-wrapping a').click(function (e) {
        e.preventDefault();
    });

    
    var planId = '<?php echo $PlanId;?>';
    //alert(planId);

    if(planId){
        var loadurl = "<?php echo Yii::app()->baseUrl.'/index.php/payment/LoadPaymentData'?>";
        var loadingurl = "<?php echo Yii::app()->baseUrl.'/images/loading.gif'?>";
        loadpayment(planId,loadurl,loadingurl);
    }

    $('.user_plan_box').live('change', function() {

    $('.user_plan_box').not(this).prop('checked', false);
    if($(this).prop("checked") == false){
      $(this).prop('checked', true);
    }
    var loadurl = "<?php echo Yii::app()->baseUrl.'/index.php/payment/LoadPaymentData'?>";
    var loadingurl = "<?php echo Yii::app()->baseUrl.'/images/loading.gif'?>";
    loadpayment($(this).val(),loadurl,loadingurl);
     
    });

  });

  function updgradePlan(plan_id,parentid){
    var loadurl = "<?php echo Yii::app()->baseUrl.'/index.php/payment/LoadUpgradePaymentData'?>";
    var loadingurl = "<?php echo Yii::app()->baseUrl.'/images/loading.gif'?>";
    //alert(parentid);
    loadpaymentUpgrade(plan_id, parentid,loadurl,loadingurl);
  }

  function stopMoving(d) {
    var atLeastOneIsChecked = 0;
    $('.user_plan_box').each(function () {
    if ($(this).is(':checked')) {
      atLeastOneIsChecked = 1;
      // Stop .each from processing any more items
      //return false;
    }
    });
    if ( $("#t_and_c").prop('checked') == true ) {
      if(atLeastOneIsChecked==0){
        bootbox.alert("Please select your service plan.");
      }else{
        window.location.href = d.href;
      }
    }
    else {
      bootbox.alert("Please accept Terms and Conditions to proceed.");
    }
  }
  
  function submitVoucherCode(id) {
    $('#loading').css('display','block');
    $("#showPaymentLink").html("");
    $.ajax({
      url : "<?=Yii::app()->baseUrl.'/index.php/Voucher/redeem'?>",
      type : "POST",
      dataType : "json",
      cache : false,
      data : { 
        'id': id,
        'code': $("#giftVoucherCode").val()
      },
      success : function(data) {
        if (data.status == "success") {
          bootbox.alert(data.msg, function(){
            location.reload(true); 
          });
        }
        else {
          bootbox.alert(data.msg);
        }
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        bootbox.alert("Internal problem has been occurred. Please try again.");
        $('#loading').css('display','none');
      },
      complete : function()
      {
        $('#loading').css('display','none');
      }
    });
  }
</script>

<?php if($sthowUpgradeBox&&$loadUpgradebox){
//echo $loadUpgradebox;

 ?>
 
<script type="text/javascript">

  $(document).ready(function() {
    //alert('HI');
      var loadurl = "<?php echo Yii::app()->baseUrl.'/index.php/payment/LoadUpgradePaymentData'?>";
      var loadingurl = "<?php echo Yii::app()->baseUrl.'/images/loading.gif'?>";
      //alert(parentid);
      loadpaymentUpgrade('<?php echo $userCurrentPlanid;?>', '<?php echo $userPlanParentid;?>',loadurl,loadingurl);

  })
</script>
<?php } ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/payment/py.js?v=<?=$this->v?>"></script>
<style type="text/css">
  .plan-text{text-align: left !important;}
  .plan-checkbox-container{width:50px;}
  .plan-highlighter{position: absolute;
    margin-top: 1px;
    left: 151px;
    font-size: 10px;
    color: red;}
    .back .for-clr{height: 40px;}
    plan-highlighter1{font-size: 15px;}
    .plan-checkbox-container{width: 30px;}
    .payment-details tbody tr:nth-child(1) td, .payment-details tbody tr:nth-child(2) td, .payment-details tbody tr:nth-child(3) td, .payment-details tbody tr:nth-child(4) td{padding: 5px;}
</style>




