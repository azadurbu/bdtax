<?php
$this->breadcrumbs=array(
	'Inc Income Agricultures',
);

$this->menu=array(
array('label'=>'Create IncIncomeAgriculture','url'=>array('create')),
array('label'=>'Manage IncIncomeAgriculture','url'=>array('admin')),
);
?>

<h1>Inc Income Agricultures</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
