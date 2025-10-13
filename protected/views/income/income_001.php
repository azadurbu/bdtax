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

<div id="incomeModule" class="board g">
	<!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
	<div class="tab-content nav-tabs-sticky reg-form income-dashbord sticky-min-height">
		<div class="board-inner">			
			<ul class="nav nav-tabs" role="tablist" id="myTab">
				<li role="presentation"  /*data-toggle="tooltip"*/  class="active">
					<a href="#s_7" role="tab"  data-toggle="tab" title="<?=Yii::t('TTips',"1.1")?>">
						<?php echo ($model->IncomeSalariesConfirm == "") ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs one"><?=Yii::t('income',"Salary") ?>
						</span></a>
					</li>


					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_9" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.2")?>">
						<?php echo (@$InterestOnSecuritiesTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs three"><?=Yii::t('income',"Interest on Securities") ?>
						</span></a>
					</li>
					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_11" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.3")?>">
						<?php echo ($IncomeHousePropertiesTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs four"><?=Yii::t('income',"Property") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_13" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.4")?>">
						<?php echo (@$IncomeAgricultureTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Agriculture") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_15" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.5")?>">
						<?php echo (@$IncomeBusinessOrProfessionTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Business") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_17" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.6")?>">
						<?php echo (@$IncomeShareProfitTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Share of Profit in Firm") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_18" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.7")?>">
						<?php echo (@$IncomeSpouseOrChildTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Spouse/Child") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_19" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.8")?>">
						<?php echo (@$IncomeCapitalGainsTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Capital Gains") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/  ><a href="#s_21" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.9")?>">
						<?php echo (@$IncomeOtherSourceTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Other Sources") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/ ><a href="#s_23" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.10")?>">
						<?php echo (@$ForeignIncomeTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?> 
						<span class="round-tabs five"><?=Yii::t('income',"Foreign Income") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/ ><a href="#s_25" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.11")?>">
						<?php echo (@$IncomeTaxRebateTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?>  
						<span class="round-tabs five"><?=Yii::t('income',"Tax Rebate") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/ ><a href="#s_26" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.12")?>">
						<?php echo (@$IncomeTaxDeductedAtSourceTabState == 0 && $model['Income82cTdsTotal'] == 0) ? '':'<i class="fa fa-check-square"></i>' ?>  
						<span class="round-tabs five"><?=Yii::t('income',"Tax Deducted at Source") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/ ><a href="#s_27" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.13")?>">
						<?php echo (@$IncomeTaxInAdvanceTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?>  
						<span class="round-tabs five"><?=Yii::t('income',"Advance Paid Tax") ?>
						</span></a>
					</li>

					<li role="presentation"  /*data-toggle="tooltip"*/ ><a href="#s_28" role="tab" data-toggle="tab" title="<?=Yii::t('TTips',"1.14")?>">
						<?php echo (@$AdjustmentTaxRefundTabState == 0) ? '':'<i class="fa fa-check-square"></i>' ?>  
						<span class="round-tabs five"><?=Yii::t('income',"Adjustment of Tax Refund") ?>
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
				<br />
				<div class="back pull-right">
					<a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/income/review" ><span class="previous-text"> <?=Yii::t('income','Review') ?> </span><i class="glyphicon glyphicon-list-alt"></i></a>
				</div>

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
											<th><?=Yii::t('income','Basic pay'); ?></th>
											<th><?=Yii::t('income','Net taxable income'); ?></th>
											<th><?=Yii::t('income','Year'); ?></th>
											<th class="text-center"></th>
										</tr>
									</thead>	

									<?php $totalIncomeSalaries=0; ?>

									<?php foreach ($IncomeSalariesData as $key => $data) { ?>

									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $data->BasicPay.$this->currency; ?></td>
										<td><?php echo $data->NetTaxableIncome.$this->currency; ?></td>
										<td><?php echo $data->EntryYear; ?></td>
										<td class="text-center">
											<?php echo CHtml::link('<span class="fa fa-pencil-square-o"></span> '.Yii::t('income',"Edit"), Yii::app()->baseUrl."/index.php/IncomeSalaries/update/id/".$data->IncomeSalariesId , array('class'=>'btn btn-success btn-xs')); ?>
											<?php echo CHtml::link('<span class="fa fa-times"></span> '.Yii::t('income',"Delete"), Yii::app()->baseUrl."/index.php/IncomeSalaries/delete/id/".$data->IncomeSalariesId , array('class'=>'btn btn-danger btn-xs')); ?>
										</td>
									</tr>
									<?php $totalIncomeSalaries +=$data->NetTaxableIncome ?>
									<?php } ?>
									<tr><td colspan="4"><span class="pull-right"><?=Yii::t('income',"Total salary income")?>  = <?php echo number_format($totalIncomeSalaries,2).$this->currency; ?> </span></td><td></td></tr>					
								</table>
							</div>
						</div>

						<div class="IncomeSalariesDefault <?php echo ($IncomeSalariesData==NULL)? 'show' : 'hide'; ?>">
							<h2><?=Yii::t('income',"Salary")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.1")?>"></i></h2>
							
							<p><?=Yii::t('income',"Did you have any salary income?")?></p>
							<div class="text-center row">
								<?php
							        // IF THE ANSWER IS "NO"
								if($model->IncomeSalariesConfirm == 'No')
									echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
								?>
								<h3>
									<div class="btn-group btn-group-lg">
										<button type="button" class="btn btn-<?=($model->IncomeSalariesConfirm == 'Yes')? 'success' : 'default' ?>"  onclick="insertData('IncomeSalaries'),hide_show('IncomeSalaries')"  ><?=Yii::t("income","YES")?></button>
										<button onclick="set_no('IncomeSalaries')" type="button" class="btn btn-big btn-<?=($model->IncomeSalariesConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
									</div>
								</h3>
							</div>
						</div>

						<div class="login-button input-group">
							<div class="back pull-right">
								<a class="btn btn-success for-clr" data-toggle="tab" href="#s_9"  onclick="next_pre('s_9')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
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
<div role="tabpanel" class="tab-pane" id="s_11" style="text-align: center !important;">

	<!-- #############################----------------------s_11--------START-------------------------################################# -->
	<div class="income-top"></div>
	<!-- <p>You can confirm or update what you tell us later on.</p> -->


	<?php  
	if(Yii::app()->user->hasFlash('alert_success')) 
	  $flash = Yii::app()->user->getFlash('alert_success');
	else
	  $flash = "";
	?>
	<?php if ($IncomeHousePropertiesData!=NULL) { ?>

	<div class="content InterestOnSecuritiesValue">

		<h2><?=Yii::t('income','Your total rental properties income is following') ?></h2>



		<div class="row col-md-8 col-md-offset-2 custyle table-responsive">
			<table class="table table-striped custab">
				<thead>
					<button type="button" class="btn btn-success btn-xs pull-right" id="IncomePropertiesAdd" ><b>+</b><?=Yii::t('common','Add More')?> </a> </br>
						<tr>
							<th><?=Yii::t('income','ID')?></th>
							<th><?=Yii::t('income','Annual Rental Income')?></th>
							<th><?=Yii::t('income','Net income')?></th>
							<th><?=Yii::t('income','Year')?></th>
							<th class="text-center"><?=Yii::t('income','Action')?></th>
						</tr>
					</thead>	

					<?php $totalIncomeHouseProperties=0; ?>

					<?php foreach ($IncomeHousePropertiesData as $key => $data) { ?>

					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $data->AnnualRentalIncome.$this->currency; ?></td>
						<td><?php echo $data->NetIncome.$this->currency; ?></td>
						<td><?php echo $data->EntryYear; ?></td>
						<td class="text-center">
							<?php echo CHtml::link('<span class="fa fa-pencil-square-o"></span> '.Yii::t('income',"Edit"), Yii::app()->baseUrl."/index.php/IncomeHouseProperties/update/id/".$data->IncomePropertiesId , array('class'=>'btn btn-success btn-xs')); ?>
							<?php echo CHtml::link('<span class="fa fa-times"></span> '.Yii::t('income',"Delete"), Yii::app()->baseUrl."/index.php/IncomeHouseProperties/delete/id/".$data->IncomePropertiesId , array('class'=>'btn btn-danger btn-xs')); ?>
						</td>
					</tr>

					<?php $totalIncomeHouseProperties +=$data->NetIncome; ?>
					<?php } ?>	
					<tr><td colspan="4"><span class="pull-right"><?=Yii::t('income','Total rental properties income')?> = <?php echo number_format($totalIncomeHouseProperties,2).$this->currency; ?> </span></td><td></td></tr>					
				</table>
			</div>	


		</div>

		<?php } else { ?>

		<h2><?=Yii::t('income',"Property")?> &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.3")?>"></i></h2>

		<p>
			<?=Yii::t("income","Did you have any rental property income?")?> 
		</p>

		<div class="content">

			<div class="row">

				<!-- <p> -->
					<?php 
        // IF THE ANSWER IS "NO"
					if($model->IncomeHousePropertiesConfirm == 'No')
						echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
					?>
				<!-- </p> -->
				<!-- YES/NO BUTTON -->


				<h3>							
					<!-- <label class="input-group" > -->
					<div class="btn-group btn-group-lg">
						<button type="button" class="btn btn-<?=($model->IncomeHousePropertiesConfirm == 'Yes')? 'success' : 'default' ?>" id="incomeYesS9"><?=Yii::t("income","YES")?></button>
						<button  onclick="set_no('IncomeHouseProperties')"   id="name_btn" type="button" class="btn btn-big btn-<?=($model->IncomeHousePropertiesConfirm == 'No')? 'success' : 'default' ?>" id="incomeNo"><?=Yii::t("income","NO"); ?></button>
					</div>
				</h3>
			</div>


		</div>

		<?php }  ?>


		<div class="login-button input-group">

			<div class="back pull-left">
				<a class="btn btn-success for-clr" data-toggle="tab" href="#s_9"  onclick="next_pre('s_9')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
			</div>
			<div class="back pull-right">
				<a class="btn btn-success for-clr" data-toggle="tab" href="#s_13"  onclick="next_pre('s_13')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
			</div>
			<div class="clearfix"></div>

		</div>


		<!-- #############################----------------------s_11--------END-------------------------################################# -->
	</div>

	<div role="tabpanel" class="tab-pane" id="s_13" style="text-align: center !important;">

		<!-- #############################----------------------s_13--------START-------------------------################################# -->

		<!-- <p>Please enter your total agriculture income </p><h2>Did you have any agricultural income?</h2> -->


<!-- 
##############################################################################
***************** Agriculture income ********************
##############################################################################
-->
<h2><?=Yii::t("income","Agriculture")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.4")?>"></i></h2>                                   
<div class="clearfix"></div>


<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div id="IncomeAgriculture_verification"  class="text-center"  style="display: <?=($model->IncomeAgricultureConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any agricultural income?")?> 
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeAgricultureConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeAgriculture_verification', 'IncomeAgriculture_fraction_or_total', 'IncomeAgriculture_fraction')" type="button" class="btn btn-big btn-<?=($model->IncomeAgricultureConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeAgriculture')" type="button" class="btn btn-big btn-<?=($model->IncomeAgricultureConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeAgriculture_fraction_or_total" style="display: <?=($model->IncomeAgricultureConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center hide" id="IncomeAgriculture_total" style="display: <?=($model->IncomeAgricultureFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeAgriculture == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeAgriculture. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeAgriculture_total', 'IncomeAgriculture_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Agriculture income")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeAgriculture',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Agriculture income")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeAgriculture')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeAgriculture', 's_11')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeAgriculture_fraction" style="display: <?=($model->IncomeAgricultureFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-10 col-sm-offset-1 table-responsive">
		<!-- <form id="IncIncomeAgriculture_form"> -->
		<?php //echo CHtml::activeLabelEx($model, 'IncomeAgricultureBooksOfAccount', array( 'class'=> '	 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> 
		<!-- <?php //echo $form->radioButton($model, 'IncomeAgricultureBooksOfAccount', array('value' => 'Y', 'uncheckValue' => null)); ?>
        <span class="text"><b>YES</b></span>
    	<?php //echo $form->radioButton($model, 'IncomeAgricultureBooksOfAccount', array('value' => 'N', 'uncheckValue' => null)); ?>

    	<span class="text"><b>NO</b></span> -->
    	<?php 
    		// var_dump($model->IncomeAgricultureBooksOfAccount);
    	//$accountStatus = array('Yes'=>Yii::t('income', "YES"), 'No'=>Yii::t('income', "NO"));
    	/*if($model->IncomeAgricultureBooksOfAccount==null){
    		echo $form->radioButtonList($model,'IncomeAgricultureBooksOfAccount',$accountStatus,array('separator'=>' ', "onChange"=>"BooksOfAccountStatus(this)", $model->IncomeAgricultureBooksOfAccount='Yes'));
    	}else{
            echo $form->radioButtonList($model,'IncomeAgricultureBooksOfAccount',$accountStatus,array('separator'=>' ', "onChange"=>"BooksOfAccountStatus(this)",'disabled'=>true)); 
    	}*/
        ?>
    	
    	
		<table class="table" id="IncomeAgriculture_table">
			<thead>
				<tr>
					<th class="col-lg-3"><?=Yii::t("income","Land (In Bigha)")?></th>
					<th class="col-lg-2"><?=Yii::t("income","Crops Type")?></th>
					<th><?=Yii::t("income","Do you have any Books of Account?")?></th>
					<th><?=Yii::t("income","Total Revenue (BDT)")?></th>
					<th><?=Yii::t("income","Production Cost (BDT)")?></th>
					<th><?=Yii::t("income","Net Income (BDT)")?></th>

					<th class="col-lg-2"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncIncomeAgricultureList as $value) {
					echo "<tr id='IncomeAgriculture_row_".$value->IncomeAgricultureId."'>";
					echo CHtml::hiddenField('Text', @$value->IncomeAgricultureId , array('id'=>'IncomeAgriculture_IncomeAgricultureId') );
					echo "<td>".htmlentities(strip_tags($value->LandInBigha))."</td>";
					echo "<td>".htmlentities(strip_tags($value->CropsType))."</td>";
					echo "<td>".Yii::t("income",$value->BooksOfAccount)."</td>";
					echo "<td>".$value->TotalRevenue."</td>";
					echo "<td>".$value->ProductionCost."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeAgriculture(".$value->IncomeAgricultureId.", \"IncIncomeAgriculture\", \"IncomeAgriculture\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->IncomeAgricultureId.", \"IncIncomeAgriculture\", \"IncomeAgriculture\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncIncomeAgriculture_form-1"> -->
		<table id="IncomeAgriculture_table-2">
			<tfoot>
				<tr>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeAgriculture_id">
							<textarea name="IncIncomeAgriculture[LandInBigha]" id="IncIncomeAgriculture_LandInBigha" class="form-control" rows="1" placeholder="<?=Yii::t("income","Land (In Bigha)")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeAgriculture_id">
							<textarea name="IncIncomeAgriculture[CropsType]" id="IncIncomeAgriculture_CropsType" class="form-control" rows="1" placeholder="<?=Yii::t("income","Rice, Vegetable, Etc.")?>"></textarea>
						</div>
					</td>
					
					<td>
						<div class="form-group" style="width: 90px;">
							<span title="Do you have any Books of Account?">
								<input onchange="BooksOfAccountStatus()" id="BooksOfAccount_0" value="Yes" checked="checked" type="radio" name="BooksOfAccount"> 

								<label for="BooksOfAccount_0"><?=Yii::t("income",'YES');?></label> 

								<input onchange="BooksOfAccountStatus()" id="BooksOfAccount_1" value="No" type="radio" name="BooksOfAccount"> 

								<label for="BooksOfAccount_1"><?=Yii::t("income",'NO');?></label>
							</span>
						</div>
					</td>
					
					<td>
						<div class="form-group">
							<input name="IncIncomeAgriculture[TotalRevenue]" onkeyup="IncomeAgricultureCalculation(this)" type="text" class="form-control" id="IncIncomeAgriculture_TotalRevenue" placeholder="<?=Yii::t("income","Total Revenue")?>">
						</div>
					</td>

					

					<td>
						<div class="form-group">
							<input name="IncIncomeAgriculture[ProductionCost]" onkeyup="IncomeAgricultureCalculation(this)" type="text" class="form-control" id="IncIncomeAgriculture_ProductionCost" <?=($model->IncomeAgricultureBooksOfAccount == 'No') ? 'readonly':''; ?> placeholder="<?=Yii::t("income","Production Cost")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input disabled="disabled" name="IncIncomeAgriculture[Cost]" type="text" class="form-control" id="IncIncomeAgriculture_Cost" placeholder="<?=Yii::t("income","Tax Payable Income")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="IncomeAgriculture_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_IncomeAgriculture_fraction('IncomeAgriculture_id', 'IncomeAgriculture_description', 'IncomeAgriculture_cost', 'IncIncomeAgriculture', 'IncomeAgriculture')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<!-- NEXT PREVIOUS BUTTON -->
<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_11"  onclick="next_pre('s_11')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"><?=Yii::t("income","Previous")?> </span></i></a>
	</div>

	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_15" onclick="next_pre('s_15')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?> </span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>
</div>
<!-- END - NEXT PREVIOUS BUTTON -->


<!-- #############################----------------------s_13--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_15" style="text-align: center !important;">

	<!-- #############################----------------------s_15--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Business or Profession income ********************
##############################################################################
-->
<h2><?=Yii::t("income","Business")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.5")?>"></i></h2>                                   
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
				<?php echo $form->textField($model,'IncomeBusinessOrProfession',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Business or Profession income")) ); ?>
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
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_13"   onclick="next_pre('s_13')"  > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_17"   onclick="next_pre('s_17')"  ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>



<!-- #############################----------------------s_15--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_17" style="text-align: center !important;">

	<!-- #############################----------------------s_17--------START-------------------------################################# -->
	
<!-- 
##############################################################################
***************** share of firm profit? ********************
##############################################################################
-->
<h2><?=Yii::t("income","Share of Profit in Firm")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.6")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeShareProfit_verification" style="display: <?=($model->IncomeShareProfitConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any share of firm profit")?>?
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeShareProfitConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeShareProfit_verification', 'IncomeShareProfit_fraction_or_total', 'IncomeShareProfit_total')" type="button" class="btn btn-big btn-<?=($model->IncomeShareProfitConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeShareProfit')" type="button" class="btn btn-big btn-<?=($model->IncomeShareProfitConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeShareProfit_fraction_or_total" style="display: <?=($model->IncomeShareProfitConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center" id="IncomeShareProfit_total" style="display: <?=($model->IncomeShareProfitFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeShareProfit == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeShareProfit. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeShareProfit_total', 'IncomeShareProfit_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Share of firm profit")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeShareProfit',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Share of firm profit")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeShareProfit')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeShareProfit', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeShareProfit_fraction" style="display: <?=($model->IncomeShareProfitFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncIncomeShareProfit_form"> -->

		<table class="table" id="IncomeShareProfit_table">
			<thead>
				<tr>
					<th class="col-lg-3"><?=Yii::t("income","Firm name")?></th>
					<th><?=Yii::t("income","Income of Firm (BDT)")?></th>
					<th><?=Yii::t("income","% of ownership of Firm")?></th>
					<th><?=Yii::t("income","Net Value of Share (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncIncomeShareProfitList as $value) {
					echo "<tr id='IncomeShareProfit_row_".$value->IncomeShareProfitId."'>";
					echo CHtml::hiddenField('Text', @$value->IncomeShareProfitId , array('id'=>'IncomeShareProfit_IncomeShareProfitId') );
					echo "<td>";
					echo htmlentities(strip_tags($value->NameOfFirm)); 
					echo "</td>";
					echo "<td>".$value->IncomeOfFirm."</td>";
					echo "<td>".$value->ShareOfFirm."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td style='width: 104px;'><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeShareProfit(".$value->IncomeShareProfitId.", \"IncIncomeShareProfit\", \"IncomeShareProfit\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->IncomeShareProfitId.", \"IncIncomeShareProfit\", \"IncomeShareProfit\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncIncomeShareProfit_form-1"> -->
		<table id="IncomeShareProfit_table-2">
			<tfoot>
				<tr>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeShareProfit_id">
							<input name="IncIncomeShareProfit[NameOfFirm]" type="text" class="form-control" id="IncIncomeShareProfit_NameOfFirm" placeholder="<?=Yii::t("income","Name of firm")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input onkeyup="netShareByPercent()" name="IncIncomeShareProfit[IncomeOfFirm]" type="text" class="form-control" id="IncIncomeShareProfit_IncomeOfFirm" placeholder="<?=Yii::t("income","Income of Firm")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input onkeyup="netShareByPercent()" name="IncIncomeShareProfit[ShareOfFirm]" type="text" class="form-control" id="IncIncomeShareProfit_ShareOfFirm" placeholder="<?=Yii::t("income","% of ownership of Firm")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<input disabled="disabled" name="IncIncomeShareProfit[Cost]" type="text" class="form-control" id="IncIncomeShareProfit_Cost" placeholder="<?=Yii::t("income","Net income")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="IncomeShareProfit_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_IncomeShareProfit_fraction('IncomeShareProfit_id', 'IncomeShareProfit_description', 'IncomeShareProfit_cost', 'IncIncomeShareProfit', 'IncomeShareProfit')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>


<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_15"   onclick="next_pre('s_15')"  > <i class="fa fa-chevron-left"></i> <i class="fa"> <span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>

	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_18"   onclick="next_pre('s_18')"  ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>

<!-- #############################----------------------s_17--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_18" style="text-align: center !important;">

	<!-- #############################----------------------s_18--------START-------------------------################################# -->

	
<!-- 
##############################################################################
***************** Income Spouse Or Child ********************
##############################################################################
-->
<h2><?=Yii::t("income","Spouse/Child")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.7")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeSpouseOrChild_verification" style="display: <?=($model->IncomeSpouseOrChildConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any spouse or minor child income")?> ?
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeSpouseOrChildConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeSpouseOrChild_verification', 'IncomeSpouseOrChild_fraction_or_total', 'IncomeSpouseOrChild_total')" type="button" class="btn btn-big btn-<?=($model->IncomeSpouseOrChildConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeSpouseOrChild')" type="button" class="btn btn-big btn-<?=($model->IncomeSpouseOrChildConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeSpouseOrChild_fraction_or_total" style="display: <?=($model->IncomeSpouseOrChildConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center" id="IncomeSpouseOrChild_total" style="display: <?=($model->IncomeSpouseOrChildFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeSpouseOrChild == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeSpouseOrChild. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeSpouseOrChild_total', 'IncomeSpouseOrChild_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Spouse or minor child income")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeSpouseOrChild',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Spouse or minor child income")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeSpouseOrChild')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeSpouseOrChild', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeSpouseOrChild_fraction" style="display: <?=($model->IncomeSpouseOrChildFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncIncomeSpouseOrChild_form"> -->

		<table class="table" id="IncomeSpouseOrChild_table">
			<thead>
				<tr>
					<th class="col-lg-2"><?=Yii::t("income","Relation")?></th>
					<th><?=Yii::t("income","Name")?></th>
					<th><?=Yii::t("income","Net income (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncIncomeSpouseOrChildList as $value) {
					echo "<tr id='IncomeSpouseOrChild_row_".$value->IncomeSpouseOrChildId."'>";
					echo CHtml::hiddenField('Text', @$value->IncomeSpouseOrChildId , array('id'=>'IncomeSpouseOrChild_IncomeSpouseOrChildId') );
					echo "<td>";
					echo $value->Type;
				 // echo CHtml::dropDownList('Type', $value->Type, ['Bond' => 'Bond', 'Debenture' => 'Debenture','Securities' => 'Securities'], array('empty' => 'Select type', 'class' => 'form-control', 'onchange' => 'getEmployer(this.value, "")')); 
		 //  echo CHtml::dropDownList('listname', $select, array('M' => 'Male', 'F' => 'Female')); 
					echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Name))."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeSpouseOrChild(".$value->IncomeSpouseOrChildId.", \"IncIncomeSpouseOrChild\", \"IncomeSpouseOrChild\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->IncomeSpouseOrChildId.", \"IncIncomeSpouseOrChild\", \"IncomeSpouseOrChild\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncIncomeSpouseOrChild_form-1"> -->
		<table id="IncomeSpouseOrChild_table-2">
			<tfoot>
				<tr>
					<td>
						<div class="form-group">								 
							<?php echo CHtml::dropDownList('IncIncomeSpouseOrChild[Type]', '', ['Spouse' => 'Spouse', 'Child' => 'Child'], array('empty' => 'Select type', 'class' => 'form-control', 'id'=>"IncIncomeSpouseOrChild_Type" ));  ?>
							<!-- <textarea  class="form-control" rows="3" placeholder="<?=Yii::t("income","Name")?>"></textarea> -->
						</div>
					</td>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeSpouseOrChild_id">
							<textarea name="IncIncomeSpouseOrChild[Name]" id="IncIncomeSpouseOrChild_Name" class="form-control" rows="1" placeholder="<?=Yii::t("income","Name")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncIncomeSpouseOrChild[Cost]" type="text" class="form-control" id="IncIncomeSpouseOrChild_Cost" placeholder="<?=Yii::t("income","Tax payable income")?>">
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="IncomeSpouseOrChild_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_IncomeSpouseOrChild_fraction('IncomeSpouseOrChild_id', 'IncomeSpouseOrChild_Name', 'IncomeSpouseOrChild_cost', 'IncIncomeSpouseOrChild', 'IncomeSpouseOrChild')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->
</div>


<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_17"   onclick="next_pre('s_17')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_19"   onclick="next_pre('s_19')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>


<!-- #############################----------------------s_18--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_19" style="text-align: center !important;">

	<!-- #############################----------------------s_19--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Capital gain income ********************
##############################################################################
-->

<h2><?=Yii::t("income","Capital Gains")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.8")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeCapitalGains_verification" style="display: <?=($model->IncomeCapitalGainsConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any income from capital gain")?>? 
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeCapitalGainsConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeCapitalGains_verification', 'IncomeCapitalGains_fraction_or_total', 'IncomeCapitalGains_fraction')" type="button" class="btn btn-big btn-<?=($model->IncomeCapitalGainsConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeCapitalGains')" type="button" class="btn btn-big btn-<?=($model->IncomeCapitalGainsConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeCapitalGains_fraction_or_total" style="display: <?=($model->IncomeCapitalGainsConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<!--
	<div class="text-center" id="IncomeCapitalGains_total" style="display: <?=($model->IncomeCapitalGainsFOrT != 'Fraction') ? 'block':'none' ?>;">
	-->
	<div class="text-center" id="IncomeCapitalGains_total" style="display: none;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeCapitalGains == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeCapitalGains. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeCapitalGains_total', 'IncomeCapitalGains_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Income from Capital gain")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeCapitalGains',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Income from Capital gain")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeCapitalGains')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeCapitalGains', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeCapitalGains_fraction" style="display: <?=($model->IncomeCapitalGainsFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-10 col-sm-offset-1 table-responsive">
		<!-- <form id="IncIncomeCapitalGains_form"> -->

		<table class="table" id="IncomeCapitalGains_table">
			<thead>
				<tr>
					<th class="col-lg-3"><?=Yii::t("income","Type")?></th>
					<th><?=Yii::t("income","Details")?></th>
					<th><?=Yii::t("income","Amount (BDT)")?></th>
					<th><?=Yii::t("income","Shareholder of more than 10%?")?></th>
					<th><?=Yii::t("income","Taxable Income (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncIncomeCapitalGainsList as $value) {
					echo "<tr id='IncomeCapitalGains_row_".$value->IncomeCapitalGainsId."'>";
					echo CHtml::hiddenField('Text', @$value->IncomeCapitalGainsId , array('id'=>'IncomeCapitalGains_IncomeCapitalGainsId') );
					echo "<td>";
					echo $value->Type; 
					echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
					echo "<td>".$value->SaleOfShare."</td>";
					echo "<td>". (($value->Type == "Sale of Share") ? $value->MoreThanTenPercentHolder : "N/A") . "</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeCapitalGains(".$value->IncomeCapitalGainsId.", \"IncIncomeCapitalGains\", \"IncomeCapitalGains\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->IncomeCapitalGainsId.", \"IncIncomeCapitalGains\", \"IncomeCapitalGains\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncIncomeCapitalGains_form-1"> -->
		<table id="IncomeCapitalGains_table-2">
			<tfoot>
				<tr>
					<td>
						<div class="form-group">								 
							<?php 
								echo CHtml::dropDownList('IncIncomeCapitalGains[Type]', '', ['Sale of Share' => 'Sale of Share', 'Others' => 'Others'], array('class' => 'form-control', 'id'=>"IncIncomeCapitalGains_Type", "onChange"=> "CalculationOfCapitalGain()" ));
							?>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeCapitalGains_id">
							<textarea name="IncIncomeCapitalGains[Description]" id="IncIncomeCapitalGains_Description" class="form-control" rows="1" placeholder="<?=Yii::t("income","Details")?>"></textarea>
						</div>
					</td>
					<td>
						<div class="form-group">
							<input name="IncIncomeCapitalGains[SaleOfShare]" type="text" class="form-control" id="IncIncomeCapitalGains_SaleOfShare" placeholder="<?=Yii::t("income","Amount")?>" onkeyup="CalculationOfCapitalGain()">
						</div>
					</td>

					<td>
						<div class="form-group" id="sharePercentDiv">
						<?=Yii::t("income","Are you shareholder of more than 10% shares of the listed company?")?> 
						<br />
						<input type="radio" name="IncIncomeCapitalGains[MoreThanTenPercentHolder]" value="YES" onChange="CalculationOfCapitalGain()"> <?php echo Yii::t('income', "YES"); ?>
  						<input type="radio" name="IncIncomeCapitalGains[MoreThanTenPercentHolder]" value="NO" checked onChange="CalculationOfCapitalGain()"> <?php echo Yii::t('income', "NO"); ?>
						
						
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncIncomeCapitalGains[Cost]" type="text" class="form-control" id="IncIncomeCapitalGains_Cost" placeholder="<?=Yii::t("income","Taxable Income")?>" readonly>
						</div>
					</td>

					<td>
						<div class="form-group">
							<!-- <input type="text" class="form-control" id="IncomeCapitalGains_cost" placeholder="<?=Yii::t("income","Net Amount")?>"> -->
						</div>
					</td>

				</tr>
			</tfoot>
			
		</table>

		<!-- SAVE BUTTON FOR FRACTION ENTRY -->

		<button class="btn btn-success btn-lg" onclick="save_IncomeCapitalGains_fraction('IncomeCapitalGains_id', 'IncomeCapitalGains_description', 'IncomeCapitalGains_cost', 'IncIncomeCapitalGains', 'IncomeCapitalGains')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>

<div class="login-button input-group">

	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_18"  onclick="next_pre('s_18')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_21"  onclick="next_pre('s_21')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>




<!-- #############################----------------------s_19--------END-------------------------################################# -->
</div>

<div role="tabpanel" class="tab-pane" id="s_21" style="text-align: center !important;">

	<!-- #############################----------------------s_21--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Capital gain income ********************
##############################################################################
-->

<h2><?=Yii::t("income","Other Sources")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.9")?>"></i></h2>                                   
<div class="clearfix"></div>

<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeOtherSource_verification" style="display: <?=($model->IncomeOtherSourceConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you have any Income from Other sources")?> ?
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
		<p>
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
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_19"  onclick="next_pre('s_19')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>

	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_23"  onclick="next_pre('s_23')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
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
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_25"  onclick="next_pre('s_25')" > <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_27"  onclick="next_pre('s_27')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>

</div>


<!-- #############################----------------------s_26--------END-------------------------################################# -->
</div>


<div role="tabpanel" class="tab-pane" id="s_27" style="text-align: center !important;">

	<!-- #############################----------------------s_27--------START-------------------------################################# -->

<!-- 
##############################################################################
***************** Tax in Advance ********************
##############################################################################
-->

<h2><?=Yii::t("income","Advance Paid Tax")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.13")?>"></i></h2>                                   
<div class="clearfix"></div>


<!-- IF ANSWER IS "YES" HIDE THE QUESTION DIV -->
<div class="text-center" id="IncomeTaxInAdvance_verification" style="display: <?=($model->IncomeTaxInAdvanceConfirm == 'Yes') ? 'none':'block' ?>;">
	<p>
		<?=Yii::t("income","Did you pay any tax in advance?")?> 
	</p>
	<?php
        // IF THE ANSWER IS "NO"
	if($model->IncomeTaxInAdvanceConfirm == 'No')
		echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
	?>
	<!-- YES/NO BUTTON -->
	<h3>
		<div class="btn-group btn-group-lg">
			<button onclick="show_divs('IncomeTaxInAdvance_verification', 'IncomeTaxInAdvance_fraction_or_total', 'IncomeTaxInAdvance_total')" type="button" class="btn btn-big btn-<?=($model->IncomeTaxInAdvanceConfirm == 'Yes')? 'success' : 'default' ?>"><?=Yii::t("income","YES")?></button>
			<button onclick="set_no('IncomeTaxInAdvance')" type="button" class="btn btn-big btn-<?=($model->IncomeTaxInAdvanceConfirm == 'No')? 'success' : 'default' ?>"><?=Yii::t("income","NO")?></button>
		</div>
	</h3>
	<!-- END YES/NO BUTTON -->
</div>
<!-- END OF IF ANSWER IS "YES" HIDE THE QUESTION DIV -->

<!-- IF THE ANSWER IS "YES", SHOW THIS DIV -->
<div id="IncomeTaxInAdvance_fraction_or_total" style="display: <?=($model->IncomeTaxInAdvanceConfirm == 'Yes') ? 'block':'none' ?>;">

	<!-- IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->
	<div class="text-center" id="IncomeTaxInAdvance_total" style="display: <?=($model->IncomeTaxInAdvanceFOrT != 'Fraction') ? 'block':'none' ?>;">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->IncomeTaxInAdvance == "") ? "" : Yii::t("income","Current value is") . " " .$model->IncomeTaxInAdvance. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		<!-- end - show saved data -->
		<?=Yii::t("income","You can enter total annual data below or you can breakdown your data")?>

		<button onclick="show_divs('IncomeTaxInAdvance_total', 'IncomeTaxInAdvance_fraction', 'no')" type="button" class="btn btn-xs btn-success"><?=Yii::t("income","Breakdown")?></button>

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Income Tax Paid In Advance")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'IncomeTaxInAdvance',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Income Tax Paid In Advance")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('IncomeTaxInAdvance')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button class="btn btn-success btn-lg" onclick="save_income('IncomeTaxInAdvance', 's_27')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->

	</div>
	<!-- END - IF "TOTAL" OR NOTHING IS CHOSEN SHOW THIS DIV" -->

	<!-- IF "FRACTION" IS CHOSEN SHOW THIS DIV" -->
	<div id="IncomeTaxInAdvance_fraction" style="display: <?=($model->IncomeTaxInAdvanceFOrT == 'Fraction') ? 'block':'none' ?>;" class="col-sm-8 col-sm-offset-2 table-responsive">
		<!-- <form id="IncForeignIncome_form"> -->

		<table class="table" id="IncomeTaxInAdvance_table">
			<thead>
				<tr>
					<!-- 					<th class="col-lg-3"><?=Yii::t("income","Source Type")?></th> -->
					<th><?=Yii::t("income","Details")?></th>
					<th><?=Yii::t("income","Tax Amount (BDT)")?></th>

					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($IncomeTaxInAdvanceList as $value) {
					echo "<tr id='IncomeTaxInAdvance_row_".$value->TaxAdvanceId."'>";
					echo CHtml::hiddenField('Text', @$value->TaxAdvanceId , array('id'=>'IncomeTaxInAdvance_TaxAdvanceId') );
					// echo "<td>";
					// echo $value->Type;
					// echo "</td>";
					echo "<td>".htmlentities(strip_tags($value->Description))."</td>";
					echo "<td>".$value->Cost."</td>";
					echo "<td><button type='button' class='btn btn-success glyphicon glyphicon-pencil' onclick='edit_IncomeTaxInAdvance(".$value->TaxAdvanceId.", \"IncIncomeTaxInAdvance\", \"IncomeTaxInAdvance\")'></button>";
					echo "&nbsp;&nbsp;<button type='button' class='btn btn-danger glyphicon glyphicon-remove' onclick='delete_incomeFraction(".$value->TaxAdvanceId.", \"IncIncomeTaxInAdvance\", \"IncomeTaxInAdvance\")'></button></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>

		<!-- <form id="IncForeignIncome_form-1"> -->
		<table id="IncomeTaxInAdvance_table-2">
			<tfoot>
				<tr>
					<td>
						<div class="form-group">								 
							<?php echo CHtml::dropDownList('IncIncomeTaxInAdvance[Type]', '', ['car_advance_tax' => 'Car Advance Tax', 'other' => 'Other'], array('empty' => 'Select type', 'class' => 'form-control', 'id'=>"IncIncomeTaxInAdvance_Type",'onChange'=>'typeChange(this)' ));  ?>
						</div>
					</td>

					<td id="other" style="display: none;">
						<div class="form-group">
							<input type="hidden" class="form-control" id="IncomeTaxInAdvance_id">
							<textarea name="IncIncomeTaxInAdvance[Description]" id="IncIncomeTaxInAdvance_Description" class="form-control" rows="1" placeholder="<?=Yii::t("income","Description")?>"></textarea>
						</div>
					</td>

					<td>
						<div class="form-group">
							<input name="IncIncomeTaxInAdvance[Cost]" type="text" class="form-control" id="IncIncomeTaxInAdvance_Cost" placeholder="<?=Yii::t("income","Income Tax")?>">
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

		<button class="btn btn-success btn-lg" onclick="save_IncomeTaxInAdvance_fraction('IncomeTaxInAdvance_id', 'IncomeTaxInAdvance_description', 'IncomeTaxInAdvance_cost', 'IncIncomeTaxInAdvance', 'IncomeTaxInAdvance')" type="button" ><?= Yii::t("income","Store") ?></button>
		<!-- </form>   -->

		<!-- END - SAVE BUTTON FOR FRACTION ENTRY -->
	</div>
	<!-- END - "FRACTION" IS CHOSEN SHOW THIS DIV" -->

</div>


<div class="login-button input-group">
	<div class="back pull-left">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_26"  onclick="next_pre('s_26')"> <i class="fa fa-chevron-left"></i> <i class="fa"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i></a>
	</div>
	<div class="back pull-right">
		<a class="btn btn-success for-clr" data-toggle="tab" href="#s_28"  onclick="next_pre('s_28')" ><i class="fa"><span class="previous-text"> <?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
	</div>
	<div class="clearfix"></div>
</div>


<!-- #############################----------------------s_27--------END-------------------------################################# -->
</div>



<div role="tabpanel" class="tab-pane" id="s_28" style="text-align: center !important;">
	<!-- #############################----------------------s_28--------START-----------------------################################# -->

	<div class="income-top"></div>
	<h2><?=Yii::t("income","Adjustment of Tax Refund")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"1.14")?>"></i></h2>					
	<p>	<?=Yii::t("income","Did you have any adjustments to your tax refund")?>? </p>

	<div class="text-center content AdjustmentTaxRefundDefault <?php echo ($model->AdjustmentTaxRefund==NULL)? 'show' : 'hide'; ?>">
		<?php
    		// IF THE ANSWER IS "NO"
			if($model->AdjustmentTaxRefundConfirm == 'No')
				echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
		?>
		<h3>
			<!-- YES/NO BUTTON -->
			<div class="btn-group btn-group-lg">
				<button type="button" class="btn btn-<?=($model->AdjustmentTaxRefundConfirm == 'Yes')? 'success' : 'default' ?>" onclick="hideShowClass('AdjustmentTaxRefund')" ><?=Yii::t("income","YES")?></button>
				<button onclick="set_no('AdjustmentTaxRefund')" href="#s_28"  id="name_btn" type="button" class="btn btn-big btn-<?=($model->AdjustmentTaxRefundConfirm == 'No')? 'success' : 'default' ?>" id="incomeNo"><?=Yii::t("income","NO")?></button>
				
			</div>
		</h3>
	</div>	

	<div class="content AdjustmentTaxRefundValue <?php echo ($model->AdjustmentTaxRefund==NULL)? 'hide' : 'show'; ?>">

		<!-- show saved data -->    
		<p class="exp_alert">
			<?=($model->AdjustmentTaxRefund == "") ? "" : Yii::t("income","Current value is") . " " .$model->AdjustmentTaxRefund. ". " . Yii::t("income","You can change the value below and press store")?>   
		</p>
		

		<!-- ENTRY FORM -->
		<p><?=Yii::t("income","Adjustment of tax refund")?></p>
		<div class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4">
				<?php echo $form->textField($model,'AdjustmentTaxRefund',array('class'=>'form-control', 'placeholder'=>Yii::t("income","Adjustment of tax refund")) ); ?>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_field_data('AdjustmentTaxRefund')" type="button" ></button>
			</div>
		</div>
		<br>
		<br>
		<p>
			<button  id="AdjustmentTaxRefund_btn"  class="btn btn-success btn-lg" onclick="save_income('AdjustmentTaxRefund', 's_9')" type="button" ><?= Yii::t("income","Store") ?></button>
		</p>
		<!-- END - ENTRY FORM -->


	</div>


	<div class="login-button input-group">
		<div class="back pull-left">
			<a class="btn btn-success for-clr" data-toggle="tab" href="#s_27"  onclick="next_pre('s_27')" ><i class="fa"></i> <i class="fa fa-chevron-left"> <span class="previous-text"><?=Yii::t("income","Previous")?></span></i> </a>
		</div>
		<div class="back pull-right">
			<a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/income/review" ><i class="fa"><span class="previous-text"><?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>	

	<!-- #############################----------------------s_28--------END-------------------------################################# -->
</div>


<div role="tabpanel" class="tab-pane " id="s_29" style="text-align: center !important;">

	<!-- #############################----------------------s_29--------START-------------------------################################# -->

	<div class="income-top"></div>
	<!-- <p>You can confirm or update what you tell us later on.</p> -->

	<div class="Income82cValue <?php echo ($Income82cData==NULL)? 'hide' : 'show'; ?>">
		<h2><?=Yii::t('income','Your total \'82C\' is following') ?></h2>
		<div class="row col-md-8 col-md-offset-2 custyle">
			<table class="table table-striped custab">
				<thead>
					<!-- <button type="button" class="btn btn-success btn-xs pull-right"  onclick="insertData('Income82c')" ><b>+</b> Add More</a> </br> -->
					<tr>
						<!-- <th>ID</th> -->
						<th><?=Yii::t('income',"Total 82C Amount")?></th>													
						<th><?=Yii::t('income',"Total 82C TDS")?></th>													
						<th><?=Yii::t('income',"Year")?></th>
						<th class="text-center"><?=Yii::t('income',"Action")?></th>
					</tr>
				</thead>	



				<?php foreach ($Income82cData as $key => $data) { ?>

				<tr>
					<!-- <td><?php echo $key+1; ?></td> -->
					<td><?php echo ($data->ContractorIncome_1 + $data->ClearingAndForwardingIncome_1 + $data->TravelAgentIncome_1 + $data->ImporterTaxCollection_1 + $data->KnitWovenExportIncome_1 + $data->OtherThanKnitWovenExportIncome_1 + $data->RoyaltyIncome_1 + $data->SavingInstrumentInterestIncome_1 + $data->ExportCashSubsidyIncome_1 + $data->SavingAndFixedDepositInterestIncome_1 + $data->LotteryIncome_1 + $data->PropertySaleIncome_1).$this->currency; ?></td>
					<td><?php echo ($data->ContractorIncome + $data->ClearingAndForwardingIncome + $data->TravelAgentIncome + $data->ImporterTaxCollection + $data->KnitWovenExportIncome + $data->OtherThanKnitWovenExportIncome + $data->RoyaltyIncome + $data->SavingInstrumentInterestIncome + $data->ExportCashSubsidyIncome + $data->SavingAndFixedDepositInterestIncome + $data->LotteryIncome + $data->PropertySaleIncome).$this->currency; ?></td>
					<td><?php echo $data->EntryYear; ?></td>
					<td class="text-center">
						<?php echo CHtml::link('<span class="fa fa-pencil-square-o"></span> '.Yii::t('income',"Edit"), Yii::app()->baseUrl."/index.php/Income82c/update/id/".$data->Income82cId , array('class'=>'btn btn-success btn-xs')); ?>
						<?php echo CHtml::link('<span class="fa fa-times"></span> '.Yii::t('income',"Delete"), Yii::app()->baseUrl."/index.php/Income82c/delete/id/".$data->Income82cId , array('class'=>'btn btn-danger btn-xs')); ?>

					</td>
				</tr>
				<?php } ?>					
			</table>
		</div>
	</div>
			

	<div class="Income82cDefault <?php echo ($Income82cData==NULL)? 'show' : 'hide'; ?>">
		<h2><?=Yii::t('income',"82c Form")?>&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips',"")?>"></i></h2>
		<p><?=Yii::t('income',"Did you have income form 82c Source?")?></p>
		<div class="row">
			
				<!-- <p> -->
					<?php
        // IF THE ANSWER IS "NO"
					if($model->Income82cConfirm == 'No')
						echo "<br>" . Yii::t("income","You chose No. If you want to change your answer, please select from below.");
					?>
				<!-- </p> -->
				<!-- YES/NO BUTTON -->
				<h3>
				<div class="btn-group btn-group-lg">
					<button type="button" class="btn btn-<?=($model->Income82cConfirm == 'Yes')? 'success' : 'default' ?>"  onclick="insertData('Income82c'),hide_show('Income82c')"  ><?=Yii::t("income","YES")?></button>
					<button onclick="set_no('Income82c')"  href="#s_29"  id="name_btn" type="button" class="btn btn-big btn-<?=($model->Income82cConfirm == 'No')? 'success' : 'default' ?>" id="incomeNo"><?=Yii::t("income","NO")?></button>
				</div>
			</h3>
		</div>
	</div>

	<div class="login-button input-group">
		<div class="back pull-left">
			<a class="btn btn-success for-clr" data-toggle="tab" href="#s_28"  onclick="next_pre('s_28')" ><i class="fa"> <span class="previous-text"> </span></i> <i class="fa fa-chevron-left"><span class="previous-text"> <?=Yii::t("income","Previous")?></span></i> </a>
		</div>
        <div class="back pull-right">
            <a class="btn btn-success for-clr" href="<?=Yii::app()->baseUrl ?>/index.php/income/review"><i class="fa"><span class="previous-text"><?=Yii::t("income","Next")?></span></i> <i class="fa fa-chevron-right"></i></a>
        </div>
		<div class="clearfix"></div>
	</div>	

	<!-- #############################----------------------s_29--------END-------------------------################################# -->
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

</style>

<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-------------------------------||||||||||||||||||||||||||||||||||||||||||||||| -->
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||START of JAVA & STYLE SCRIPT PART||||||||||||||||||||||||||||||||||||||||||||||| -->
<!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-------------------------------||||||||||||||||||||||||||||||||||||||||||||||| -->



<script type="text/javascript">
	var baseUrl = '<?php echo Yii::app()->baseUrl; ?>';
    var delete_msg="<?php echo Yii::t('income', "Are you sure?"); ?>";
// $('.InterestOnSecuritiesValue').hide(); 

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









