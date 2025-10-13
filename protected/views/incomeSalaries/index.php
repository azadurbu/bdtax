<?php
$this->breadcrumbs=array(
	'Income Salaries',
);

$this->menu=array(
array('label'=>'Create IncomeSalaries','url'=>array('create')),
array('label'=>'Manage IncomeSalaries','url'=>array('admin')),
);
?>

<h1>Income Salaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
