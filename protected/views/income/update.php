<?php
$this->breadcrumbs=array(
	'Incomes'=>array('index'),
	$model->IncomeId=>array('view','id'=>$model->IncomeId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Income','url'=>array('index')),
	array('label'=>'Create Income','url'=>array('create')),
	array('label'=>'View Income','url'=>array('view','id'=>$model->IncomeId)),
	array('label'=>'Manage Income','url'=>array('admin')),
	);
	?>

	<h1>Update Income <?php echo $model->IncomeId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>