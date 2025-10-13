<?php
$this->breadcrumbs=array(
	'Inc Interest On Securities',
);

$this->menu=array(
array('label'=>'Create IncInterestOnSecurities','url'=>array('create')),
array('label'=>'Manage IncInterestOnSecurities','url'=>array('admin')),
);
?>

<h1>Inc Interest On Securities</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
