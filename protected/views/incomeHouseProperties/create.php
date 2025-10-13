<?php

$this->breadcrumbs=array(
	'Personal Information'=>array('../index.php/PersonalInformation'),
	'Income'=>array('../index.php/income'),
	'Salary Income Entry'=>array('../index.php/IncomeSalaries'),
	'House Properties Income'=>array('admin'),
	'Entry',
);

$this->menu=array(
array('label'=>'List IncomeHouseProperties','url'=>array('index')),
array('label'=>'Manage IncomeHouseProperties','url'=>array('admin')),
);
?>

<!-- <h1>Create IncomeHouseProperties</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model, 'CalculationModel'=>$CalculationModel )); ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/irp/irp.js?v=<?=$this->v?>"></script>