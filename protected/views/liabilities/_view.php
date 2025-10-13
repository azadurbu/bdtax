<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('LiabilityId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LiabilityId),array('view','id'=>$data->LiabilityId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MortgagesOnPropertyOrLand')); ?>:</b>
	<?php echo CHtml::encode($data->MortgagesOnPropertyOrLand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UnsecuredLoans')); ?>:</b>
	<?php echo CHtml::encode($data->UnsecuredLoans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankLoans')); ?>:</b>
	<?php echo CHtml::encode($data->BankLoans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OthersLoan')); ?>:</b>
	<?php echo CHtml::encode($data->OthersLoan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalLiabilities')); ?>:</b>
	<?php echo CHtml::encode($data->TotalLiabilities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CerateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CerateAt); ?>
	<br />

	<?php /*
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