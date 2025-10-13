<?php
/* @var $this AllIndPaymentsController */
/* @var $data AllIndPayments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CPIId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CPIId), array('view', 'id'=>$data->CPIId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_year')); ?>:</b>
	<?php echo CHtml::encode($data->payment_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tran_id')); ?>:</b>
	<?php echo CHtml::encode($data->tran_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('store_amount')); ?>:</b>
	<?php echo CHtml::encode($data->store_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_type')); ?>:</b>
	<?php echo CHtml::encode($data->discount_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_value')); ?>:</b>
	<?php echo CHtml::encode($data->discount_value); ?>
	<br />

	 

</div>