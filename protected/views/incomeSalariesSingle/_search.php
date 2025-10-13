<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'IncomeSalariesId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BasicPay',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SpecialPay',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DearnessAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ConveyanceAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'HouseRentAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MedicalAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ServantAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LeaveAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'HonorariumOrReward',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'OvertimeAllowance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Bonus',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'OtherAllowances',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EmployersContributionProvidentFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InterestAccruedProvidentFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DeemedIncomeTransport',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DeemedFreeAccommodation',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Others',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NetTaxableIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DOB',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CreateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastvisitAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryYear',array('class'=>'span5','maxlength'=>4)); ?>

		<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
