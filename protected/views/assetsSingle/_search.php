<?php
/* @var $this AssetsController */
/* @var $model Assets */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'AssetsId'); ?>
		<?php echo $form->textField($model,'AssetsId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BusinessCapital'); ?>
		<?php echo $form->textField($model,'BusinessCapital'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ShareholdingCompanyCost'); ?>
		<?php echo $form->textField($model,'ShareholdingCompanyCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NonAgriculturePropertyCost'); ?>
		<?php echo $form->textField($model,'NonAgriculturePropertyCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AgriculturePropertyCost'); ?>
		<?php echo $form->textField($model,'AgriculturePropertyCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InvestmentCost'); ?>
		<?php echo $form->textField($model,'InvestmentCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MotorVehicleCost'); ?>
		<?php echo $form->textField($model,'MotorVehicleCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JewelleryDescription'); ?>
		<?php echo $form->textArea($model,'JewelleryDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JewelleryCost'); ?>
		<?php echo $form->textField($model,'JewelleryCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FurnitureDescription'); ?>
		<?php echo $form->textArea($model,'FurnitureDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FurnitureCost'); ?>
		<?php echo $form->textField($model,'FurnitureCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ElectronicEquipmentDescription'); ?>
		<?php echo $form->textArea($model,'ElectronicEquipmentDescription',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ElectronicEquipmentCost'); ?>
		<?php echo $form->textField($model,'ElectronicEquipmentCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CashInHand'); ?>
		<?php echo $form->textField($model,'CashInHand'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CashAtBank'); ?>
		<?php echo $form->textField($model,'CashAtBank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Otherdeposits'); ?>
		<?php echo $form->textField($model,'Otherdeposits'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalCashAsset'); ?>
		<?php echo $form->textField($model,'TotalCashAsset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AnyOtherAssetsCost'); ?>
		<?php echo $form->textField($model,'AnyOtherAssetsCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CerateAt'); ?>
		<?php echo $form->textField($model,'CerateAt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastUpdateAt'); ?>
		<?php echo $form->textField($model,'LastUpdateAt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CPIId'); ?>
		<?php echo $form->textField($model,'CPIId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EntryYear'); ?>
		<?php echo $form->textField($model,'EntryYear',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trash'); ?>
		<?php echo $form->textField($model,'trash'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->