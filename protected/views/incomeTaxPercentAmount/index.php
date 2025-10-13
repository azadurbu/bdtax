<?php
$this->breadcrumbs=array(
	'Income Tax Percent Amounts',
);

$this->menu=array(
array('label'=>'Create IncomeTaxPercentAmount','url'=>array('create')),
array('label'=>'Manage IncomeTaxPercentAmount','url'=>array('admin')),
);
?>

<h1>Income Tax Percent Amounts</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
