<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'IncomeId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeSalariesId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InterestOnSecurities',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomePropertiesId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeAgriculture',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeBusinessOrProfession',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeShareProfitId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeSpouseOrChild',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CapitalGains',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeOtherSourceId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TotalOf2TO10',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ForeignIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TotalIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TaxLeviableOnTotalIncome',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeTaxRebateId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TaxPayable',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeTaxPaymentId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DifferenceBetweenPayableNPayment',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TaxExempted',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastYearPaidTax',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'OtherReceipts',array('class'=>'span5')); ?>

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
