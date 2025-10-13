<style>
	a.btn {
		color: #fff !important;
	}

	a.btn:hover {
		color: #f00 !important;
	}

</style>
<div id="content" class="dashbord-bg">

	<div class="container">

		<div class="registration">

			<div class="dashboard-box"> 

				<div id="home-mid" class="reg-form">

					<div class="home_icon-box home_icon-2"></div>
					<h4>Income</h4>
					<!-- 					<h4>Total Income = <?php //echo $model->TotalIncome; ?> </h4> -->

					<div class="clearfix"></div>

					<?php

					$totalIncomeSalaries = IncomeSalaries::model()->find(array(  'select'=>' SUM(NetTaxableIncome) as SumTaxableIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );
					$totalIncomeHouseProperties = IncomeHouseProperties::model()->find(array(  'select'=>' SUM(NetIncome) as SumRentalIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );
					
					if ($model->InterestOnSecuritiesFOrT=="Fraction") {						
					$InterestOnSecurities = IncInterestOnSecurities::model()->find(array(  'select'=>' SUM(Cost) as SumOfInterestOnSecurities', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfInterestOnSecurities;
					} else { $InterestOnSecurities = $model->InterestOnSecurities; }

					
					if ($model->IncomeAgricultureFOrT=="Fraction") {						
					$IncomeAgriculture = IncIncomeAgriculture::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeAgriculture', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeAgriculture;
					} else { $IncomeAgriculture = $model->IncomeAgriculture; }

					
					if ($model->IncomeBusinessOrProfessionFOrT=="Fraction") {						
					$IncomeBusinessOrProfession = IncIncomeBusinessOrProfession::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeBusinessOrProfession', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeBusinessOrProfession;
					} else { $IncomeBusinessOrProfession = $model->IncomeBusinessOrProfession; }

					
					if ($model->IncomeShareProfitFOrT=="Fraction") {						
					$IncomeShareProfit = IncIncomeShareProfit::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeShareProfit', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeShareProfit;
					} else { $IncomeShareProfit = $model->IncomeShareProfit; }


					
					if ($model->IncomeSpouseOrChildFOrT=="Fraction") {						
					$IncomeSpouseOrChild = IncIncomeSpouseOrChild::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeSpouseOrChild', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeSpouseOrChild;
					} else { $IncomeSpouseOrChild = $model->IncomeSpouseOrChild; }

					
					if ($model->IncomeCapitalGainsFOrT=="Fraction") {						
					$IncomeCapitalGains = IncIncomeCapitalGains::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeCapitalGains', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeCapitalGains;
					} else { $IncomeCapitalGains = $model->IncomeCapitalGains; }


					
					if ($model->IncomeOtherSourceFOrT=="Fraction") {						
					$IncomeOtherSource = IncIncomeOtherSource::model()->find(array(  'select'=>' SUM(Cost) as SumOfIncomeOtherSource', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfIncomeOtherSource;
					} else { $IncomeOtherSource = $model->IncomeOtherSource; }


					
					if ($model->ForeignIncomeFOrT=="Fraction") {						
					$ForeignIncome = IncForeignIncome::model()->find(array(  'select'=>' SUM(Cost) as SumOfForeignIncome', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) )->SumOfForeignIncome;
					} else { $ForeignIncome = $model->ForeignIncome; }



					$totalIncomeShareProfit = IncomeShareProfit::model()->find(array(  'select'=>' SUM(NetValueOfShare) as SumValueOfShare', 'condition'=>'IncomeId=:data', 'params'=>array(':data'=>@$model->IncomeId) ) );

					$IncomeOtherSourceData = IncomeOtherSource::model()->find('IncomeId=:data', array(':data'=>@$model->IncomeId) );
					$TotalIncomeOtherSource = (@$IncomeOtherSourceData->InterestIncome +@$IncomeOtherSourceData->DividendIncome +@$IncomeOtherSourceData->WinningsIncome +@$IncomeOtherSourceData->OthersIncome );
					
					?>	

					<?php 
					$IncomeTaxRebateData = 	IncomeTaxRebate::model()->find('IncomeId=:data', array(':data'=>@$model->IncomeId) ); 

					$TotalIncomeTaxRebate = (@$IncomeTaxRebateData->LifeInsurancePremium +@$IncomeTaxRebateData->DeferredAnnuity +@$IncomeTaxRebateData->ProvidentFund + @$IncomeTaxRebateData->SCECProvidentFund + @$IncomeTaxRebateData->SuperAnnuationFund + @$IncomeTaxRebateData->InvestInStockOrShare + @$IncomeTaxRebateData->DepositPensionScheme + @$IncomeTaxRebateData->BenevolentFund + @$IncomeTaxRebateData->ZakatFund + @$IncomeTaxRebateData->Others );

					?>


					<div class="panel panel panel-success pannel-top ">
						<div class="panel-body">
							<div class="clearfix"></div>
							<h3 class="padding-bottom_reg-form">Total salary income </h3>
							<p class="result_p"><?php echo ($totalIncomeSalaries->SumTaxableIncome == NULL) ? "<span style='color:red'>No Data Entered</span>" : $totalIncomeSalaries->SumTaxableIncome .$this->currency; ?>
								<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_7" type="button" class="btn btn-success pull-right">Edit</a></p>
							</div>
						</div>

						<div class="panel panel panel-success pannel-top ">
							<div class="panel-body">
								<div class="clearfix"></div>
								<h3 class="padding-bottom_reg-form">Total interest on security income </h3>
								<p class="result_p"><?php echo ($InterestOnSecurities == NULL) ? "<span style='color:red'>No Data Entered</span>" : $InterestOnSecurities .$this->currency; ?>
									<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_9" type="button" class="btn btn-success pull-right">Edit</a></p>
								</div>
							</div>

							<div class="panel panel panel-success pannel-top ">
								<div class="panel-body">
									<div class="clearfix"></div>
									<h3 class="padding-bottom_reg-form">Total rental properties income </h3>
									<p class="result_p"><?php echo ($totalIncomeHouseProperties->SumRentalIncome == NULL) ? "<span style='color:red'>No Data Entered</span>" : $totalIncomeHouseProperties->SumRentalIncome.$this->currency; ?>
										<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_11" type="button" class="btn btn-success pull-right">Edit</a></p>
									</div>
								</div>

								<div class="panel panel panel-success pannel-top ">
									<div class="panel-body">
										<div class="clearfix"></div>
										<h3 class="padding-bottom_reg-form"> Total agricultural income  </h3>
										<p class="result_p"><?php echo ($IncomeAgriculture == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeAgriculture .$this->currency; ?>
											<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_13" type="button" class="btn btn-success pull-right">Edit</a></p>
										</div>
									</div>


									<div class="panel panel panel-success pannel-top ">
										<div class="panel-body">
											<div class="clearfix"></div>
											<h3 class="padding-bottom_reg-form"> Total business or profession income  </h3>
											<p class="result_p"><?php echo ($IncomeBusinessOrProfession == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeBusinessOrProfession .$this->currency; ?>
												<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_15" type="button" class="btn btn-success pull-right">Edit</a></p>
											</div>
										</div>

										<div class="panel panel panel-success pannel-top ">
											<div class="panel-body">
												<div class="clearfix"></div>
												<h3 class="padding-bottom_reg-form">Total share of firm profit</h3>
												<p class="result_p"><?php echo ($IncomeShareProfit == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeShareProfit.$this->currency; ?>
													<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_17" type="button" class="btn btn-success pull-right">Edit</a></p>
												</div>
											</div>


											<div class="panel panel panel-success pannel-top ">
												<div class="panel-body">
													<div class="clearfix"></div>
													<h3 class="padding-bottom_reg-form"> Total income of spouse or minor child  </h3>
													<p class="result_p"><?php echo ($IncomeSpouseOrChild == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeSpouseOrChild .$this->currency; ?>
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_18" type="button" class="btn btn-success pull-right">Edit</a></p>
													</div>
												</div>						

												<div class="panel panel panel-success pannel-top ">
													<div class="panel-body">
														<div class="clearfix"></div>
														<h3 class="padding-bottom_reg-form"> Total capital gain income </h3>
														<p class="result_p"><?php echo ($IncomeCapitalGains == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeCapitalGains.$this->currency; ?>
															<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_19" type="button" class="btn btn-success pull-right">Edit</a></p>
														</div>
													</div>

													<div class="panel panel panel-success pannel-top ">
														<div class="panel-body">
															<div class="clearfix"></div>
															<h3 class="padding-bottom_reg-form">Total income from any other source</h3>
															<p class="result_p"><?php echo ($IncomeOtherSource == NULL) ? "<span style='color:red'>No Data Entered</span>" : $IncomeOtherSource.$this->currency; ?>
																<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_21" type="button" class="btn btn-success pull-right">Edit</a></p>
															</div>
														</div>


														<div class="panel panel panel-success pannel-top ">
															<div class="panel-body">
																<div class="clearfix"></div>
																<h3 class="padding-bottom_reg-form"> Total foreign income  </h3>
																<p class="result_p"><?php echo ($ForeignIncome == NULL) ? "<span style='color:red'>No Data Entered</span>" : $ForeignIncome.$this->currency; ?>
																	<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_23" type="button" class="btn btn-success pull-right">Edit</a></p>
																</div>
															</div>


															<div class="panel panel panel-success pannel-top ">
																<div class="panel-body">
																	<div class="clearfix"></div>
																	<h3 class="padding-bottom_reg-form">Total income </h3>
																	<p class="result_p"><?php echo  $totalIncome = $this->totalIncome(Yii::app()->user->CPIId).$this->currency;
/*							echo $totalIncome= 
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
								</div></p>
							</div>

							<div class="panel panel panel-success pannel-top ">
								<div class="panel-body">
									<div class="clearfix"></div>
									<h3 class="padding-bottom_reg-form">Tax leviable on total income</h3>
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
									echo $payAbleTax = $this->payableTax(Yii::app()->user->CPIId).$this->currency;	?>
								</p>
							</div>
						</div>

						<div class="panel panel panel-success pannel-top ">
							<div class="panel-body">
								<div class="clearfix"></div>
								<h3 class="padding-bottom_reg-form">Total tax rebate </h3>
								<p class="result_p"><?php echo ($TotalIncomeTaxRebate == NULL) ? "<span style='color:red'>No Data Entered</span>" : ($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100)).$this->currency; ?>
									<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_25" type="button" class="btn btn-success pull-right">Edit</a></p>
								</div>
							</div>

							<div class="panel panel panel-success pannel-top ">
								<div class="panel-body">
									<div class="clearfix"></div>
									<h3 class="padding-bottom_reg-form">Total tax payable</h3>
									<p class="result_p"><?php



										//$GrandTotalPayableTax = ($payAbleTax-($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100))); 	

/*							if($GrandTotalPayableTax <=0){
										$CPIInfo = $this->loadCPIInfo(Yii::app()->user->CPIId);

										if ( $CPIInfo->AreaOfResidence == 1){
											$GrandTotalPayableTax =3000;
										} elseif ( $CPIInfo->AreaOfResidence == 2){

											$GrandTotalPayableTax =2000;
										} elseif ( $CPIInfo->AreaOfResidence == 1){

											$GrandTotalPayableTax =1000;
										}

									}*/

									echo $GrandTotalPayableTax = $this->netPayableTax( Yii::app()->user->CPIId);

										//echo ($GrandTotalPayableTax >0)? $GrandTotalPayableTax.$this->currency : '00'.$this->currency;

										?>
									</div></p>
								</div>

								<div class="panel panel-success">
									<div class="panel-heading">
										<h5>Tax payment details</h5>
									</div>
									<div class="panel-body">
										<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array( 'id'=>'income-form',	'enableAjaxValidation'=>false,));	?>
										<?php echo $form->hiddenField($model, 'IncomeId', array('value' => @$model->IncomeId) ); ?> 

										<table   class="table">
											<thead>
												<tr class="panel-heading">
													<th class="col-lg-5" >Details</th>
													<th>BDTk</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody> 

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">(a) paid from your salary income source </label>  
													</td>
													<td>
														<?php echo ($model->IncomeTaxDeductedAtSource == NULL) ? "<span style='color:gray'>( empty )</span>" : $model->IncomeTaxDeductedAtSource.$this->currency; ?>&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_26" type="button" class="btn btn-success btn-xs">Edit</a>
													</td>
													<td>
													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">(b) Advance paid tax </label>  
													</td>
													<td>
														<?php echo ($model->IncomeTaxInAdvance == NULL) ? "<span style='color:gray'>( empty )</span>" : $model->IncomeTaxInAdvance.$this->currency; ?>&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_27" type="button" class="btn btn-success btn-xs">Edit</a>
													</td>
													<td>
													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">(c) Tax paid on return</label>  
													</td>
													<td>
														<?php //echo ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource )).$this->currency; ?>
														
														<?php $remain = ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource+@$model->AdjustmentTaxRefund )); ?>
														<?php echo $form->textField($model,'TaxPaidOnReturn', array('class'=>'', 'placeholder'=>@$remain)); ?>									           
														<button id="" onclick="save_income('TaxPaidOnReturn', 'TaxPaidOnReturn')" class="btn btn-success btn-xs" type="button">Store</button>
													</td>
													<td>

														<div id="TaxPaidOnReturn">
															<div class="income_error_success_msg"></div>
														</div>

													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">(d) Adjustment of tax refund (if any )</label>  
													</td>
													<td>
														<?php echo ($model->AdjustmentTaxRefund == NULL) ? "<span style='color:gray'>( empty )</span>" : $model->AdjustmentTaxRefund.$this->currency; ?>&nbsp;&nbsp;
														<a href="<?php echo Yii::app()->baseUrl ; ?>/index.php/income/entry#s_28" type="button" class="btn btn-success btn-xs">Edit</a>
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
														<label class=" required" style="color:#555555" for="inputMask">Total of (a) (b) (c) (d) </label>  
													</td>
													<td>
														<?php //echo ($GrandTotalPayableTax-( @$model->IncomeTaxInAdvance+@$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource )).$this->currency; ?>
														<?php echo $totalAdjustment = ( @$model->TaxPaidOnReturn+@$model->AdjustmentTaxRefund+@$model->IncomeTaxInAdvance+@$model->IncomeTaxDeductedAtSource ) .$this->currency; ?>

													</td>
												</tr>

												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">Difference between paid and calculated amount</label>  
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
														<label class=" required" style="color:#555555" for="inputMask">Tax exempted and tax free income</label>  
													</td>
													<td>
													</td>
													<td>
														<?php echo ($TotalIncomeTaxRebate == NULL) ? "<span style='color:red'>No Data Entered</span>" : ($TotalIncomeTaxRebate*($CalculationModel->TaxRebatePercent/100)).$this->currency; ?>

													</td>
												</tr>


											</tbody> 
											<tfoot>
												<tr>
													<td>
														<label class=" required" style="color:#555555" for="inputMask">Income tax paid in the last assesment year</label>  
													</td>
													<td>
													</td>
													<td>
														<?php echo $GrandTotalPayableTax.$this->currency; ?>
													</td>
												</tr> 

											</tfoot>
										</table>
										<?php $this->endWidget(); ?>


									</div>
								</div>




							</div> <!--End home-mid -->
							<div class="clearfix"></div>
						</div>


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
