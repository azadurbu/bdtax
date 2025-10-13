<?php
if(Yii::app()->user->hasFlash('alert_success')) 
  $flash = Yii::app()->user->getFlash('alert_success');
else
  $flash = "";

//COUNTS FOR TAB CHECKBOX
$MortgagesOnPropertyCount = $this->checkActiveInactive($model, "MortgagesOnPropertyConfirm", "MortgagesOnPropertyFOrT", "LiaMortgagesOnProperty", "MortgagesOnPropertyTotal");

$UnsecuredLoansCount = $this->checkActiveInactive($model, "UnsecuredLoansConfirm", "UnsecuredLoansFOrT", "LiaUnsecuredLoans", "UnsecuredLoansTotal");

$BankLoansCount = $this->checkActiveInactive($model, "BankLoansConfirm", "BankLoansFOrT", "LiaBankLoans", "BankLoansTotal");

$OthersLoanCount = $this->checkActiveInactive($model, "OthersLoanConfirm", "OthersLoanFOrT", "LiaOthersLoan", "OthersLoanTotal");
//END OF COUNTS FOR TAB CHECKBOX

//DATA FOR MULTIPLE ENTRY
$MortgagesOnPropertyList = LiaMortgagesOnProperty::model()->findAllByAttributes(array('LiabilityId' => $model->LiabilityId));

$UnsecuredLoansList = LiaUnsecuredLoans::model()->findAllByAttributes(array('LiabilityId' => $model->LiabilityId));

$BankLoansList = LiaBankLoans::model()->findAllByAttributes(array('LiabilityId' => $model->LiabilityId));

$OthersLoanList = LiaOthersLoan::model()->findAllByAttributes(array('LiabilityId' => $model->LiabilityId));


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'liabilities-form',
  'enableAjaxValidation'=>false,
  )); 
echo $form->hiddenField($model,'LiabilityId'); 
?>

<div class="reg-form income-dashbord nav-tabs-sticky">
  <div role="tabpanel" id="liabilities_tab">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
      
      <li role="presentation" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.1")?>" class="active"><a href="#mortgages_on_property" role="tab" data-toggle="tab"> <?=($MortgagesOnPropertyCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("liability","Mortgages") ?></a></li>

      <li role="presentation" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.2")?>"><a href="#unsecured_loans" role="tab" data-toggle="tab"> <?=($UnsecuredLoansCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("liability","Unsecured Loans") ?></a></li>

      <li role="presentation" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.3")?>"><a href="#bank_loans" role="tab" data-toggle="tab"> <?=($BankLoansCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("liability","Bank Loans") ?></a></li>

      <li role="presentation" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.4")?>"><a href="#others_loan" role="tab" data-toggle="tab"> <?=($OthersLoanCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("liability","Others Liabilities") ?></a></li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="back pull-right">
       <a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/liabilities/review" ><span class="previous-text"> Review </span><i class="glyphicon glyphicon-list-alt"></i></a>
     </div>
     
<div role="tabpanel" class="tab-pane active" id="mortgages_on_property" style="text-align: center !important;">
<!-- 
##############################################################################
***************** Mortgages On Property ********************
##############################################################################
-->
<h2><?=Yii::t("liability","Mortgages Liabilities")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.1")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- FLASH MESSAGE -->
<div class="flash_alert">
  <?php if($flash != ""): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?=$flash?>
    </div>
  <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="mortgages_on_property_verification" style="display: <?=($model->MortgagesOnPropertyConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("liability","Did you have any mortgage liabilities")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->MortgagesOnPropertyConfirm == 'No')
    echo "<br>" . Yii::t("liability","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('mortgages_on_property_verification', 'mortgages_on_property_fraction_or_total', 'mortgages_on_property_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("liability","YES")?></button>
      <button onclick="set_no('MortgagesOnProperty')" type="button" class="btn btn-big btn-danger"><?=Yii::t("liability","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="mortgages_on_property_fraction_or_total" style="display: <?=($model->MortgagesOnPropertyConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="mortgages_on_property_total" style="display: <?=($model->MortgagesOnPropertyFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->MortgagesOnPropertyTotal == "") ? "" : Yii::t("liability","Current value is") . " " .$model->MortgagesOnPropertyTotal. ". " . Yii::t("liability","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("liability","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('mortgages_on_property_total', 'mortgages_on_property_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("liability","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("liability","Please enter your mortgage liabilities")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'MortgagesOnPropertyTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("liability","Mortgage Liabilities")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('MortgagesOnProperty')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_liabilities('MortgagesOnProperty')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="mortgages_on_property_fraction" style="display: <?=($model->MortgagesOnPropertyFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="mortgages_on_property_table">
    <thead>
      <tr>
        <th><?=Yii::t("liability","Description")?></th>
        <th><?=Yii::t("liability","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($MortgagesOnPropertyList as $value) {
        echo "<tr id='MortgagesOnProperty_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"LiaMortgagesOnProperty\", \"mortgages_on_property\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"LiaMortgagesOnProperty\", \"MortgagesOnProperty\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="mortgages_on_property_id">
            <textarea id="mortgages_on_property_description" class="form-control" rows="3" placeholder="<?=Yii::t("liability","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="mortgages_on_property_cost" placeholder="<?=Yii::t("liability","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_liabilities_fraction('mortgages_on_property_id', 'mortgages_on_property_description', 'mortgages_on_property_cost', 'LiaMortgagesOnProperty', 'MortgagesOnProperty')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-right">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#unsecured_loans" onclick="next_pre('unsecured_loans')" ><span class="previous-text"> <?=Yii::t("liability","Next")?> </span><i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


<div role="tabpanel" class="tab-pane" id="unsecured_loans" style="text-align: center !important;">
<!-- 
##############################################################################
***************** Unsecured loans Liabilities ********************
##############################################################################
-->
<h2><?=Yii::t("liability","Unsecured loans Liabilities")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.2")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- FLASH MESSAGE -->
<div class="flash_alert">
  <?php if($flash != ""): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?=$flash?>
    </div>
  <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="unsecured_loans_verification" style="display: <?=($model->UnsecuredLoansConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("liability","Did you have any unsecured loan liabilities")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->UnsecuredLoansConfirm == 'No')
    echo "<br>" . Yii::t("liability","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('unsecured_loans_verification', 'unsecured_loans_fraction_or_total', 'unsecured_loans_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("liability","YES")?></button>
      <button onclick="set_no('UnsecuredLoans')" type="button" class="btn btn-big btn-danger"><?=Yii::t("liability","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="unsecured_loans_fraction_or_total" style="display: <?=($model->UnsecuredLoansConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="unsecured_loans_total" style="display: <?=($model->UnsecuredLoansFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->UnsecuredLoansTotal == "") ? "" : Yii::t("liability","Current value is") . " " .$model->UnsecuredLoansTotal. ". " . Yii::t("liability","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("liability","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('unsecured_loans_total', 'unsecured_loans_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("liability","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("liability","Please enter your unsecured loan liabilities")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'UnsecuredLoansTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("liability","Unsecured loans")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('UnsecuredLoans')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_liabilities('UnsecuredLoans')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="unsecured_loans_fraction" style="display: <?=($model->UnsecuredLoansFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="unsecured_loans_table">
    <thead>
      <tr>
        <th><?=Yii::t("liability","Description")?></th>
        <th><?=Yii::t("liability","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($UnsecuredLoansList as $value) {
        echo "<tr id='UnsecuredLoans_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"LiaUnsecuredLoans\", \"unsecured_loans\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"LiaUnsecuredLoans\", \"UnsecuredLoans\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="unsecured_loans_id">
            <textarea id="unsecured_loans_description" class="form-control" rows="3" placeholder="<?=Yii::t("liability","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="unsecured_loans_cost" placeholder="<?=Yii::t("liability","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_liabilities_fraction('unsecured_loans_id', 'unsecured_loans_description', 'unsecured_loans_cost', 'LiaUnsecuredLoans', 'UnsecuredLoans')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#mortgages_on_property" onclick="next_pre('mortgages_on_property')" ><i class="fa fa-chevron-left"></i> <span class="previous-text">  <?=Yii::t("liability","Previous")?> </span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#bank_loans" onclick="next_pre('bank_loans')" ><span class="previous-text"> <?=Yii::t("liability","Next")?> </span> <i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


<div role="tabpanel" class="tab-pane" id="bank_loans" style="text-align: center !important;">
<!-- 
##############################################################################
***************** BankLoans Liability ********************
##############################################################################
-->
<h2><?=Yii::t("liability","Bank Loans")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.3")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- FLASH MESSAGE -->
<div class="flash_alert">
  <?php if($flash != ""): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?=$flash?>
    </div>
  <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="bank_loans_verification" style="display: <?=($model->BankLoansConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("liability","Did you have any bank loan liabilities")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->BankLoansConfirm == 'No')
    echo "<br>" . Yii::t("liability","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('bank_loans_verification', 'bank_loans_fraction_or_total', 'bank_loans_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("liability","YES")?></button>
      <button onclick="set_no('BankLoans')" type="button" class="btn btn-big btn-danger"><?=Yii::t("liability","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="bank_loans_fraction_or_total" style="display: <?=($model->BankLoansConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="bank_loans_total" style="display: <?=($model->BankLoansFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->BankLoansTotal == "") ? "" : Yii::t("liability","Current value is") . " " .$model->BankLoansTotal. ". " . Yii::t("liability","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("liability","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('bank_loans_total', 'bank_loans_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("liability","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("liability","Please enter your bank loan liabilities")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'BankLoansTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("liability","BankLoans Liability")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('BankLoans')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_liabilities('BankLoans')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="bank_loans_fraction" style="display: <?=($model->BankLoansFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="bank_loans_table">
    <thead>
      <tr>
        <th><?=Yii::t("liability","Description")?></th>
        <th><?=Yii::t("liability","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($BankLoansList as $value) {
        echo "<tr id='BankLoans_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"LiaBankLoans\", \"bank_loans\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"LiaBankLoans\", \"BankLoans\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="bank_loans_id">
            <textarea id="bank_loans_description" class="form-control" rows="3" placeholder="<?=Yii::t("liability","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="bank_loans_cost" placeholder="<?=Yii::t("liability","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_liabilities_fraction('bank_loans_id', 'bank_loans_description', 'bank_loans_cost', 'LiaBankLoans', 'BankLoans')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#unsecured_loans" onclick="next_pre('unsecured_loans')" ><i class="fa fa-chevron-left"></i> <span class="previous-text">  <?=Yii::t("liability","Previous")?> </span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#others_loan" onclick="next_pre('others_loan')" ><span class="previous-text"> <?=Yii::t("liability","Next")?> </span> <i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>



<div role="tabpanel" class="tab-pane" id="others_loan" style="text-align: center !important;">
<!-- 
##############################################################################
***************** Others Liabilities ********************
##############################################################################
-->
<h2><?=Yii::t("liability","Others Liabilities")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"5.4")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- FLASH MESSAGE -->
<div class="flash_alert">
  <?php if($flash != ""): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?=$flash?>
    </div>
  <?php endif; ?>
</div>
<!-- END - FLASH MESSAGE -->

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="others_loan_verification" style="display: <?=($model->OthersLoanConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("liability","Did you have any other liabilities")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->OthersLoanConfirm == 'No')
    echo "<br>" . Yii::t("liability","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('others_loan_verification', 'others_loan_fraction_or_total', 'others_loan_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("liability","YES")?></button>
      <button onclick="set_no('OthersLoan')" type="button" class="btn btn-big btn-danger"><?=Yii::t("liability","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="others_loan_fraction_or_total" style="display: <?=($model->OthersLoanConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="others_loan_total" style="display: <?=($model->OthersLoanFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->OthersLoanTotal == "") ? "" : Yii::t("liability","Current value is") . " " .$model->OthersLoanTotal. ". " . Yii::t("liability","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("liability","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('others_loan_total', 'others_loan_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("liability","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("liability","Please enter your Other liabilities")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'OthersLoanTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("liability","OthersLoan Liability")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('OthersLoan')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_liabilities('OthersLoan')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="others_loan_fraction" style="display: <?=($model->OthersLoanFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="others_loan_table">
    <thead>
      <tr>
        <th><?=Yii::t("liability","Description")?></th>
        <th><?=Yii::t("liability","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($OthersLoanList as $value) {
        echo "<tr id='LiaOthersLoan_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"LiaOthersLoan\", \"others_loan\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"LiaOthersLoan\", \"OthersLoan\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="others_loan_id">
            <textarea id="others_loan_description" class="form-control" rows="3" placeholder="<?=Yii::t("liability","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="others_loan_cost" placeholder="<?=Yii::t("liability","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_liabilities_fraction('others_loan_id', 'others_loan_description', 'others_loan_cost', 'LiaOthersLoan', 'OthersLoan')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
    <div class="back pull-left">
      <a class="btn btn-success for-clr" data-toggle="tab" href="#bank_loans" onclick="next_pre('child_edu_expenses')" ><i class="fa fa-chevron-left"></i><span class="previous-text">  <?=Yii::t("liability","Previous")?> </span></a>
    </div>
    <div class="back pull-right">
      
    </div>
  <div class="clearfix"></div>
  </div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>






</div>
</div>
</div>

<?php $this->endWidget(); ?>