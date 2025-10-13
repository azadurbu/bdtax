<?php
$this->breadcrumbs=array(
	'Tax Zone Circles',
);

$this->menu=array(
array('label'=>'Create TaxZoneCircle','url'=>array('create')),
array('label'=>'Manage TaxZoneCircle','url'=>array('admin')),
);
?>

<h1>Tax Zone Circles</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
