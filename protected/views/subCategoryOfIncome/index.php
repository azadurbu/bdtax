<?php
$this->breadcrumbs=array(
	'Sub Category Of Incomes',
);

$this->menu=array(
array('label'=>'Create SubCategoryOfIncome','url'=>array('create')),
array('label'=>'Manage SubCategoryOfIncome','url'=>array('admin')),
);
?>

<h1>Sub Category Of Incomes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
