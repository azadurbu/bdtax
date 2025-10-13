<?php
$this->breadcrumbs=array(
	'Income Tax Rebates',
);

$this->menu=array(
array('label'=>'Create IncomeTaxRebate','url'=>array('create')),
array('label'=>'Manage IncomeTaxRebate','url'=>array('admin')),
);
?>

<h1>Income Tax Rebates</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
