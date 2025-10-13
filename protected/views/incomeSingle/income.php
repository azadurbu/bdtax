<style>
	.income_error_success_msg {
		font-size: 14px !important; 
		padding-top: 0px !important;
		color: #006600 !important;
		text-align: center !important;
	}
</style>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/income/income.js?v=<?=$this->v?>"></script>



<?php 

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-form',
	'enableAjaxValidation'=>false,
	));

if(Yii::app()->user->hasFlash('alert_success')) 
	$flash = Yii::app()->user->getFlash('alert_success');
else
	$flash = "";

?>

<div class="flash_alert">
	<?php if($flash != ""): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?=$flash?>
		</div>
	<?php endif; ?>
</div>

<?php 

//echo 'InterestOnSecuritiesTabState='.
$InterestOnSecuritiesTabState = $this->checkActiveInactive($model, "InterestOnSecuritiesConfirm", "InterestOnSecuritiesFOrT", "IncInterestOnSecurities", "InterestOnSecurities"); 
	//DATA FOR MULTIPLE ENTRY
$IncInterestOnSecuritiesList = IncInterestOnSecurities::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeAgricultureTabState='.
$IncomeAgricultureTabState = $this->checkActiveInactive($model, "IncomeAgricultureConfirm", "IncomeAgricultureFOrT", "IncIncomeAgriculture", "IncomeAgriculture"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeAgricultureList = IncIncomeAgriculture::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeBusinessOrProfessionTabState='.
$IncomeBusinessOrProfessionTabState = $this->checkActiveInactive($model, "IncomeBusinessOrProfessionConfirm", "IncomeBusinessOrProfessionFOrT", "IncIncomeBusinessOrProfession", "IncomeBusinessOrProfession"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeBusinessOrProfessionList = IncIncomeBusinessOrProfession::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));
$IncIncomeBusinessDetailsList = IncIncomeBusinessOrProfessionDetails::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeBusinessOrProfessionTabState='.
$IncomeShareProfitTabState = $this->checkActiveInactive($model, "IncomeShareProfitConfirm", "IncomeShareProfitFOrT", "IncIncomeShareProfit", "IncomeShareProfit"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeShareProfitList = IncIncomeShareProfit::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeSpouseOrChildTabState='.
$IncomeSpouseOrChildTabState = $this->checkActiveInactive($model, "IncomeSpouseOrChildConfirm", "IncomeSpouseOrChildFOrT", "IncIncomeSpouseOrChild", "IncomeSpouseOrChild"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeSpouseOrChildList = IncIncomeSpouseOrChild::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeCapitalGainsTabState='.
$IncomeCapitalGainsTabState = $this->checkActiveInactive($model, "IncomeCapitalGainsConfirm", "IncomeCapitalGainsFOrT", "IncIncomeCapitalGains", "IncomeCapitalGains"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeCapitalGainsList = IncIncomeCapitalGains::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeOtherSourceTabState='.
$IncomeOtherSourceTabState = $this->checkActiveInactive($model, "IncomeOtherSourceConfirm", "IncomeOtherSourceFOrT", "IncIncomeOtherSource", "IncomeOtherSource"); 
	//DATA FOR MULTIPLE ENTRY
$IncIncomeOtherSourceList = IncIncomeOtherSource::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * ForeignIncomeTabState='.
$ForeignIncomeTabState = $this->checkActiveInactive($model, "ForeignIncomeConfirm", "ForeignIncomeFOrT", "IncForeignIncome", "ForeignIncome"); 
	//DATA FOR MULTIPLE ENTRY
$IncForeignIncomeList = IncForeignIncome::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeTaxRebateTabState='.
$IncomeTaxRebateTabState = $this->checkActiveInactive2($model, "IncomeTaxRebateConfirm"); 

// echo ' * IncomeTaxDeductedAtSourceTabState='.
$IncomeTaxDeductedAtSourceTabState = $this->checkActiveInactive($model, "IncomeTaxDeductedAtSourceConfirm", "IncomeTaxDeductedAtSourceFOrT", "IncIncomeTaxDeductedAtSource", "IncomeTaxDeductedAtSource"); 
//DATA FOR MULTIPLE ENTRY
$IncomeTaxDeductedAtSourceList = IncIncomeTaxDeductedAtSource::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeTaxInAdvanceTabState='.
$IncomeTaxInAdvanceTabState = $this->checkActiveInactive($model, "IncomeTaxInAdvanceConfirm", "IncomeTaxInAdvanceFOrT", "IncIncomeTaxInAdvance", "IncomeTaxInAdvance"); 
//DATA FOR MULTIPLE ENTRY
$IncomeTaxInAdvanceList = IncIncomeTaxInAdvance::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * AdjustmentTaxRefundTabState='.
$AdjustmentTaxRefundTabState = $this->checkActiveInactive($model, "AdjustmentTaxRefundConfirm", "AdjustmentTaxRefundFOrT", "AdjustmentTaxRefund", "AdjustmentTaxRefund"); 

$IncomeHousePropertiesTabState = $this->checkActiveInactive2($model, "IncomeHousePropertiesConfirm"); 
	//DATA FOR MULTIPLE ENTRY
// $IncIncomeTaxRebateList = IncIncomeTaxRebate::model()->findAllByAttributes(array('IncomeId' => $model->IncomeId));

// echo ' * IncomeTaxRebateTabState='.
$Income82cTabState = $this->checkActiveInactive2($model, "Income82cConfirm"); 

?>


<!-- ##########################--------------START---------TAB--------------------------------########################## -->

<?php echo $form->hiddenField($model, 'IncomeId', array('value' => @$model->IncomeId) ); ?> 

<?php $IncomeSalariesData = 		IncomeSalaries::				model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncomeHousePropertiesData = 	IncomeHouseProperties::			model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncomeShareProfitData = 		IncomeShareProfit::				model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncomeOtherSourceData = 		IncomeOtherSource::				model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>	
<?php $IncomeTaxRebateData = 		IncomeTaxRebate::				model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncomeTaxPaymentData = 		IncomeTaxPayment::				model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncomeTaxDeductData = 		IncIncomeTaxDeductedAtSource::	model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $IncIncomeTaxInAdvanceData = 	IncIncomeTaxInAdvance::			model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $Income82cData = 				Income82c::						model()->findAll('IncomeId=:data', array(':data'=>@$model->IncomeId) ); ?>
<?php $modelPinfo = PersonalInformation::model()->findByPk(Yii::app()->user->CPIId);
//PersonalInformation::model()->find('UserId=:data',  array('data' => Yii::app()->user->id) );?>

<div id="incomeModule" class="board g">
	<!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
	<div class="tab-content nav-tabs-sticky reg-form income-dashbord sticky-min-height">
		<div class="board-inner">			
			<ul class="nav nav-tabs" role="tablist" id="myTab">
				    <li role="presentation"  /*data-toggle="tooltip"*/  class="active">
					<a href="#s_7" onclick="next_pre('s_7')" role="tab"  data-toggle="tab" title="<?=Yii::t('TTips',"1.1")?>">
						<?php echo ($model->IncomeSalariesConfirm == "") ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs one"><?=Yii::t('income',"Salary") ?>
						</span></a>
					</li>

                    <?php 
                    if($modelPinfo->GovernmentEmployee=="N"):?>
						<li role="presentation"  /*data-toggle="tooltip"*/  class="">
						<a href="#s_15" onclick="next_pre('s_15')" role="tab"  data-toggle="tab" title="<?=Yii::t('TTips',"1.5")?>">
							<?php echo ($model->IncomeSalariesConfirm == "") ? '':'<i class="fa fa-check-square"></i>' ?> 
							<span class="round-tabs one"><?=Yii::t('income',"Business & Profession") ?>
							</span></a>
						</li>
				    <?php endif; ?>

					<li role="presentation"  /*data-toggle="tooltip"*/  class="">
					<a href="#s_21" onclick="next_pre('s_21')" role="tab"  data-toggle="tab" title="<?=Yii::t('TTips',"1.9")?>">
						<?php echo ($model->IncomeSalariesConfirm == "") ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs one"><?=Yii::t('income',"Shanchayapatra & Others") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  class="">
					<a href="#s_26" onclick="next_pre('s_26')" role="tab"  data-toggle="tab" title="<?=Yii::t('TTips',"1.13")?>">
						<?php echo ($model->IncomeSalariesConfirm == "") ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs one"><?=Yii::t('income',"Tax Deducted at Source/TDS") ?>
						</span></a>
					</li>


					
 					<!-- 
					<li role="presentation"><a href="#s_29" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"")?>">
						<?php echo (@$Income82cTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?>  
						<span class="round-tabs five"><?=Yii::t('income',"82c") ?>
						</span></a>
					</li>
					-->

				</ul></div>
				

				<div role="tabpanel" class="tab-pane active" id="s_7" style="text-align: center !important;">
					<!-- #############################----------------------s_7--------START-------------------------################################# -->


					<div class="income-top"></div>

					<!-- <p>You can confirm or update what you tell us later on.</p> -->								

					<div class="IncomeSalariesValue <?php echo ($IncomeSalariesData==NULL)? 'hide' : 'show'; ?>">
						<h2><?=Yii::t('income','Your Total Salary Income Is As Follows') ?></h2>
						<div class="row col-md-8 col-md-offset-2 custyle table-responsive">
							<table class="table table-striped custab">
								<thead>
									<!--<button type="button" class="btn btn-success btn-xs pull-right"  onclick="insertData('IncomeSalaries')" ><b>+</b> <?=Yii::t('income','Add More'); ?></a> </br>-->
										<tr>
											<th><?=Yii::t('income','ID'); ?></th>
											<th><?=Yii::t('income','Net taxable income'); ?></th>
											<th><?=Yii::t('income','Year'); ?></th>
											<th class="text-center"></th>
										</tr>
									</thead>	

									<?php $totalIncomeSalaries=0; ?>

									<?php foreach ($IncomeSalariesData as $key => $data) { ?>

									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $data->NetTaxableIncome.$this->currency; ?></td>
										<td><?php echo $data->EntryYear; ?></td>
										<td class="text-center">
											<?php echo CHtml::link('<span class="fa fa-pencil-square-o"></span> '.Yii::t('income',"Edit"), Yii::app()->baseUrl."/index.php/IncomeSalariesSingle/update/id/".$data->IncomeSalariesId , array('class'=>'btn btn-success btn-xs')); ?>
											<?php echo CHtml::link('<span class="fa fa-times"></span> '.Yii::t('income',"Delete"), Yii::app()->baseUrl."/index.php/IncomeSalariesSingle/delete/id/".$data->IncomeSalariesId , array('class'=>'btn btn-danger btn-xs')); ?>
										</td>
									</tr>
									<?php $totalIncomeSalaries +=$data->NetTaxableIncome ?>
									<?php } ?>
									<!-- tr><td colspan="4"><span class="pull-right"><?=Yii::t('income',"Total salary income")?>  = <?php echo number_format($totalIncomeSalaries,2).$this->currency; ?> </span></td><td></td></tr -->					
								</table>
							</div>
						</div>

						<div class="IncomeSalariesDefault <?php echo ($IncomeSalariesData==NULL)? 'show' : 'hide'; ?>">
							<h2><?=Yii::t('income',"Salary")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.1")?>"></i></h2>
							<div class="salary-input-box">
								
								<form action="<?php echo Yii::app()->baseUrl.'/index.php/IncomeSalariesSingle/entry/'; ?>" method="post">
									<p><?=Yii::t('income',"Total taxabale income (from your salary certificate)")?></p>
									<?php $incomeEntyUrl = Yii::app()->baseUrl.'/index.php/IncomeSalariesSingle/entry/'; ?>
									<input type="text" class="form-control" onchange="copytoBasic(this.value)" onkeyup="copytoBasic(this.value)" name="NetTaxableIncome">
									
									<p><?=Yii::t('income',"Don't you know your Taxable Income? Please");?> <a href="<?php echo $incomeEntyUrl;?>"><?=Yii::t('income',"Click Here")?></a></p>
									<button type="submit" class="btn btn-success" ><?=Yii::t("p_info","Save & Continue")?></button>
								</form>
						    </div>
							<div class="salary-confirm-box">
								<p><?=Yii::t('income',"Did you have any salary income?")?></p>
								<div class="text-center row">
									<?php
								        // IF THE ANSWER IS "NO"
									if($model->IncomeSalariesConfirm == 'No')
										echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
									?>
									<h3>
										<div class="btn-group btn-group-lg">
											<button type="button" class="btn btn-<?=($model->IncomeSalariesConfirm == 'Yes')? 'success' : 'default' ?>"  onclick="openFromData()"  ><?=Yii::t("income","YES")?></button>
											<button onclick="set_no('IncomeSalaries')" type="button" class="btn btn-big btn-<?=($model->IncomeSalariesConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
										</div>
									</h3>
								</div>
						    </div>
						</div>


						<div class="login-button input-group">
							<div class="back pull-right">
								<?php if($modelPinfo->GovernmentEmployee=="N"):?>
									<a class="btn btn-success for-clr" data-toggle="tab" href="#s_15"  onclick="next_pre('s_15')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
								<?php else: ?>
									<a class="btn btn-success for-clr" data-toggle="tab" href="#s_21"  onclick="next_pre('s_21')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
							<?php endif; ?>
							</div>
							<div class="clearfix"></div>
						</div>

						<!-- #############################----------------------s_7--------END-------------------------################################# -->
					</div>
					<div role="tabpanel" class="tab-pane" id="s_9" style="text-align: center !important;">
						<!-- #############################----------------------s_9--------START-----------------------################################# -->

<!-- 
##############################################################################
***************** Interest on Securities ********************
##############################################################################
-->
<h2><?=Yii::t("income","Interest on Securities")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.2")?>"></i></h2>                                   
<div class="clearfix"></div>


<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class='text-center' id="InterestOnSecurities_verification" style="display: <?=($model->InterestOnSecuritiesConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any interest on securities?")?> 
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->InterestOnSecuritiesConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('InterestOnSecurities_verification', 'InterestOnSecurities_fraction_or_total', 'InterestOnSecurities_total')" type="button" class="btn btn-big btn-<?=($model->InterestOnSecuritiesConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('InterestOnSecurities')" type="button" class="btn btn-big btn-<?=($model->InterestOnSecuritiesConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="InterestOnSecurities_fraction_or_total" style="display: <?=($model->InterestOnSecuritiesConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div id="InterestOnSecurities_total" style="display: <?=($model->InterestOnSecuritiesFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->InterestOnSecurities == "") ? "" : Yii::t("income","Current value is") . " " .$model->InterestOnSecurities. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('InterestOnSecurities_total', 'InterestOnSecurities_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Interest on Securities")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'InterestOnSecurities',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Interest on Securities")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('InterestOnSecurities')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('InterestOnSecurities', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="InterestOnSecurities_fraction" style="display: <?=($model->InterestOnSecuritiesFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncInterestOnSecurities_form"> -->

		<table class="table" id="InterestOnSecurities_table">
			<thead>
				<tr>
					<th class="col-lg-3"><?=Yii::t("income","Type")?></th>
					<th><?=Yii::t("income","Description")?></th>
					<th><?=Yii::t("income","Amount (BDT)")?></th>
					<th><?=Yii::t("income","Commission/Interest (BDT)")?></th>
					<th><?=Yii::t("income","Net income (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncInterestOnSecuritiesList as $value) {
					echo "<tr id='InterestOnSecurities_row_".$value->InterestOnSecuritiesId."'>";
					echo CHtml::hiddenField('Text', @$value->InterestOnSecuritiesId , array('id'=>'InterestOnSecurities_InterestOnSecuritiesId') );
					echo "<td>";
					echo $value->Type;
				 // echo CHtml::dropDownList('Type', $value->Type, ['Bond' => 'Bond', 'Debenture' => 'Debenture','Securities' => 'Securities'], array('empty' => 'Select type', 'class' => 'form-control', 'onchange' => 'getEmployer(this.value, "")')); 
		 //  echo CHtml::dropDownList('listname', $select, array('M' => 'Male', 'F' => 'Female')); 
					echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
					echo "<td>".$value->NetAmount."</td>";
					echo "<td>".$value->CommissionOrInterest."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td style='width: 22%;'><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_InterestOnSecurities(".$value->InterestOnSecuritiesId.", \"IncInterestOnSecurities\", \"InterestOnSecurities\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->InterestOnSecuritiesId.", \"IncInterestOnSecurities\", \"InterestOnSecurities\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncInterestOnSecurities_form-1"> -->
		<table id="InterestOnSecurities_table-2">
			<tfoot>
				<tr>
					<td>
						<div class="form-group">								 
							<?php echo CHtml::dropDownList('IncInterestOnSecurities[Type]', '', ['Bond' => 'Bond', 'Zero Coupon Bond' => 'Zero Coupon Bond', 'Debenture' => 'Debenture','Securities' => 'Other Securities'], array('empty' => 'Select type', 'class' => 'form-control', 'id'=>"IncInterestOnSecurities_Type" ));  ?>
							<!-- <textarea  class="form-control" rows="3" placeholder="<?=Yii::t("income","Description")?>"></textarea> -->
						</div>
					</td>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="InterestOnSecurities_id">
							<textarea name="IncInterestOnSecurities[Description]" id="IncInterestOnSecurities_Description" class="form-control" rows="1" placeholder="<?=Yii::t("income","Description")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncInterestOnSecurities[NetAmount]" onkeyup="InterestOnSecuritiesCalculation(this)" type="text" class="form-control" id="IncInterestOnSecurities_NetAmount" placeholder="<?=Yii::t("income","Amount")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncInterestOnSecurities[CommissionOrInterest]" onkeyup="InterestOnSecuritiesCalculation(this)" type="text" class="form-control" id="IncInterestOnSecurities_CommissionOrInterest" placeholder="<?=Yii::t("income","Commission/Interest")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input disabled="disabled" name="IncInterestOnSecurities[Cost]" type="text" class="form-control" id="IncInterestOnSecurities_Cost" placeholder="<?=Yii::t("income","Tax payable income")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="InterestOnSecurities_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_income_fraction('InterestOnSecurities_id', 'InterestOnSecurities_description', 'InterestOnSecurities_cost', 'IncInterestOnSecurities', 'InterestOnSecurities')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->

<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_7"  onclick="next_pre('s_7')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_11"  onclick="next_pre('s_11')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>
<!-- END - NEXT PREVIOUS BUTTON -->


<!-- #############################----------------------s_9--------END-------------------------################################# -->
</div>


<div role="tabpanel" class="tab-pane" id="s_15" style="text-align: center !important;">

	<!-- #############################----------------------s_15--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Business or Profession income ********************
##############################################################################
-->
<h2><?=Yii::t("income","Business & Profession")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.5")?>"></i></h2>                                   
<div class="clearfix"></div>


<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeBusinessOrProfession_verification" style="display: <?=($model->IncomeBusinessOrProfessionConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any Business or Profession income?")?>
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeBusinessOrProfessionConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeBusinessOrProfession_verification', 'IncomeBusinessOrProfession_fraction_or_total', 'IncomeBusinessOrProfession_fraction')" type="button" class="btn btn-big btn-<?=($model->IncomeBusinessOrProfessionConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeBusinessOrProfession')" type="button" class="btn btn-big btn-<?=($model->IncomeBusinessOrProfessionConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeBusinessOrProfession_fraction_or_total" style="display: <?=($model->IncomeBusinessOrProfessionConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<!-- <div class="text-center" id="IncomeBusinessOrProfession_total" style="display: <?=($model->IncomeBusinessOrProfessionFOrT != 'Fraction') ? 'block':'none' ?>;"> -->
	<div class="text-center" id="IncomeBusinessOrProfession_total" style="display: none;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeBusinessOrProfession == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeBusinessOrProfession. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeBusinessOrProfession_total', 'IncomeBusinessOrProfession_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Business or Profession income")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeBusinessOrProfession',array('class'=>'form-control',  'placeholder'=>Yii::t("income","Business or Profession income")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeBusinessOrProfession')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeBusinessOrProfession', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeBusinessOrProfession_fraction" style="display: <?=($model->IncomeBusinessOrProfessionFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2">
	
		<?=$this->renderPartial('_businessIncomeForm', array('model3'=>$model3,	'CalculationModel'=>$CalculationModel,'model4'=>$model4))?>

		
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<div class="login-button input-group">
	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_7"   onclick="next_pre('s_7')"  > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_21"   onclick="next_pre('s_21')"  ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>



<!-- #############################----------------------s_15--------END-------------------------################################# -->
</div>



<div role="tabpanel" class="tab-pane" id="s_21" style="text-align: center !important;">

	<!-- #############################----------------------s_21--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Capital gain income ********************
##############################################################################
-->

<h2><?=Yii::t("income","SHANCHAYAPATRA & OTHERS")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.9")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeOtherSource_verification" style="display: <?=($model->IncomeOtherSourceConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any tax deducted from your Shanchayapatra/Others?")?>
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeOtherSourceConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeOtherSource_verification', 'IncomeOtherSource_fraction_or_total', 'IncomeOtherSource_fraction')" type="button" class="btn btn-big btn-<?=($model->IncomeOtherSourceConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeOtherSource')" type="button" class="btn btn-big btn-<?=($model->IncomeOtherSourceConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeOtherSource_fraction_or_total" style="display: <?=($model->IncomeOtherSourceConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<!-- <div class="text-center" id="IncomeOtherSource_total" style="display: <?=($model->IncomeOtherSourceFOrT != 'Fraction') ? 'block':'none' ?>;"> -->
	<div class="text-center" id="IncomeOtherSource_total" style="display: none;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeOtherSource == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeOtherSource. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeOtherSource_total', 'IncomeOtherSource_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Income from Other sources")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeOtherSource',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Income from Other sources")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeOtherSource')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p style="text-align: center;">
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeOtherSource', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeOtherSource_fraction" style="display: <?=($model->IncomeOtherSourceFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-10 col-sm-offset-1">
		<!-- <form id="IncIncomeOtherSource_form"> -->
		
		<?=$this->renderPartial('_otherSourcesIncomeForm', array('model2'=>$model2,	'CalculationModel'=>$CalculationModel))?>	
		

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<div class="login-button input-group">

	<div class="back pull-left">
		<?php if($modelPinfo->GovernmentEmployee=="N"):?>
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_15"  onclick="next_pre('s_15')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
		<?php else: ?>
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_7"  onclick="next_pre('s_7')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	<?php endif; ?>
	</div>

	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_26"  onclick="next_pre('s_26')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>




<!-- #############################----------------------s_21--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_23" style="text-align: center !important;">

	<!-- #############################----------------------s_23--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Foreign income ********************
##############################################################################
-->

<h2><?=Yii::t("income","Foreign income")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.10")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="ForeignIncome_verification" style="display: <?=($model->ForeignIncomeConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any foreign income?")?> 
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->ForeignIncomeConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('ForeignIncome_verification', 'ForeignIncome_fraction_or_total', 'ForeignIncome_total')" type="button" class="btn btn-big btn-<?=($model->ForeignIncomeConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('ForeignIncome')" type="button" class="btn btn-big btn-<?=($model->ForeignIncomeConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="ForeignIncome_fraction_or_total" style="display: <?=($model->ForeignIncomeConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center" id="ForeignIncome_total" style="display: <?=($model->ForeignIncomeFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->ForeignIncome == "") ? "" : Yii::t("income","Current value is") . " " .$model->ForeignIncome. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('ForeignIncome_total', 'ForeignIncome_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Foreign income")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'ForeignIncome',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Foreign income")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('ForeignIncome')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('ForeignIncome', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="ForeignIncome_fraction" style="display: <?=($model->ForeignIncomeFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncForeignIncome_form"> -->

		<table class="table" id="ForeignIncome_table">
			<thead>
				<tr>
					<!-- 					<th class="col-lg-3"><?=Yii::t("income","Source Type")?></th> -->
					<th><?=Yii::t("income","Details")?></th>
					<th><?=Yii::t("income","Net income (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncForeignIncomeList as $value) {
					echo "<tr id='ForeignIncome_row_".$value->ForeignIncomeId."'>";
					echo CHtml::hiddenField('Text', @$value->ForeignIncomeId , array('id'=>'ForeignIncome_ForeignIncomeId') );
					// echo "<td>";
					// echo $value->Type;
					// echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_ForeignIncome(".$value->ForeignIncomeId.", \"IncForeignIncome\", \"ForeignIncome\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->ForeignIncomeId.", \"IncForeignIncome\", \"ForeignIncome\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncForeignIncome_form-1"> -->
		<table id="ForeignIncome_table-2">
			<tfoot>
				<tr>
					<!-- <td>
						<div class="form-group">								 
							<?php //echo CHtml::dropDownList('IncForeignIncome[Type]', '', ['Interest' => 'Interest', 'Dividend' => 'Dividend', 'Winnings' => 'Winnings', 'Other' => 'Other'], array('empty' => 'Select type', 'class' => 'form-control', 'id'=>"IncForeignIncome_Type" ));  ?>
						</div>
					</td> -->

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="ForeignIncome_id">
							<textarea name="IncForeignIncome[Description]" id="IncForeignIncome_Description" class="form-control" rows="1" placeholder="<?=Yii::t("income","Details")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncForeignIncome[Cost]" type="text" class="form-control" id="IncForeignIncome_Cost" placeholder="<?=Yii::t("income","Net income")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="ForeignIncome_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_ForeignIncome_fraction('ForeignIncome_id', 'ForeignIncome_description', 'ForeignIncome_cost', 'IncForeignIncome', 'ForeignIncome')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_21"  onclick="next_pre('s_21')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_25"  onclick="next_pre('s_25')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>


<!-- #############################----------------------s_23--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane " id="s_25" style="text-align: center !important;">

	<!-- #############################----------------------s_25--------START-------------------------################################# -->

	<div class="income-top"></div>
	<!-- <p>You can confirm or update what you tell us later on.</p> -->
	<div class="IncomeTaxRebateValue <?php echo ($IncomeTaxRebateData==NULL)? 'hide' : 'show'; ?>">
		<h2><?=Yii::t('income','Your total invest in any tax deductible investments') ?></h2>
		<div class="row col-md-8 col-md-offset-2 custyle">
			<table class="table table-striped custab">
				<thead>
					<!-- <button type="button" class="btn btn-success btn-xs pull-right"  onclick="insertData('IncomeTaxRebate')" ><b>+</b> Add More</a> </br> -->
					<tr>
						<!-- <th>ID</th> -->
						<th><?=Yii::t('income',"Total allowable investment")?></th>													
						<th><?=Yii::t('income',"Year")?></th>
						<th class="text-center"><?=Yii::t('income',"Action")?></th>
					</tr>
				</thead>	



				<?php foreach ($IncomeTaxRebateData as $key => $data) { ?>

				<tr>
					<!-- <td><?php echo $key+1; ?></td> -->
					<td><?php echo ($data->LifeInsurancePremium + $data->ProvidentFund + $data->SCECProvidentFund + $data->SuperAnnuationFund + $data->InvestInStockOrShare + $data->DepositPensionScheme + $data->BenevolentFund + $data->ZakatFund + $data->Computer + $data->Laptop + $data->SavingsCertificates + $data->BangladeshGovtTreasuryBond + $data->DonationNLInstitutionFON + $data->DonationCharityHospitalNBR + $data->DonationOrganizationRetardPeople + $data->ContributionNLInstituionLW + $data->ContributionLiberationWarMuseum + $data->ContributionAgaKhanDN + $data->ContributionAsiaticSocietyBd + $data->DonationICDDRB + $data->DotationCRP + $data->DonationEduInstitutionGov + $data->ContributionAhsaniaMissionCancerHospital + $data->MutualFund).$this->currency; ?></td>
					<td><?php echo $data->EntryYear; ?></td>
					<td class="text-center">
						<?php echo CHtml::link('<span class="fa fa-pencil-square-o"></span> '.Yii::t('income',"Edit"), Yii::app()->baseUrl."/index.php/IncomeTaxRebate/update/id/".$data->IncomeTaxRebateId , array('class'=>'btn btn-success btn-xs')); ?>
						<?php echo CHtml::link('<span class="fa fa-times"></span> '.Yii::t('income',"Delete"), Yii::app()->baseUrl."/index.php/IncomeTaxRebate/delete/id/".$data->IncomeTaxRebateId , array('class'=>'btn btn-danger btn-xs')); ?>

					</td>
				</tr>
				<?php } ?>					
			</table>
		</div>
	</div>

	<div class="IncomeTaxRebateDefault <?php echo ($IncomeTaxRebateData==NULL)? 'show' : 'hide'; ?>">
		<h2><?=Yii::t('income',"Tax Rebate")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.11")?>"></i></h2>
		<p><?=Yii::t('income',"Did you invest in any tax deductible investments")?>?</p>
		<div class="row">
			
				<!-- <p> -->
					<?php
        // IF THE ANSWER IS "NO"
					if($model->IncomeTaxRebateConfirm == 'No')
						echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
					?>
				<!-- </p> -->
				<!-- YES/NO BUTTON -->
				<h3>
				<div class="btn-group btn-group-lg">
					<button type="button" class="btn btn-<?=($model->IncomeTaxRebateConfirm == 'Yes')? 'success' : 'default' ?>"  onclick="insertData('IncomeTaxRebate'),hide_show('IncomeTaxRebate')"  ><?=Yii::t("income","YES")?></button>
					<button onclick="set_no('IncomeTaxRebate')"  href="#s_26"  id="name_btn" type="button" class="btn btn-big btn-<?=($model->IncomeTaxRebateConfirm == 'No')? 'success' : 'default' ?>" id="incomeNo"><?=Yii::t("income","NO")?></button>
				</div>
			</h3>
		</div>
	</div>

	<div class="login-button input-group">
		<div class="back pull-left">
			<a class="btn btn-success for-clr" data-toggle="tab" href="#s_23"  onclick="next_pre('s_23')" ><i class="fa"> <span class="previous-text"> </span></i> <i class="fa fa-chevron-left"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i> </a>
		</div>
		<div class="back pull-right">
			<a class="btn btn-success for-clr" data-toggle="tab" href="#s_26"  onclick="next_pre('s_26')" ><i class="fa"><span class="previous-text"><?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
		</div>								
		<div class="clearfix"></div>
	</div>	

	<!-- #############################----------------------s_25--------END-------------------------################################# -->
</div>


<div role="tabpanel" class="tab-pane" id="s_26" style="text-align: center !important;">

	<!-- #############################----------------------s_26--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Tax Deducted at Source ********************
##############################################################################
-->

<h2><?=Yii::t("income","Tax Deducted at Source")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.12")?>"></i></h2>                                   
<div class="clearfix"></div>


<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeTaxDeductedAtSource_verification" style="display: <?=($model->IncomeTaxDeductedAtSourceConfirm == 'Yes' || $model['Income82cTdsTotal']>0) ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did any tax automatically get deducted from your income")?> ?
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeTaxDeductedAtSourceConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeTaxDeductedAtSource_verification', 'IncomeTaxDeductedAtSource_fraction_or_total', 'IncomeTaxDeductedAtSource_fraction')" type="button" class="btn btn-big btn-<?=($model->IncomeTaxDeductedAtSourceConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeTaxDeductedAtSource')" type="button" class="btn btn-big btn-<?=($model->IncomeTaxDeductedAtSourceConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeTaxDeductedAtSource_fraction_or_total" style="display: <?=($model->IncomeTaxDeductedAtSourceConfirm == 'Yes' || $model['Income82cTdsTotal']>0) ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center hide" id="IncomeTaxDeductedAtSource_total" style="display: <?=($model->IncomeTaxDeductedAtSourceFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeTaxDeductedAtSource == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeTaxDeductedAtSource. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeTaxDeductedAtSource_total', 'IncomeTaxDeductedAtSource_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Income Tax Deducted At Source")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeTaxDeductedAtSource',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Income Tax Deducted At Source")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeTaxDeductedAtSource')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeTaxDeductedAtSource', 's_26')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeTaxDeductedAtSource_fraction" style="display: <?=($model->IncomeTaxDeductedAtSourceFOrT == 'Fraction' || $model['Income82cTdsTotal']>0) ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncForeignIncome_form"> -->
		<?php if($model['Income82cTdsTotal']!=0){ ?>
		<table class="table" id="IncomeTds82c_table">
			<thead>
				<tr>
					<!-- 					<th class="col-lg-3"><?=Yii::t("income","Source Type")?></th> -->
					<th colspan="2" class="text-center"><strong></strong><?=Yii::t("income","TDS from 82C")?></strong></th>

					<th></th>
				</tr>
				<tr>
					<!-- 					<th class="col-lg-3"><?=Yii::t("income","Source Type")?></th> -->
					<th><?=Yii::t("income","Details")?></th>
					<th><?=Yii::t("income","TDS (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($Income82cData as $key => $value) {
					if($value->ContractorIncome){
						echo "<tr>";
						echo "<td>Contractor Income</td>";
						echo "<td>".$value->ContractorIncome."</td>";
						echo '</tr>';
					}
					if($value->ClearingAndForwardingIncome){
						echo "<tr>";
						echo "<td>Clearing And Forwarding Income</td>";
						echo "<td>".$value->ClearingAndForwardingIncome."</td>";
						echo '</tr>';
					}
					if($value->TravelAgentIncome){
						echo "<tr>";
						echo "<td>Travel Agent Income</td>";
						echo "<td>".$value->TravelAgentIncome."</td>";
						echo '</tr>';
					}if($value->ImporterTaxCollection){
						echo "<tr>";
						echo "<td>Importer Tax Collection</td>";
						echo "<td>".$value->ImporterTaxCollection."</td>";
						echo '</tr>';
					}if($value->KnitWovenExportIncome){
						echo "<tr>";
						echo "<td>Knit Woven Export Income</td>";
						echo "<td>".$value->KnitWovenExportIncome."</td>";
						echo '</tr>';
					}if($value->OtherThanKnitWovenExportIncome){
						echo "<tr>";
						echo "<td>Other Than Knit Woven Export Income</td>";
						echo "<td>".$value->OtherThanKnitWovenExportIncome."</td>";
						echo '</tr>';
					}if($value->RoyaltyIncome){
						echo "<tr>";
						echo "<td>Royalty Income</td>";
						echo "<td>".$value->RoyaltyIncome."</td>";
						echo '</tr>';
					}if($value->SavingInstrumentInterestIncome){
						echo "<tr>";
						echo "<td>Saving Instrument Interest Income</td>";
						echo "<td>".$value->SavingInstrumentInterestIncome."</td>";
						echo '</tr>';
					}if($value->ExportCashSubsidyIncome){
						echo "<tr>";
						echo "<td>Export Cash Subsidy Income</td>";
						echo "<td>".$value->ExportCashSubsidyIncome."</td>";
						echo '</tr>';
					}if($value->SavingAndFixedDepositInterestIncome){
						echo "<tr>";
						echo "<td>Saving And Fixed Deposit Interest Income</td>";
						echo "<td>".$value->SavingAndFixedDepositInterestIncome."</td>";
						echo '</tr>';
					}if($value->LotteryIncome){
						echo "<tr>";
						echo "<td>Lottery Income</td>";
						echo "<td>".$value->LotteryIncome."</td>";
						echo '</tr>';
					}if($value->PropertySaleIncome){
						echo "<tr>";
						echo "<td>Property Sale Income</td>";
						echo "<td>".$value->PropertySaleIncome."</td>";
						echo '</tr>';
					}
				}
				?>
			</tbody>
		</table>

		<?php } ?>

		<table class="table" id="IncomeTaxDeductedAtSource_table">
			<thead>
				<tr>
					<!-- 					<th class="col-lg-3"><?=Yii::t("income","Source Type")?></th> -->
					<th><?=Yii::t("income","Details")?></th>
					<th><?=Yii::t("income","TDS (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncomeTaxDeductedAtSourceList as $value) {
					echo "<tr id='IncomeTaxDeductedAtSource_row_".$value->TaxDeductId."'>";
					echo CHtml::hiddenField('Text', @$value->TaxDeductId , array('id'=>'IncomeTaxDeductedAtSource_TaxDeductId') );
					// echo "<td>";
					// echo $value->Type;
					// echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeTaxDeductedAtSource(".$value->TaxDeductId.", \"IncIncomeTaxDeductedAtSource\", \"IncomeTaxDeductedAtSource\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->TaxDeductId.", \"IncIncomeTaxDeductedAtSource\", \"IncomeTaxDeductedAtSource\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncForeignIncome_form-1"> -->
		<table id="IncomeTaxDeductedAtSource_table-2">
			<tfoot>
				<tr>
					<td>
						<div class="form-group">								 
							<?php //echo CHtml::dropDownList('IncForeignIncome[Type]', '', ['Interest' => 'Interest', 'Dividend' => 'Dividend', 'Winnings' => 'Winnings', 'Other' => 'Other'], array('empty' => 'Select type', 'class' => 'form-control', 'id'=>"IncForeignIncome_Type" ));  ?>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeTaxDeductedAtSource_id">
							<textarea name="IncIncomeTaxDeductedAtSource[Description]" id="IncIncomeTaxDeductedAtSource_Description" class="form-control" rows="1" placeholder="<?=Yii::t("income","Details")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncIncomeTaxDeductedAtSource[Cost]" type="text" class="form-control" id="IncIncomeTaxDeductedAtSource_Cost" placeholder="<?=Yii::t("income","TDS")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="ForeignIncome_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_IncomeTaxDeductedAtSource_fraction('IncomeTaxDeductedAtSource_id', 'IncomeTaxDeductedAtSource_description', 'IncomeTaxDeductedAtSource_cost', 'IncIncomeTaxDeductedAtSource', 'IncomeTaxDeductedAtSource')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_21"  onclick="next_pre('s_21')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>

	<div class="back pull-right">
    <a class="btn btn-success for-clr" style="height: 40px;" href="<?php echo Yii::app()->baseUrl.'/index.php/assetsSingle/entry';?>"  ><span class="previous-text"> <?= Yii::t("common","Next") ?> </span> <i class="fa fa-chevron-right"></i></a>
  </div>

	<!--div class="back pull-right">
		<a class="btn btn-success for-clr"  href="<?php echo Yii::app()->baseUrl; ?>"   ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div -->
	
	<div class="clearfix"></div>

</div>


<!-- #############################----------------------s_26--------END-------------------------################################# -->
</div>














<div class="clearfix"></div>
</div>

<!-- </div> -->
<!-- </div> -->


<!-- ##########################--------------Start---------radio--------------------------------########################## -->



<!-- ##########################--------------END---------radio--------------------------------########################## -->
<!-- ##########################--------------END---------TAB--------------------------------########################## -->
<?php $this->endWidget(); ?>

<script type="text/javascript">
	// $(function(){
	// 	$('a[title]').tooltip();
	// });
</script>

<style type="text/css">

	.reg-form {
		border: 1px solid #d5d5d5;
		border-radius: 0px !important;
		/*box-shadow: 0 0 2px #dadada, 0 -3px 0 #e6e6e6 inset;*/
		box-shadow: none;
		height: auto;
		width: 100%;
	}

	.content .mail-box2 .form-control_1 {
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px !important;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
		color: #555;
		display: block;
		font-size: 14px;
		height: 42px;
		line-height: 1.42857;
		margin-left: 44%;
		padding: 6px 12px;
		transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
		vertical-align: middle;
		width: 408px !important;
	}


	.content .mail-box2 .form-control_2 {
		background-color: #f9f9f9;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px !important;
		box-shadow: 0 -2px 2px #dadada, 0 -3px 0 #e6e6e6 inset;; 
		color: #555;
		display: block;
		font-size: 14px;
		height: 135px;
		line-height: 1.42857;
		padding: 6px 12px 102px 12px;
		transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
		vertical-align: middle;
		width:408px !important;
		margin-left:44%; 
	}

	/*=====================================-------------------------=======================================*/
	table > tbody >tr > td > a {
		border-radius: 0px 0px 0 0;
		display: block;
		padding: 10px 10px;
		position: relative;
		color:white;
	}
	/*======================================================================-------------------------------==============================================*/
	.custab{
		border: 1px solid #ccc;
		padding: 5px;
		margin: 5% 0;
		box-shadow: 3px 3px 2px #ccc;
		transition: 0.5s;
	}
	.custab:hover{
		box-shadow: 3px 3px 0px transparent;
		transition: 0.5s;
	}

	.salary-input-box{width: 50%;margin: 0 auto;display: none;}

</style>

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-------------------------------||||||||||||||||||||||||||||||||||||||||||||||| -->
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||START of JAVA & STYLE SCRIPT PART||||||||||||||||||||||||||||||||||||||||||||||| -->
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-------------------------------||||||||||||||||||||||||||||||||||||||||||||||| -->



<script type="text/javascript">
	var baseUrl = '<?php echo Yii::app()->baseUrl; ?>';
    var delete_msg="<?php echo Yii::t('income', "Are you sure?"); ?>";
// $('.InterestOnSecuritiesValue').hide(); 

function openFromData(){
	$('.salary-confirm-box').hide();
	$('.salary-input-box').show();
	
}

function copytoBasic(val){
	$('.BasicPay').val(val);
}

function insertData(controllerName) {

	window.location.href = baseUrl+'/index.php/'+controllerName+'/entry/';

}


$('#incomeYesS9').click(function(e) {
	
	e.preventDefault();
	window.location.href = baseUrl+'/index.php/IncomeHouseProperties/entry/';
});

$('#IncomePropertiesAdd').click(function(e) {
// 
e.preventDefault();
window.location.href = baseUrl+'/index.php/IncomeHouseProperties/entry/';
});


$('#IncomeShareProfitYes').click(function(e) {
	
	e.preventDefault();
	window.location.href = baseUrl+'/index.php/IncomeShareProfit/entry/';
});

$('#IncomeShareProfitAdd').click(function(e) {
// 
e.preventDefault();
window.location.href = baseUrl+'/index.php/IncomeShareProfit/entry/';
});



$('#IncomeOtherSourceYes').click(function(e) {
	
	e.preventDefault();
	window.location.href = baseUrl+'/index.php/IncomeOtherSource/entry/';
});

$('#IncomeOtherSourceAdd').click(function(e) {
// 
e.preventDefault();
window.location.href = baseUrl+'/index.php/IncomeOtherSource/entry/';
});



//=================Single value call======----START-----================================================//
show_duration = 500;

// $('#InterestOnSecuritiesYes').click(function(e) {

	function hideShowClass(attributeName) {

		//alert(attributeName);
		console.log("Called hideShowClass");

		var defaultState = '.'+attributeName+'Default';
		var changedState = '.'+attributeName+'Value';

		$(defaultState).removeClass('show'); 
		$(changedState).removeClass('show').fadeIn(show_duration);

		$(defaultState).addClass('hide'); 
		$(changedState).addClass('show').fadeIn(show_duration);
	}


// $("#"+show).fadeIn(show_duration);


$('#IncomeAgricultureYes').click(function(e) {
	
	$('.IncomeAgricultureValue').show(); 
	$('.IncomeAgricultureDefault').hide(); 

});

$('#IncomeBusinessOrProfessionYes').click(function(e) {
	
	$('.IncomeBusinessOrProfessionValue').show(); 
	$('.IncomeBusinessOrProfessionDefault').hide(); 

});

$('#IncomeSpouseOrChildYes').click(function(e) {
	
	$('.IncomeSpouseOrChildValue').show(); 
	$('.IncomeSpouseOrChildDefault').hide(); 

});

$('#CapitalGainsYes').click(function(e) {
	
	$('.CapitalGainsValue').show(); 
	$('.CapitalGainsDefault').hide(); 

});

$('#ForeignIncomeYes').click(function(e) {
	
	$('.ForeignIncomeValue').show(); 
	$('.ForeignIncomeDefault').hide(); 

});

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
				$("#Income_"+field_name).val(data.value);
				//exp_show_error_success(div_id, "success", data.msg);
				location.reload();  
			}
			else
			{
				//exp_show_error_success(div_id, "error", data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			//exp_show_error_success(div_id, "error", "Internal problem has been occurred. Please try again.");
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
		$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">x</a>'+msg+'</div>');
	if(status == "success")
		$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">x</a>'+msg+'</div>');

}




function submitFormSave(formData, pUrl,VDiv)
{
	$('#loading').css('display','block');

	$.ajax({
		url: pUrl,
		type: 'POST',
		data:formData,
		success: function(response)
		{

			$(VDiv).html(response);
			location.reload();  

		}

	}).success(function(){

		$('#loading').css('display','none');

	});
}

$(function(){
	/*$('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
		$(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
		$(this).addClass('selected');

	});*/
});





$('#s9_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#s9Tab').addClass('active'); });
$('#s9_btn1').on('click', function(){	$("#myTab li").removeClass("active"); $('#s9Tab').addClass('active'); });

$('#s11_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#s11Tab').addClass('active'); });
$('#s11_btn1').on('click', function(){	$("#myTab li").removeClass("active"); $('#s11Tab').addClass('active'); });

</script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/income/income_single.js?v=<?=$this->v?>"></script>








