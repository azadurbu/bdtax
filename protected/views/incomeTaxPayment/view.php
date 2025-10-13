<?php
$this->breadcrumbs=array(
	'Income Tax Payments'=>array('index'),
	$model->IncomeTaxPaymentId,
);

$this->menu=array(
array('label'=>'List IncomeTaxPayment','url'=>array('index')),
array('label'=>'Create IncomeTaxPayment','url'=>array('create')),
array('label'=>'Update IncomeTaxPayment','url'=>array('update','id'=>$model->IncomeTaxPaymentId)),
array('label'=>'Delete IncomeTaxPayment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeTaxPaymentId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeTaxPayment','url'=>array('admin')),
);
?>

<h1>View IncomeTaxPayment #<?php echo $model->IncomeTaxPaymentId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeTaxPaymentId',
		'DeductedAtSource',
		'AdvanceTax',
		'TaxPaidOnReturn',
		'AdjustmentTaxRefund',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
