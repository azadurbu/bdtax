<?php
$this->breadcrumbs=array(
	'Inc Business Or Professions',
);

$this->menu=array(
array('label'=>'Create IncBusinessOrProfession','url'=>array('create')),
array('label'=>'Manage IncBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>Inc Business Or Professions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
