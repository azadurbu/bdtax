<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'organization_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'contact_first_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'contact_last_name',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'contact_email',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'address_line1',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'address_line2',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'city',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'zip_code',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'phone_number',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'adminUser_id',array('class'=>'span5')); ?>

		<?php echo $form->dropDownListRow($model,'status',array("1"=>"1","0"=>"0",),array('class'=>'input-large')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
