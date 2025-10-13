<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'Id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MinAmount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MaxAmount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Percent',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CreateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'LastUpdateAt',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EntryYear',array('class'=>'span5','maxlength'=>9)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
