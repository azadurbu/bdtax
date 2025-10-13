<?php
$this->breadcrumbs=array(
	'Income Other Sources'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncomeOtherSource','url'=>array('index')),
array('label'=>'Manage IncomeOtherSource','url'=>array('admin')),
);
?>

<!-- <h1>Create IncomeOtherSource</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>