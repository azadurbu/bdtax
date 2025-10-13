<?php
$this->breadcrumbs=array(
	'Sur Charges',
);

$this->menu=array(
array('label'=>'Create SurCharge','url'=>array('create')),
array('label'=>'Manage SurCharge','url'=>array('admin')),
);
?>

<h1>Sur Charges</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
