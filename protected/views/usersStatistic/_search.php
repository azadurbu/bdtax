<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPIId'); ?>
		<?php echo $form->textField($model,'CPIId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pdf_print_date'); ?>
		<?php echo $form->textField($model,'pdf_print_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pdf_print_count'); ?>
		<?php echo $form->textField($model,'pdf_print_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress_percent_date'); ?>
		<?php echo $form->textField($model,'progress_percent_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'progress_percent'); ?>
		<?php echo $form->textField($model,'progress_percent',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->