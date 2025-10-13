<?php
$this->breadcrumbs=array(
	'Type Of Incomes',
);

$this->menu=array(
array('label'=>'Create TypeOfIncome','url'=>array('create')),
array('label'=>'Manage TypeOfIncome','url'=>array('admin')),
);
?>

<h1>Type Of Incomes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
