<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'IncomePropertiesId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'AnnualRentalIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ClaimedExpensesTotal',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Repair',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MunicipalOrLocalTax',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LandRevenue',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LoanInterestOrMorgageOrCapitalCrg',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InsurancePremium',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VacancyAllowence',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Others',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NetIncome',array('class'=>'span5')); ?>

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
