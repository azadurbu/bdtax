<?php
/* @var $this AssetsController */
/* @var $data Assets */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('AssetsId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->AssetsId), array('view', 'id'=>$data->AssetsId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BusinessCapital')); ?>:</b>
	<?php echo CHtml::encode($data->BusinessCapital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ShareholdingCompanyCost')); ?>:</b>
	<?php echo CHtml::encode($data->ShareholdingCompanyCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NonAgriculturePropertyCost')); ?>:</b>
	<?php echo CHtml::encode($data->NonAgriculturePropertyCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AgriculturePropertyCost')); ?>:</b>
	<?php echo CHtml::encode($data->AgriculturePropertyCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('InvestmentCost')); ?>:</b>
	<?php echo CHtml::encode($data->InvestmentCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MotorVehicleCost')); ?>:</b>
	<?php echo CHtml::encode($data->MotorVehicleCost); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('JewelleryDescription')); ?>:</b>
	<?php echo CHtml::encode($data->JewelleryDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JewelleryCost')); ?>:</b>
	<?php echo CHtml::encode($data->JewelleryCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FurnitureDescription')); ?>:</b>
	<?php echo CHtml::encode($data->FurnitureDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FurnitureCost')); ?>:</b>
	<?php echo CHtml::encode($data->FurnitureCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ElectronicEquipmentDescription')); ?>:</b>
	<?php echo CHtml::encode($data->ElectronicEquipmentDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ElectronicEquipmentCost')); ?>:</b>
	<?php echo CHtml::encode($data->ElectronicEquipmentCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CashInHand')); ?>:</b>
	<?php echo CHtml::encode($data->CashInHand); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CashAtBank')); ?>:</b>
	<?php echo CHtml::encode($data->CashAtBank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Otherdeposits')); ?>:</b>
	<?php echo CHtml::encode($data->Otherdeposits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalCashAsset')); ?>:</b>
	<?php echo CHtml::encode($data->TotalCashAsset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AnyOtherAssetsCost')); ?>:</b>
	<?php echo CHtml::encode($data->AnyOtherAssetsCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CerateAt')); ?>:</b>
	<?php echo CHtml::encode($data->CerateAt); ?>
	<br />

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