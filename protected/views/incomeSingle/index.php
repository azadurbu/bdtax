<?php
$this->breadcrumbs=array(
	'Incomes',
);

$this->menu=array(
array('label'=>'Create Income','url'=>array('create')),
array('label'=>'Manage Income','url'=>array('admin')),
);
?>

<h1>Incomes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
