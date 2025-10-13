<?php
$this->breadcrumbs=array(
	'Income House Properties'=>array('index'),
	$model->IncomePropertiesId=>array('view','id'=>$model->IncomePropertiesId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeHouseProperties','url'=>array('index')),
	array('label'=>'Create IncomeHouseProperties','url'=>array('create')),
	array('label'=>'View IncomeHouseProperties','url'=>array('view','id'=>$model->IncomePropertiesId)),
	array('label'=>'Manage IncomeHouseProperties','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update IncomeHouseProperties <?php echo $model->IncomePropertiesId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model, 'CalculationModel'=>$CalculationModel)); ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/irp/irp.js?v=<?=$this->v?>"></script>