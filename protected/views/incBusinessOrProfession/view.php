<?php
$this->breadcrumbs=array(
	'Inc Business Or Professions'=>array('index'),
	$model->BusinessOrProfessionId,
);

$this->menu=array(
array('label'=>'List IncBusinessOrProfession','url'=>array('index')),
array('label'=>'Create IncBusinessOrProfession','url'=>array('create')),
array('label'=>'Update IncBusinessOrProfession','url'=>array('update','id'=>$model->BusinessOrProfessionId)),
array('label'=>'Delete IncBusinessOrProfession','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->BusinessOrProfessionId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>View IncBusinessOrProfession #<?php echo $model->BusinessOrProfessionId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'BusinessOrProfessionId',
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
