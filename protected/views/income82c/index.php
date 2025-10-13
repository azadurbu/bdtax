<?php
$this->breadcrumbs=array(
	'Income 82c',
);

$this->menu=array(
array('label'=>'Create Income82c','url'=>array('create')),
array('label'=>'Manage Income82c','url'=>array('admin')),
);
?>

<h1>Income Tax Rebates</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
