<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('TypeOfIncomeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TypeOfIncomeId),array('view','id'=>$data->TypeOfIncomeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeName')); ?>:</b>
	<?php echo CHtml::encode($data->TypeName); ?>
	<br />


</div>