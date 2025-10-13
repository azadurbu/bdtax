<?php
$this->breadcrumbs=array(
	'Authitemchildren',
);

$this->menu=array(
array('label'=>'Create Authitemchild','url'=>array('create')),
array('label'=>'Manage Authitemchild','url'=>array('admin')),
);
?>

<h1>Authitemchildren</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
