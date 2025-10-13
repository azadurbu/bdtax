<?php
$this->breadcrumbs=array(
	'Inc Income Business Or Professions',
);

$this->menu=array(
array('label'=>'Create IncIncomeBusinessOrProfession','url'=>array('create')),
array('label'=>'Manage IncIncomeBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>Inc Income Business Or Professions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
