<?php
$this->breadcrumbs=array(
	'Calculation Data Sources',
);

$this->menu=array(
array('label'=>'Create CalculationDataSource','url'=>array('create')),
array('label'=>'Manage CalculationDataSource','url'=>array('admin')),
);
?>

<h1>Calculation Data Sources</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
