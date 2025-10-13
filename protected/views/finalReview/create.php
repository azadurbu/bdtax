<?php
$this->breadcrumbs=array(
	'Liabilities'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Liabilities','url'=>array('index')),
array('label'=>'Manage Liabilities','url'=>array('admin')),
);
?>

<h1>Create Liabilities</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>