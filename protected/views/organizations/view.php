<?php
$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List Organizations','url'=>array('index')),
array('label'=>'Create Organizations','url'=>array('create')),
array('label'=>'Update Organizations','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Organizations','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Organizations','url'=>array('admin')),
);
?>

<h1>View Organizations #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'organization_name',
		'contact_first_name',
		'contact_last_name',
		'contact_email',
		'address_line1',
		'address_line2',
		'city',
		'zip_code',
		'phone_number',
		'adminUser_id',
		'status',
),
)); ?>
