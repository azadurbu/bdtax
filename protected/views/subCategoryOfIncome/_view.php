<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('SubCatIncomeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SubCatIncomeId),array('view','id'=>$data->SubCatIncomeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeOfIncomeId')); ?>:</b>
	<?php echo CHtml::encode($data->TypeOfIncomeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubCatName')); ?>:</b>
	<?php echo CHtml::encode($data->SubCatName); ?>
	<br />


</div>