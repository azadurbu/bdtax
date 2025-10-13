<?php
/* @var $this UsersStatisticController */
/* @var $data UsersStatistic */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPIId')); ?>:</b>
	<?php echo CHtml::encode($data->CPIId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_print_date')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_print_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pdf_print_count')); ?>:</b>
	<?php echo CHtml::encode($data->pdf_print_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_percent_date')); ?>:</b>
	<?php echo CHtml::encode($data->progress_percent_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('progress_percent')); ?>:</b>
	<?php echo CHtml::encode($data->progress_percent); ?>
	<br />


</div>