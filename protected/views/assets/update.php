<?php
/* @var $this AssetsController */
/* @var $model Assets */

$this->breadcrumbs=array(
	'Assets'=>array('index'),
	$model->AssetsId=>array('view','id'=>$model->AssetsId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Assets', 'url'=>array('index')),
	array('label'=>'Create Assets', 'url'=>array('create')),
	array('label'=>'View Assets', 'url'=>array('view', 'id'=>$model->AssetsId)),
	array('label'=>'Manage Assets', 'url'=>array('admin')),
);
?>

<h1>Update Assets <?php echo $model->AssetsId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>