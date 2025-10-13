<?php
$this->breadcrumbs=array(
	'Personal Informations'=>array('index'),
	$model->Name=>array('view','id'=>$model->CPIId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PersonalInformation','url'=>array('index')),
	array('label'=>'Create PersonalInformation','url'=>array('create')),
	array('label'=>'View PersonalInformation','url'=>array('view','id'=>$model->CPIId)),
	array('label'=>'Manage PersonalInformation','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update PersonalInformation <?php echo $model->CPIId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>