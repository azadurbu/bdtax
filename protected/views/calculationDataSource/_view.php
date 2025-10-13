<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('CalculationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CalculationId),array('view','id'=>$data->CalculationId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ConveynceWaiverLevel')); ?>:</b>
	<?php echo CHtml::encode($data->ConveynceWaiverLevel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HouseRentWaiverPercent')); ?>:</b>
	<?php echo CHtml::encode($data->HouseRentWaiverPercent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CommercialRentPercent')); ?>:</b>
	<?php echo CHtml::encode($data->CommercialRentPercent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HouseRentCompareValue')); ?>:</b>
	<?php echo CHtml::encode($data->HouseRentCompareValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MedicalWaiverPercent')); ?>:</b>
	<?php echo CHtml::encode($data->MedicalWaiverPercent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MedicalCompareValue')); ?>:</b>
	<?php echo CHtml::encode($data->MedicalCompareValue); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('ProvidentFoundInterest')); ?>:</b>
	<?php echo CHtml::encode($data->ProvidentFoundInterest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ProvidentFoundportion')); ?>:</b>
	<?php echo CHtml::encode($data->ProvidentFoundportion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ResidentialRentPercent')); ?>:</b>
	<?php echo CHtml::encode($data->ResidentialRentPercent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CreateAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LastvisitAt')); ?>:</b>
	<?php echo CHtml::encode($data->LastvisitAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EntryYear')); ?>:</b>
	<?php echo CHtml::encode($data->EntryYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trash')); ?>:</b>
	<?php echo CHtml::encode($data->trash); ?>
	<br />

	

</div>