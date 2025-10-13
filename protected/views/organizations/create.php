<?php
/*$this->breadcrumbs=array(
	'Organizations'=>array('index'),
	'Create',
	);*/

$this->menu=array(
	array('label'=>'List Organizations','url'=>array('index')),
	array('label'=>'Manage Organizations','url'=>array('admin')),
	);
	?>



	<?php echo $this->renderPartial('_form', array('model'=>$model, 'paymentMethods' => $paymentMethods)); ?>