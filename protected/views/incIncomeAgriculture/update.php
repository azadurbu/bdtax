<?php
$this->breadcrumbs=array(
	'Inc Income Agricultures'=>array('index'),
	$model->IncomeAgricultureId=>array('view','id'=>$model->IncomeAgricultureId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncIncomeAgriculture','url'=>array('index')),
	array('label'=>'Create IncIncomeAgriculture','url'=>array('create')),
	array('label'=>'View IncIncomeAgriculture','url'=>array('view','id'=>$model->IncomeAgricultureId)),
	array('label'=>'Manage IncIncomeAgriculture','url'=>array('admin')),
	);
	?>

	<h1>Update IncIncomeAgriculture <?php echo $model->IncomeAgricultureId; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>