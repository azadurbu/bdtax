<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_name')); ?>:</b>
	<?php echo CHtml::encode($data->organization_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_first_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_last_name')); ?>:</b>
	<?php echo CHtml::encode($data->contact_last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line1')); ?>:</b>
	<?php echo CHtml::encode($data->address_line1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address_line2')); ?>:</b>
	<?php echo CHtml::encode($data->address_line2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b>
	<?php echo CHtml::encode($data->zip_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adminUser_id')); ?>:</b>
	<?php echo CHtml::encode($data->adminUser_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>