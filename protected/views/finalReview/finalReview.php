<style>
  .home_icon-8{
   background:url(../img/check-tick-icon-22.png) no-repeat center center; 
   height: 45px;
   margin: auto;
   width: 45px;
 }
 .finalreview hr{
 	margin: 0;
 }
 .finalreview button{
 	margin-top:10px;
 }
 .finalreview .nopadding{
 	padding: 5px 0 !important;
 }
</style>
<script type="text/javascript">
$(document).ready(function(){
  $('button').click(function(){
    $(this).text(function(i,old){
      return old == '<?=Yii::t('liability', 'Review')?>' ?  '<?=Yii::t('liability', 'Hide')?>' : '<?=Yii::t('liability', 'Review')?>';
    });
  });
});
</script>
<div id="home-mid" class="reg-form income-dashbord finalreview">
  <div role="tabpanel">
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <div class="home_icon-box home_icon-6"></div>
       <!--  <div class="pull-right">
         <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/viewPdf" target="_blank" class="btn btn-success">Final PDF</a>
         <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/finalReview/finalPrint" target="_blank" class="btn btn-success">Print</a>
       </div> -->
        <h4><?=Yii::t('dashboard', 'Final Review')?></h4>

        <div class="clearfix"></div>
        <hr/>
        <!--Personal Information Final Review-->
        <div class="review-box">
          <div class="col-lg-10 col-md-offset-1">
            <div class="col-lg-12 nopadding">
              <div class="col-lg-1 nopadding"><div class="review_icon-box home_icon-1"></div></div>

              <div class="col-lg-11 nopadding"> 
                <div class="panel-heading" role="tab" id="headingThree">
                  <div class="pull-left col-lg-9 nopadding">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <span><?=Yii::t('dashboard', 'Personal Information')?></span>
                    </a>
                  </div>
                  <button type="button" id="btn-id" class="btn btn-<?=($this->personalInformationStatusBar() == 100) ? 'success':'danger'?> btn-sm pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><?=Yii::t('liability', 'Review')?></button>
                </div>

                <div class="clearfix"></div>

                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="col-lg-12 nopadding">
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#etin"><?=Yii::t('p_info', "E-TIN")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#etin" type="button" class="btn <?php echo (@$personal_info_model->ETIN > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$personal_info_model->ETIN > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>

                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-1"><?=Yii::t('dashboard', 'Personal Information')?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-1" type="button" class="btn <?php echo (@$personal_info_model->Name != '' || $personal_info_model->DOB != '' || $personal_info_model->Status != '' || $personal_info_model->SpouseName != '' || $personal_info_model->SpouseETIN != '' || $personal_info_model->Gender != '') ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$personal_info_model->Name != '' || $personal_info_model->DOB != '' || $personal_info_model->Status != '' || $personal_info_model->SpouseName != '' || $personal_info_model->SpouseETIN != '' || $personal_info_model->Gender != '') ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-2"><?=Yii::t('p_info', "Additional Personal Information")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/personalInformation/entry#PIDetails-2" type="button" class="btn <?php echo (@$personal_info_model->Disability != '' || $personal_info_model->FathersName != '' || $personal_info_model->MothersName != '' || $personal_info_model->EmployerName != '' || $personal_info_model->EmployerAddress != '' || $personal_info_model->DivisionId != '' || $personal_info_model->DistrictId != '' || $personal_info_model->Area != '' || $personal_info_model->SectorBlock != '' || $personal_info_model->Road != '' || $personal_info_model->House != '' || $personal_info_model->ZipCode != '' || $personal_info_model->PresentAddress != '' || $personal_info_model->PermanentAddress != '') ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$personal_info_model->Disability != '' || $personal_info_model->FathersName != '' || $personal_info_model->MothersName != '' || $personal_info_model->EmployerName != '' || $personal_info_model->EmployerAddress != '' || $personal_info_model->DivisionId != '' || $personal_info_model->DistrictId != '' || $personal_info_model->Area != '' || $personal_info_model->SectorBlock != '' || $personal_info_model->Road != '' || $personal_info_model->House != '' || $personal_info_model->ZipCode != '' || $personal_info_model->PresentAddress != '' || $personal_info_model->PermanentAddress != '') ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
        <hr/>






        <!--Income Final Review-->
        <?php
        $totalIncomeSalaries = IncomeSalaries::model()->find(array(  'select'=>' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );

        $totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array(  'select'=>' SUM(NetIncome) as SumRentalIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );

        $totalIncomeShareProfit = IncomeShareProfit::model()->find(array(  'select'=>' SUM(NetValueOfShare) as SumValueOfShare', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$income_model->IncomeId) ) );

        $IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data'=>@$income_model->IncomeId) );

        $TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome +@$IncomeOtherSourceData->DividendIncome +@$IncomeOtherSourceData->WinningsIncome +@$IncomeOtherSourceData->OthersIncome );

        $IncomeTaxRebateData =  IncomeTaxRebate::model()->find('IncomeId=:data', array(':data'=>@$income_model->IncomeId) ); 

        $TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium +@$IncomeTaxRebateData->DeferredAnnuity +@$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Others );



        ?>
        <div class="review-box">
          <div class="col-lg-10 col-md-offset-1">
            <div class="col-lg-12 nopadding">
              <div class="col-lg-1 nopadding"><div class="review_icon-box home_icon-2"></div></div>

              <div class="col-lg-11 nopadding"> 
                <div class="panel-heading" role="tab" id="headingThree">
                  <div class="pull-left col-lg-10 nopadding">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span><?=Yii::t('dashboard', 'Income')?></span>
                    </a>
                  </div>
                  <button type="button" class="btn btn-<?=($this->incomeStatusBar() == 100) ? 'success':'danger'?> btn-sm pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?=Yii::t('liability', 'Review')?></button>
                </div>

                <div class="clearfix"></div>
                
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <div class="col-lg-12 nopadding">
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_7"><?=Yii::t('income',"Total salary income")?></a>
                      </div>

                      <div class="col-lg-2 nopadding">
                      <?php //var_dump($totalIncomeSalaries->SumTaxableIncome);die; ?>
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_7" class="btn <?php echo (@$income_model->IncomeSalariesConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeSalariesConfirm != Null)?Yii::t('income',"Edit"):(@$totalIncomeSalaries->SumTaxableIncome != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_9"><?=Yii::t('income',"Total interest on security income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_9" type="button" class="btn <?php echo (@$income_model->InterestOnSecuritiesConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->InterestOnSecuritiesConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'InterestOnSecurities') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_11"><?=Yii::t('income',"Total rental properties income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_11" type="button" class="btn <?php echo (@$income_model->IncomeHousePropertiesConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeHousePropertiesConfirm != Null)?Yii::t('income',"Edit"):(@$totalIncomeHouseProperties->SumRentalIncome != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_13"><?=Yii::t('income',"Total agricultural income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_13" type="button" class="btn <?php echo (@$income_model->IncomeAgricultureConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeAgricultureConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'IncomeAgriculture') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_15"><?=Yii::t('income',"Total business or profession income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_15" type="button" class="btn <?php echo (@$income_model->IncomeBusinessOrProfessionConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeBusinessOrProfessionConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'IncomeBusinessOrProfession') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_17"><?=Yii::t('income',"Total share of firm profit")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_17" type="button" class="btn <?php echo (@$income_model->IncomeShareProfitConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeShareProfitConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'IncomeShareProfit') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_18"><?=Yii::t('income',"Total income of spouse or minor child")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_18" type="button" class="btn <?php echo (@$income_model->IncomeSpouseOrChildConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeSpouseOrChildConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'IncomeSpouseOrChild') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_19"><?=Yii::t('income',"Total capital gain income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_19" type="button" class="btn <?php echo (@$income_model->IncomeCapitalGainsConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeCapitalGainsConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'IncomeCapitalGains') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_21"><?=Yii::t('income',"Total income from any other source")?></a>
                      </div>
                      <?php //var_dump($income_model->IncomeOtherSourceConfirm);die; ?>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_21" type="button" class="btn <?php echo (@$income_model->IncomeOtherSourceConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeOtherSourceConfirm != Null) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_23"><?=Yii::t('income',"Total foreign income")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_23" type="button" class="btn <?php echo (@$income_model->ForeignIncomeConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->ForeignIncomeConfirm != Null)?Yii::t('income',"Edit"):($this->totalOutput($income_model,'ForeignIncome') > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      <?php 
                      $totalIncome= $this->totalIncome(Yii::app()->user->CPIId); 
                      ?>
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_25"><?=Yii::t('income',"Total tax rebate")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_25" type="button" class="btn <?php echo (@$income_model->IncomeTaxRebateConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeTaxRebateConfirm != Null)?Yii::t('income',"Edit"):(@$TotalIncomeTaxRebate != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <?php 
                      $GrandTotalPayableTax = $this->netPayableTax( Yii::app()->user->CPIId);
                      ?>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_26"><?=Yii::t('income',"Paid from your salary income source")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_26" type="button" class="btn <?php echo (@$income_model->IncomeTaxDeductedAtSourceConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeTaxDeductedAtSourceConfirm != Null) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_27"><?=Yii::t('income',"Advance paid tax")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_27" type="button" class="btn <?php echo (@$income_model->IncomeTaxInAdvanceConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->IncomeTaxInAdvanceConfirm != Null)?Yii::t('income',"Edit"):(@$income_model->IncomeTaxInAdvance != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_28"><?=Yii::t('income',"Adjustment of tax refund (if any )")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_28" type="button" class="btn <?php echo (@$income_model->AdjustmentTaxRefundConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->AdjustmentTaxRefundConfirm != Null)?Yii::t('income',"Edit"):(@$income_model->AdjustmentTaxRefund != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      <!--  
                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_29"><?=Yii::t('income',"82C")?></a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/income/entry#s_29" type="button" class="btn <?php echo (@$income_model->Income82cConfirm != NULL) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$income_model->Income82cConfirm != NULL) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                      </div>
                      -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
        <hr/>





        <!--Asset Final Review-->
        <?php
        Yii::import('application.controllers.AssetsController');

        if(isset($asset_model->NetWealthConfirm) && $asset_model->NetWealthConfirm == "Yes") {
          $NetWealth = $asset_model->NetWealthTotal;
        }
        elseif(isset($asset_model->NetWealthConfirm) && $asset_model->NetWealthConfirm == "No") {
          $NetWealth = Yii::t("expense", "You chose No");
        }
        else {
          $NetWealth = Yii::t("expense", "Not answered yet");
        }

        $total =  (double) AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "ShareholdingCompany", "assets_shareholding_company_list") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "AgricultureProperty", "assets_agriculture_property") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "Investment", "assets_investment") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "MotorVehicle", "assets_motor_vehicles") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "Jewelry", "assets_jewelry") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "Furniture", "assets_furniture") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "ElectronicEquipment", "assets_electronic_equipment") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "OutsideBusiness", "assets_outside_business") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "AnyOtherAssets", "assets_any_other") +
                  (double) AssetsController::sum_of_particular_field($asset_model, "OtherAssetsReceipt", "assets_other_receipts") +
                  (double) $NetWealth;

        $total = round($total, 2);
        ?>
        <div class="review-box">
          <div class="col-lg-10 col-md-offset-1">
           <div class="col-lg-12 nopadding">
            <div class="col-lg-1 nopadding"><div class="review_icon-box home_icon-3"></div></div>
            <div class="col-lg-11 nopadding"> 
              <div class="panel-heading" role="tab" id="headingThree">
                <div class="pull-left col-lg-10 nopadding">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span><?=Yii::t('dashboard', 'Assets')?></span>
                  </a>
                </div>

                <button type="button" class="btn btn-<?=($this->assetsStatusBar() == 100) ? 'success':'danger'?> btn-sm pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><?=Yii::t('liability', 'Review')?></button>  

              </div>

              <div class="clearfix"></div>
              <?php //var_dump($asset_model);die; ?>

              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                  <div class="col-lg-12 nopadding">
                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#BusinessCapital">
                        <?=Yii::t("assets", "Business Capital")?>
                        <?//=AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#BusinessCapital" type="button" class="btn <?php echo (@$asset_model->BusinessCapitalConfirm == 'No')?'btn-success':(@AssetsController::sum_of_particular_field($asset_model, "BusinessCapital", "assets_business_capital") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm">
                        <?php echo (@$asset_model->BusinessCapitalConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "BusinessCapital", "assets_business_capital") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?>
                      </a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#ShareholdingCompanyCost">
                        <?=Yii::t("assets", "Shareholding Assets")?>
                        <?//=AssetsController::sum_of_particular_field(@$asset_model, "ShareholdingCompany", "assets_shareholding_company_list")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#ShareholdingCompanyCost" type="button" class="btn <?php echo (@$asset_model->ShareholdingCompanyConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "ShareholdingCompany", "assets_shareholding_company_list") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm">
                        <?php echo (@$asset_model->ShareholdingCompanyConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "ShareholdingCompany", "assets_shareholding_company_list") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#NonAgricultureProperty">
                          <?=Yii::t("assets", "Non-Agricultural Property")?>
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "NonAgricultureProperty", "assets_non_agriculture_property")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#NonAgricultureProperty" type="button" class="btn <?php echo (@$asset_model->NonAgriculturePropertyConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->NonAgriculturePropertyConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "NonAgricultureProperty", "assets_non_agriculture_property") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#AgricultureProperty">
                          <?=Yii::t("assets", "Agricultural Property")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "AgricultureProperty", "assets_agriculture_property")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#AgricultureProperty" type="button" class="btn <?php echo (@$asset_model->AgriculturePropertyConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "AgricultureProperty", "assets_agriculture_property") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->AgriculturePropertyConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "AgricultureProperty", "assets_agriculture_property") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Investments">
                          <?=Yii::t("assets", "Investments")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "Investment", "assets_investment")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Investments" type="button" class="btn <?php echo (@$asset_model->InvestmentConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "Investment", "assets_investment") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->InvestmentConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "Investment", "assets_investment") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#MotorVehicle">
                          <?=Yii::t("assets", "Motor Vehicle")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "MotorVehicle", "assets_motor_vehicles")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#MotorVehicle" type="button" class="btn <?php echo (@$asset_model->MotorVehicleConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "MotorVehicle", "assets_motor_vehicles") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->MotorVehicleConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "MotorVehicle", "assets_motor_vehicles") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Furniture">
                          <?=Yii::t("assets", "Furniture")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "Furniture", "assets_furniture")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Furniture" type="button" class="btn <?php echo (@$asset_model->FurnitureConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "Furniture", "assets_furniture") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->FurnitureConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "Furniture", "assets_furniture") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Jewelry">
                          <?=Yii::t("assets", "Jewellery")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "Jewelry", "assets_jewelry")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#Jewelry" type="button" class="btn <?php echo (@$asset_model->JewelryConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "Jewelry", "assets_jewelry") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->JewelryConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "Jewelry", "assets_jewelry") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#ElectronicEquipment">
                          <?=Yii::t("assets", "Electronic Equipment")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "ElectronicEquipment", "assets_electronic_equipment")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#ElectronicEquipment" type="button" class="btn <?php echo (@$asset_model->ElectronicEquipmentConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "ElectronicEquipment", "assets_electronic_equipment") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->ElectronicEquipmentConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "ElectronicEquipment", "assets_electronic_equipment") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#OutsideBusiness">
                          <?=Yii::t("assets", "Cash Assets")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "OutsideBusiness", "assets_outside_business")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#OutsideBusiness" type="button" class="btn <?php echo (@$asset_model->OutsideBusinessConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "OutsideBusiness", "assets_outside_business") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->OutsideBusinessConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "OutsideBusiness", "assets_outside_business") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#AnyOtherAsset">
                          <?=Yii::t("assets", "Other Assets")?> 
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "AnyOtherAssets", "assets_any_other")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#AnyOtherAsset" type="button" class="btn <?php echo (@$asset_model->AnyOtherAssetsConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "AnyOtherAssets", "assets_any_other") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->AnyOtherAssetsConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "AnyOtherAssets", "assets_any_other") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#OtherAssetReceipt">
                          <?=Yii::t("assets", "Other Assets Receipt")?>
                          <?//=AssetsController::sum_of_particular_field(@$asset_model, "OtherAssetsReceipt", "assets_other_receipts")?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#OtherAssetReceipt" type="button" class="btn <?php echo (@$asset_model->OtherAssetsReceiptConfirm == 'No')?'btn-success':(AssetsController::sum_of_particular_field(@$asset_model, "OtherAssetsReceipt", "assets_other_receipts") > 0) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->OtherAssetsReceiptConfirm == 'No')?Yii::t('income',"Edit"):((AssetsController::sum_of_particular_field(@$asset_model, "OtherAssetsReceipt", "assets_other_receipts") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start")); ?></a>
                      </div>

                      <div class="col-lg-10 nopadding">
                        
                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#NetWealth">
                          <?=Yii::t("assets", "Previous Year Net Wealth")?> 
                          <?//= $NetWealth; ?>
                        </a>
                      </div>
                      <div class="col-lg-2 nopadding">
                          <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/assets/entry#NetWealth" type="button" class="btn <?php echo (@$asset_model->NetWealthConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$asset_model->NetWealthConfirm != Null)?Yii::t('income',"Edit"):($NetWealth > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                        </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <hr>






        <!--Expence Final Review-->
        <?php
        Yii::import('application.controllers.ExpenditureController');

        if(isset($expence_model->TotalTaxPaidLastYearConfirm) && $expence_model->TotalTaxPaidLastYearConfirm == "Yes") {
          $TotalTaxPaid = $expence_model->TotalTaxPaidLastYear;
        }
        elseif(isset($expence_model->TotalTaxPaidLastYearConfirm) && $expence_model->TotalTaxPaidLastYearConfirm == "No") {
          $TotalTaxPaid = Yii::t("expense", "You chose No");
        }
        else {
          $TotalTaxPaid = Yii::t("expense", "Not answered yet");
        }


        $total =  (double) ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") +
(double) $TotalTaxPaid +
(double) ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") +
(double) ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special");

        $total = round($total, 2);
        ?>
        <div class="review-box">
          <div class="col-lg-10 col-md-offset-1">
           <div class="col-lg-12 nopadding">
            <div class="col-lg-1 nopadding"><div class="review_icon-box home_icon-4"></div></div>

            <div class="col-lg-11 nopadding"> 

              <div class="panel-heading" role="tab" id="headingThree">
                <div class="pull-left col-lg-10 nopadding">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                    <span><?=Yii::t('dashboard', 'Expenses')?></span>
                  </a>
                </div>
                <button type="button" class="btn btn-<?=($this->expenseStatusBar() == 100) ? 'success':'danger'?> btn-sm pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour"><?=Yii::t('liability', 'Review')?></button>  
              </div>

              <div class="clearfix"></div>

              <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                  <div class="col-lg-12 nopadding ln-padding">
                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#personal_food_expenses">
                        <?=Yii::t("expense", "Personal or Food Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#personal_food_expenses" type="button" class="btn <?php echo (@$expence_model->PersonalFoodingConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->PersonalFoodingConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "PersonalFooding", "exp_personal_fooding") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <!-- <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#total_tax_paid_last_year">
                        <?=Yii::t("expense", "Tax Paid Last Year")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#total_tax_paid_last_year" type="button" class="btn <?php echo (@$expence_model->TotalTaxPaidLastYearConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->TotalTaxPaidLastYearConfirm != Null)?Yii::t('income',"Edit"):($TotalTaxPaid > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div> -->

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#accommodation_expenses">
                        <?=Yii::t("expense", "Accommodation Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#accommodation_expenses" type="button" class="btn <?php echo (@$expence_model->AccommodationConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->AccommodationConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "Accommodation", "exp_accommodation") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#transportation_expenses">
                        <?=Yii::t("expense", "Transport Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#transportation_expenses" type="button" class="btn <?php echo (@$expence_model->TransportConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->TransportConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "Transport", "exp_transport") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_transportation_expenses">
                        <?=Yii::t("expense", "Other Transport Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_transportation_expenses" type="button" class="btn <?php echo (@$expence_model->OtherTransportConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->OtherTransportConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "OtherTransport", "exp_other_transport") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#electricity_expenses">
                        <?=Yii::t("expense", "Electricity Bill")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#electricity_expenses" type="button" class="btn <?php echo (@$expence_model->ElectricityBillConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->ElectricityBillConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "ElectricityBill", "exp_electricity_bill")  > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#water_expenses">
                        <?=Yii::t("expense", "Water Bill")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#water_expenses" type="button" class="btn <?php echo (@$expence_model->WasaBillConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->WasaBillConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "WasaBill", "exp_wasa_bill") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#gas_expenses">
                        <?=Yii::t("expense", "Gas Bill")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#gas_expenses" type="button" class="btn <?php echo (@$expence_model->GasBillConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->GasBillConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "GasBill", "exp_gas_bill") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#telephone_expenses">
                        <?=Yii::t("expense", "Telephone Bill")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#telephone_expenses" type="button" class="btn <?php echo (@$expence_model->TelephoneBillConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->TelephoneBillConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "TelephoneBill", "exp_telephone_bill") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_household_expenses">
                        <?=Yii::t("expense", "Other Household Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_household_expenses" type="button" class="btn <?php echo (@$expence_model->OtherHouseholdConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->OtherHouseholdConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "OtherHousehold", "exp_other_household") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#child_edu_expenses">
                        <?=Yii::t("expense", "Education Expenses for Children")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#child_edu_expenses" type="button" class="btn <?php echo (@$expence_model->ChildrenEducationConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->ChildrenEducationConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "ChildrenEducation", "exp_children_education") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#foreign_travel_expenses">
                        <?=Yii::t("expense", "Personal Foreign Travel Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#foreign_travel_expenses" type="button" class="btn <?php echo (@$expence_model->PersonalForeignTravelConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->PersonalForeignTravelConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "PersonalForeignTravel", "exp_personal_foreign_travel") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#festival_other_expenses">
                        <?=Yii::t("expense", "Festival Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#festival_other_expenses" type="button" class="btn <?php echo (@$expence_model->FestivalOtherSpecialConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->FestivalOtherSpecialConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "FestivalOtherSpecial", "exp_festival_other_special") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#donation_expenses">
                        <?=Yii::t("expense", "Donation")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#donation_expenses" type="button" class="btn <?php echo (@$expence_model->DonationConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->DonationConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "Donation", "exp_donation") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_special_expenses">
                        <?=Yii::t("expense", "Other Special Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_special_expenses" type="button" class="btn <?php echo (@$expence_model->OtherSpecialConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->OtherSpecialConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "OtherSpecial", "exp_other_special") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_expenses">
                        <?=Yii::t("expense", "Other Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#other_expenses" type="button" class="btn <?php echo (@$expence_model->OtherConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->OtherConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "Other", "exp_other") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#tax_at_source_expenses">
                        <?=Yii::t("expense", "Tax At Source")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#tax_at_source_expenses" type="button" class="btn <?php echo (@$expence_model->TaxAtSourceConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->TaxAtSourceConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "TaxAtSource", "exp_tax_at_source") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#surcharge_other_expenses">
                        <?=Yii::t("expense", "Surcharge And Other")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#surcharge_other_expenses" type="button" class="btn <?php echo (@$expence_model->SurchargeOtherConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->SurchargeOtherConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "SurchargeOther", "exp_surcharge_other") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#loss_deductions_expenses">
                        <?=Yii::t("expense", "Loss, Deductions, Expenses")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#loss_deductions_expenses" type="button" class="btn <?php echo (@$expence_model->LossDeductionsConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->LossDeductionsConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "LossDeductions", "exp_loss_deductions") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="col-lg-10 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#loss_deductions_expenses">
                        <?=Yii::t("expense", "Gift, donation and contribution")?>
                      </a>
                    </div>
                    <div class="col-lg-2 nopadding">
                      <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/expenditure/entry#gift_donation_contribution" type="button" class="btn <?php echo (@$expence_model->GiftDonationContributionConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$expence_model->GiftDonationContributionConfirm != Null)?Yii::t('income',"Edit"):(ExpenditureController::sum_of_particular_field($expence_model, "GiftDonationContribution", "exp_gift_donation_contribution") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                    </div>

                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <hr>




      <!--Liabilities Final Review-->
      <?php
      Yii::import('application.controllers.LiabilitiesController');

      $total = (double) LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") +
      (double) LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") +
      (double) LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") +
      (double) LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan");

      $total = round($total, 2);
      ?>
      <div class="review-box">
        <div class="col-lg-10 col-md-offset-1">
         <div class="col-lg-12 nopadding">
          <div class="col-lg-1 nopadding"><div class="review_icon-box home_icon-5"></div></div>
          <div class="col-lg-11 nopadding"> 

            <div class="panel-heading" role="tab" id="headingThree">
              <div class="pull-left col-lg-10 nopadding">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                  <span><?=Yii::t('dashboard', 'Liabilities')?></span>
                </a>
              </div>
              <button type="button" class="btn btn-<?=($this->liabilityStatusBar() == 100) ? 'success':'danger'?> btn-sm pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive"><?=Yii::t('liability', 'Review')?></button>  
            </div>

            <div class="clearfix"></div>

            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <div class="col-lg-12 nopadding ln-padding">
                  <div class="col-lg-10 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#mortgages_on_property">
                      <?=Yii::t("liability", "Mortgages")?>
                    </a>
                  </div>
                  <div class="col-lg-2 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#lia_mortgages_on_property" type="button" class="btn <?php echo (@$liability_model->MortgagesOnPropertyConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$liability_model->MortgagesOnPropertyConfirm != Null)?Yii::t('income',"Edit"):(LiabilitiesController::sum_of_particular_field($liability_model, "MortgagesOnProperty", "lia_mortgages_on_property") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                  </div>


                  <div class="col-lg-10 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#unsecured_loans">
                      <?=Yii::t("liability", "Unsecured Loans")?>
                    </a>
                  </div>

                  <div class="col-lg-2 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#unsecured_loans" type="button" class="btn <?php echo (@$liability_model->UnsecuredLoansConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$liability_model->UnsecuredLoansConfirm != Null)?Yii::t('income',"Edit"):(LiabilitiesController::sum_of_particular_field($liability_model, "UnsecuredLoans", "lia_unsecured_loans") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                  </div>


                  <div class="col-lg-10 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#bank_loans">
                      <?=Yii::t("liability", "Bank Loans")?>
                    </a>
                  </div>
                  <div class="col-lg-2 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#bank_loans" type="button" class="btn <?php echo (@$liability_model->BankLoansConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$liability_model->BankLoansConfirm != Null)?Yii::t('income',"Edit"):(LiabilitiesController::sum_of_particular_field($liability_model, "BankLoans", "lia_bank_loans") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                  </div>

                  <div class="col-lg-10 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#others_loan">
                      <?=Yii::t("liability", "Other Liabilities")?>
                    </a>
                  </div>
                  <div class="col-lg-2 nopadding">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/liabilities/entry#others_loan" type="button" class="btn <?php echo (@$liability_model->OthersLoanConfirm != Null) ? 'btn-success':'btn-danger'; ?> btn-sm"><?php echo (@$liability_model->OthersLoanConfirm != Null)?Yii::t('income',"Edit"):(LiabilitiesController::sum_of_particular_field($liability_model, "OthersLoan", "lia_others_loan") > 0) ? Yii::t('income',"Edit"):Yii::t('liability',"Start"); ?></a>
                  </div>

                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>



    <hr>

    <?php
    $user=User::model()->findByPk(Yii::app()->user->id);
    $u_name = $user->first_name . " " . $user->last_name;

    $u_email = $user->email;
    ?>
    
    <?php if ($this->completedPercent() == 100) { ?>
      <div style="text-align: center;" title="Your tax return is ready to be submitted">
        <div class="home_icon-8"></div>
        <div style="color: #5BBC2E">Your tax return is ready to be submitted</div>
      </div>
    <?php } ?>

   <!--  <div class="fb-share-button pull-right" data-href="http://ncbeta.net/bdtax/" data-layout="button_count"></div>
    -->
  </div>

</div>

</div>





</div>