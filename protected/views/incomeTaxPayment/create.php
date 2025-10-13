<?php
$this->breadcrumbs=array(
	'Income Tax Payments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncomeTaxPayment','url'=>array('index')),
array('label'=>'Manage IncomeTaxPayment','url'=>array('admin')),
);
?>

<h1>Create IncomeTaxPayment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>