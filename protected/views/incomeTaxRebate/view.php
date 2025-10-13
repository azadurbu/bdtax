<?php
$this->breadcrumbs=array(
	'Income Tax Rebates'=>array('index'),
	$model->IncomeTaxRebateId,
);

$this->menu=array(
array('label'=>'List IncomeTaxRebate','url'=>array('index')),
array('label'=>'Create IncomeTaxRebate','url'=>array('create')),
array('label'=>'Update IncomeTaxRebate','url'=>array('update','id'=>$model->IncomeTaxRebateId)),
array('label'=>'Delete IncomeTaxRebate','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeTaxRebateId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeTaxRebate','url'=>array('admin')),
);
?>

<h1>View IncomeTaxRebate #<?php echo $model->IncomeTaxRebateId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeTaxRebateId',
		'LifeInsurancePremium',
		'DeferredAnnuity',
		'ProvidentFund',
		'SCECProvidentFund',
		'SuperAnnuationFund',
		'InvestInStockOrShare',
		'DepositPensionScheme',
		'BenevolentFund',
		'ZakatFund',
		'Others',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
