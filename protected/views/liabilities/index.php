<?php
$this->breadcrumbs=array(
	'Liabilities',
);

$this->menu=array(
array('label'=>'Create Liabilities','url'=>array('create')),
array('label'=>'Manage Liabilities','url'=>array('admin')),
);
?>

<h1>Liabilities</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
