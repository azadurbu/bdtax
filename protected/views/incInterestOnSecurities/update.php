<?php
$this->breadcrumbs=array(
	'Inc Interest On Securities'=>array('index'),
	$model->InterestOnSecuritiesId=>array('view','id'=>$model->InterestOnSecuritiesId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncInterestOnSecurities','url'=>array('index')),
	array('label'=>'Create IncInterestOnSecurities','url'=>array('create')),
	array('label'=>'View IncInterestOnSecurities','url'=>array('view','id'=>$model->InterestOnSecuritiesId)),
	array('label'=>'Manage IncInterestOnSecurities','url'=>array('admin')),
	);
	?>

	<h1>Update IncInterestOnSecurities <?php echo $model->InterestOnSecuritiesId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>