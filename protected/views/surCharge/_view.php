<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id),array('view','id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MinAmount')); ?>:</b>
	<?php echo CHtml::encode($data->MinAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MaxAmount')); ?>:</b>
	<?php echo CHtml::encode($data->MaxAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Percent')); ?>:</b>
	<?php echo CHtml::encode($data->Percent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CreateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastUpdateAt')); ?>:</b>
	<?php echo CHtml::encode($data->LastUpdateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EntryYear')); ?>:</b>
	<?php echo CHtml::encode($data->EntryYear); ?>
	<br />


</div>