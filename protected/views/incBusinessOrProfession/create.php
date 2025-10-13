<?php
$this->breadcrumbs=array(
	'Inc Business Or Professions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncBusinessOrProfession','url'=>array('index')),
array('label'=>'Manage IncBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>Create IncBusinessOrProfession</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>