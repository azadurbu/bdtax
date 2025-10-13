<?php
$this->breadcrumbs=array(
	'Inc Income Business Or Professions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncIncomeBusinessOrProfession','url'=>array('index')),
array('label'=>'Manage IncIncomeBusinessOrProfession','url'=>array('admin')),
);
?>

<h1>Create IncIncomeBusinessOrProfession</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>