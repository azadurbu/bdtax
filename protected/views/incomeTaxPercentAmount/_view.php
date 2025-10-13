<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeTaxPercentAmountId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IncomeTaxPercentAmountId),array('view','id'=>$data->IncomeTaxPercentAmountId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Amount')); ?>:</b>
	<?php echo CHtml::encode($data->Amount); ?>
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