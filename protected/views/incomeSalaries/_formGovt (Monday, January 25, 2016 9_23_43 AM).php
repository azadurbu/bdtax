<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'income-salaries-form',
	'enableAjaxValidation' => false,
));?>

	<!-- Data block -->
	<article class="data-block ">
		<div class="data-container">
			<section class="login-rt">

				<fieldset class="form-horizontal " >


					<div class="row">
						<div class="col-lg-12 ">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3>Salary Income Information</h3>
								</div>




								<div class="table-responsive">
									<table  class="table table-bordred table-striped">

										<thead>
											<th>Pay & Allowance</th>
											<th>Amount of Income</th>
											<th>Amount of exempted income</th>
											<th>Net taxable income</th>
										</thead>
										<tbody id="mytable">

											<tr><td><?php echo CHtml::activeLabelEx($model, 'BasicPay', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
												&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.1")?>"></i>
											</td>
											<td><input value="<?php echo @$model->BasicPay ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_BasicPay_1" name="IncomeSalaries_BasicPay_1"></td>
											<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_BasicPay_2" name="IncomeSalaries_BasicPay_2"></td>
											<td><?php echo $form->textField($model, 'BasicPay', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
												<?php echo $form->error($model, 'BasicPay'); ?>
											</td>
										</tr>

										<tr><td><?php echo CHtml::activeLabelEx($model, 'SpecialPay', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
											&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.2")?>"></i>
										</td>
										<td><input value="<?php echo @$model->SpecialPay ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_SpecialPay_1" name="IncomeSalaries_SpecialPay_1"></td>
										<td><input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_SpecialPay_2" name="IncomeSalaries_SpecialPay_2"></td>
										<td><?php echo $form->textField($model, 'SpecialPay', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
											<?php echo $form->error($model, 'SpecialPay'); ?>
										</td>
									</tr>

									<tr><td><?php echo CHtml::activeLabelEx($model, 'DearnessAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
										&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.3")?>"></i>
									</td>
									<td><input value="<?php echo @$model->DearnessAllowance ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_DearnessAllowance_1" name="IncomeSalaries_DearnessAllowance_1"></td>
									<td><input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_DearnessAllowance_2" name="IncomeSalaries_DearnessAllowance_2"></td>
									<td><?php echo $form->textField($model, 'DearnessAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
										<?php echo $form->error($model, 'DearnessAllowance'); ?>
									</td>
								</tr>

								<tr><td><?php echo CHtml::activeLabelEx($model, 'ConveyanceAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
									&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.4")?>"></i>
								</td>
								<td><input value="<?php echo @$model->ConveyanceAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_ConveyanceAllowance_1" name="IncomeSalaries[ConveyanceAllowance_1]"></td>
								<td><input value="<?php echo @$model->ConveyanceAllowance_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_ConveyanceAllowance_2" name="IncomeSalaries[ConveyanceAllowance_2]"></td>
								<td><?php echo $form->textField($model, 'ConveyanceAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
									<?php echo $form->error($model, 'ConveyanceAllowance'); ?>
								</td>
							</tr>

							<tr><td><?php echo CHtml::activeLabelEx($model, 'HouseRentAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
								&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.5")?>"></i>
							</td>
							<td><input value="<?php echo @$model->HouseRentAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_HouseRentAllowance_1" name="IncomeSalaries[HouseRentAllowance_1]"></td>
							<td><input value="<?php echo @$model->HouseRentAllowance_2 ?>" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_HouseRentAllowance_2" name="IncomeSalaries[HouseRentAllowance_2]"></td>
							<td><?php echo $form->textField($model, 'HouseRentAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
								<?php echo $form->error($model, 'HouseRentAllowance'); ?>
							</td>
						</tr>

						<tr><td><?php echo CHtml::activeLabelEx($model, 'MedicalAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
							&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.6")?>"></i>
						</td>
						<td><input value="<?php echo @$model->MedicalAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_MedicalAllowance_1" name="IncomeSalaries[MedicalAllowance_1]"></td>
						<td><input value="<?php echo @$model->MedicalAllowance_2 ?>" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_MedicalAllowance_2" name="IncomeSalaries[MedicalAllowance_2]"></td>
						<td><?php echo $form->textField($model, 'MedicalAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
							<?php echo $form->error($model, 'MedicalAllowance'); ?>
						</td>
					</tr>

					<tr><td><?php echo CHtml::activeLabelEx($model, 'ServantAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
						&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.7")?>"></i>
					</td>
					<td><input value="<?php echo @$model->ServantAllowance ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_ServantAllowance_1" name="IncomeSalaries_ServantAllowance_1"></td>
					<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_ServantAllowance_2" name="IncomeSalaries_ServantAllowance_2"></td>
					<td><?php echo $form->textField($model, 'ServantAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
						<?php echo $form->error($model, 'ServantAllowance'); ?>
					</td>
				</tr>

				<tr><td><?php echo CHtml::activeLabelEx($model, 'LeaveAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
					&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.8")?>"></i>
				</td>
				<td><input value="<?php echo @$model->LeaveAllowance ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_LeaveAllowance_1" name="IncomeSalaries_LeaveAllowance_1"></td>
				<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_LeaveAllowance_2" name="IncomeSalaries_LeaveAllowance_2"></td>
				<td><?php echo $form->textField($model, 'LeaveAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
					<?php echo $form->error($model, 'LeaveAllowance'); ?>
				</td>
			</tr>

			<tr><td><?php echo CHtml::activeLabelEx($model, 'HonorariumOrReward', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
				&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.9")?>"></i>
			</td>
			<td><input value="<?php echo @$model->HonorariumOrReward ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_HonorariumOrReward_1" name="IncomeSalaries_HonorariumOrReward_1"></td>
			<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_HonorariumOrReward_2" name="IncomeSalaries_HonorariumOrReward_2"></td>
			<td><?php echo $form->textField($model, 'HonorariumOrReward', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
				<?php echo $form->error($model, 'HonorariumOrReward'); ?>
			</td>
		</tr>

		<tr><td><?php echo CHtml::activeLabelEx($model, 'OvertimeAllowance', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
			&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.10")?>"></i>
		</td>
		<td><input value="<?php echo @$model->OvertimeAllowance ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_OvertimeAllowance_1" name="IncomeSalaries_OvertimeAllowance_1"></td>
		<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_OvertimeAllowance_2" name="IncomeSalaries_OvertimeAllowance_2"></td>
		<td><?php echo $form->textField($model, 'OvertimeAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
			<?php echo $form->error($model, 'OvertimeAllowance'); ?>
		</td>
	</tr>

	<tr><td><?php echo CHtml::activeLabelEx($model, 'Bonus', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
		&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.11")?>"></i>
	</td>
	<td><input value="<?php echo @$model->Bonus ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_Bonus_1" name="IncomeSalaries_Bonus_1"></td>
	<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_Bonus_2" name="IncomeSalaries_Bonus_2"></td>
	<td><?php echo $form->textField($model, 'Bonus', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
		<?php echo $form->error($model, 'Bonus'); ?>
	</td>
</tr>

<tr><td><?php echo CHtml::activeLabelEx($model, 'OtherAllowances', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.12")?>"></i>
</td>
<td><input value="<?php echo @$model->OtherAllowances ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_OtherAllowances_1" name="IncomeSalaries_OtherAllowances_1"></td>
<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_OtherAllowances_2" name="IncomeSalaries_OtherAllowances_2"></td>
<td><?php echo $form->textField($model, 'OtherAllowances', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
	<?php echo $form->error($model, 'OtherAllowances'); ?>
</td>
</tr>

<tr><td><?php echo CHtml::activeLabelEx($model, 'EmployersContributionProvidentFund', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.13")?>"></i>
</td>
<td><input value="<?php echo @$model->EmployersContributionProvidentFund ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_EmployersContributionProvidentFund_1" name="IncomeSalaries_EmployersContributionProvidentFund_1"></td>
<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_EmployersContributionProvidentFund_2" name="IncomeSalaries_EmployersContributionProvidentFund_2"></td>
<td><?php echo $form->textField($model, 'EmployersContributionProvidentFund', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
	<?php echo $form->error($model, 'EmployersContributionProvidentFund'); ?>
</td>
</tr>

<tr><td>
	<?php echo CHtml::activeLabelEx($model, 'InterestAccruedProvidentFund', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.14")?>"></i>

	<br/><br/>
	<div class="hide">

		<p class="overlay"></span> <span class="text">Interest Rate By Govt

			<?php echo $form->radioButton($model, 'InterestRateByGovtId', array('value' => 'Y', 'uncheckValue' => null)); ?>
			<span class="text">YES</span>

			<?php echo $form->radioButton($model, 'InterestRateByGovtId', array('value' => 'N', 'uncheckValue' => null, 'checked' => "checked")); ?>
			<span class="text">NO</span></p>


		</div>
	</td>
	<td><input value="<?php echo @$model->InterestAccruedProvidentFund_1 ?>" type="text" autocomplete="off" onkeyup="onProvidentFundTaxCal(this)" class="form-control" id="IncomeSalaries_InterestAccruedProvidentFund_1" name="IncomeSalaries[InterestAccruedProvidentFund_1]"></td>
	<td><input value="<?php echo @$model->InterestAccruedProvidentFund_2 ?>" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_InterestAccruedProvidentFund_2" name="IncomeSalaries[InterestAccruedProvidentFund_2]"></td>
	<td><?php echo $form->textField($model, 'InterestAccruedProvidentFund', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
		<?php echo $form->error($model, 'InterestAccruedProvidentFund'); ?>
	</td>
</tr>

<tr><td><?php echo CHtml::activeLabelEx($model, 'DeemedIncomeTransport', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.15")?>"></i>
</td>
<td><input value="<?php echo @$model->DeemedIncomeTransport ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_DeemedIncomeTransport_1" name="IncomeSalaries_DeemedIncomeTransport_1"></td>
<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_DeemedIncomeTransport_2" name="IncomeSalaries_DeemedIncomeTransport_2"></td>
<td><?php echo $form->textField($model, 'DeemedIncomeTransport', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
	<?php echo $form->error($model, 'DeemedIncomeTransport'); ?>
</td>
</tr>

<tr><td><?php echo CHtml::activeLabelEx($model, 'DeemedFreeAccommodation', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.16")?>"></i>
</td>
<td><input value="<?php echo @$model->DeemedFreeAccommodation ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_DeemedFreeAccommodation_1" name="IncomeSalaries_DeemedFreeAccommodation_1"></td>
<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_DeemedFreeAccommodation_2" name="IncomeSalaries_DeemedFreeAccommodation_2"></td>
<td><?php echo $form->textField($model, 'DeemedFreeAccommodation', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
	<?php echo $form->error($model, 'DeemedFreeAccommodation'); ?>
</td>
</tr>

<tr><td><?php echo CHtml::activeLabelEx($model, 'Others', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
	&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.17")?>"></i>
</td>
<td><input value="<?php echo @$model->Others ?>" type="text" autocomplete="off" onkeyup="onGovtRuleTaxCal(this)" class="form-control" id="IncomeSalaries_Others_1" name="IncomeSalaries_Others_1"></td>
<td><input value="0" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_Others_2" name="IncomeSalaries_Others_2"></td>
<td><?php echo $form->textField($model, 'Others', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
	<?php echo $form->error($model, 'Others'); ?>
</td>
</tr>

</tbody>
<tbody>
	<tr><td><?php echo CHtml::activeLabelEx($model, 'NetTaxableIncome', array('class' => 'pull-left control-label', 'for' => 'inputMask', 'style' => 'text-align:left;')); ?>
		&nbsp;&nbsp;<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.18")?>"></i>
	</td>
	<td><input value="<?php echo @$model->NetSalaryIncome ?>" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_NetTaxableIncome_1"  name="IncomeSalaries[NetSalaryIncome]"></td>
	<td><input value="<?php echo @$model->NetTaxWaiver ?>" type="text"  readonly='readonly' class="form-control" id="IncomeSalaries_NetTaxableIncome_2"  name="IncomeSalaries[NetTaxWaiver]"></td>
	<td><?php echo $form->textField($model, 'NetTaxableIncome', array('readonly' => 'readonly', 'class' => 'form-control')); ?><br/>
		<?php echo $form->error($model, 'NetTaxableIncome'); ?>
	</td>
</tr>
</tbody>

</table>




<?php echo $form->hiddenField($model, 'EntryYear', array('value' => $this->taxYear())); ?>
<?php echo $form->hiddenField($model, 'CPIId', array('value' => Yii::app()->user->CPIId)); ?>

<?php echo $form->hiddenField($CalculationModel, 'ConveynceWaiverLevel'); ?>
<?php echo $form->hiddenField($CalculationModel, 'HouseRentWaiverPercent'); ?>
<?php echo $form->hiddenField($CalculationModel, 'CommercialRentPercent'); ?>
<?php echo $form->hiddenField($CalculationModel, 'HouseRentCompareValue'); ?>
<?php echo $form->hiddenField($CalculationModel, 'MedicalWaiverPercent'); ?>
<?php echo $form->hiddenField($CalculationModel, 'MedicalCompareValue'); ?>
<?php echo $form->hiddenField($CalculationModel, 'ProvidentFoundInterest'); ?>
<?php echo $form->hiddenField($CalculationModel, 'ProvidentFoundportion'); ?>
<?php echo $form->hiddenField($CalculationModel, 'ResidentialRentPercent'); ?>


</div>


<div class="panel-footer">
		<div class="pull-left" style="padding:0 10px;">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType' => 'submit',
	'type' => 'success',
	'label' => $model->isNewRecord ? 'Create' : 'Save',
));?>
	</div>


		<div class="pull-left" style="padding:0 10px;">
			<a class="btn btn-success" href="<?=Yii::app()->baseUrl?>/index.php/income/entry#s_7" >Cancel </a>
		</div>
		<div class="clearfix"></div>
	</div>


</div> <!-- panel panel-success END-->
</div> <!-- col-lg-10 END -->
</div> <!-- Row END -->
<div class="clearfix"></div>
</div>



<?php $this->endWidget();?>

</fieldset>
</section>
</div>

</article>
<!-- /Data block -->
<!-- /Grid controls -->

<script type="text/javascript">


</script>



<!-- set up the modal to start hidden and fade in and out -->



