<style>
a.btn {
  color: #fff !important;
}

a.btn:hover {
  color: #f00 !important;
}

</style>

<?php

$total =  $this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital") +
          $this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list") + 
          $this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property") + 
          $this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property") + 
          $this->sum_of_particular_field($model, "Investment", "assets_investment") + 
          $this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles") + 
          $this->sum_of_particular_field($model, "Jewelry", "assets_jewelry") + 
          $this->sum_of_particular_field($model, "Furniture", "assets_furniture") + 
          $this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment") + 
          $this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business") + 
          $this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other");

$total = round($total, 2);

?>
<div id="content" class="dashbord-bg">

  <div class="container">

    <div class="registration">

      <div class="dashboard-box"> 

        <div id="home-mid" class="reg-form">

          <div class="home_icon-box home_icon-3"></div>
          <h4>Assets</h4>
          <h4>Total Amount = <?=$total?></h4>

          <div class="clearfix"></div>
<!-- 
##############################################################################
***************** Business Capital Varification ********************
##############################################################################
-->


<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Business Capital</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#BusinessCapital" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>
<!-- 
##############################################################################
***************** Shareholdings Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Shareholding Assets</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#ShareholdingCompanyCost" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Non-Agricultural Property Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Non-Agricultural Property</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#NonAgricultureProperty" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Agricultural Property Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Agricultural Property</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#AgricultureProperty" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Investment Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Investment</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "Investment", "assets_investment")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Investments" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Motor Vehicle Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Motor Vehicle Data</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#MotorVehicle" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Furniture Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Furniture</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "Furniture", "assets_furniture")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Furniture" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Jewellery Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Jewellery</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "Jewelry", "assets_jewelry")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Jewellery" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Electronic Equipment Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Electronic Equipment</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#ElectronicEquipment" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Cash Asset Outside Business Varification ********************
##############################################################################
--> 

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Cash Asset Outside Business Verification</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#OutsideBusiness" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>

<!-- 
##############################################################################
***************** Any Other Assets Data **************************************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-heading">Other Assets</div>
  <div class="panel-body">
    <div class="clearfix"></div>
    <p class="result_p"><?=$this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other")?></p>
    <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#AnyOtherAsset" type="button" class="btn btn-success pull-right">Edit</a>
  </div>
</div>


</div>
<div class="clearfix"></div>
</div>


</div>

</div>
</div>  
