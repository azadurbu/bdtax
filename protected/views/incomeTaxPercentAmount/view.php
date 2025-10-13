<?php
$this->breadcrumbs=array(
	'Income Tax Percent Amounts'=>array('index'),
	$model->IncomeTaxPercentAmountId,
);

$this->menu=array(
array('label'=>'List IncomeTaxPercentAmount','url'=>array('index')),
array('label'=>'Create IncomeTaxPercentAmount','url'=>array('create')),
array('label'=>'Update IncomeTaxPercentAmount','url'=>array('update','id'=>$model->IncomeTaxPercentAmountId)),
array('label'=>'Delete IncomeTaxPercentAmount','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeTaxPercentAmountId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeTaxPercentAmount','url'=>array('admin')),
);
?>

<h1>View IncomeTaxPercentAmount #<?php echo $model->IncomeTaxPercentAmountId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeTaxPercentAmountId',
		'Amount',
		'Percent',
		'CreateAt',
		'LastUpdateAt',
		'EntryYear',
),
)); ?>
