<?php
$this->breadcrumbs=array(
	'Inc Income Business Or Professions'=>array('index'),
	$model->IncomeBusinessOrProfessionId,
);

$this->menu=array(
array('label'=>'List IncIncomeBusinessOrProfession','url'=>array('index')),
array('label'=>'Create IncIncomeBusinessOrProfession','url'=>array('create')),
array('label'=>'Update IncIncomeBusinessOrProfession','url'=>array('update','id'=>$model->IncomeBusinessOrProfessionId)),
array('label'=>'Delete IncIncomeBusinessOrProfession','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeBusinessOrProfessionId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncIncomeBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>View IncIncomeBusinessOrProfession #<?php echo $model->IncomeBusinessOrProfessionId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeBusinessOrProfessionId',
		'IncomeId',
		'Type',
		'Description',
		'Cost',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
