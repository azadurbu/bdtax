<?php
$this->breadcrumbs=array(
	'Sur Charges'=>array('index'),
	$model->Id,
);

$this->menu=array(
array('label'=>'List SurCharge','url'=>array('index')),
array('label'=>'Create SurCharge','url'=>array('create')),
array('label'=>'Update SurCharge','url'=>array('update','id'=>$model->Id)),
array('label'=>'Delete SurCharge','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SurCharge','url'=>array('admin')),
);
?>

<h1>View SurCharge #<?php echo $model->Id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'Id',
		'MinAmount',
		'MaxAmount',
		'Percent',
		'CreateAt',
		'LastUpdateAt',
		'EntryYear',
),
)); ?>
