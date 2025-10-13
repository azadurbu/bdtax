<?php
$this->breadcrumbs=array(
	'Income House Properties',
);

$this->menu=array(
array('label'=>'Create IncomeHouseProperties','url'=>array('create')),
array('label'=>'Manage IncomeHouseProperties','url'=>array('admin')),
);
?>

<h1>Income House Properties</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
