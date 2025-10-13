<?php
$this->breadcrumbs=array(
	'Inc Income Agricultures'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncIncomeAgriculture','url'=>array('index')),
array('label'=>'Manage IncIncomeAgriculture','url'=>array('admin')),
);
?>

<h1>Create IncIncomeAgriculture</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>