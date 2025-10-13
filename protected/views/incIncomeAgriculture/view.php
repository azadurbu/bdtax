<?php
$this->breadcrumbs=array(
	'Inc Income Agricultures'=>array('index'),
	$model->IncomeAgricultureId,
);

$this->menu=array(
array('label'=>'List IncIncomeAgriculture','url'=>array('index')),
array('label'=>'Create IncIncomeAgriculture','url'=>array('create')),
array('label'=>'Update IncIncomeAgriculture','url'=>array('update','id'=>$model->IncomeAgricultureId)),
array('label'=>'Delete IncIncomeAgriculture','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeAgricultureId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncIncomeAgriculture','url'=>array('admin')),
);
?>

<h1>View IncIncomeAgriculture #<?php echo $model->IncomeAgricultureId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeAgricultureId',
		'IncomeId',
		'Type',
		'LandInBigha',
		'CorpseType',
		'TotalRevenue',
		'ProductionCost',
		'Cost',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
