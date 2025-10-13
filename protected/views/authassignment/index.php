<?php
$this->breadcrumbs=array(
	'Authassignments',
);

$this->menu=array(
array('label'=>'Create Authassignment','url'=>array('create')),
array('label'=>'Manage Authassignment','url'=>array('admin')),
);
?>

<h1>Authassignments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
