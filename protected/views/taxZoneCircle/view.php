<?php
$this->breadcrumbs=array(
	'Tax Zone Circles'=>array('index'),
	$model->TaxZoneCircleId,
);

$this->menu=array(
array('label'=>'List TaxZoneCircle','url'=>array('index')),
array('label'=>'Create TaxZoneCircle','url'=>array('create')),
array('label'=>'Update TaxZoneCircle','url'=>array('update','id'=>$model->TaxZoneCircleId)),
array('label'=>'Delete TaxZoneCircle','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->TaxZoneCircleId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TaxZoneCircle','url'=>array('admin')),
);
?>

<h1>View TaxZoneCircle #<?php echo $model->TaxZoneCircleId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'TaxZoneCircleId',
		'SubCatIncomeId',
		'EmployerName',
		'CircleCode',
		'CircleName',
		'ZoneName',
		'CircleAddress',
		'CerateAt',
		'LastUpdateAt',
		'EntryBy',
),
)); ?>
