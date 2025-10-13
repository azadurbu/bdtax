<?php
$this->breadcrumbs=array(
	'Income Salaries'=>array('index'),
	$model->IncomeSalariesId=>array('view','id'=>$model->IncomeSalariesId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeSalaries','url'=>array('index')),
	array('label'=>'Create IncomeSalaries','url'=>array('create')),
	array('label'=>'View IncomeSalaries','url'=>array('view','id'=>$model->IncomeSalariesId)),
	array('label'=>'Manage IncomeSalaries','url'=>array('admin')),
	);

	//echo '--'.$CPIInfo->GovernmentEmployee.'--'.$model->GovernmentEmployee;
	?>

	<!-- <h1>Update IncomeSalaries <?php echo $model->IncomeSalariesId; ?></h1> -->

<?php if ( ($CPIInfo->GovernmentEmployee=='Y') && ($model->GovernmentEmployee=='Y') ) { ?>
<?php echo $this->renderPartial('_formGovt', array('model'=>$model,	'CalculationModel'=>$CalculationModel)); ?>			
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isg/isg.js?v=<?=$this->v?>"></script>
	<?php } else { ?>	
<?php echo $this->renderPartial('_form', array('model'=>$model,	'CalculationModel'=>$CalculationModel)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/is/is2.js?v=<?=$this->v?>"></script>
<?php	} ?>
