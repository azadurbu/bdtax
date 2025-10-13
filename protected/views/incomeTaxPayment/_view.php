<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeTaxPaymentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IncomeTaxPaymentId),array('view','id'=>$data->IncomeTaxPaymentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeductedAtSource')); ?>:</b>
	<?php echo CHtml::encode($data->DeductedAtSource); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AdvanceTax')); ?>:</b>
	<?php echo CHtml::encode($data->AdvanceTax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TaxPaidOnReturn')); ?>:</b>
	<?php echo CHtml::encode($data->TaxPaidOnReturn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AdjustmentTaxRefund')); ?>:</b>
	<?php echo CHtml::encode($data->AdjustmentTaxRefund); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CerateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CerateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastUpdateAt')); ?>:</b>
	<?php echo CHtml::encode($data->LastUpdateAt); ?>
	<br />

	<?php /*
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