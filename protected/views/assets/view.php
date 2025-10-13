<?php
/* @var $this AssetsController */
/* @var $model Assets */

$this->breadcrumbs=array(
	'Assets'=>array('index'),
	$model->AssetsId,
);

$this->menu=array(
	array('label'=>'List Assets', 'url'=>array('index')),
	array('label'=>'Create Assets', 'url'=>array('create')),
	array('label'=>'Update Assets', 'url'=>array('update', 'id'=>$model->AssetsId)),
	array('label'=>'Delete Assets', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->AssetsId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Assets', 'url'=>array('admin')),
);
?>

<h1>View Assets #<?php echo $model->AssetsId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'AssetsId',
		'BusinessCapital',
		'ShareholdingCompanyCost',
		'NonAgriculturePropertyCost',
		'AgriculturePropertyCost',
		'InvestmentCost',
		'MotorVehicleCost',
		'JewelleryDescription',
		'JewelleryCost',
		'FurnitureDescription',
		'FurnitureCost',
		'ElectronicEquipmentDescription',
		'ElectronicEquipmentCost',
		'CashInHand',
		'CashAtBank',
		'Otherdeposits',
		'TotalCashAsset',
		'AnyOtherAssetsCost',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
	),
)); ?>
