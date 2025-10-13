<?php
/* @var $this AllOrgPaymentsController */
/* @var $data AllOrgPayments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->org_id), array('view', 'id'=>$data->org_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_name')); ?>:</b>
	<?php echo CHtml::encode($data->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('org_plan')); ?>:</b>
	<?php echo CHtml::encode($data->org_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_date); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_from')); ?>:</b>
	<?php echo CHtml::encode($data->payment_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_to')); ?>:</b>
	<?php echo CHtml::encode($data->payment_to); ?>
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