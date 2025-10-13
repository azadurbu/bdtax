<?php
$this->breadcrumbs=array(
	'Inc Interest On Securities'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncInterestOnSecurities','url'=>array('index')),
array('label'=>'Manage IncInterestOnSecurities','url'=>array('admin')),
);
?>

<h1>Create IncInterestOnSecurities</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>