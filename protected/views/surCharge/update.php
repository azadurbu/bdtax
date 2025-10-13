<?php
$this->breadcrumbs=array(
	'Sur Charges'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List SurCharge','url'=>array('index')),
	array('label'=>'Create SurCharge','url'=>array('create')),
	array('label'=>'View SurCharge','url'=>array('view','id'=>$model->Id)),
	array('label'=>'Manage SurCharge','url'=>array('admin')),
	);
	?>

	<h1>Update SurCharge <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>