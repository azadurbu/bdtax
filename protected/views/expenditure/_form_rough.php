<?php 

//COUNTS FOR TAB CHECKBOX
$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

if($model->TotalTaxPaidLastYear == "") $TaxPaidLastYearCount = 0;
else $TaxPaidLastYearCount = 1;

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "ExpFestivalOtherSpecial", "FestivalOtherSpecialTotal");

$FestivalOtherSpecialCount = $this->checkActiveInactive($model, "FestivalOtherSpecialConfirm", "FestivalOtherSpecialFOrT", "Expersonal_foodingstivalOtherSpecial", "FestivalOtherSpecialTotal");
//END OF COUNTS FOR TAB CHECKBOX

//DATA FOR MULTIPLE ENTRY
$FestivalOtherSpecialList = ExpFestivalOtherSpecial::model()->findAllByAttributes(array('ExpenditureId' => $model->ExpenditureId));

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'expenditure-form',
  'enableAjaxValidation'=>false,
  )); 
echo $form->hiddenField($model,'ExpenditureId'); 
?>

<div class="reg-form income-dashbord nav-tabs-sticky">
  <div role="tabpanel" id="expenditure_tab">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
      
      <li role="presentation" class="active"><a href="#personal_food_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Personal or Food") ?></a></li>

      <li role="presentation"><a href="#total_tax_paid_last_year" role="tab" data-toggle="tab"> <?=($TaxPaidLastYearCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Total Tax Paid") ?></a></li>

      <li role="presentation"><a href="#festival_other_special_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","FestivalOtherSpecial") ?></a></li>

      <li role="presentation"><a href="#FestivalOtherSpecialation_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","FestivalOtherSpecialation") ?></a></li>

      <li role="presentation"><a href="#electricity_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Electricity") ?></a></li>

      <li role="presentation"><a href="#water_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Water") ?></a></li>
      
      <li role="presentation"><a href="#gas_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Gas") ?></a></li>
      
      <li role="presentation"><a href="#telephone_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Telephone") ?></a></li>

      <li role="presentation"><a href="#child_edu_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Children Education") ?></a></li>

      <li role="presentation"><a href="#foreign_travel_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Foreign Travel") ?></a></li>

      <li role="presentation"><a href="#festival_other_expenses" role="tab" data-toggle="tab"> <?=($FestivalOtherSpecialCount == 0) ? '':'<i class="fa fa-check-square"></i> ' ?> <?=Yii::t("expense","Festival & Other") ?></a></li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
  <div class="back pull-right">
     <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/review" ><span class="previous-text"> Review </span><i class="glyphicon glyphicon-list-alt"></i></a>
  </div>
  


<div role="tabpanel" class="tab-pane" id="festival_other_expenses" style="text-align: center !important;">
<!-- 
##############################################################################
***************** Festival and Other Special Expenses ********************
##############################################################################
-->
<h2><?=Yii::t("expense","Festival and Other Special Expenses")?></h2>                                   
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
<div id="festival_other_special_verification" style="display: <?=($model->FestivalOtherSpecialConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("expense","Did you have any festival or other special expenses")?>? 
  </p>
  <?php
        // IF THE ANSWER IS "NO"
  if($model->FestivalOtherSpecialConfirm == 'No')
    echo "<br>" . Yii::t("expense","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('festival_other_special_verification', 'festival_other_special_fraction_or_total', 'festival_other_special_total')" type="button" class="btn btn-big btn-success"><?=Yii::t("expense","YES")?></button>
      <button onclick="set_no('FestivalOtherSpecial')" type="button" class="btn btn-big btn-danger"><?=Yii::t("expense","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="festival_other_special_fraction_or_total" style="display: <?=($model->FestivalOtherSpecialConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="festival_other_special_total" style="display: <?=($model->FestivalOtherSpecialFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->FestivalOtherSpecialTotal == "") ? "" : Yii::t("expense","Current value is") . " " .$model->FestivalOtherSpecialTotal. ". " . Yii::t("expense","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("expense","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('festival_other_special_total', 'festival_other_special_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("expense","Breakdown")?></button>
  
  <!-- ENTRY FORM -->
  <p><?=Yii::t("expense","Please enter your festival or other special expenses")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'FestivalOtherSpecialTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("expense","FestivalOtherSpecial Expenses")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('FestivalOtherSpecial')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_expenditure('FestivalOtherSpecial')" type="button" >Store</button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="festival_other_special_fraction" style="display: <?=($model->FestivalOtherSpecialFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="festival_other_special_table">
    <thead>
      <tr>
        <th><?=Yii::t("expense","Description")?></th>
        <th><?=Yii::t("expense","Value")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($FestivalOtherSpecialList as $value) {
        echo "<tr id='ExpFestivalOtherSpecial_row_".$value->Id."'>";
        echo "<td>".$value->Description."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"ExpFestivalOtherSpecial\", \"festival_other_special\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"ExpFestivalOtherSpecial\", \"FestivalOtherSpecial\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="festival_other_special_id">
            <textarea id="festival_other_special_description" class="form-control" rows="3" placeholder="<?=Yii::t("expense","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="festival_other_special_cost" placeholder="<?=Yii::t("expense","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  
  <button class="btn btn-success btn-lg" onclick="save_expenditure_fraction('festival_other_special_id', 'festival_other_special_description', 'festival_other_special_cost', 'ExpFestivalOtherSpecial', 'FestivalOtherSpecial')" type="button" >Store</button>
  
  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
    <div class="back pull-left">
      <a data-toggle="tab" href="#foreign_travel_expenses" onclick="next_pre('child_edu_expenses')" ><i class="fa fa-chevron-left"></i><span class="previous-text">  <?=Yii::t("expense","Previous")?> </span></a>
    </div>
    <div class="back pull-right">
     <a href="<?=Yii::app()->baseUrl ?>/index.php/expenditure/review" ><span class="previous-text"> Review </span><i class="fa fa-chevron-right"></i></a>
    </div>
  <div class="clearfix"></div>
  </div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>





  </div>
</div>

<?php $this->endWidget(); ?>