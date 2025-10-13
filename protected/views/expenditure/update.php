<?php
$this->breadcrumbs=array(
	'Expenditures'=>array('index'),
	$model->ExpenditureId=>array('view','id'=>$model->ExpenditureId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Expenditure','url'=>array('index')),
	array('label'=>'Create Expenditure','url'=>array('create')),
	array('label'=>'View Expenditure','url'=>array('view','id'=>$model->ExpenditureId)),
	array('label'=>'Manage Expenditure','url'=>array('admin')),
	);
	?>

	<h1>Update Expenditure <?php echo $model->ExpenditureId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>