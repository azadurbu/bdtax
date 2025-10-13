<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeOtherSourceId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IncomeOtherSourceId),array('view','id'=>$data->IncomeOtherSourceId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InterestIncome')); ?>:</b>
	<?php echo CHtml::encode($data->InterestIncome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DividendIncome')); ?>:</b>
	<?php echo CHtml::encode($data->DividendIncome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WinningsIncome')); ?>:</b>
	<?php echo CHtml::encode($data->WinningsIncome); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OthersIncome')); ?>:</b>
	<?php echo CHtml::encode($data->OthersIncome); ?>
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