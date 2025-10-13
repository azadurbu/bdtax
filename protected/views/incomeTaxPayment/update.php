<?php
$this->breadcrumbs=array(
	'Income Tax Payments'=>array('index'),
	$model->IncomeTaxPaymentId=>array('view','id'=>$model->IncomeTaxPaymentId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeTaxPayment','url'=>array('index')),
	array('label'=>'Create IncomeTaxPayment','url'=>array('create')),
	array('label'=>'View IncomeTaxPayment','url'=>array('view','id'=>$model->IncomeTaxPaymentId)),
	array('label'=>'Manage IncomeTaxPayment','url'=>array('admin')),
	);
	?>

	<h1>Update IncomeTaxPayment <?php echo $model->IncomeTaxPaymentId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>