<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeShareProfitId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IncomeShareProfitId),array('view','id'=>$data->IncomeShareProfitId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeId')); ?>:</b>
	<?php echo CHtml::encode($data->IncomeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IncomeOfFirm')); ?>:</b>
	<?php echo CHtml::encode($data->IncomeOfFirm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShareOfFirm')); ?>:</b>
	<?php echo CHtml::encode($data->ShareOfFirm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NetValueOfShare')); ?>:</b>
	<?php echo CHtml::encode($data->NetValueOfShare); ?>
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