<?php
$this->breadcrumbs=array(
	'Inc Income Business Or Professions'=>array('index'),
	$model->IncomeBusinessOrProfessionId=>array('view','id'=>$model->IncomeBusinessOrProfessionId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncIncomeBusinessOrProfession','url'=>array('index')),
	array('label'=>'Create IncIncomeBusinessOrProfession','url'=>array('create')),
	array('label'=>'View IncIncomeBusinessOrProfession','url'=>array('view','id'=>$model->IncomeBusinessOrProfessionId)),
	array('label'=>'Manage IncIncomeBusinessOrProfession','url'=>array('admin')),
	);
	?>

	<h1>Update IncIncomeBusinessOrProfession <?php echo $model->IncomeBusinessOrProfessionId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>