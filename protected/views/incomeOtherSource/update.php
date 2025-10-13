<?php
$this->breadcrumbs=array(
	'Income Other Sources'=>array('index'),
	$model->IncomeOtherSourceId=>array('view','id'=>$model->IncomeOtherSourceId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeOtherSource','url'=>array('index')),
	array('label'=>'Create IncomeOtherSource','url'=>array('create')),
	array('label'=>'View IncomeOtherSource','url'=>array('view','id'=>$model->IncomeOtherSourceId)),
	array('label'=>'Manage IncomeOtherSource','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update IncomeOtherSource <?php echo $model->IncomeOtherSourceId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>