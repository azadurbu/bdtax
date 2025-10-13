<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('InterestOnSecuritiesId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->InterestOnSecuritiesId),array('view','id'=>$data->InterestOnSecuritiesId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeId')); ?>:</b>
	<?php echo CHtml::encode($data->IncomeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NetAmount')); ?>:</b>
	<?php echo CHtml::encode($data->NetAmount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CommissionOrInterest')); ?>:</b>
	<?php echo CHtml::encode($data->CommissionOrInterest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cost')); ?>:</b>
	<?php echo CHtml::encode($data->Cost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CerateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CerateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastUpdateAt')); ?>:</b>
	<?php echo CHtml::encode($data->LastUpdateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPIId')); ?>:</b>
	<?php echo CHtml::encode($data->CPIId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EntryYear')); ?>:</b>
	<?php echo CHtml::encode($data->EntryYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trash')); ?>:</b>
	<?php echo CHtml::encode($data->trash); ?>
	<br />

	*/ ?>

</div>