<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'Income82cId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ContractorIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ClearingAndForwardingIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TravelAgentIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ImporterTaxCollection',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'KnitWovenExportIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'OtherThanKnitWovenExportIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'RoyaltyIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SavingInstrumentInterestIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ExportCashSubsidyIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SavingAndFixedDepositInterestIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LotteryIncome',array('class'=>'span5')); ?>
		
		<?php echo $form->textFieldRow($model,'PropertySaleIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CerateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

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
