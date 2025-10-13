<?php
$this->breadcrumbs=array(
	'Income Other Sources'=>array('index'),
	$model->IncomeOtherSourceId,
);

$this->menu=array(
array('label'=>'List IncomeOtherSource','url'=>array('index')),
array('label'=>'Create IncomeOtherSource','url'=>array('create')),
array('label'=>'Update IncomeOtherSource','url'=>array('update','id'=>$model->IncomeOtherSourceId)),
array('label'=>'Delete IncomeOtherSource','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeOtherSourceId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeOtherSource','url'=>array('admin')),
);
?>

<h1>View IncomeOtherSource #<?php echo $model->IncomeOtherSourceId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeOtherSourceId',
		'InterestIncome',
		'DividendIncome',
		'WinningsIncome',
		'OthersIncome',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
