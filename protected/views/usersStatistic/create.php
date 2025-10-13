<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */

// $this->breadcrumbs=array(
// 	'Users Statistics'=>array('index'),
// 	'Create',
// );

// $this->menu=array(
// 	array('label'=>'List UsersStatistic', 'url'=>array('index')),
// 	array('label'=>'Manage UsersStatistic', 'url'=>array('admin')),
// );
?>

<!-- <h1>Create UsersStatistic</h1> -->

<?php 
	echo $this->renderPartial('_form', array('model'=>$model, 'month'=>$month,'year'=>$year)); 
?>