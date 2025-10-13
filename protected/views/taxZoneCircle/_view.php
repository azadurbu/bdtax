<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('TaxZoneCircleId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TaxZoneCircleId),array('view','id'=>$data->TaxZoneCircleId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubCatIncomeId')); ?>:</b>
	<?php echo CHtml::encode($data->SubCatIncomeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmployerName')); ?>:</b>
	<?php echo CHtml::encode($data->EmployerName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CircleCode')); ?>:</b>
	<?php echo CHtml::encode($data->CircleCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CircleName')); ?>:</b>
	<?php echo CHtml::encode($data->CircleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZoneName')); ?>:</b>
	<?php echo CHtml::encode($data->ZoneName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CircleAddress')); ?>:</b>
	<?php echo CHtml::encode($data->CircleAddress); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CerateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CerateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastUpdateAt')); ?>:</b>
	<?php echo CHtml::encode($data->LastUpdateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EntryBy')); ?>:</b>
	<?php echo CHtml::encode($data->EntryBy); ?>
	<br />

	*/ ?>

</div>