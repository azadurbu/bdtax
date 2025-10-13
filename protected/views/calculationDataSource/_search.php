<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'CalculationId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ConveynceWaiverLevel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'HouseRentWaiverPercent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CommercialRentPercent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'HouseRentCompareValue',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MedicalWaiverPercent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MedicalCompareValue',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ProvidentFoundInterest',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ProvidentFoundportion',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ResidentialRentPercent',array('class'=>'span5')); ?>

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
