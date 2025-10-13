<?php
if(Yii::app()->user->hasFlash('alert_success')) 
  $flash = Yii::app()->user->getFlash('alert_success');
else
  $flash = "";

//COUNTS FOR TAB CHECKBOX
$BusinessCapitalCount = $this->checkActiveInactive($model, "BusinessCapitalConfirm", "BusinessCapitalFOrT", "AssetsBusinessCapital", "BusinessCapitalTotal");

$ShareholdingCompanyCount = $this->checkActiveInactive($model, "ShareholdingCompanyConfirm", "ShareholdingCompanyFOrT", "AssetsShareholdingCompanyList", "ShareholdingCompanyTotal");

$NonAgriculturePropertyCount = $this->checkActiveInactive($model, "NonAgriculturePropertyConfirm", "NonAgriculturePropertyFOrT", "AssetsNonAgricultureProperty", "NonAgriculturePropertyTotal");

$AgriculturePropertyCount = $this->checkActiveInactive($model, "AgriculturePropertyConfirm", "AgriculturePropertyFOrT", "AssetsAgricultureProperty", "AgriculturePropertyTotal");

//INVEST DIFFERENT FORMAT
$InvestmentCount = 0;
if($model->InvestmentConfirm == null) {
  $InvestmentCount = 0;
}
elseif($model->InvestmentConfirm == "No") {
  $InvestmentCount = 1;
}
elseif($model->InvestmentConfirm == "Yes") {
  if($model->InvestmentFOrT == "Fraction") {
    $counter = AssetsInvestment::model()->count('AssetsId=:data',array(':data'=>$model->AssetsId));
    if($counter > 0) $InvestmentCount = 1;
  }
  elseif($model->InvestmentFOrT == "Total") {
    $InvestmentCount = 1;
  } 
}

$MotorVehicleCount = $this->checkActiveInactive($model, "MotorVehicleConfirm", "MotorVehicleFOrT", "AssetsMotorVehicles", "MotorVehicleTotal");

$JewelryCount = $this->checkActiveInactive($model, "JewelryConfirm", "JewelryFOrT", "AssetsJewelry", "JewelryTotal");

$FurnitureCount = $this->checkActiveInactive($model, "FurnitureConfirm", "FurnitureFOrT", "AssetsFurniture", "FurnitureTotal");

$ElectronicEquipmentCount = $this->checkActiveInactive($model, "ElectronicEquipmentConfirm", "ElectronicEquipmentFOrT", "AssetsElectronicEquipment", "ElectronicEquipmentTotal");



//OUTSIDE BUSINESS DIFFERENT FORMAT
$OutsideBusinessCount = 0;
if($model->OutsideBusinessConfirm == null) {
  $OutsideBusinessCount = 0;
}
elseif($model->OutsideBusinessConfirm == "No") {
  $OutsideBusinessCount = 1;
}
elseif($model->OutsideBusinessConfirm == "Yes") {
  if($model->OutsideBusinessFOrT == "Fraction") {
    $counter = AssetsOutsideBusiness::model()->count('AssetsId=:data',array(':data'=>$model->AssetsId));
    if($counter > 0) $OutsideBusinessCount = 1;
  }
  elseif($model->OutsideBusinessFOrT == "Total") {
    $OutsideBusinessCount = 1;
  } 
}

$AnyOtherAssetsCount = $this->checkActiveInactive($model, "AnyOtherAssetsConfirm", "AnyOtherAssetsFOrT", "AssetsAnyOther", "AnyOtherAssetsTotal");
$OtherAssetsReceiptCount = $this->checkActiveInactive($model, "OtherAssetsReceiptConfirm", "OtherAssetsReceiptFOrT", "AssetsOtherReceipts", "OtherAssetsReceiptTotal");

//END OF COUNTS FOR TAB CHECKBOX


//DATA FOR MULTIPLE ENTRY
$BusinessCapitalList = AssetsBusinessCapital::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$ShareholdingCompanyList = AssetsShareholdingCompanyList::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$NonAgriculturePropertyList = AssetsNonAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));


$AgriculturePropertyList = AssetsAgricultureProperty::model()->find('AssetsId=:data', array(':data'=>@$model->AssetsId));

$InvestmentList = AssetsInvestment::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$MotorVehicleList = AssetsMotorVehicles::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$FurnitureList = AssetsFurniture::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$JewelryList = AssetsJewelry::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$ElectronicEquipmentList = AssetsElectronicEquipment::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$OutsideBusinessList = AssetsOutsideBusiness::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$AnyOtherAssetsList = AssetsAnyOther::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

$OtherAssetsReceiptList = AssetsOtherReceipts::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));


?>



<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'expenditure-form',
  'enableAjaxValidation'=>false,
  'action'=>Yii::app()->request->baseUrl.'/index.php/assetsSingle/saveAll'
  )); 
echo $form->hiddenField($model,'AssetsId'); 
echo $form->hiddenField($modelL,'LiabilityId'); 
?>




<div class="reg-form">
<div class="income-dashbord nav-tabs-sticky sticky-min-height">
  
<h2><?=Yii::t("assets","ASSET & LIABILITIES (OPTIONAL)")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.113")?>"></i></h2>                                   
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
<div id="business_capital_verification" class="text-center" style="display: <?=($model->NetWealthTotal) ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any assets and liabilities?")?>
  </p>
  <?php
                        // IF THE ANSWER IS "NO"
                  if($model->BusinessCapitalConfirm == 'No'){
                    echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
                   
                  }
                  ?>
  
  <!-- YES/NO BUTTON -->
  <h3>

    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('business_capital_verification', 'business_capital_fraction_or_total', 'business_capital_total')" type="button" class="btn btn-big btn-<?=($model->BusinessCapitalConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
      <button onclick="set_no('BusinessCapital')" type="button" class="btn btn-big btn-<?=($model->BusinessCapitalConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="business_capital_fraction_or_total" style="display: <?=($model->NetWealthTotal && !isset($_GET['active'])) ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="business_capital_total" style="display: <?=($model->BusinessCapitalFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->BusinessCapitalTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->BusinessCapitalTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your total Gross Wealth (Optional)")?></p>
  <div class="col-sm-12">
    <div class="col-sm-6 col-sm-offset-3">
      <?php echo $form->textField($model,'NetWealthTotal',array('class'=>'form-control required', 'placeholder'=>Yii::t("assets","")) ); ?>
      <input type="hidden" id="netwealthTag" name="netwealthTag" value="0" />
    </div>
    <!-- end - show saved data -->
    <div style="clear:both;text-align: center;padding:10px 0;">
       <p><?=Yii::t('assets',"Don't you know your total amount of assets and liabilities? Please");?> <a onclick="show_divs_href()" href="javascript:void(0)"><?=Yii::t('income',"Click Here")?></a></p>
       
     
    </div>
    
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="changeNetwealthTag()" type="submit" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
</div>
<div id="business_capital_fraction" style="display: <?=($model->NetWealthTotal && isset($_GET['active'])) ? 'block':'none' ?>;" class="col-sm-10 col-sm-offset-1">
  <h2><?php echo Yii::t("assets","Assets"); ?></h2>
  <table class="table" id="business_capital_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Type")?></th>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    
    <thead class="asset-income">
      
      <tr>
        <td><strong><?=Yii::t("assets","1. Agricultural Property")?></strong></td>
        <td>
        <textarea id="agriculture_property_description"  name="agriculture_cost_desc" class="form-control" rows="1"  placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($AgriculturePropertyList->Description)?$AgriculturePropertyList->Description:''; ?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="agriculture_cost" id="agriculture_property_cost" value="<?php echo isset($AgriculturePropertyList->Cost)?$AgriculturePropertyList->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <strong><?=Yii::t("assets","2. Investments")?></strong>
        </td>
      </tr>
      <tr>
        <td class="row-padding"><?=Yii::t("assets","a. Shares/Debentures")?></td>
        <td>
        <?php  

$Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Shares/Debentures'));
         ?>
        <textarea id="agriculture_property_description" name="investmentdesc[1]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="investmentcost[1]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-padding"><?=Yii::t("assets","b. Saving Certificate/Unit Certificate/Bond")?></td>
        <td>
        <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Saving Certificate/Unit Certificate/Bond'));?>
        <textarea id="agriculture_property_description" name="investmentdesc[2]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="investmentcost[2]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-padding"><?=Yii::t("assets","c. Prize Bond/Saving Scheme")?></td>
        <td>
        <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Prize Bond/Saving Scheme'));?>
        <textarea id="agriculture_property_description" name="investmentdesc[3]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="investmentcost[3]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-padding"><?=Yii::t("assets","d. Loans Given")?></td>
        <td>
        <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Loans Given'));?>
        <textarea id="agriculture_property_description" name="investmentdesc[4]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="investmentcost[4]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td class="row-padding"><?=Yii::t("assets","e. Other Investments")?></td>
        <td>
        <?php  

         $Investment = AssetsInvestment::model()->find('AssetsId=:data AND InvestmentType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Other Investment'));?>
        <textarea id="agriculture_property_description"  name="investmentdesc[5]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control"  name="investmentcost[5]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php 
        $MVDescr = '';
        $MVCoat = '';
        foreach ($MotorVehicleList as $mc) {
          $MVDescr = $mc->MVDescription;
          $MVCoat = $mc->MVValue;
        } ?>
        <td><strong><?=Yii::t("assets","3. Motor Vehicle")?></strong></td>
        <td>
        <textarea id="agriculture_property_description" name="vechile_description" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo $MVDescr;?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="vechile_cost" id="agriculture_property_cost" value="<?php echo $MVCoat;?>">
          </div>
        </td>
      </tr>
      <tr>
        <td><strong><?=Yii::t("assets","4. Furniture")?></strong></td>
        
        <td colspan="2">
          <div class="form-group">
            <input type="number" class="form-control" name="furniture_cost" id="agriculture_property_cost" value="<?php echo isset($model->FurnitureTotal)?$model->FurnitureTotal:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td><strong><?=Yii::t("assets","5. Jewellery")?></strong></td>
        
        <td colspan="2">
          <div class="form-group">
            <input type="number" class="form-control" name="jewellery_cost" id="agriculture_property_cost" value="<?php echo isset($model->JewelryTotal)?$model->JewelryTotal:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td><strong><?=Yii::t("assets","6. Electronic Equipment")?></strong></td>
       
        <td colspan="2">
          <div class="form-group">
            <input type="number" class="form-control" name="electronic_cost" id="agriculture_property_cost" value="<?php echo isset($model->ElectronicEquipmentTotal)?$model->ElectronicEquipmentTotal:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <strong><?=Yii::t("assets","7. Cash Assets")?></strong>
        </td>
      </tr>
      <tr>
        <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Cash on hand'));?>
        <td class="row-padding"><?=Yii::t("assets","a. Cash in Hand")?></td>
        <td>
        <textarea id="agriculture_property_description" name="cash_desc[1]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="cash_cost[1]" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Cash at Bank'));?>
        <td class="row-padding"><?=Yii::t("assets","b. Cash At Bank")?></td>
        <td>
        <textarea id="agriculture_property_description" name="cash_desc[2]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" type="number" class="form-control" name="cash_cost[2]" id="agriculture_property_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Fund'));?>
        <td class="row-padding"><?=Yii::t("assets","c. Fund")?></td>
        <td>
        <textarea id="agriculture_property_description" name="cash_desc[3]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" type="number" class="form-control" name="cash_cost[3]" id="agriculture_property_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Investment = AssetsOutsideBusiness::model()->find('AssetsId=:data AND OutsideBusinessType=:data1', array(':data'=>$model->AssetsId, ':data1'=>'Other Deposits'));?>
        <td class="row-padding"><?=Yii::t("assets","d. Other Deposits")?></td>
        <td>
        <textarea id="agriculture_property_description" name="cash_desc[4]" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" type="number" class="form-control" name="cash_cost[4]" id="agriculture_property_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        
        <td><strong><?=Yii::t("assets","8. Other Assets")?></strong></td>
        <?php $Investment = AssetsAnyOther::model()->find('AssetsId=:data', array(':data'=>$model->AssetsId));?>
        <td>
        <textarea id="agriculture_property_description" name="other_asset_desc" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Investment->Description)?$Investment->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="other_asset_cost" id="agriculture_property_cost" value="<?php echo isset($Investment->Cost)?$Investment->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td><strong><?=Yii::t("assets","Total Assets (Summation of 1 to 8)")?></strong></td>
        
        <td colspan="2">
          <div class="form-group">
            <input type="text" readonly class="form-control" name="total_asset_cost" id="total_asset_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->
  <h2><?php echo Yii::t("assets","LIABILITIES"); ?></h2>

  <table class="table" id="business_capital_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Type")?></th>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody class="liabilities_income">
      <tr>
        <?php  

         $Mortage = LiaMortgagesOnProperty::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
        <td><?=Yii::t("assets","1. Mortgages secured on property or land")?></td>
        <td>
        <textarea id="agriculture_property_description" name="mortgages_desc" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Mortage->Description)?$Mortage->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="mortgages_cost" id="agriculture_property_cost" value="<?php echo isset($Mortage->Cost)?$Mortage->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Mortage = LiaUnsecuredLoans::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>
        <td><?=Yii::t("assets","2. Unsecured Loans")?></td>
        <td>
        <textarea id="agriculture_property_description" name="unsecured_desc" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Mortage->Description)?$Mortage->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" value="<?php echo isset($Mortage->Cost)?$Mortage->Cost:'';?>" class="form-control" name="unsecured_cost" id="agriculture_property_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Mortage = LiaBankLoans::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>

        <td><?=Yii::t("assets","3. Bank Loan")?></td>
        <td>
        <textarea id="agriculture_property_description" name="loan_desc" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Mortage->Description)?$Mortage->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control"  name="loan_cost"  id="agriculture_property_cost" value="<?php echo isset($Mortage->Cost)?$Mortage->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <?php  

         $Mortage = LiaOthersLoan::model()->find('LiabilityId=:data', array(':data'=>$modelL->LiabilityId));?>

        <td><?=Yii::t("assets","4. Other Liabilities")?></td>
        <td>
        <textarea id="agriculture_property_description" name="Other_liab_desc" class="form-control" rows="1" placeholder="<?=Yii::t("assets","Description")?>"><?php echo isset($Mortage->Description)?$Mortage->Description:'';?></textarea>
        </td>
        <td>
          <div class="form-group">
            <input type="number" class="form-control" name="Other_liab_cost" id="agriculture_property_cost" value="<?php echo isset($Mortage->Cost)?$Mortage->Cost:'';?>" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      <tr>
        <td><strong><?=Yii::t("assets","Total Liabilities (Summation of 1 to 4)")?></strong></td>
        
        <td colspan="2">
          <div class="form-group">
            <input type="text" class="form-control" readonly name="tota_liab_cost" id="tota_liab_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
      </tr>
      
    </tbody>
  </table>
  <div style="text-align: center;">
  <button class="btn btn-success btn-lg" type="submit" ><?= Yii::t("common","Store") ?></button>
  </div>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>
<?php $this->endWidget(); ?>
<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
          <a class="btn btn-success for-clr" id="assetpre" style="height: 39px;" href="<?php echo Yii::app()->baseUrl.'/index.php/incomeSingle/startup';?>"    > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
        </div>
  <div class="back pull-right">
    <a class="btn btn-success for-clr" href="<?php echo Yii::app()->baseUrl.'/index.php/Challan';?>"  ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span> <i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


</div>
</div>
</div>

</div>

<script>
  $( document ).ready(function() {

    $('.asset-income input[type=number]').keyup(function(){
      var sum = 0;
      $('.asset-income input[type=number]').each(function(){

        if($(this).val()>0){
          sum =sum+parseFloat($(this).val());
          
        }
      })

      $('#total_asset_cost').val(sum);
    })

    $('.liabilities_income input[type=number]').keyup(function(){
      var sum = 0;
      $('.liabilities_income input[type=number]').each(function(){

        if($(this).val()>0){
          sum =sum+parseFloat($(this).val());
          
        }
      })

      $('#tota_liab_cost').val(sum);
    })

    var sum = 0;

    $('.liabilities_income input[type=number]').each(function(){

        if($(this).val()>0){
          sum =sum+parseFloat($(this).val());
          
        }
      })

      $('#tota_liab_cost').val(sum);

      sum = 0;
      $('.asset-income input[type=number]').each(function(){

        if($(this).val()>0){
          sum =sum+parseFloat($(this).val());
          
        }
      })

      $('#total_asset_cost').val(sum);


  });

  function changeNetwealthTag(){
    $('#netwealthTag').val(1);
  }

  function show_divs_href(){

     var assetUlr = '<?php echo Yii::app()->baseUrl.'/index.php/assetsSingle/entry';?>';
     $('#assetpre').attr('href',assetUlr);
     show_divs('business_capital_total', 'business_capital_fraction', 'no');

  }
</script>
<style>
  .row-padding{padding-left: 25px !important;}
  .sticky-min-height, .sticky-min-height2{min-height: 400px;}
</style>