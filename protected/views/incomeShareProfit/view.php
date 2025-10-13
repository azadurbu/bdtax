<?php
$this->breadcrumbs=array(
	'Income Share Profits'=>array('index'),
	$model->IncomeShareProfitId,
);

$this->menu=array(
array('label'=>'List IncomeShareProfit','url'=>array('index')),
array('label'=>'Create IncomeShareProfit','url'=>array('create')),
array('label'=>'Update IncomeShareProfit','url'=>array('update','id'=>$model->IncomeShareProfitId)),
array('label'=>'Delete IncomeShareProfit','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeShareProfitId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeShareProfit','url'=>array('admin')),
);
?>

<h1>View IncomeShareProfit #<?php echo $model->IncomeShareProfitId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeShareProfitId',
		'IncomeId',
		'IncomeOfFirm',
		'ShareOfFirm',
		'NetValueOfShare',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
