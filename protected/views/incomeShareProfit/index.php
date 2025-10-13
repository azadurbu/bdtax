<?php
$this->breadcrumbs=array(
	'Income Share Profits',
);

$this->menu=array(
array('label'=>'Create IncomeShareProfit','url'=>array('create')),
array('label'=>'Manage IncomeShareProfit','url'=>array('admin')),
);
?>

<h1>Income Share Profits</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
