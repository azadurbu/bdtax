<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'IncomeTaxRebateId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LifeInsurancePremium',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DeferredAnnuity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ProvidentFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SCECProvidentFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SuperAnnuationFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InvestInStockOrShare',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DepositPensionScheme',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BenevolentFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ZakatFund',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Others',array('class'=>'span5')); ?>

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
