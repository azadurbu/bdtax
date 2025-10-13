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

$AgriculturePropertyList = AssetsAgricultureProperty::model()->findAllByAttributes(array('AssetsId' => $model->AssetsId));

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
  )); 
echo $form->hiddenField($model,'AssetsId'); 
?>
<?php $this->endWidget(); ?>




<div class="reg-form income-dashbord nav-tabs-sticky sticky-min-height">
  <div role="tabpanel" id="asset_tab">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">

      <li role="presentation" title="<?=Yii::t('TTips',"3.1")?>" /*data-toggle="tooltip"*/ class="active"><a href="#BusinessCapital" role="tab" data-toggle="tab"><?=($BusinessCapitalCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Business Capital")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.2")?>" /*data-toggle="tooltip"*/><a href="#ShareholdingCompanyCost" role="tab" data-toggle="tab"><?=($ShareholdingCompanyCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Shareholding Assets")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.3")?>" /*data-toggle="tooltip"*/><a href="#NonAgricultureProperty" role="tab" data-toggle="tab"><?=($NonAgriculturePropertyCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Non-Agricultural Property")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.4")?>" /*data-toggle="tooltip"*/><a href="#AgricultureProperty" role="tab" data-toggle="tab"><?=($AgriculturePropertyCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Agricultural Property")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.5")?>" /*data-toggle="tooltip"*/><a href="#Investments" role="tab" data-toggle="tab"><?=($InvestmentCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Investments")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.6")?>" /*data-toggle="tooltip"*/><a href="#MotorVehicle" role="tab" data-toggle="tab"><?=($MotorVehicleCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Motor Vehicle")?></a></li>
      
      <li role="presentation" title="<?=Yii::t('TTips',"3.8")?>" /*data-toggle="tooltip"*/><a href="#Furniture" role="tab" data-toggle="tab"><?=($FurnitureCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Furniture")?></a></li>
      
      <li role="presentation" title="<?=Yii::t('TTips',"3.7")?>" /*data-toggle="tooltip"*/><a href="#Jewelry" role="tab" data-toggle="tab"><?=($JewelryCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Jewellery")?></a></li>
      
      <li role="presentation" title="<?=Yii::t('TTips',"3.9")?>" /*data-toggle="tooltip"*/><a href="#ElectronicEquipment" role="tab" data-toggle="tab"><?=($ElectronicEquipmentCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Electronic Equipment")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.10")?>" /*data-toggle="tooltip"*/><a href="#OutsideBusiness" role="tab" data-toggle="tab"><?=($OutsideBusinessCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Cash Assets")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.11")?>" /*data-toggle="tooltip"*/><a href="#AnyOtherAsset" role="tab" data-toggle="tab"><?=($AnyOtherAssetsCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Other Assets")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.12")?>" /*data-toggle="tooltip"*/><a href="#OtherAssetReceipt" role="tab" data-toggle="tab"><?=($OtherAssetsReceiptCount == 0) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Other Assets Receipt")?></a></li>

      <li role="presentation" title="<?=Yii::t('TTips',"3.13")?>" /*data-toggle="tooltip"*/><a href="#NetWealth" role="tab" data-toggle="tab"><?=($model->NetWealthConfirm == null) ? '':'<i class="fa fa-check-square"></i>' ?> <?=Yii::t("assets","Previous Year Net Wealth")?></a></li>

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="back pull-right">
       <a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/assets/review" ><span class="previous-text"> <?= Yii::t("common","Review") ?> </span><i class="glyphicon glyphicon-list-alt"></i></a>
     </div>

     <div role="tabpanel" class="tab-pane active" id="BusinessCapital" style="text-align: center !important;">
  <!-- 
  ##############################################################################
  ***************** Business Capital ********************
  ##############################################################################
-->
<h2><?=Yii::t("assets","Business Capital")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.1")?>"></i></h2>                                   
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
<div id="business_capital_verification" style="display: <?=($model->BusinessCapitalConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any business capital")?>? 
  </p>
  <?php
          // IF THE ANSWER IS "NO"
  if($model->BusinessCapitalConfirm == 'No')
    echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
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
<div id="business_capital_fraction_or_total" style="display: <?=($model->BusinessCapitalConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="business_capital_total" style="display: <?=($model->BusinessCapitalFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->BusinessCapitalTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->BusinessCapitalTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('business_capital_total', 'business_capital_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your business capital")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'BusinessCapitalTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Business Capital")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('BusinessCapital')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_asset('BusinessCapital')" type="button" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="business_capital_fraction" style="display: <?=($model->BusinessCapitalFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="business_capital_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($BusinessCapitalList as $value) {
        echo "<tr id='BusinessCapital_row_".$value->Id."'>";
        echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsBusinessCapital\", \"business_capital\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsBusinessCapital\", \"BusinessCapital\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="business_capital_id">
            <textarea id="business_capital_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="business_capital_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_asset_fraction('business_capital_id', 'business_capital_description', 'business_capital_cost', 'AssetsBusinessCapital', 'BusinessCapital')" type="button" ><?= Yii::t("common","Store") ?></button>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-right">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#ShareholdingCompanyCost" onclick="next_pre('ShareholdingCompanyCost')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span> <i class="fa fa-chevron-right"></i></a>
  </div>
  <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>

<div role="tabpanel" class="tab-pane" id="ShareholdingCompanyCost" style="text-align: center !important;">
    <!-- 
    ##############################################################################
    ***************** Shareholding Assets ********************
    ##############################################################################
  -->
  <h2><?=Yii::t("assets","Shareholding Assets")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.2")?>"></i></h2>                                   
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
  <div id="shareholding_company_verification" style="display: <?=($model->ShareholdingCompanyConfirm == 'Yes') ? 'none':'block' ?>;">
    <p>
      <?=Yii::t("assets","Did you have any shareholding company assets")?>? 
    </p>
    <?php
            // IF THE ANSWER IS "NO"
    if($model->ShareholdingCompanyConfirm == 'No')
      echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
    ?>
    <!-- YES/NO BUTTON -->
    <h3>
      <div class="btn-group btn-group-lg">
        <button onclick="show_divs('shareholding_company_verification', 'shareholding_company_fraction_or_total', 'shareholding_company_fraction')" type="button" class="btn btn-big btn-<?=($model->ShareholdingCompanyConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
        <button onclick="set_no('ShareholdingCompany')" type="button" class="btn btn-big btn-<?=($model->ShareholdingCompanyConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
      </div>
    </h3>
    <!-- END YES/NO BUTTON -->
  </div>
  <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

  <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
  <div id="shareholding_company_fraction_or_total" style="display: <?=($model->ShareholdingCompanyConfirm == 'Yes') ? 'block':'none' ?>;">

   <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
   <!-- <div id="shareholding_company_total" style="display: <?=($model->ShareholdingCompanyFOrT != 'Fraction') ? 'block':'none' ?>;"> -->
   <div id="shareholding_company_total" style="display:none">

    <!-- show saved data -->    
    <p class="exp_alert">
      <?=($model->ShareholdingCompanyTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->ShareholdingCompanyTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
    </p>
    <!-- end - show saved data -->
    <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
    <button onclick="show_divs('shareholding_company_total', 'shareholding_company_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

    <!-- ENTRY FORM -->
    <p><?=Yii::t("assets","Please enter your shareholding company assets")?></p>
    <div class="col-sm-12">
      <div class="col-sm-4 col-sm-offset-4">
        <?php echo $form->textField($model,'ShareholdingCompanyTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Shareholding Company Assets")) ); ?>
      </div>
      <div class="col-sm-1">
        <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('ShareholdingCompany')" type="button" ></button>
      </div>
    </div>
    <p>
        <br>
        <br>
      <button class="btn btn-success btn-lg" onclick="save_asset('ShareholdingCompany')" type="button" ><?= Yii::t("common","Store") ?></button>
    </p>
    <!-- END - ENTRY FORM -->

  </div>
  <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

  <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
  <div id="shareholding_company_fraction" style="display :block <?//=($model->ShareholdingCompanyFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
    <table class="table" id="shareholding_company_table">
      <thead>
        <tr>
          <th><?=Yii::t("assets","Company Name")?></th>
          <th><?=Yii::t("assets","Number of Shares")?></th>
          <th><?=Yii::t("assets","Each Share Cost (BDT)")?></th>
          <th><?=Yii::t("assets","Value (BDT)")?></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($ShareholdingCompanyList as $value) {
          echo "<tr id='ShareholdingCompany_row_".$value->Id."'>";
          echo "<td>".htmlentities(strip_tags($value->CompanyName))."</td>";
          echo "<td>".$value->NumberOfShares."</td>";
          echo "<td>".$value->EachShareCost."</td>";
          echo "<td>".$value->CompanyAssetValue."</td>";
          echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsShareholdingCompanyList\", \" \")'></button></td>";
          echo "<td><button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsShareholdingCompanyList\", \"ShareholdingCompany\")'></button></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
      <thead>
        <tr>
         <td>
           <input type="hidden" class="form-control" id="shareholding_company_id">
           <?php echo $form->textField($model3,'CompanyName',array('class'=>'form-control', 'required' => true, 'id' => 'CompanyName', 'placeholder' => Yii::t("assets", "Company Name"))); ?> </td>

           <td><?php echo $form->textField($model3,'NumberOfShares',array('class'=>'form-control asset_int', 'required' => true, 'id' => 'NumberOfShares', 'placeholder' => Yii::t("assets", "Number of Shares"))); ?> </td>

           <td><?php echo $form->textField($model3,'EachShareCost',array('class'=>'form-control asset_number', 'required' => true, 'id' => 'EachShareCost', 'placeholder' => Yii::t("assets", "Each Share Cost"))); ?> </td>

           <td><?php echo $form->textField($model3,'CompanyAssetValue',array('class'=>'form-control asset_number', 'required' => true, 'readonly' => 'readonly', 'id' => 'CompanyAssetValue', 'placeholder' => Yii::t("assets", "Value"))); ?> </td>
           <td></td>
           <td></td>
         </tr>
       </thead>  
     </table>
     <!-- SAVE BUTTON FOR FRACTION ENTRY -->

     <button class="btn btn-success btn-lg" onclick="save_shareholder()" type="button" ><?= Yii::t("common","Store") ?></button>

     <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
   </div>
   <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

 </div>

 <!-- NEXT PREVIOUS BUTTON -->
 <div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#BusinessCapital" onclick="next_pre('BusinessCapital')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#NonAgricultureProperty" onclick="next_pre('NonAgricultureProperty')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
 </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


<div role="tabpanel" class="tab-pane" id="NonAgricultureProperty" style="text-align: center !important;">
  <!-- 
  ##############################################################################
  ***************** Non agricultural  Property ********************
  ##############################################################################
-->
<h2><?=Yii::t("assets","Non-Agricultural Property")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.3")?>"></i></h2>                                   
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
<div id="non_agriculture_property_verification" style="display: <?=($model->NonAgriculturePropertyConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any non-agricultural property")?>? 
  </p>
  <?php
          // IF THE ANSWER IS "NO"
  if($model->NonAgriculturePropertyConfirm == 'No')
    echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('non_agriculture_property_verification', 'non_agriculture_property_fraction_or_total', 'non_agriculture_property_fraction')" type="button" class="btn btn-big btn-<?=($model->NonAgriculturePropertyConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
      <button onclick="set_no('NonAgricultureProperty')" type="button" class="btn btn-big btn-<?=($model->NonAgriculturePropertyConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="non_agriculture_property_fraction_or_total" style="display: <?=($model->NonAgriculturePropertyConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <!-- <div id="non_agriculture_property_total" style="display: <?=($model->NonAgriculturePropertyFOrT != 'Fraction') ? 'block':'none' ?>;"> -->
 <div id="non_agriculture_property_total" style="display:none;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->NonAgriculturePropertyTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->NonAgriculturePropertyTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('non_agriculture_property_total', 'non_agriculture_property_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your non-agricultural property")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'NonAgriculturePropertyTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Non-Agricultural Property")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('NonAgricultureProperty')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_asset('NonAgricultureProperty')" type="button" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="non_agriculture_property_fraction" style="display: block<?//=($model->NonAgriculturePropertyFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="non_agriculture_property_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Type")?></th>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value Start Of Income Year (BDT)")?></th>
        <th><?=Yii::t("assets","Value Change During Income Year (BDT)")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($NonAgriculturePropertyList as $value) {
        echo "<tr id='NonAgricultureProperty_row_".$value->Id."'>";
        echo "<td width='25%'>".htmlentities(strip_tags($value->Type))."</td>";
        echo "<td width='25%'>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->ValueStartOfIncomeYear."</td>";
        echo "<td>".$value->ValueChangeDuringIncomeYear."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td width='20%'><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsNonAgricultureProperty\", \"non_agriculture_property\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsNonAgricultureProperty\", \"NonAgricultureProperty\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <?php 
              echo CHtml::dropDownList('AssetsNonAgricultureProperty[Type]', '', ['Value' => 'Value', 'Advance' => 'Advance'], array('empty' => 'Select type','class' => 'form-control', 'id'=>"non_agriculture_property_type", "" ));
            ?>
          </div>
        </td>
          <td>
            <div class="form-group">

            <input type="hidden" class="form-control" id="non_agriculture_property_id">
            <textarea id="non_agriculture_property_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="non_agriculture_property_ValueStartOfIncomeYear" placeholder="<?=Yii::t("assets","Value Start Of Income Year")?>">
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="non_agriculture_property_ValueChangeDuringIncomeYear" placeholder="<?=Yii::t("assets","Value Change During Income Year")?>">
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="non_agriculture_property_cost" readonly placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <hr>
  <p>
    <label>Do you have any house property more than 8000sqft. in an area under city corporation?
    <?php
    if($model->HousePropertyInCityCorporation == 'Yes'){
      echo '<input type="checkbox" id="housePropertyStatus" name="HousePropertyInCityCorporation" checked>';
    }else{
      echo '<input type="checkbox" id="housePropertyStatus" name="HousePropertyInCityCorporation">';
    }
    ?>
    </label>
  </p>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_nonAgricultureProperty('non_agriculture_property_id','non_agriculture_property_type', 'non_agriculture_property_description', 'non_agriculture_property_ValueStartOfIncomeYear', 'non_agriculture_property_ValueChangeDuringIncomeYear', 'non_agriculture_property_cost', 'AssetsNonAgricultureProperty', 'NonAgricultureProperty','housePropertyStatus')" type="button" ><?= Yii::t("common","Store") ?></button>


  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#ShareholdingCompanyCost" onclick="next_pre('ShareholdingCompanyCost')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#AgricultureProperty" onclick="next_pre('AgricultureProperty')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
 </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>

<div role="tabpanel" class="tab-pane" id="AgricultureProperty" style="text-align: center !important;">
    <!-- 
    ##############################################################################
    ***************** Agricultural Property ********************
    ##############################################################################
  -->
  <h2><?=Yii::t("assets","Agricultural Property")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.4")?>"></i></h2>                                   
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
  <div id="agriculture_property_verification" style="display: <?=($model->AgriculturePropertyConfirm == 'Yes') ? 'none':'block' ?>;">
    <p>
      <?=Yii::t("assets","Did you have any agricultural property")?>? 
    </p>
    <?php
            // IF THE ANSWER IS "NO"
    if($model->AgriculturePropertyConfirm == 'No')
      echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
    ?>
    <!-- YES/NO BUTTON -->
    <h3>
      <div class="btn-group btn-group-lg">
        <button onclick="show_divs('agriculture_property_verification', 'agriculture_property_fraction_or_total', 'agriculture_property_total')" type="button" class="btn btn-big btn-<?=($model->AgriculturePropertyConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
        <button onclick="set_no('AgricultureProperty')" type="button" class="btn btn-big btn-<?=($model->AgriculturePropertyConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
      </div>
    </h3>
    <!-- END YES/NO BUTTON -->
  </div>
  <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

  <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
  <div id="agriculture_property_fraction_or_total" style="display: <?=($model->AgriculturePropertyConfirm == 'Yes') ? 'block':'none' ?>;">

   <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
   <div id="agriculture_property_total" style="display: <?=($model->AgriculturePropertyFOrT != 'Fraction') ? 'block':'none' ?>;">

    <!-- show saved data -->    
    <p class="exp_alert">
      <?=($model->AgriculturePropertyTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->AgriculturePropertyTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
    </p>
    <!-- end - show saved data -->
    <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
    <button onclick="show_divs('agriculture_property_total', 'agriculture_property_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

    <!-- ENTRY FORM -->
    <p><?=Yii::t("assets","Please enter your agricultural property")?></p>
    <div class="col-sm-12">
      <div class="col-sm-4 col-sm-offset-4">
        <?php echo $form->textField($model,'AgriculturePropertyTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Agricultural Property")) ); ?>
      </div>
      <div class="col-sm-1">
        <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('AgricultureProperty')" type="button" ></button>
      </div>
    </div>
    <p>
        <br>
        <br>
      <button class="btn btn-success btn-lg" onclick="save_asset('AgricultureProperty')" type="button" ><?= Yii::t("common","Store") ?></button>
    </p>
    <!-- END - ENTRY FORM -->

  </div>
  <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

  <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
  <div id="agriculture_property_fraction" style="display: <?=($model->AgriculturePropertyFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
    <table class="table" id="agriculture_property_table">
      <thead>
        <tr>
          <th><?=Yii::t("assets","Description")?></th>
          <th><?=Yii::t("assets","Value Start Of Income Year (BDT)")?></th>
          <th><?=Yii::t("assets","Value Change During Income Year (BDT)")?></th>
          <th><?=Yii::t("assets","Value (BDT)")?></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($AgriculturePropertyList as $value) {
          echo "<tr id='AgricultureProperty_row_".$value->Id."'>";
          echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
          echo "<td>".$value->ValueStartOfIncomeYear."</td>";
          echo "<td>".$value->ValueChangeDuringIncomeYear."</td>";
          echo "<td>".$value->Cost."</td>";
          echo "<td width='20%'><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsAgricultureProperty\", \"agriculture_property\")'></button>";
          echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsAgricultureProperty\", \"AgricultureProperty\")'></button></td>";
          echo '</tr>';
        }
        ?>
      </tbody>
      <thead>
        <tr>
          <td>
            <div class="form-group">
              <input type="hidden" class="form-control" id="agriculture_property_id">
              <textarea id="agriculture_property_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" id="agriculture_property_ValueStartOfIncomeYear" placeholder="<?=Yii::t("assets","Value Start Of Income Year")?>">
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" id="agriculture_property_ValueChangeDuringIncomeYear" placeholder="<?=Yii::t("assets","Value Change During Income Year")?>">
            </div>
          </td>
          <td>
            <div class="form-group">
              <input type="text" class="form-control" id="agriculture_property_cost" readonly placeholder="<?=Yii::t("assets","Value")?>">
            </div>
          </td>
          <td></td>
        </tr>
      </thead>  
    </table>
    <!-- SAVE BUTTON FOR FRACTION ENTRY -->

    <button class="btn btn-success btn-lg" onclick="save_agricultureProperty('agriculture_property_id', 'agriculture_property_description','agriculture_property_ValueStartOfIncomeYear', 'agriculture_property_ValueChangeDuringIncomeYear', 'agriculture_property_cost', 'AssetsAgricultureProperty', 'AgricultureProperty')" type="button" ><?= Yii::t("common","Store") ?></button>

    <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
  </div>
  <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#NonAgricultureProperty" onclick="next_pre('NonAgricultureProperty')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#Investments" onclick="next_pre('Investments')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
 </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>

<div role="tabpanel" class="tab-pane" id="Investments" style="text-align: center !important;">
    <!-- 
    ##############################################################################
    ***************** Investments ********************
    ##############################################################################
  -->
  <h2><?=Yii::t("assets","Investments")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.5")?>"></i></h2>                                   
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
  <div id="investment_verification" style="display: <?=($model->InvestmentConfirm == 'Yes') ? 'none':'block' ?>;">
    <p>
      <?=Yii::t("assets","Did you have any investment")?>? 
    </p>
    <?php
            // IF THE ANSWER IS "NO"
    if($model->InvestmentConfirm == 'No')
      echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
    ?>
    <!-- YES/NO BUTTON -->
    <h3>
      <div class="btn-group btn-group-lg">
        <!-- 
        <button onclick="show_divs('investment_verification', 'investment_fraction_or_total', 'investment_total')" type="button" class="btn btn-big btn-<?=($model->InvestmentConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button> 
        -->
        <button onclick="show_divs('investment_verification', 'investment_fraction_or_total', 'investment_fraction')" type="button" class="btn btn-big btn-<?=($model->InvestmentConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>

        <button onclick="set_no('Investment')" type="button" class="btn btn-big btn-<?=($model->InvestmentConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
      </div>
    </h3>
    <!-- END YES/NO BUTTON -->
  </div>
  <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

  <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
  <div id="investment_fraction_or_total" style="display: <?=($model->InvestmentConfirm == 'Yes') ? 'block':'none' ?>;">

   <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
   <!--
   <div id="investment_total" style="display: <?=($model->InvestmentFOrT != 'Fraction') ? 'block':'none' ?>;">
   -->
    <div id="investment_total" style="display: none; ">

    <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
    <button onclick="show_divs('investment_total', 'investment_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

    <!-- show saved data -->    
    <p class="exp_alert">
     <!-- show saved data -->
     <br>    
     <table class="table">
       <tr>
         <th><?=Yii::t("assets","Shares/Debentures")?></th>
         <td><?=@$model->InvestShareDebenturesTotal?></td>
       </tr>
       <tr>
         <th><?=Yii::t("assets","Saving Certificate/Unit Certificate/Bond")?></th>
         <td><?=@$model->InvestSavingUnitCertBondTotal?></td>
       </tr>
       <tr>
         <th><?=Yii::t("assets","Prize Bond/Saving Scheme")?></th>
         <td><?=@$model->InvestPrizeBondSavingsSchemeTotal?></td>
       </tr>
       <tr>
         <th><?=Yii::t("assets","Loans Given")?></th>
         <td><?=@$model->InvestLoansGivenTotal?></td>
       </tr>
       <tr>
         <th><?=Yii::t("assets","Other Investment")?></th>
         <td><?=@$model->InvestOtherTotal?></td>
       </tr>
     </table>
     <!-- end show saved data -->
   </p>
   <!-- end - show saved data -->


   <!-- ENTRY FORM -->
   <p><?=Yii::t("assets","Please enter your investment assets")?></p>
   <form id="investment_form">  
     <?php echo $form->hiddenField($model,'AssetsId'); ?>
     <!-- ====================== Shares/Debentures ========================== -->
     <div class="row">
       <div class="col-md-4"><b><?=Yii::t("assets","Shares/Debentures")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ data-html="true" title="Shares: <?=Yii::t('TTips',"3.12")?> <br> Debentures: <?=Yii::t('TTips',"3.13")?>"></i></div>

       <div class="col-md-4">
         <div class="form-group">
           <?php echo $form->textField($model,'InvestShareDebenturesTotal',array('class'=>'form-control', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
         </div>
       </div>
       <div class="col-md-1">
        <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_invest_data('InvestShareDebenturesTotal')" type="button" ></button>
      </div>
    </div>
    <br>
    <!-- ====================== Saving Certificate/Unit Certificate/Bond ========================== -->
    <div class="row">
     <div class="col-md-4"><b><?=Yii::t("assets","Saving Certificate/Unit Certificate/Bond")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ data-html="true" title="Saving Certificate: <?=Yii::t('TTips',"3.14")?> <br> Unit Certificate: <?=Yii::t('TTips',"3.14")?> <br> Bond: <?=Yii::t('TTips',"3.14")?>"></i></div>

     <div class="col-md-4">
       <div class="form-group">
         <?php echo $form->textField($model,'InvestSavingUnitCertBondTotal',array('class'=>'form-control', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
       </div>
     </div>
     <div class="col-md-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_invest_data('InvestSavingUnitCertBondTotal')" type="button" ></button>
    </div>
  </div>
  <br>
  <!-- ====================== Price bond/saving scheme ========================== -->
  <div class="row">
   <div class="col-md-4"><b><?=Yii::t("assets","Prize Bond/Saving Scheme")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ data-html="true" title="Prize Bond: <?=Yii::t('TTips',"3.17")?> <br> Saving Scheme: <?=Yii::t('TTips',"3.18")?>"></i></div>
   <div class="col-md-4">
     <div class="form-group">
       <?php echo $form->textField($model,'InvestPrizeBondSavingsSchemeTotal',array('class'=>'form-control asset_number', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
     </div>
   </div>
   <div class="col-md-1">
    <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_invest_data('InvestPrizeBondSavingsSchemeTotal')" type="button" ></button>
  </div>
</div>

<br>
<!-- ====================== Loans given ========================== -->
<div class="row">
 <div class="col-md-4"><b><?=Yii::t("assets","Loans Given")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.19")?>"></i></div>
 <div class="col-md-4">
   <div class="form-group">
     <?php echo $form->textField($model,'InvestLoansGivenTotal',array('class'=>'form-control asset_number', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
   </div>
 </div>
 <div class="col-md-1">
  <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_invest_data('InvestLoansGivenTotal')" type="button" ></button>
</div>
</div>
<br>
<!-- ====================== Other Investment ========================== -->
<div class="row">
 <div class="col-md-4"><b><?=Yii::t("assets","Other Investment")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.20")?>"></i></div>
 <div class="col-md-4">
   <div class="form-group">
     <?php echo $form->textField($model,'InvestOtherTotal',array('class'=>'form-control asset_number', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
   </div>
 </div>
 <div class="col-md-1">
  <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_invest_data('InvestOtherTotal')" type="button" ></button>
</div>
</div>

</form>
<p>
  <br>
  <button class="btn btn-success btn-lg" onclick="save_investment()" type="button" ><?= Yii::t("common","Store") ?></button>
</p>
<!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="investment_fraction" style="display: <?=($model->InvestmentFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="investment_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Type")?></th>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($InvestmentList as $value) {
        echo "<tr id='Investment_row_".$value->Id."'>";
        echo "<td>".$value->InvestmentType."</td>";
        echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsInvestment\", \"investment\")'></button>";
        echo "</td><td><button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsInvestment\", \"Investment\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="investment_id">
            <select class="form-control" id="investment_type">
              <option value="">--Select Investment Type--</option>
              <option value="Shares/Debentures">Shares/Debentures</option>
              <option value="Saving Certificate/Unit Certificate/Bond">Saving Certificate/Unit Certificate/Bond</option>
              <option value="Prize Bond/Saving Scheme">Prize Bond/Saving Scheme/FDR/DPS</option>
              <option value="Loans Given">Loans Given</option>
              <option value="Other Investment">Other Investment</option>
              <option value="Insurance Premium">Insurance Premium</option>
            </select>
          </div>
        </td>
        <td>
          <div class="form-group">
            <textarea id="investment_description" class="form-control" rows="4" placeholder="<?=Yii::t("assets","Description (Mention your Name & TIN number for 'Loans Given')")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="investment_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_asset_invest_fraction()" type="button" ><?= Yii::t("common","Store") ?></button>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#AgricultureProperty" onclick="next_pre('AgricultureProperty')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#MotorVehicle" onclick="next_pre('MotorVehicle')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
 </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


<div role="tabpanel" class="tab-pane" id="MotorVehicle" style="text-align: center !important;">
     <!-- 
      ##############################################################################
      ***************** Motor Vehicle ********************
      ##############################################################################
    -->
    <h2><?=Yii::t("assets","Motor Vehicle")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.6")?>"></i></h2>                                   
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
    <div id="motor_vehicle_verification" style="display: <?=($model->MotorVehicleConfirm == 'Yes') ? 'none':'block' ?>;">
      <p>
        <?=Yii::t("assets","Did you have any motor vehicle")?>? 
      </p>
      <?php
                // IF THE ANSWER IS "NO"
      if($model->MotorVehicleConfirm == 'No')
        echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
      ?>
      <!-- YES/NO BUTTON -->
      <h3>
        <div class="btn-group btn-group-lg">
          <button onclick="show_divs('motor_vehicle_verification', 'motor_vehicle_fraction_or_total', 'motor_vehicle_fraction')" type="button" class="btn btn-big btn-<?=($model->MotorVehicleConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
          <button onclick="set_no('MotorVehicle')" type="button" class="btn btn-big btn-<?=($model->MotorVehicleConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
        </div>
      </h3>
      <!-- END YES/NO BUTTON -->
    </div>
    <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

    <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
    <div id="motor_vehicle_fraction_or_total" style="display: <?=($model->MotorVehicleConfirm == 'Yes') ? 'block':'none' ?>;">

     <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
    <!-- <div id="motor_vehicle_total" style="display: <?=($model->MotorVehicleFOrT != 'Fraction') ? 'block':'none' ?>;"> -->
     <div id="motor_vehicle_total" style="display:none;">


      <!-- show saved data -->    
      <p class="exp_alert">
        <?=($model->MotorVehicleTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->MotorVehicleTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
      </p>
      <!-- end - show saved data -->
      <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
      <button onclick="show_divs('motor_vehicle_total', 'motor_vehicle_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

      <!-- ENTRY FORM -->
      <p><?=Yii::t("assets","Please enter your motor vehicle assets")?></p>
      <div class="col-sm-12">
        <div class="col-sm-4 col-sm-offset-4">
          <?php echo $form->textField($model,'MotorVehicleTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Motor Vehicle")) ); ?>
        </div>
        <div class="col-sm-1">
          <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('MotorVehicle')" type="button" ></button>
        </div>
      </div>
      <p>
        <br>
        <br>
        <button class="btn btn-success btn-lg" onclick="save_asset('MotorVehicle')" type="button" ><?= Yii::t("common","Store") ?></button>
      </p>
      <!-- END - ENTRY FORM -->

    </div>
    <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

    <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
    <div id="motor_vehicle_fraction" style="display:block <?//=($model->MotorVehicleFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
      <table class="table" id="motor_vehicle_table">
        <thead>
          <tr>
            <th><?=Yii::t("assets","Vehicle Brand/Type")?></th>
            <th><?=Yii::t("assets","Registration No.")?></th>
            <th><?=Yii::t("assets","Engine (CC)")?></th>
            <th><?=Yii::t("assets","Value (BDT)")?></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($MotorVehicleList as $value) {
            echo "<tr id='MotorVehicle_row_".$value->Id."'>";
            echo "<td>".htmlentities(strip_tags($value->MotorVehicleType))."</td>";
            echo "<td>".htmlentities(strip_tags($value->RegistrationNo))."</td>";
            echo "<td>".htmlentities(strip_tags($value->MVDescription))."</td>";
            echo "<td>".$value->MVValue."</td>";
            echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsMotorVehicles\", \" \")'></button></td>";
            echo "<td><button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsMotorVehicles\", \"MotorVehicle\")'></button></td>";
            echo '</tr>';
          }
          ?>
        </tbody>
        <thead>
          <tr>
           <td>
             <input type="hidden" class="form-control" id="motor_vehicle_id">
             <?php echo $form->textField($model7,'MotorVehicleType',array('class'=>'form-control', 'required' => true, 'id' => 'MotorVehicleType', 'placeholder' => Yii::t("assets", "Motor Vehicle Type"))); ?> </td>

             <td><?php echo $form->textField($model7,'RegistrationNo',array('class'=>'form-control', 'required' => true, 'id' => 'RegistrationNo', 'placeholder' => Yii::t("assets", "Registration No"))); ?> </td>

             <td><?php echo $form->textArea($model7,'MVDescription',array('class'=>'form-control', 'required' => true, 'id' => 'MVDescription', 'placeholder' => Yii::t("assets", "Description"), 'rows' => 3)); ?> </td>

             <td><?php echo $form->textField($model7,'MVValue',array('class'=>'form-control asset_number', 'required' => true, 'id' => 'MVValue', 'placeholder' => Yii::t("assets", "Value"))); ?> </td>
             <td></td>
             <td></td>
           </tr>
         </thead>  
       </table>
       <hr>
       <p>
         <label>Do you have more than one motor vehicle (i.e. Private car, Jeep or Microbus) to your name?
         <?php
         if($model->MultipleCar == 'Yes'){
           echo '<input type="checkbox" id="multipleCarStatus" name="MultipleCar" checked>';
         }else{
           echo '<input type="checkbox" id="multipleCarStatus" name="MultipleCar">';
         }
         ?>
         </label>
       </p>
       <!-- SAVE BUTTON FOR FRACTION ENTRY -->

       <button class="btn btn-success btn-lg" onclick="save_MotorVehicle()" type="button" ><?= Yii::t("common","Store") ?></button>

       <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
     </div>
     <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

   </div>

   <!-- NEXT PREVIOUS BUTTON -->
   <div class="login-button input-group">
    <div class="back pull-left">
      <a class="btn btn-success for-clr" data-toggle="tab" href="#Investments" onclick="next_pre('Investments')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
    </div>
    <div class="back pull-right">
     <a class="btn btn-success for-clr" data-toggle="tab" href="#Furniture" onclick="next_pre('Furniture')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
   </div>
   <div class="clearfix"></div>
 </div>
 <!-- END - NEXT PREVIOUS BUTTON -->

</div>

<div role="tabpanel" class="tab-pane" id="Furniture" style="text-align: center !important;">
          <!-- 
          ##############################################################################
          ***************** Furniture ********************
          ##############################################################################
        -->
        <h2><?=Yii::t("assets","Furniture")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.8")?>"></i></h2>                                   
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
        <div id="furniture_verification" style="display: <?=($model->FurnitureConfirm == 'Yes') ? 'none':'block' ?>;">
          <p>
            <?=Yii::t("assets","Did you have any Furniture")?>? 
          </p>
          <?php
                  // IF THE ANSWER IS "NO"
          if($model->FurnitureConfirm == 'No')
            echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
          ?>
          <!-- YES/NO BUTTON -->
          <h3>
            <div class="btn-group btn-group-lg">
              <button onclick="show_divs('furniture_verification', 'furniture_fraction_or_total', 'furniture_total')" type="button" class="btn btn-big btn-<?=($model->FurnitureConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
              <button onclick="set_no('Furniture')" type="button" class="btn btn-big btn-<?=($model->FurnitureConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
            </div>
          </h3>
          <!-- END YES/NO BUTTON -->
        </div>
        <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

        <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
        <div id="furniture_fraction_or_total" style="display: <?=($model->FurnitureConfirm == 'Yes') ? 'block':'none' ?>;">

         <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
         <div id="furniture_total" style="display: <?=($model->FurnitureFOrT != 'Fraction') ? 'block':'none' ?>;">

          <!-- show saved data -->    
          <p class="exp_alert">
            <?=($model->FurnitureTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->FurnitureTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
          </p>
          <!-- end - show saved data -->
          <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
          <button onclick="show_divs('furniture_total', 'furniture_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

          <!-- ENTRY FORM -->
          <p><?=Yii::t("assets","Please enter your furniture assets")?></p>
          <div class="col-sm-12">
            <div class="col-sm-4 col-sm-offset-4">
              <?php echo $form->textField($model,'FurnitureTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Furniture")) ); ?>
            </div>
            <div class="col-sm-1">
              <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('Furniture')" type="button" ></button>
            </div>
          </div>
          <p>
            <br>
            <br>
            <button class="btn btn-success btn-lg" onclick="save_asset('Furniture')" type="button" ><?= Yii::t("common","Store") ?></button>
          </p>
          <!-- END - ENTRY FORM -->

        </div>
        <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

        <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
        <div id="furniture_fraction" style="display: <?=($model->FurnitureFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
          <table class="table" id="furniture_table">
            <thead>
              <tr>
                <th><?=Yii::t("assets","Description")?></th>
                <th><?=Yii::t("assets","Value (BDT)")?></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($FurnitureList as $value) {
                echo "<tr id='Furniture_row_".$value->Id."'>";
                echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
                echo "<td>".$value->Cost."</td>";
                echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsFurniture\", \"furniture\")'></button>";
                echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsFurniture\", \"Furniture\")'></button></td>";
                echo '</tr>';
              }
              ?>
            </tbody>
            <thead>
              <tr>
                <td>
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="furniture_id">
                    <textarea id="furniture_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="furniture_cost" placeholder="<?=Yii::t("assets","Value")?>">
                  </div>
                </td>
                <td></td>
              </tr>
            </thead>  
          </table>
          <!-- SAVE BUTTON FOR FRACTION ENTRY -->

          <button class="btn btn-success btn-lg" onclick="save_asset_fraction('furniture_id', 'furniture_description', 'furniture_cost', 'AssetsFurniture', 'Furniture')" type="button" ><?= Yii::t("common","Store") ?></button>

          <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
        </div>
        <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

      </div>

      <!-- NEXT PREVIOUS BUTTON -->
      <div class="login-button input-group">
        <div class="back pull-left">
          <a class="btn btn-success for-clr" data-toggle="tab" href="#MotorVehicle" onclick="next_pre('MotorVehicle')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
        </div>
        <div class="back pull-right">
         <a class="btn btn-success for-clr" data-toggle="tab" href="#Jewelry" onclick="next_pre('Jewelry')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
       </div>
       <div class="clearfix"></div>
     </div>
     <!-- END - NEXT PREVIOUS BUTTON -->

   </div>


   <div role="tabpanel" class="tab-pane" id="Jewelry" style="text-align: center !important;">
            <!-- 
            ##############################################################################
            ***************** Jewelry ********************
            ##############################################################################
          -->
          <h2><?=Yii::t("assets","Jewellery")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.7")?>"></i></h2>                                   
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
          <div id="Jewelry_verification" style="display: <?=($model->JewelryConfirm == 'Yes') ? 'none':'block' ?>;">
            <p>
              <?=Yii::t("assets","Did you have any jewellery")?>? 
            </p>
            <?php
                    // IF THE ANSWER IS "NO"
            if($model->JewelryConfirm == 'No')
              echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
            ?>
            <!-- YES/NO BUTTON -->
            <h3>
              <div class="btn-group btn-group-lg">
                <button onclick="show_divs('Jewelry_verification', 'Jewelry_fraction_or_total', 'Jewelry_total')" type="button" class="btn btn-big btn-<?=($model->JewelryConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
                <button onclick="set_no('Jewelry')" type="button" class="btn btn-big btn-<?=($model->JewelryConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
              </div>
            </h3>
            <!-- END YES/NO BUTTON -->
          </div>
          <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

          <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
          <div id="Jewelry_fraction_or_total" style="display: <?=($model->JewelryConfirm == 'Yes') ? 'block':'none' ?>;">

           <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
           <div id="Jewelry_total" style="display: <?=($model->JewelryFOrT != 'Fraction') ? 'block':'none' ?>;">

            <!-- show saved data -->    
            <p class="exp_alert">
              <?=($model->JewelryTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->JewelryTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
            </p>
            <!-- end - show saved data -->
            <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
            <button onclick="show_divs('Jewelry_total', 'Jewelry_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

            <!-- ENTRY FORM -->
            <p><?=Yii::t("assets","Please enter your jewellery assets")?></p>
            <div class="col-sm-12">
              <div class="col-sm-4 col-sm-offset-4">
                <?php echo $form->textField($model,'JewelryTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Jewellery")) ); ?>
              </div>
              <div class="col-sm-1">
                <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('Jewelry')" type="button" ></button>
              </div>
            </div>
            <p>
              <br>
              <br>
              <button class="btn btn-success btn-lg" onclick="save_asset('Jewelry')" type="button" ><?= Yii::t("common","Store") ?></button>
            </p>
            <!-- END - ENTRY FORM -->

          </div>
          <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

          <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
          <div id="Jewelry_fraction" style="display: <?=($model->JewelryFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
            <table class="table" id="Jewelry_table">
              <thead>
                <tr>
                  <th><?=Yii::t("assets","Description")?></th>
                  <th><?=Yii::t("assets","Value (BDT)")?></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($JewelryList as $value) {
                  echo "<tr id='Jewelry_row_".$value->Id."'>";
                  echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
                  echo "<td>".$value->Cost."</td>";
                  echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsJewelry\", \"Jewelry\")'></button>";
                  echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsJewelry\", \"Jewelry\")'></button></td>";
                  echo '</tr>';
                }
                ?>
              </tbody>
              <thead>
                <tr>
                  <td>
                    <div class="form-group">
                      <input type="hidden" class="form-control" id="Jewelry_id">
                      <textarea id="Jewelry_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control" id="Jewelry_cost" placeholder="<?=Yii::t("assets","Value")?>">
                    </div>
                  </td>
                  <td></td>
                </tr>
              </thead>  
            </table>
            <!-- SAVE BUTTON FOR FRACTION ENTRY -->

            <button class="btn btn-success btn-lg" onclick="save_asset_fraction('Jewelry_id', 'Jewelry_description', 'Jewelry_cost', 'AssetsJewelry', 'Jewelry')" type="button" ><?= Yii::t("common","Store") ?></button>

            <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
          </div>
          <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

        </div>

        <!-- NEXT PREVIOUS BUTTON -->
        <div class="login-button input-group">
          <div class="back pull-left">
            <a class="btn btn-success for-clr" data-toggle="tab" href="#Furniture" onclick="next_pre('Furniture')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
          </div>
          <div class="back pull-right">
           <a class="btn btn-success for-clr" data-toggle="tab" href="#ElectronicEquipment" onclick="next_pre('ElectronicEquipment')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
         </div>
         <div class="clearfix"></div>
       </div>
       <!-- END - NEXT PREVIOUS BUTTON -->

     </div>

     <div role="tabpanel" class="tab-pane" id="ElectronicEquipment" style="text-align: center !important;">
              <!-- 
              ##############################################################################
              ***************** Electronic Equipment ********************
              ##############################################################################
            -->
            <h2><?=Yii::t("assets","Electronic Equipment")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.9")?>"></i></h2>                                   
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
            <div id="electronic_equipment_verification" style="display: <?=($model->ElectronicEquipmentConfirm == 'Yes') ? 'none':'block' ?>;">
              <p>
                <?=Yii::t("assets","Did you have any electronic equipment")?>? 
              </p>
              <?php
                      // IF THE ANSWER IS "NO"
              if($model->ElectronicEquipmentConfirm == 'No')
                echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
              ?>
              <!-- YES/NO BUTTON -->
              <h3>
                <div class="btn-group btn-group-lg">
                  <button onclick="show_divs('electronic_equipment_verification', 'electronic_equipment_fraction_or_total', 'electronic_equipment_total')" type="button" class="btn btn-big btn-<?=($model->ElectronicEquipmentConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
                  <button onclick="set_no('ElectronicEquipment')" type="button" class="btn btn-big btn-<?=($model->ElectronicEquipmentConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
                </div>
              </h3>
              <!-- END YES/NO BUTTON -->
            </div>
            <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

            <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
            <div id="electronic_equipment_fraction_or_total" style="display: <?=($model->ElectronicEquipmentConfirm == 'Yes') ? 'block':'none' ?>;">

             <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
             <div id="electronic_equipment_total" style="display: <?=($model->ElectronicEquipmentFOrT != 'Fraction') ? 'block':'none' ?>;">

              <!-- show saved data -->    
              <p class="exp_alert">
                <?=($model->ElectronicEquipmentTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->ElectronicEquipmentTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
              </p>
              <!-- end - show saved data -->
              <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
              <button onclick="show_divs('electronic_equipment_total', 'electronic_equipment_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

              <!-- ENTRY FORM -->
              <p><?=Yii::t("assets","Please enter your electronic equipment assets")?></p>
              <div class="col-sm-12">
                <div class="col-sm-4 col-sm-offset-4">
                  <?php echo $form->textField($model,'ElectronicEquipmentTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Electronic Equipment")) ); ?>
                </div>
                <div class="col-sm-1">
                  <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('ElectronicEquipment')" type="button" ></button>
                </div>
              </div>
              <p>
                <br>
                <br>
                <button class="btn btn-success btn-lg" onclick="save_asset('ElectronicEquipment')" type="button" ><?= Yii::t("common","Store") ?></button>
              </p>
              <!-- END - ENTRY FORM -->

            </div>
            <!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

            <!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
            <div id="electronic_equipment_fraction" style="display: <?=($model->ElectronicEquipmentFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
              <table class="table" id="electronic_equipment_table">
                <thead>
                  <tr>
                    <th><?=Yii::t("assets","Description")?></th>
                    <th><?=Yii::t("assets","Value (BDT)")?></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($ElectronicEquipmentList as $value) {
                    echo "<tr id='ElectronicEquipment_row_".$value->Id."'>";
                    echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
                    echo "<td>".$value->Cost."</td>";
                    echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsElectronicEquipment\", \"electronic_equipment\")'></button>";
                    echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsElectronicEquipment\", \"ElectronicEquipment\")'></button></td>";
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <thead>
                  <tr>
                    <td>
                      <div class="form-group">
                        <input type="hidden" class="form-control" id="electronic_equipment_id">
                        <textarea id="electronic_equipment_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control" id="electronic_equipment_cost" placeholder="<?=Yii::t("assets","Value")?>">
                      </div>
                    </td>
                    <td></td>
                  </tr>
                </thead>  
              </table>
              <!-- SAVE BUTTON FOR FRACTION ENTRY -->

              <button class="btn btn-success btn-lg" onclick="save_asset_fraction('electronic_equipment_id', 'electronic_equipment_description', 'electronic_equipment_cost', 'AssetsElectronicEquipment', 'ElectronicEquipment')" type="button" ><?= Yii::t("common","Store") ?></button>

              <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
            </div>
            <!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

          </div>

          <!-- NEXT PREVIOUS BUTTON -->
          <div class="login-button input-group">
            <div class="back pull-left">
              <a class="btn btn-success for-clr" data-toggle="tab" href="#Jewellery" onclick="next_pre('Jewellery')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
            </div>
            <div class="back pull-right">
             <a class="btn btn-success for-clr" data-toggle="tab" href="#OutsideBusiness" onclick="next_pre('OutsideBusiness')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
           </div>
           <div class="clearfix"></div>
         </div>
         <!-- END - NEXT PREVIOUS BUTTON -->

       </div>

       <div role="tabpanel" class="tab-pane" id="OutsideBusiness" style="text-align: center !important;">
    <!-- 
    ##############################################################################
    ***************** Cash Asset Outside Business ********************
    ##############################################################################
  -->
  <h2><?=Yii::t("assets","Cash Asset Outside Business")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.10")?>"></i></h2>                                   
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
  <div id="outside_business_verification" style="display: <?=($model->OutsideBusinessConfirm == 'Yes') ? 'none':'block' ?>;">
    <p>
      <?=Yii::t("common","Did you have any cash assets outside business")?>?
    </p>
    <?php
            // IF THE ANSWER IS "NO"
    if($model->OutsideBusinessConfirm == 'No')
      echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
    ?>
    <!-- YES/NO BUTTON -->
    <h3>
      <div class="btn-group btn-group-lg">
        <button onclick="show_divs('outside_business_verification', 'outside_business_fraction_or_total', 'outside_business_total')" type="button" class="btn btn-big btn-<?=($model->OutsideBusinessConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
        <button onclick="set_no('OutsideBusiness')" type="button" class="btn btn-big btn-<?=($model->OutsideBusinessConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
      </div>
    </h3>
    <!-- END YES/NO BUTTON -->
  </div>
  <!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

  <!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
  <div id="outside_business_fraction_or_total" style="display: <?=($model->OutsideBusinessConfirm == 'Yes') ? 'block':'none' ?>;">

   <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
   <div id="outside_business_total" style="display: <?=($model->OutsideBusinessFOrT != 'Fraction') ? 'block':'none' ?>;">

    <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
    <button onclick="show_divs('outside_business_total', 'outside_business_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

    <!-- show saved data -->    
    <p class="exp_alert">
     <!-- show saved data -->
     <br>    
     <table class="table">
       <tr>
         <th><?=Yii::t("assets","Cash In Hand")?>:</th>
         <td><?=@$model->OutsideBusinessCashInHandTotal?></td>
       </tr>
       <tr>
         <th><?=Yii::t("assets","Cash At Bank")?>:</th>
         <td><?=@$model->OutsideBusinessCashAtBankTotal?></td>
       </tr>
       <tr>
          <th><?=Yii::t("assets","Other Funds")?>:</th>
            <td><?=@$model->OutsideBusinessFundTotal?></td>
        </tr>
       <tr>
         <th><?=Yii::t("assets","Other Deposits")?>:</th>
         <td><?=@$model->OutsideBusinessOtherdepositsTotal?></td>
       </tr>
     </table>
     <!-- end show saved data -->
   </p>
   <!-- end - show saved data -->


   <!-- ENTRY FORM -->
   <p><?=Yii::t("assets","Please enter cash assets outside business")?></p>
   <form id="outside_business_form">  
     <?php echo $form->hiddenField($model,'AssetsId'); ?>
     <!-- ====================== Cash In Hand Total ========================== -->
     <div class="row">
       <div class="col-md-4"><b><?=Yii::t("assets","Cash In Hand")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.21")?>"></i></div>

       <div class="col-md-4">
         <div class="form-group">
           <?php echo $form->textField($model,'OutsideBusinessCashInHandTotal',array('class'=>'form-control', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
         </div>
       </div>
       <div class="col-md-1">
        <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_outside_business_data('OutsideBusinessCashInHandTotal')" type="button" ></button>
      </div>
    </div>
    <br>
    <!-- ====================== Cash At Bank ========================== -->
    <div class="row">
     <div class="col-md-4"><b><?=Yii::t("assets","Cash At Bank")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.22")?>"></i></div>

     <div class="col-md-4">
       <div class="form-group">
         <?php echo $form->textField($model,'OutsideBusinessCashAtBankTotal',array('class'=>'form-control', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
       </div>
     </div>
     <div class="col-md-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_outside_business_data('OutsideBusinessCashAtBankTotal')" type="button" ></button>
    </div>
  </div>
  <br>
  <!-- ====================== Other Fund ========================== -->
  <div class="row">
   <div class="col-md-4"><b><?=Yii::t("assets","Other Fund")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.23")?>"></i></div>
   <div class="col-md-4">
     <div class="form-group">
       <?php echo $form->textField($model,'OutsideBusinessFundTotal',array('class'=>'form-control asset_number', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
     </div>
   </div>
   <div class="col-md-1">
    <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_outside_business_data('OutsideBusinessFundTotal')" type="button" ></button>
   </div>
  </div>
  <br>
  <!-- ====================== Other Deposits ========================== -->
  <div class="row">
   <div class="col-md-4"><b><?=Yii::t("assets","Other Deposits")?> </b>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.23")?>"></i></div>
   <div class="col-md-4">
     <div class="form-group">
       <?php echo $form->textField($model,'OutsideBusinessOtherdepositsTotal',array('class'=>'form-control asset_number', 'placeholder'=> Yii::t("assets","Value")) ); ?> 
     </div>
   </div>
   <div class="col-md-1">
    <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_outside_business_data('OutsideBusinessOtherdepositsTotal')" type="button" ></button>
  </div>
</div>



</form>
<p>
  <br>
  <button class="btn btn-success btn-lg" onclick="save_outside_business()" type="button" ><?= Yii::t("common","Store") ?></button>
</p>
<!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="outside_business_fraction" style="display: <?=($model->OutsideBusinessFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="outside_business_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Type")?></th>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($OutsideBusinessList as $value) {
        echo "<tr id='OutsideBusiness_row_".$value->Id."'>";
        echo "<td>".$value->OutsideBusinessType."</td>";
        echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsOutsideBusiness\", \"outside_business\")'></button>";
        echo "</td><td><button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsOutsideBusiness\", \"OutsideBusiness\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="outside_business_id">
            <select class="form-control" id="outside_business_type">
              <option value="">--Select Outside Business Type--</option>
              <option value="Cash on hand">Cash on hand (Notes and Currencies)</option>
              <option value="Cash at Bank">Cash At Bank (Banks, cards and other electronic cash)</option>
              <option value="Fund">Other Fund (Provident fund and other fund)</option>
              <option value="Other Deposits">Other Deposits (Other deposits, balance and advance)</option>
            </select>
          </div>
        </td>
        <td>
          <div class="form-group">
            <textarea id="outside_business_description" class="form-control" rows="2" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="outside_business_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_outside_business_fraction()" type="button" ><?= Yii::t("common","Store") ?></button>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#ElectronicEquipment" onclick="next_pre('ElectronicEquipment')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#AnyOtherAsset" onclick="next_pre('AnyOtherAsset')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
  </div>
<div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>

<div role="tabpanel" class="tab-pane" id="AnyOtherAsset" style="text-align: center !important;">
  <!-- 
  ##############################################################################
  ***************** Any Other Assets ********************
  ##############################################################################
-->
<h2><?=Yii::t("assets","Other Assets")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.11")?>"></i></h2>                                   
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
<div id="any_other_verification" style="display: <?=($model->AnyOtherAssetsConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any other assets")?>? 
  </p>
  <?php
          // IF THE ANSWER IS "NO"
  if($model->AnyOtherAssetsConfirm == 'No')
    echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('any_other_verification', 'any_other_fraction_or_total', 'any_other_total')" type="button" class="btn btn-big btn-<?=($model->AnyOtherAssetsConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
      <button onclick="set_no('AnyOtherAssets')" type="button" class="btn btn-big btn-<?=($model->AnyOtherAssetsConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="any_other_fraction_or_total" style="display: <?=($model->AnyOtherAssetsConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="any_other_total" style="display: <?=($model->AnyOtherAssetsFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->AnyOtherAssetsTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->AnyOtherAssetsTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('any_other_total', 'any_other_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your other assets")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'AnyOtherAssetsTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Other Assets")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('AnyOtherAssets')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_asset('AnyOtherAssets')" type="button" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="any_other_fraction" style="display: <?=($model->AnyOtherAssetsFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="any_other_table">
    <thead>
      <tr>
        <th><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($AnyOtherAssetsList as $value) {
        echo "<tr id='AnyOtherAssets_row_".$value->Id."'>";
        echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsAnyOther\", \"any_other\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsAnyOther\", \"AnyOtherAssets\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="any_other_id">
            <textarea id="any_other_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="any_other_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_asset_fraction('any_other_id', 'any_other_description', 'any_other_cost', 'AssetsAnyOther', 'AnyOtherAssets')" type="button" ><?= Yii::t("common","Store") ?></button>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#OutsideBusiness" onclick="next_pre('OutsideBusiness')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
   <a class="btn btn-success for-clr" data-toggle="tab" href="#OtherAssetReceipt" onclick="next_pre('OtherAssetReceipt')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
  </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>



<div role="tabpanel" class="tab-pane" id="OtherAssetReceipt" style="text-align: center !important;">
  <!-- 
  ##############################################################################
  ***************** Other Assets Receipt ********************
  ##############################################################################
-->
<h2><?=Yii::t("assets","Other Assets Receipt")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.12")?>"></i></h2>                                   
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
<div id="other_receipt_verification" style="display: <?=($model->OtherAssetsReceiptConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any receipt")?>? 
  </p>
  <?php
          // IF THE ANSWER IS "NO"
  if($model->OtherAssetsReceiptConfirm == 'No')
    echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('other_receipt_verification', 'other_receipt_fraction_or_total', 'other_receipt_total')" type="button" class="btn btn-big btn-<?=($model->OtherAssetsReceiptConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
      <button onclick="set_no('OtherAssetsReceipt')" type="button" class="btn btn-big btn-<?=($model->OtherAssetsReceiptConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="other_receipt_fraction_or_total" style="display: <?=($model->OtherAssetsReceiptConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="other_receipt_total" style="display: <?=($model->OtherAssetsReceiptFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->OtherAssetsReceiptTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->OtherAssetsReceiptTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->
  <?=Yii::t("assets","You can enter total annual data below or you can breakdown your data")?>
  <button onclick="show_divs('other_receipt_total', 'other_receipt_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("common","Breakdown")?></button>

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your other assets receipt")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'OtherAssetsReceiptTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Other Assets Receipt")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('OtherAssetsReceipt')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_asset('OtherAssetsReceipt')" type="button" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
<div id="other_receipt_fraction" style="display: <?=($model->OtherAssetsReceiptFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
  <table class="table" id="other_receipt_table">
    <thead>
      <tr>
        <th style="width:350px;"><?=Yii::t("assets","Description")?></th>
        <th><?=Yii::t("assets","Value (BDT)")?></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($OtherAssetsReceiptList as $value) {
        echo "<tr id='OtherAssetsReceipt_row_".$value->Id."'>";
        echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
        echo "<td>".$value->Cost."</td>";
        echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_exp(".$value->Id.", \"AssetsOtherReceipts\", \"other_receipt\")'></button>";
        echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_exp(".$value->Id.", \"AssetsOtherReceipts\", \"OtherAssetsReceipt\")'></button></td>";
        echo '</tr>';
      }
      ?>
    </tbody>
    <thead>
      <tr>
        <td>
          <div class="form-group">
            <input type="hidden" class="form-control" id="other_receipt_id">
            <textarea id="other_receipt_description" class="form-control" rows="3" placeholder="<?=Yii::t("assets","Description")?>"></textarea>
          </div>
        </td>
        <td>
          <div class="form-group">
            <input type="text" class="form-control" id="other_receipt_cost" placeholder="<?=Yii::t("assets","Value")?>">
          </div>
        </td>
        <td></td>
      </tr>
    </thead>  
  </table>
  <!-- SAVE BUTTON FOR FRACTION ENTRY -->

  <button class="btn btn-success btn-lg" onclick="save_asset_fraction('other_receipt_id', 'other_receipt_description', 'other_receipt_cost', 'AssetsOtherReceipts', 'OtherAssetsReceipt')" type="button" ><?= Yii::t("common","Store") ?></button>

  <!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
</div>
<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#AnyOtherAsset" onclick="next_pre('AnyOtherAsset')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
  <div class="back pull-right">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#NetWealth" onclick="next_pre('demo')" ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span><i class="fa fa-chevron-right"></i></a>
 </div>
 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>






<div role="tabpanel" class="tab-pane" id="NetWealth" style="text-align: center !important;">
  <!-- 
  ##############################################################################
  ***************** Net Wealth ********************
  ##############################################################################
-->
<h2><?=Yii::t("assets","Previous Year Net Wealth")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"3.13")?>"></i></h2>                                   
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
<div id="net_wealth_verification" style="display: <?=($model->NetWealthConfirm == 'Yes') ? 'none':'block' ?>;">
  <p>
    <?=Yii::t("assets","Did you have any net wealth")?>? 
  </p>
  <?php
          // IF THE ANSWER IS "NO"
  if($model->NetWealthConfirm == 'No')
    echo "<br>" . Yii::t("common","You chose No. If you want to change your answer, please select from below.");
  ?>
  <!-- YES/NO BUTTON -->
  <h3>
    <div class="btn-group btn-group-lg">
      <button onclick="show_divs('net_wealth_verification', 'net_wealth_fraction_or_total', 'net_wealth_total')" type="button" class="btn btn-big btn-<?=($model->NetWealthConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("common","YES")?></button>
      <button onclick="set_no('NetWealth')" type="button" class="btn btn-big btn-<?=($model->NetWealthConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("common","NO")?></button>
    </div>
  </h3>
  <!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="net_wealth_fraction_or_total" style="display: <?=($model->NetWealthConfirm == 'Yes') ? 'block':'none' ?>;">

 <!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
 <div id="net_wealth_total" style="display: <?=($model->NetWealthFOrT != 'Fraction') ? 'block':'none' ?>;">

  <!-- show saved data -->    
  <p class="exp_alert">
    <?=($model->NetWealthTotal == "") ? "" : Yii::t("assets","Current value is") . " " .$model->NetWealthTotal. ". " . Yii::t("assets","You can change the value below and press store")?>   
  </p>
  <!-- end - show saved data -->

  <!-- ENTRY FORM -->
  <p><?=Yii::t("assets","Please enter your net wealth")?></p>
  <div class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4">
      <?php echo $form->textField($model,'NetWealthTotal',array('class'=>'form-control', 'placeholder'=>Yii::t("assets","Net Wealth")) ); ?>
    </div>
    <div class="col-sm-1">
      <button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('NetWealth')" type="button" ></button>
    </div>
  </div>
  <p>
    <br>
    <br>
    <button class="btn btn-success btn-lg" onclick="save_asset('NetWealth')" type="button" ><?= Yii::t("common","Store") ?></button>
  </p>
  <!-- END - ENTRY FORM -->

</div>
<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">
  <div class="back pull-left">
    <a class="btn btn-success for-clr" data-toggle="tab" href="#OtherAssetReceipt" onclick="next_pre('OtherAssetReceipt')" ><i class="fa fa-chevron-left"></i><span class="previous-text"> <?= Yii::t("common","Previous") ?></span></a>
  </div>
    <div class="back pull-right">
        <a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/assets/review"><span class="previous-text"><?=Yii::t("income","Next")?></span> <i class="fa fa-chevron-right"></i></a>
    </div>

 <div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->

</div>


































</div>
</div>
</div>