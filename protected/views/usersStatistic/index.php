<?php
/* @var $this UsersStatisticController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Statistics',
);

$this->menu=array(
	array('label'=>'Create UsersStatistic', 'url'=>array('create')),
	array('label'=>'Manage UsersStatistic', 'url'=>array('admin')),
);
?>

<h1>Users Statistics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
