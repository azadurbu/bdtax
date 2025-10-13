<?php
$this->breadcrumbs=array(
	'Liabilities'=>array('index'),
	$model->LiabilityId=>array('view','id'=>$model->LiabilityId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Liabilities','url'=>array('index')),
	array('label'=>'Create Liabilities','url'=>array('create')),
	array('label'=>'View Liabilities','url'=>array('view','id'=>$model->LiabilityId)),
	array('label'=>'Manage Liabilities','url'=>array('admin')),
	);
	?>

	<h1>Update Liabilities <?php echo $model->LiabilityId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>