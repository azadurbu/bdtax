  <style>
    .icon-gmail{ background: url("../../img/gmail2.png") no-repeat; padding: 0 0 0 30px; background-position: left;  }
  </style>
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css"/>
    
 <div id="fb-root"></div> 
  <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>
<?php

$userSelection =$this->userFromSelection(Yii::app()->user->id,$this->taxYear());
$total = ($this->personalInformationStatusBar()+$this->incomeStatusBar()+$this->expenseStatusBar()+$this->assetsStatusBar()+$this->liabilityStatusBar())/5;
?>
<div id="home-mid" class="reg-form income-dashbord">
  <div class="home_icon-box home_icon-7"></div>
  <h4 style="color:#b90601; text-transform:uppercase; font-size:26px; font-weight:bold;"><?=Yii::t("liability", "Submit") ?></h4>

  <div class="clearfix"></div>

<!-- THIS ALERT IS FOR PAYMENT ALERT -->
<?php
  if(Yii::app()->user->hasFlash('payment_success')) {
?>
    <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('payment_success')?></div>
<?php
    } else if(Yii::app()->user->hasFlash('payment_error')) {
?>
    <div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('payment_error')?></div>
<?php
    }
?>

<!-- THIS ALERT IS COMMON ALERT -->
<?php
  if(Yii::app()->user->hasFlash('success')) {
?>
    <div class="flash_alert"><div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('success')?></div></div>
<?php
    } else if(Yii::app()->user->hasFlash('error')) {
?>
    <div class="flash_alert"><div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('error')?></div></div>
<?php
    }
?>

 <?php 
      $userpk = '';
      if(isset($UserPlan)){
         $userpk = $UserPlan->plan_id;
         
      }
      
      ?>  
     
   



<?php if($total == 100) : ?>
  <p><?=Yii::t("liability", "Congratulations! You have completed all the steps to complete your income tax preparation. Please follow the steps below to download your income tax return form. Thank you.") ?></p>
<?php else : ?>
  <p style="color: #B90601">
    <?=Yii::t("liability", "The whole process of your tax submission has not been completed yet.") ?>
    <br/>
      <?=Yii::t("liability", "Completing all steps will ensure proper tax calculation and may also reduce your tax amount owed.") ?>
      <br/>
    <?php if(isset($userSelection->type) && $userSelection->type==2){ ?>
    <?=Yii::t("liability", "Please <a href='finalReview'  style='color: #3c763d' class='reviewLink'>complete</a> all the steps before you download your income tax return form.") ?>
    <?php }else{ ?>
      <?=Yii::t("liability", "Please complete all the steps before you download your income tax return form."); ?>
    <?php } ?>
  </p>

<?php endif; ?>

<?php if($totalAdjustment>0){ ?>
<p><br><?=Yii::t("liability", "You have to pay <strong>".number_format($totalAdjustment).htmlentities(strip_tags($this->currency))."</strong> to the government. Please make a payorder<br/> in favor of Deputy Commissioner of Taxes, Circle - ". htmlentities(strip_tags(@$personal_info_model->TaxesCircle)).', Zone - '. htmlentities(strip_tags(@$personal_info_model->TaxesZone))) ?></p>
  
<?php }?>
<br/>
<?php if($userpk!=''){?>
<div class="alert alert-danger" style="margin:10px 13%">

    <!-- p style="color:##3c763d;font-size: 16px;" -->
        <p style="color:#B90601;">
      <?php if($userpk==1||$userpk==2){?>
        <?=Yii::t("liability", "Thank you for purchasing our Standard service. Now please download your tax return file in PDF from Step 3, gather required documents and submit your return to your tax circle.") ?>

        <?php }elseif($userpk==4||$userpk==8){?>
        <?=Yii::t("liability", "Thank you for purchasing our Deluxe service. Now please upload the required documents from Step 2. Our tax experts will review your file and will get back to you for any further questions.") ?>
        <?php }elseif($userpk==5||$userpk==9){ ?>
          <?=Yii::t("liability", "Thank you for purchasing our Premium service. Now please add your signature from Step 2 and upload your required documents from Step 3. Our tax experts will review your file and will get back to you for any further questions.") ?>
        <?php }elseif($userpk==3){?>
           <?=Yii::t("liability", "Thank you for purchasing our Simple service. Now please download your tax return file in PDF from Step 3, gather required documents and submit your return to your tax circle.");?>
        <?php }elseif($userpk==6){?>
          <?=Yii::t("liability", "Thank you for purchasing our Pro service. Now please upload the required documents from Step 2. Our tax experts will review your file and will get back to you for any further questions.") ?>
        <?php }elseif($userpk==10||$userpk==11||$userpk==12){ 

            ?>
            <?=Yii::t("liability", "Thank you for purchasing our Plus service. Now please add your signature from Step 2 and upload all your required documents from Step 3. Our tax experts will complete your file and will let you know soon.") ?>
        <?php }else{ ?>
          <?=Yii::t("liability", "Thank you for purchasing our Plus service. Now please add your signature from Step 2 and upload the required documents from Step 3. Our tax experts will review your file and will get back to you for any further questions.") ?>
        <?php } ?>
        </p>
      </div>
<?php } ?>
<div class="row">
<?php $step = 0; 



if ( isset(Yii::app()->request->cookies['language']) &&  Yii::app()->request->cookies['language'] == "bn") $div = 5;
else $div = 4;

?>
    <div class="col-lg-<?=$div?> print-button col-center-block" style="text-align: center;">
    <!-- <div class="btn btn-success" style="margin-bottom: 10px;">
      <label class="checkbox-inline"><input type="checkbox" id="82bbcheck" <?php if(isset($data82bb) && $data82bb->checked==1) echo 'checked'?>>Return submitted under section 82BB </label>
    </div> -->
    <?php 
    $data82bbChecked = 1;
    if(isset($data82bb)){
      if($data82bb->checked==1){
        $data82bbChecked = 1;
      }else{
        $data82bbChecked = 0;
      }
    }?>
    <a class="btn btn-success" style="margin-bottom: 10px;">
      <div class="checkbox checkbox-success-82bb">
          <input id="82bbcheck" class="styled" type="checkbox"<?php if($data82bbChecked || (isset($userSelection->type) && $userSelection->type==1)) echo 'checked'?>>
          <label for="82bbcheck">
            <?php if(isset($userSelection->type) && $userSelection->type==1){ ?>
            <?=Yii::t("liability", "Return Submitted Under Section 82BB") ?>
          <?php }else{ ?>
            <?=Yii::t("liability", "Return Submitted Under Section 82BB") ?>
           <?php } ?> 
            
          </label>
      </div>
    </a>

    
    <div class="clearfix"></div>
    <?php

      $pinfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
      $org_plan = 'Trial';
      if(!empty($pinfo->org_id)){

        $org = Organizations::model()->findByPk($pinfo->org_id);
        $org_plan = $org->org_plan;
      }
     
     if (Yii::app()->user->role == 'customers' && $org_plan == 'Trial'): ?>
      <?php 
      $userSelection =$this->userFromSelection(Yii::app()->user->id,$this->taxYear());
                       
      $pk = 3;          
                //if(round($this->TaxLeviableOnTotalIncome(Yii::app()->user->CPIId)) > 0){
      if(isset($userSelection->type) && $userSelection->type==2){
     
        $pk = 1;
      }
      
      if(isset($UserPlan)){
          $pk = $UserPlan->plan_id;
      }
      $individual_plan = IndividualPlan::model()->findByPk($pk);
      ?>  
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/payment" class="btn btn-success" style="margin-bottom: 10px;"><span><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Pay BDTax Fee"); ?></span>
      <?php //$individual_plan->price.Yii::t("liability", " Taka Only)") ?>
    <?php endif; ?>

      <?php 
        if(isset($UserPlan)) :
      ?>
        <i class="fa fa-check-square"></i> 
        
      <?php 
        endif;
      ?>
      <div class="clearfix"></div>
      </a>

      
      
      <?php if(isset($UserPlan) && ( $UserPlan->plan_id ==5||  $UserPlan->plan_id ==7 || $UserPlan->plan_id ==9|| $UserPlan->plan_id ==11|| $UserPlan->plan_id ==12|| $UserPlan->plan_id ==10)){?>
      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/userSignature" class="btn btn-success" style="margin-bottom: 10px;"><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Add Your Signature") ?>
      <?php $sign = $this->userCurrentSignature();
            if($sign){ echo '<i class="fa fa-check-square"></i>';}
        ?>
    </a>
      <?php } ?>

      <?php if(isset($UserPlan) && ($UserPlan->plan_id ==4 || $UserPlan->plan_id ==5|| $UserPlan->plan_id ==6 || $UserPlan->plan_id ==7|| $UserPlan->plan_id ==8 || $UserPlan->plan_id ==9|| $UserPlan->plan_id ==10|| $UserPlan->plan_id ==11|| $UserPlan->plan_id ==12)){?>

          <a  href="<?php echo Yii::app()->baseUrl; ?>/index.php/userFile"  class="btn btn-success" style="margin-bottom: 10px;"><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Upload Required Documents") ?>
          <?php $sign = $this->getUserFiles();
            if($sign){ echo '<i class="fa fa-check-square"></i>';}
          ?>
          </a>

      <?php }else{?>
             <a data-toggle="modal" data-target="#requiredDocuments" href="#" target="_blank" class="btn btn-success" style="margin-bottom: 10px;"><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Gather Required Documents") ?></a>
      <?php } ?>
      
      <?php if(isset($userSelection->type) && $userSelection->type==1){ ?>
              <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/viewSinglePdf" target="<?=( (Yii::app()->user->role == 'customers' && $openInNewTab == true) || ( (Yii::app()->user->role == 'companyAdmin' || Yii::app()->user->role == 'companyUser') && Yii::app()->user->org_plan != 'Trial') ) ? '_blank' : '_self'?>" class="btn btn-success" style="margin-bottom: 10px;"><span><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Download Tax Return Form (PDF)") ?></span>
            <?php 
              if ($userStatistic->pdf_print_count > 0  && $openInNewTab == true):
            ?>
              <i class="fa fa-check-square"></i>
            <?php 
              endif;
            ?>
            <div class="clearfix"></div>
            </a>                  
      <?php }else{ ?>
            <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/viewPdf" target="<?=( (Yii::app()->user->role == 'customers' && $openInNewTab == true) || ( (Yii::app()->user->role == 'companyAdmin' || Yii::app()->user->role == 'companyUser') && Yii::app()->user->org_plan != 'Trial') ) ? '_blank' : '_self'?>" class="btn btn-success" style="margin-bottom: 10px;"><span><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Download Tax Return Form (PDF)") ?></span>
            <?php 
              if ($userStatistic->pdf_print_count > 0  && $openInNewTab == true):
            ?>
              <i class="fa fa-check-square"></i>
            <?php 
              endif;
            ?>
            <div class="clearfix"></div>
            </a>
      <?php } ?>
      
      
      <?php if(isset($UserPlan) && ($UserPlan->plan_id ==6 || $UserPlan->plan_id ==7 || $UserPlan->plan_id ==4 || $UserPlan->plan_id ==5 || $UserPlan->plan_id ==8 || $UserPlan->plan_id ==9|| $UserPlan->plan_id ==10|| $UserPlan->plan_id ==11|| $UserPlan->plan_id ==12)){?>
           <a title="<?=Yii::t("liability", "Redirect to NBR website for epay") ?>" data-target="#referFriendModal" data-toggle="modal"  href="https://nbr.sblesheba.com/IncomeTax/Payment" target="_blank" class="btn btn-success"><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Pay NBR through NBR payment gateway") ?></a>
           
           

      <?php }else{?>
      
          <a data-toggle="modal" data-target="#nbrAddress" href="#" target="_blank" class="btn btn-success"><b><?=Yii::t("liability", "Step") ?> <?=Yii::t("liability", ++$step) ?>:</b> <?=Yii::t("liability", "Find Your Local NBR Office") ?></a>
      <?php } ?>

      
    </div>
 <div class="col-lg-6 print-button col-center-block ack-container" style="text-align: center;">
    <?php 
      //$pinfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
      if(!empty($pinfo->org_id) && $pinfo->org_id!=534){
        $org = Organizations::model()->findByPk($pinfo->org_id);

      ?>
  
  <p><?=Yii::t("liability", "If you just want to upload your acknowledgement slip for your company, ") ?><strogn style="color:red;"><?php echo $org->organization_name;?></strogn><?=Yii::t("liability", ", please click on the button below") ?></p>
      <div class="col-lg-9 print-button col-center-block ack-button-container" style="text-align: center;">
      <a style="text-align: center;" href="<?php echo Yii::app()->baseUrl; ?>/index.php/userAckUp" class="btn btn-success" style="margin-bottom: 10px;"></b> <?=Yii::t("liability", "Upload Ack. Slip") ?>
      <?php //echo '<i class="fa fa-check-square"></i>';?>
      </a>
      </div>
      <?php } ?> 
</div>
  
<?php if (Yii::app()->user->role == "customers") : ?>
<!-- div class="refer-a-friend">
      <div class="col-lg-<?=$div?> col-center-block">
      <a class="btn btn-success btn-lg" onClick='window.open("https://accounts.google.com/o/oauth2/auth?client_id=<?=$this->client_id?>&redirect_uri=<?=$this->redirect_uri?>&scope=https://www.google.com/m8/feeds/&response_type=code","Gmail","width=700,height=500,0,status=0,scrollbars=1");' href="javascript:;" type="button"><span class="icon-gmail"><?=Yii::t('common',"Refer A Friend")?>  </span></a>
      </div>
</div -->
<?php endif; ?>


    <div class="clearfix"></div>
</div>
<br />



      <p style="padding-top:10px;"><?=Yii::t("liability", "Thank you for using bdtax.com.bd.") ?></p>



    <!-- div style="width:250px; margin:auto; padding-top:0px; padding-right: 95px;" id="fb_share">
        <div style="text-align:center;" class="">
          <div class="fb-share-button" data-href="https://bdtax.com.bd/" data-layout="button_count" style="padding-top:10px;"></div>
        </div>
        <div class="clearfix"></div>
    </div -->

</div>


<!-- Modal - refer friend -->
<div class="modal fade in" id="referFriendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content panel panel-success">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
            <h3 class="panel-title"><?=Yii::t("liability", "Pay NBR through NBR payment gateway") ?></h3> 

      </div>
      <div class="modal-body">
        
        <div class="row">

          <div class="col-lg-12">
            <p><?=Yii::t("liability", "When you make a tax payment to NBR, please upload the payment receipt/challan through our Upload Required Document option.") ?></p>
            <p style="margin-top:30px;"><?=Yii::t("liability", "You are now leaving <strong style='color:#1337FF'>bdtax.com.bd</strong> and being redirected to a website that is not operated by <strong style='color:#FF2600'>BD Tax Technology Ltd</strong>. Please be aware, <strong style='color:#FF2600'>BD Tax Technology Ltd</strong> is not responsible for the content or availability of this website and its privacy. We are not liable for any failure of products or services advertised on this website.") ?></p>



            </div>
          </div>

      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="opennewWindow()">Continue</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancel</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal - end of refer friend -->

<!-- Modal - requiredDocuments -->
<div class="modal fade" id="requiredDocuments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel"><strong>Documents/Information to be submitted along with the return:</strong></h3>
      </div>
      <div class="modal-body">
        <ol>
          <li><strong>Salary:</strong><br>
            Salary statement, Bank Statement/Certificate if Bank Account present or Interest income from bank, Proof for Investment allowances (e.g For Life Insurance policy proof of Premium Payment).</li>
          <li><strong>Interest on Securities:</strong><br>
            Photocopy of Bond/Debenture of the year when it was bought, If Interest income then approval from Interest Giving Authority, If Bond/Debenture is bought by Loan from Institution then Bank Statement/Certificate regarding payment of Interest or Approval Certificate from Institution.</li>
          <?php if(isset($userSelection->type) && $userSelection->type==2){?>
                <li><strong>From House Property:</strong><br>
                  Rental Agreement supporting the House Rent or Copy of slip for Rent, Monthly Statement of Rent Received, Bank Statement of the Account in which Rent received, Copy of slip supporting payment of Municipal Tax Land Tax City Corporation Tax, If house bought/constructed on loan from bank then bank statement supporting interest payment, Copy for premium payment for insurance of house property.</li>
          <?php } ?>
                <li><strong>Business or Profession:</strong><br>
              Income statement and Balance sheet of Business/Profession.</li>
          <?php if(isset($userSelection->type) && $userSelection->type==2){?>
                <li><strong>Profit from Partnership Firm:</strong><br>
                Income statement and Balance sheet of Firm.</li>
                
                <li><strong>Capital Gains:</strong><br>
                Copy of deed for sale of immovable property, Photocopy of challan/pay order if any TDS, Documents supporting profit from transactions of share of company listed in stock exchange.</li>
                <li><strong>Other Sources:</strong><br>
                If any cash dividend then bank statement and copy of dividend warrant/certificate, Copy of certificate at the time of interest income or encashment of saving instruments, Bank statement/certificate if interest income from bank, Documents related to any other income.</li>
          <?php } ?>
          <li><strong>Proof of TDS:</strong><br>
            Copy of challan of tax payment, pay order/bank draft/account payee cheque (up to 10,000 payment can be done through treasury challan.above this payment must be done through pay order/bank draft/account payee cheque), Certificate from TDS authority if any TDS.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal - nbrAddress -->
<div class="modal fade" id="nbrAddress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel"><strong>NBR Local Office Details:</strong></h3>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img width="858px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/nbr_contacts.png" />
        </div>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal - nbrAddress -->
<div class="modal fade" id="printAssets" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel"><strong><?=Yii::t("liability", "Asset Details Print Confirmation") ?></strong></h3>
      </div>
      <div class="modal-body">
        <div class="">
          <p><?=Yii::t("liability", "Would you want to print your asset details with the tax return?") ?></p>
          
        </div>
      </div>  
      <div class="modal-footer">
        <a target="_blank" href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/viewSinglePdf" class="btn btn-danger" ><?=Yii::t("income", "No") ?></a>
        <a target="_blank" href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/viewSinglePdfDetails" class="btn btn-success" ><?=Yii::t("liability", "Yes, please") ?></a>
      </div>
    </div>
  </div>
</div>

<?php


?>
<style type="text/css">
#fb_share iframe 
  {
  transform: scale(2);
  -ms-transform: scale(2); 
  -webkit-transform: scale(2); 
  -o-transform: scale(2); 
  -moz-transform: scale(2); 
  transform-origin: top left;
  -ms-transform-origin: top left;
  -webkit-transform-origin: top left;
  -moz-transform-origin: top left;
  -webkit-transform-origin: top left;
  }

  input[type=checkbox] {
    transform: scale(2);
  }

  .checkbox-inline{
    padding-left: 0px;
  }
  .checkbox-inline input[type=checkbox]{
    float: none !important;
  }


  /* ////////////////////////////////////////////// */
  .checkbox {
  padding-left: 20px; 
  margin-top: 0px;
  margin-bottom: 0px;
  }
  .checkbox label {
    display: inline-block;
    vertical-align: middle;
    position: relative;
    padding-left: 10px; }
    .checkbox label::before {
      margin-top: 2px;
      content: "";
      display: inline-block;
      position: absolute;
      width: 19px;
      height: 19px;
      left: 0;
      margin-left: -20px;
      border-radius: 3px;
      background-color: #fff;
      -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
    .checkbox label::after {
      display: inline-block;
      position: absolute;
      width: 16px;
      height: 16px;
      left: 0;
      top: 0;
      margin-left: -20px;
      font-size: 19px;
      color: #5cb85c; }
  .checkbox input[type="checkbox"],
  .checkbox input[type="radio"] {
    opacity: 0;
    z-index: 1; }
    .checkbox input[type="checkbox"]:focus + label::before,
    .checkbox input[type="radio"]:focus + label::before {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px; }
    .checkbox input[type="checkbox"]:checked + label::after,
    .checkbox input[type="radio"]:checked + label::after {
      font-family: "FontAwesome";
      content: "\f00c"; }
    .checkbox input[type="checkbox"]:disabled + label,
    .checkbox input[type="radio"]:disabled + label {
      opacity: 0.65; }
      .checkbox input[type="checkbox"]:disabled + label::before,
      .checkbox input[type="radio"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed; }
  .checkbox.checkbox-circle label::before {
    border-radius: 50%; }
  .checkbox.checkbox-inline {
    margin-top: 0; }




.checkbox-success-82bb input[type="checkbox"]:checked + label::before,
.checkbox-success-82bb input[type="radio"]:checked + label::before {
  background-color: #fff;
  border-color: #fff; }
.checkbox-success-82bb input[type="checkbox"]:checked + label::after,
.checkbox-success-82bb input[type="radio"]:checked + label::after {

  input[type="checkbox"].styled:checked + label:after,
input[type="radio"].styled:checked + label:after {
  font-family: 'FontAwesome';
  content: "\f00c"; }
input[type="checkbox"] .styled:checked + label::before,
input[type="radio"] .styled:checked + label::before {
  color: #fff; }
input[type="checkbox"] .styled:checked + label::after,
input[type="radio"] .styled:checked + label::after {
  color: #fff; }

  /* ////////////////////////////////////////////// */
}

.ack-container{border-top: 1px solid #ddd;margin-top: 60px; padding-top: 30px;}
.ack-button-container{padding-top:20px;}
.ack-button-container a{background: orange  !important;;border:1px solid orange !important;}
</style>

<script>
function opennewWindow(){

  $('#referFriendModal').modal('hide');
  window.open("https://nbr.sblesheba.com/IncomeTax/Payment");
}
$(document).ready(function() {
  $("#check_all").click(function() {
    if ($(this).prop('checked')==true){ 
            $('.email_address').prop('checked', true);
        }
        else {
          $('.email_address').prop('checked', false);
        }
  });

    if ($("#check_all").length != 0) {
        $('#referFriendModal').modal('show');
    }
    
    $('#refer_friend').DataTable({
      "paging":   false,
          "ordering": false,
          "info":     false,
          "fixedHeader": true
    });

});
</script>
<script>
(function(){
    'use strict';
  var $ = jQuery;
  $.fn.extend({
    filterTable: function(){
      return this.each(function(){
        $(this).on('keyup', function(e){
          $('.filterTable_no_results').remove();
          var $this = $(this), 
                        search = $this.val().toLowerCase(), 
                        target = $this.attr('data-filters'), 
                        $target = $(target), 
                        $rows = $target.find('tbody tr');
                        
          if(search == '') {
            $rows.show(); 
          } else {
            $rows.each(function(){
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            })
            if($target.find('tbody tr:visible').size() === 0) {
              var col_count = $target.find('tr').first().find('td').size();
              var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
              $target.find('tbody').append(no_results);
            }
          }
        });
      });
    }
  });
  $('[data-action="filter"]').filterTable();
})(jQuery);

$(function(){
    // attach table filter plugin to inputs
  $('[data-action="filter"]').filterTable();
  
  $('.container').on('click', '.panel-heading span.filter', function(e){
    var $this = $(this), 
      $panel = $this.parents('.panel');
    
    $panel.find('.panel-body').slideToggle();
    if($this.css('display') != 'none') {
      $panel.find('.panel-body input').focus();
    }
  });
  $('[data-toggle="tooltip"]').tooltip();
})

$(document).on("click","#82bbcheck",function(){
		if($(this).is(':checked')){
			chk = 1;
		}else{
			chk = 0;
    }
    $.ajax({
      url : "<?=Yii::app()->baseUrl?>/index.php/finalReview/func82bb",
      type : "get",
      dataType : "json",
      data : {
        check : chk
      },
      success : function(data) {
        // alert(data)
      }
    });
  });
</script>