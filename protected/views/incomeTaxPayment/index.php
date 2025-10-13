<?php
$this->breadcrumbs=array(
	'Income Tax Payments',
);

$this->menu=array(
array('label'=>'Create IncomeTaxPayment','url'=>array('create')),
array('label'=>'Manage IncomeTaxPayment','url'=>array('admin')),
);
?>

<h1>Income Tax Payments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
