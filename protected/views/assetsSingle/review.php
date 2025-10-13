<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/review-page.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<style>
a.btn {
  color: #fff !important;
}

a.btn:hover {
  /*color: #f00 !important;*/
}


</style>

<?php

$total =  (double) $this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital") +
          (double) $this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list") + 
          (double) $this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property") + 
          (double) $this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property") + 
          (double) $this->sum_of_particular_field($model, "Investment", "assets_investment") + 
          (double) $this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles") + 
          (double) $this->sum_of_particular_field($model, "Jewelry", "assets_jewelry") + 
          (double) $this->sum_of_particular_field($model, "Furniture", "assets_furniture") + 
          (double) $this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment") + 
          (double) $this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business") + 
          (double) $this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other") + 
          (double) $this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts") + 
          (double) $this->sum_of_particular_field($model, "NetWealth", "");

$total = number_format(round($total, 2),2);

?>
<div id="content" class="dashbord-bg for-pdd">


    <div class="registration">

      <div class="dashboard-box"> 

        <div id="home-mid" class="reg-form">

            <!--    <div class="income-dashbord">
                    	<h2><a href="<?//=Yii::app()->baseUrl.'/index.php/liabilities/entry'?>"><?//=Yii::t("common", "Let's Get Started with Liabilities")?></a></h2>
                	</div>-->
					<div class="income-dashbord started-link started-link-margin-bottom">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/liabilities/entry'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Liabilities")?></a>
                    </div>


          <div class="home_icon-box home_icon-3"></div>
          <h4><?=Yii::t("assets", "Assets")?></h4>
          <!-- <h4><?=Yii::t("assets", "Total Amount")?> = <?=$total.Yii::t("assets", $this->currency);?></h4> -->

          <div class="clearfix"></div>
<!-- 
##############################################################################
***************** Business Capital Varification ********************
##############################################################################
-->


<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
     <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Business Capital")?></h3>
        <p class="result_p"><?= (($this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital")."</span>":$this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "BusinessCapital", "assets_business_capital")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
     </div>
      <div class="col-md-1 edit-button">
    	<a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#BusinessCapital" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
      </div>
    
  </div>
</div>
<!-- 
##############################################################################
***************** Shareholdings Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Shareholding Assets")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list")."</span>":$this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "ShareholdingCompany", "assets_shareholding_company_list")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
    	<a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#ShareholdingCompanyCost" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
    
  </div>
</div>

<!-- 
##############################################################################
***************** Non-Agricultural Property Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Non-Agricultural Property")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property")."</span>":$this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "NonAgricultureProperty", "assets_non_agriculture_property")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
    	<a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#NonAgricultureProperty" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Agricultural Property Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
    <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Agricultural Property")?></h3>
    <p class="result_p"><?=(($this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property")."</span>":$this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property"));?>
      
      <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "AgricultureProperty", "assets_agriculture_property")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
    </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#AgricultureProperty" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Investment Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Investments")?></h3>
        <p class="result_p"><?= (($this->sum_of_particular_field($model, "Investment", "assets_investment") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Investment", "assets_investment")."</span>":$this->sum_of_particular_field($model, "Investment", "assets_investment"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "Investment", "assets_investment")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Investment", "assets_investment")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Investments" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>
 
<!-- 
##############################################################################
***************** Motor Vehicle Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Motor Vehicle")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles")."</span>":$this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "MotorVehicle", "assets_motor_vehicles")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#MotorVehicle" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Furniture Varification ********************
##############################################################################
-->
<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Furniture")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "Furniture", "assets_furniture") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Furniture", "assets_furniture")."</span>":$this->sum_of_particular_field($model, "Furniture", "assets_furniture"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "Furniture", "assets_furniture")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Furniture", "assets_furniture")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Furniture" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Jewellery Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Jewellery")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "Jewelry", "assets_jewelry") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "Jewelry", "assets_jewelry")."</span>":$this->sum_of_particular_field($model, "Jewelry", "assets_jewelry"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "Jewelry", "assets_jewelry")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "Jewelry", "assets_jewelry")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#Jewelry" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Electronic Equipment Varification ********************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Electronic Equipment")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment")."</span>":$this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "ElectronicEquipment", "assets_electronic_equipment")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#ElectronicEquipment" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Cash Asset Outside Business Varification ********************
##############################################################################
--> 

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Cash Assets")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business")."</span>":$this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OutsideBusiness", "assets_outside_business")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
        
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#OutsideBusiness" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Any Other Assets Data **************************************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Other Assets")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other")."</span>":$this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "AnyOtherAssets", "assets_any_other")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#AnyOtherAsset" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

<!-- 
##############################################################################
***************** Other Assets Receipt Data **********************************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
        <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Other Assets Receipt")?></h3>
        <p class="result_p"><?=(($this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts")."</span>":$this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts"));?>
          
          <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "OtherAssetsReceipt", "assets_other_receipts")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
        </p>
    </div>
    <div class="col-md-1 edit-button">
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#OtherAssetReceipt" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>


<!-- 
##############################################################################
***************** Net Wealth Data **********************************
##############################################################################
-->

<div class="panel panel panel-success pannel-top ">
  <div class="panel-body">
    <div class="clearfix"></div>
    <div class="col-md-11">
    <h3 class="padding-bottom_reg-form"><?=Yii::t("assets", "Net Wealth")?></h3>
    <p class="result_p"><?=(($this->sum_of_particular_field($model, "NetWealth", "") == 'Not answered yet') ? "<span style='color:red'>".$this->sum_of_particular_field($model, "NetWealth", "")."</span>":$this->sum_of_particular_field($model, "NetWealth", ""));?>
      
      <?php 
            if(utf8_encode($this->sum_of_particular_field($model, "NetWealth", "")) != utf8_encode(Yii::t("assets", "Not answered yet")) && utf8_encode($this->sum_of_particular_field($model, "NetWealth", "")) != utf8_encode(Yii::t("assets", "You chose No"))){
                echo Yii::t("assets", $this->currency);
            }
          ?>
    </p>
    </div>
   	<div class="col-md-1 edit-button"> 
        <a href="<?=Yii::app()->baseUrl ?>/index.php/assets/entry#NetWealth" type="button" class="btn btn-success pull-right"><?=Yii::t("income", "Edit")?></a>
    </div>
  </div>
</div>

           <!-- <div class="income-dashbord">
                <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/liabilities/entry'?>"><?//=Yii::t("common", "Let's Get Started with Liabilities")?></a></h2>
            </div>-->
            <div class="income-dashbord started-link common-margin-top">
                        <a href="<?=Yii::app()->baseUrl.'/index.php/liabilities/entry'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Liabilities")?></a>
            </div>
</div>
<div class="clearfix"></div>


</div>


</div>

</div>
