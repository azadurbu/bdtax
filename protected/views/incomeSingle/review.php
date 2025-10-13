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
<div id="content" class="dashbord-bg for-pdd">


	<div class="registration">

		<div class="dashboard-box"> 

			<div id="home-mid" class="reg-form">

                <div class="income-dashbord started-link started-link-margin-bottom">
                   <a href="<?=Yii::app()->baseUrl.'/index.php/assets/entry'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Assets")?></a>
                </div>

                <div class="home_icon-box home_icon-2"></div>
				<h4><?=Yii::t('income',"Income")?></h4>
				<!-- 					<h4>Total Income = <?php //echo $model->TotalIncome; ?> </h4> -->

				<div class="clearfix"></div>

				<?php

				$totalIncomeSalaries = IncomeSalaries::model()->find(array(  'select'=>' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );
				$totalTaxWaiver = IncomeSalaries::model()->find(array(  'select'=>' SUM(NetTaxWaiver) as NetTaxWaiver', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );

				$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array(  'select'=>' SUM(NetIncome) as SumRentalIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );

				$totalIncomeShareProfit = IncomeShareProfit::model()->find(array(  'select'=>' SUM(NetValueOfShare) as SumValueOfShare', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );

				$IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data'=>@$model->IncomeId) );

				$TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome +@$IncomeOtherSourceData->DividendIncome +@$IncomeOtherSourceData->WinningsIncome +@$IncomeOtherSourceData->OthersIncome );

				?>	

				<?php 
				$IncomeTaxRebateData = 	IncomeTaxRebate::model()->find('IncomeId=:data', array(':data'=>@$model->IncomeId) ); 


				$TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium + @$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Computer + @$IncomeTaxRebateData->Laptop + @$IncomeTaxRebateData->SavingsCertificates + @$IncomeTaxRebateData->BangladeshGovtTreasuryBond + @$IncomeTaxRebateData->DonationNLInstitutionFON + @$IncomeTaxRebateData->DonationCharityHospitalNBR + @$IncomeTaxRebateData->DonationOrganizationRetardPeople + @$IncomeTaxRebateData->ContributionNLInstituionLW + @$IncomeTaxRebateData->ContributionLiberationWarMuseum + @$IncomeTaxRebateData->ContributionAgaKhanDN + @$IncomeTaxRebateData->ContributionAsiaticSocietyBd + @$IncomeTaxRebateData->DonationICDDRB + @$IncomeTaxRebateData->DotationCRP + @$IncomeTaxRebateData->DonationEduInstitutionGov + @$IncomeTaxRebateData->ContributionAhsaniaMissionCancerHospital);

				$TotalIncomeTaxRebate = number_format($TotalIncomeTaxRebate,2) . Yii::t("income", $this->currency);

				// var_dump($TotalIncomeTaxRebate);die;
					$Income82cData = Income82c::model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) );

					$totalIncome82c = 0;
					if ($Income82cData != NULL) {
						foreach ($Income82cData as $key => $data) {
							
							$totalIncome82c += $data->ContractorIncome_1 + $data->ClearingAndForwardingIncome_1 + $data->TravelAgentIncome_1 + $data->ImporterTaxCollection_1 + $data->KnitWovenExportIncome_1 + $data->OtherThanKnitWovenExportIncome_1 + $data->RoyaltyIncome_1 + $data->SavingInstrumentInterestIncome_1 + $data->ExportCashSubsidyIncome_1 + $data->SavingAndFixedDepositInterestIncome_1 + $data->LotteryIncome_1 + $data->PropertySaleIncome_1;
							
						}
							
					}
					
					$totalIncome82c .= Yii::t("income", $this->currency);

				?>



				<div class="panel panel panel-success pannel-top ">
					<div class="panel-body">
						<div class="clearfix"></div>
                        <div class="col-md-11">
                                    <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total salary income")?> </h3>
            
                                    <p class="result_p">
                                        <?php 
                                            echo ($model['IncomeSalariesConfirm'] == NULL) ? "<span style='color:red'>".Yii::t('income','Not answered yet')."</span>" : (($model['IncomeSalariesConfirm'] == 'No') ? Yii::t('income','You chose No') : $totalIncomeSalaries->SumTaxableIncome .Yii::t("income", $this->currency));
                                        ?>
                                                
                                    </p>
                        </div>
                        <div class="col-md-1 edit-button">
                                        <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_7" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>						
                        </div>
						</div>
					</div>

					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
                            <div class="col-md-11">
                                <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total interest on security income")?> </h3>
                                <p class="result_p"><?php echo ($this->totalOutput($model,'InterestOnSecurities') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'InterestOnSecurities') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'InterestOnSecurities'))."</span>":$this->totalOutput($model,'InterestOnSecurities')); ?>
                                    </p>
                           </div>
                           
                           <div class="col-md-1 edit-button">
                                    <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_9" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>			   
                           </div>
							</div>
						</div>

						<?php //var_dump($model['IncomeHousePropertiesConfirm']);die; ?>

						<div class="panel panel panel-success pannel-top ">
							<div class="panel-body">
								<div class="clearfix"></div>
                                   <div class="col-md-11">         
                                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total rental properties income")?> </h3>
                                            <p class="result_p"><?php echo ($model['IncomeHousePropertiesConfirm'] == NULL) ? "<span style='color:red'>".Yii::t('income','Not answered yet')."</span>" : (($model['IncomeHousePropertiesConfirm'] == 'No') ? Yii::t('income','You chose No') : $totalIncomeHouseProperties->SumRentalIncome . Yii::t("income", $this->currency));?>
                                                </p>
                                   </div>
                                   <div class="col-md-1 edit-button">
                                                <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_11" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>
                                   </div>
								</div>
							</div>

							<div class="panel panel panel-success pannel-top ">
								<div class="panel-body">
									<div class="clearfix"></div>
                                    <div class="col-md-11">
                                        <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total agricultural income")?></h3>
                                        <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeAgriculture') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeAgriculture') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeAgriculture'))."</span>":$this->totalOutput($model,'IncomeAgriculture')); ?>
                                            </p>
                                    </div>
                                    <div class="col-md-1 edit-button">
										<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_13" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>
                                    </div>    
									</div>
								</div>


								<div class="panel panel panel-success pannel-top ">
									<div class="panel-body">
										<div class="clearfix"></div>
                                        <div class="col-md-11">
                                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total business or profession income")?></h3>
                                            <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeBusinessOrProfession') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeBusinessOrProfession') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeBusinessOrProfession'))."</span>":$this->totalOutput($model,'IncomeBusinessOrProfession'));?>
                                                </p>
                                        </div>
                                        <div class="col-md-1 edit-button">
											<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_15" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>
                                        </div>
									  </div>
									</div>

									<div class="panel panel panel-success pannel-top ">
										<div class="panel-body">
											<div class="clearfix"></div>
                                            	<div class="col-md-11">
                                                    <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total share of firm profit")?></h3>
                                                    <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeShareProfit') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeShareProfit') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeShareProfit'))."</span>":$this->totalOutput($model,'IncomeShareProfit')); ?>
                                                        </p>
                                                </div>
                                                <div class="col-md-1 edit-button">
                                                        <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_17" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>				
                                                </div>
											</div>
										</div>


										<div class="panel panel panel-success pannel-top ">
											<div class="panel-body">
												<div class="clearfix"></div>
                                                   <div class="col-md-11">     
                                                        <h3 class="padding-bottom_reg-form"> <?=Yii::t('income',"Total income of spouse or minor child")?>  </h3>
                                                        <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeSpouseOrChild') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeSpouseOrChild') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeSpouseOrChild'))."</span>":$this->totalOutput($model,'IncomeSpouseOrChild')); ?>
                                                            </p>
                                                   </div>
                                                   <div class="col-md-1 edit-button">
                                                            <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_18" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>
                                                  </div>            
												</div>
											</div>						

											<div class="panel panel panel-success pannel-top ">
												<div class="panel-body">
													<div class="clearfix"></div>
                                                    <div class="col-md-11">
                                                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total capital gain income")?>  </h3>
                                                            <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeCapitalGains') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeCapitalGains') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeCapitalGains'))."</span>":$this->totalOutput($model,'IncomeCapitalGains')); ?>
                                                                </p>
                                                    </div>
                                                    <div class="col-md-1 edit-button">
                                                                <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_19" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>		</div>
												  </div>
												</div>

												<div class="panel panel panel-success pannel-top ">
													<div class="panel-body">
														<div class="clearfix"></div>
                                                        <div class="col-md-11">
                                                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total income from any other source")?></h3>
                                                            <p class="result_p"><?php echo ($this->totalOutput($model,'IncomeOtherSource') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'IncomeOtherSource') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'IncomeOtherSource'))."</span>":$this->totalOutput($model,'IncomeOtherSource'));?>
                                                                </p>
                                                         </div>  
                                                         <div class="col-md-1 edit-button">
															<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_21" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>
                                                         </div>
													  </div>
													</div>


													<div class="panel panel panel-success pannel-top ">
														<div class="panel-body">
															<div class="clearfix"></div>
                                                              <div class="col-md-11">
                                                                <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total foreign income")?>   </h3>
                                                                <p class="result_p"><?php echo ($this->totalOutput($model,'ForeignIncome') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->totalOutput($model,'ForeignIncome') == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->totalOutput($model,'ForeignIncome'))."</span>":$this->totalOutput($model,'ForeignIncome')); ?>
                                                                    </p>
                                                              </div>
                                                              <div class="col-md-1 edit-button">
                                                                    <a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_23" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>                  </div>
															</div>
														</div>



						<div class="panel panel panel-success pannel-top ">
							<div class="panel-body">
								<div class="clearfix"></div>
                                
                                <div class="col-md-11">
                                    <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total tax rebate")?> </h3>
                                    <!-- 
                                    <p class="result_p"><?php //echo ($this->RebateAmount() == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : (($this->RebateAmount() == Yii::t('income','Not answered yet')) ? "<span style='color:red'>".Yii::t('income',$this->RebateAmount())."</span>" : $this->RebateAmount()); ?>
                                        </p> -->
                                    <p class="result_p"><?php echo ($model->IncomeTaxRebateConfirm=='No')?"<span>".Yii::t('income',"You chose No")."</span>":(($IncomeTaxRebateData == NULL) ? "<span style='color:red'>".Yii::t('income',"Not answered yet")."</span>" : $TotalIncomeTaxRebate); ?>
                                    </p>
                               </div>
                               	<div class="col-md-1 edit-button">
									<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_25" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>					</div>
								</div>
							</div>
						<!--  
						<div class="panel panel panel-success pannel-top ">
							<div class="panel-body">
								<div class="clearfix"></div>
                               	<div class="col-md-11"> 
                                    <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total 82C amount")?> </h3>
                                    
                                        </p>
    
                                    <p class="result_p"><?php echo ($model->Income82cConfirm=='No')?"<span>".Yii::t('income',"You chose No")."</span>":(($Income82cData == NULL) ? "<span style='color:red'>".Yii::t('income',"Not answered yet")."</span>" : $totalIncome82c); ?>
                                    </p>
                                </div>
                                <div class="col-md-1 edit-button">
									<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_29" type="button" class="btn btn-success pull-right"><?=Yii::t('income',"Edit")?></a>					</div>
								</div>
							</div>
							-->


                <div class="panel panel panel-success pannel-top ">
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <div class="col-md-11">
                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total income")?> </h3>
                            <p class="result_p">
                                <?php echo  $totalIncome = number_format($this->totalIncome(Yii::app()->user->CPIId),2) . Yii::t("income", $this->currency);
                                /*echo $totalIncome=
                                (
                                @$totalIncomeSalaries->SumTaxableIncome+
                                @$model->InterestOnSecurities+
                                @$totalIncomeHouseProperties->SumRentalIncome+
                                @$model->IncomeAgriculture+
                                @$model->IncomeBusinessOrProfession+
                                @$totalIncomeShareProfit->SumValueOfShare+
                                @$model->IncomeSpouseOrChild+
                                @$model->IncomeCapitalGains+
                                @$TotalIncomeOtherSource+
                                @$model->ForeignIncome
                                ) */
                                ?>
                            </p>
                        </div>
                        <div class="col-md-1 edit-button"></div>
                    </div>
                </div>

                <div class="panel panel panel-success pannel-top ">
                    <div class="panel-body">
                        <div class="clearfix"></div>
                        <div class="col-md-11">
                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Tax leviable on total income")?></h3>
                            <p class="result_p">

                                <?php

                                //$initialTaxWaiver = Starting minimum amount of income which is deducted from tax payable income like 220000 , 270000, 400000 etc
                                //$totalIncome = Total taxable income
                                //$TaxPercentAmount = An array of tax slave with percent as a key and amount as a value
                                //$payAbleTax = The amount which we have to pay and come out of final calculation.But its initial value is = 0
                                /*
                                                                    $initialTaxWaiver = $CalculationModel->NormalTaxWaiverAmount;



                                                                        $payAbleTax=0;

                                                                    if ( $totalIncome > ($initialTaxWaiver)) {

                                                                        $restTaxableIncome = ( $totalIncome-$initialTaxWaiver );

                                                                        // echo "total income=".$totalIncome.'<br />';
                                                                        // echo "rest Taxable Income=".$restTaxableIncome.'<br />';


                                                                    foreach ($TaxPercentAmount as $key => $value) {

                                                                        if($restTaxableIncome>=$value){

                                                                            $payAbleTax += ($value*($key/100));

                                                                            $restTaxableIncome = ($restTaxableIncome-$value);

                                                                        } else {

                                                                            if( ($restTaxableIncome>=0) && ($restTaxableIncome<=$value) ){

                                                                            $payAbleTax += ($restTaxableIncome*($key/100));

                                                                            $restTaxableIncome = ($restTaxableIncome-$value);

                                                                            if($restTaxableIncome<=0)
                                                                                $restTaxableIncome=0;

                                                                        }
                                                                    }


                                                                    }

                                                                    } else {

                                                                    // echo 'Payable tax = 00';
                                                                    }

                                                                    echo $payAbleTax.$this->currency.'<br />';*/
                                                                    $taxAmountArray = $this->netPayableTax(Yii::app()->user->CPIId);
                                echo $payAbleTax = number_format($taxAmountArray['taxamount'],2).Yii::t("income", $this->currency);	?>
                            </p>
                        </div>
                        <div class="col-md-1 edit-button"></div>
                    </div>
                </div>



							<div class="panel panel panel-success pannel-top ">
								<div class="panel-body">
									<div class="clearfix"></div>
                                        <div class="col-md-11">
                                            <h3 class="padding-bottom_reg-form"><?=Yii::t('income',"Total tax payable")?></h3>
                                            <p class="result_p"><?php
        
        
        
                                                //echo $GrandTotalPayableTax = number_format($this->netPayableTax( Yii::app()->user->CPIId),2).Yii::t("income", $this->currency);
                                           $taxAmountArray = $this->netPayableTax(Yii::app()->user->CPIId);
		                          //$personal_info_model->total_tax_due = $taxAmountArray['taxamount'];
                                echo $GrandTotalPayableTax = number_format($taxAmountArray['taxamount'],2).Yii::t("income", $this->currency);
        
                                                //echo ($GrandTotalPayableTax >0)? $GrandTotalPayableTax.$this->currency : '00'.$this->currency;
        
                                                ?>
                                             </p>
                                        </div>
                                        <div class="col-md-1 edit-button">
                                    </div>
								</div>

								<!--<div class="panel panel-success">
									<div class="panel-heading">
										<h5><?=Yii::t('income',"Tax payment details")?></h5>
									</div>
									<div class="panel-body">
										<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array( 'id'=>'income-form',	'enableAjaxValidation'=>false,));	?>
										<?php echo $form->hiddenField($model, 'IncomeId', array('value' => @$model->IncomeId) ); ?> 

										<table   class="table">
											<thead>
												<tr class="panel-heading">
													<th class="col-lg-5" ><?=Yii::t('income',"Details")?></th>
													<th>BDT</th>
													<th><?=Yii::t('income',"Action")?></th>
												</tr>
											</thead>
											<tbody> 

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"(a) Paid from your salary income source")?> : </label>  
													</td>
													<td>
														<?php echo ($this->totalOutput($model,'IncomeTaxDeductedAtSource') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : $this->totalOutput($model,'IncomeTaxDeductedAtSource'); ?>
														&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_26" type="button" class="btn btn-success btn-xs"><?=Yii::t('income',"Edit")?></a>
													</td>
													<td>
													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"(b) Advance paid tax")?> :</label>  
													</td>
													<td>
														<?php echo ($this->totalOutput($model,'IncomeTaxInAdvance') == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : $this->totalOutput($model,'IncomeTaxInAdvance'); ?>
														&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_27" type="button" class="btn btn-success btn-xs"><?=Yii::t('income',"Edit")?></a>
													</td>
													<td>
													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"(c) Tax paid on return")?> :</label>  
													</td>
													<td>
														<?php //echo ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource )).$this->currency; ?>

														<?php $remain = ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource+@$model->AdjustmentTaxRefund )); ?>
														<?php 
															//echo $form->textField($model,'TaxPaidOnReturn', array('class'=>'', 'placeholder'=>@$remain)); 
															echo $form->textField($model,'TaxPaidOnReturn', array('class'=>'')); 
														?>									           
														<button id="" onclick="save_income('TaxPaidOnReturn', 'TaxPaidOnReturn')" class="btn btn-success btn-xs" type="button"><?=Yii::t('income',"Store")?></button>
													</td>
													<td>

														<div id="TaxPaidOnReturn">
															<div class="income_error_success_msg"></div>
														</div>

													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"(d) Adjustment of tax refund (if any )")?> :</label>  
													</td>
													<td>
														<?php echo ($model->AdjustmentTaxRefund == NULL) ? "<span style='color:gray'>( empty )</span>" : $model->AdjustmentTaxRefund.$this->currency; ?>&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_28" type="button" class="btn btn-success btn-xs"><?=Yii::t('income',"Edit")?></a>
													</td>
													<td>
														<div id="AdjustmentTaxRefund">
															<div class="income_error_success_msg"></div>
														</div>

													</td>
												</tr>

												<tr>
													<td>
													</td>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"Total of (a) (b) (c) (d)")?> </label>  
													</td>
													<td>
														<?php //echo ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource )).$this->currency; ?>
														<?php echo $totalAdjustment = ( @$model->TaxPaidOnReturn+@$model->AdjustmentTaxRefund+@$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource ) .$this->currency; ?>

													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"Difference between paid and calculated amount")?> :</label>  
													</td>
													<td>
													</td>
													<td>
														<?php
														echo ( $GrandTotalPayableTax-$totalAdjustment ).$this->currency;
														 //echo '00'.$this->currency; ?>

														</td>
													</tr>

													<tr>
														<td>
															<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"Tax exempted and tax free income")?> :</label>  
														</td>
														<td>
														</td>
														<td>
															<?php echo ($totalTaxWaiver->NetTaxWaiver == NULL) ? "<span style='color:red'>".Yii::t('income',"No Data Entered")."</span>" : $totalTaxWaiver->NetTaxWaiver.$this->currency; ?>

														</td>
													</tr>


												</tbody> 
												<tfoot>
													<tr>
														<td>
															<label class=" required" style="color:#555555" for="inputMask"><?=Yii::t('income',"Income tax paid in the last assessment year")?> :</label>  
														</td>
														<td>
														</td>
														<td>
															<?php //echo $GrandTotalPayableTax.$this->currency; ?>
														</td>
													</tr> 

												</tfoot>
											</table>
											<?php $this->endWidget(); ?>


										</div>
									</div>-->

                               <!-- <div class="income-dashbord">
                                    <h2><a href="<?//=Yii::app()->baseUrl.'/index.php/assets/entry'?>"><?//=Yii::t("common", "Let's Get Started with Assets")?></a></h2>
                                </div>-->
                                
								</div> <!--End home-mid -->
                                
                                <div class="income-dashbord started-link common-margin-top">
                                   <a href="<?=Yii::app()->baseUrl.'/index.php/assets/entry'?>"  class="btn btn-success"><?=Yii::t("common", "Let's Get Started with Assets")?></a>
                                </div>
                                
								<div class="clearfix"></div>
							</div>


						</div>

					</div>


					<script type="text/javascript">

						var baseUrl = '<?php echo Yii::app()->baseUrl; ?>';

	//=================Single value call======----END-----================================================//

	function save_income(field_name, div_id) {
		$('#loading').css('display','block');
		$("div.expenditure_error_success_msg").html("");
		$.ajax({
			url : baseUrl+"/index.php/Income/saveInfo",
			type : "POST",
			dataType : "json",
			cache : false,
			data : {
				value : $("#Income_"+field_name).val(),
				field_name: field_name,
				IncomeId : $("#Income_IncomeId").val(),

			},
			success : function(data) {
				if(data.status == "success")
				{
					exp_show_error_success(div_id, "success", data.msg);

					window.location.reload();
				}
				else
				{
					exp_show_error_success(div_id, "error", data.msg);
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				exp_show_error_success(div_id, "error", "Internal problem has been occurred. Please try again.");
				$('#loading').css('display','none');
			},
			complete : function()
			{
				$('#loading').css('display','none');
			}
		});
	}

	function exp_show_error_success(id, status, msg)
	{
		if(status == "error")
			$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-danger fade in" style="margin-bottom:0px; padding: 0px 5px;" ><a href="#" data-dismiss="alert" class="close">x</a><h5>'+msg+'</div>');
		if(status == "success")
			$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-success fade in" style="margin-bottom:0px; padding: 0px 5px;" ><a href="#" data-dismiss="alert" class="close">x</a><h5>'+msg+'</div>');

	}

</script>
