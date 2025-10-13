<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */

$this->breadcrumbs=array(
	'Users Statistics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersStatistic', 'url'=>array('index')),
	array('label'=>'Create UsersStatistic', 'url'=>array('create')),
	array('label'=>'View UsersStatistic', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersStatistic', 'url'=>array('admin')),
);
?>

<h1>Update UsersStatistic <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>