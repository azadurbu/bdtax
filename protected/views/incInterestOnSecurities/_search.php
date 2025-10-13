<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'InterestOnSecuritiesId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IncomeId',array('class'=>'span5')); ?>

		<?php echo $form->dropDownListRow($model,'Type',array("Bond"=>"Bond","Debenture"=>"Debenture","Securities"=>"Securities",),array('class'=>'input-large')); ?>

		<?php echo $form->textAreaRow($model,'Description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'NetAmount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CommissionOrInterest',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CerateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CPIId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryYear',array('class'=>'span5','maxlength'=>9)); ?>

		<?php echo $form->textFieldRow($model,'trash',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
