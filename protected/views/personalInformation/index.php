<?php
$this->breadcrumbs=array(
	'Personal Informations',
);

$this->menu=array(
array('label'=>'Create PersonalInformation','url'=>array('create')),
array('label'=>'Manage PersonalInformation','url'=>array('admin')),
);
?>

<h1>Personal Informations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
