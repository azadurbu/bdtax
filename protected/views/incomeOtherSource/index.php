<?php
$this->breadcrumbs=array(
	'Income Other Sources',
);

$this->menu=array(
array('label'=>'Create IncomeOtherSource','url'=>array('create')),
array('label'=>'Manage IncomeOtherSource','url'=>array('admin')),
);
?>

<h1>Income Other Sources</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
