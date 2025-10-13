<?php
$this->breadcrumbs=array(
	'Income 82c'=>array('index'),
	$model->Income82cId,
);

$this->menu=array(
array('label'=>'List Income82c','url'=>array('index')),
array('label'=>'Create Income82c','url'=>array('create')),
array('label'=>'Update Income82c','url'=>array('update','id'=>$model->Income82cId)),
array('label'=>'Delete Income82c','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Income82cId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Income82c','url'=>array('admin')),
);
?>

<h1>View Income82c #<?php echo $model->Income82cId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'Income82cId',
		'ContractorIncome',
		'ClearingAndForwardingIncome',
		'TravelAgentIncome',
		'ImporterTaxCollection',
		'KnitWovenExportIncome',
		'OtherThanKnitWovenExportIncome',
		'RoyaltyIncome',
		'SavingInstrumentInterestIncome',
		'ExportCashSubsidyIncome',
		'SavingAndFixedDepositInterestIncome',
		'LotteryIncome',
		'PropertySaleIncome',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
