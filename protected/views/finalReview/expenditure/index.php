<?php
$this->breadcrumbs=array(
	'Expenditures',
);

$this->menu=array(
array('label'=>'Create Expenditure','url'=>array('create')),
array('label'=>'Manage Expenditure','url'=>array('admin')),
);
?>

<h1>Expenditures</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
