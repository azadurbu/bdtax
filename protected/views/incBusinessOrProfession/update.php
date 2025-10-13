<?php
$this->breadcrumbs=array(
	'Inc Business Or Professions'=>array('index'),
	$model->BusinessOrProfessionId=>array('view','id'=>$model->BusinessOrProfessionId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncBusinessOrProfession','url'=>array('index')),
	array('label'=>'Create IncBusinessOrProfession','url'=>array('create')),
	array('label'=>'View IncBusinessOrProfession','url'=>array('view','id'=>$model->BusinessOrProfessionId)),
	array('label'=>'Manage IncBusinessOrProfession','url'=>array('admin')),
	);
	?>

	<h1>Update IncBusinessOrProfession <?php echo $model->BusinessOrProfessionId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>