<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'TaxZoneCircleId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SubCatIncomeId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EmployerName',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'CircleCode',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'CircleName',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'ZoneName',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textAreaRow($model,'CircleAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'CerateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryBy',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
