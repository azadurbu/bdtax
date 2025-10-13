<?php
$this->breadcrumbs=array(
	'Personal Information'=>array('../index.php/PersonalInformation'),
	'Income'=>array('../index.php/income'),
	'Salary Income Entry'=>array('../index.php/IncomeSalaries'),
	'Entry',
);

$this->menu=array(
array('label'=>'Go to Income','url'=>array('/../income')),
array('label'=>'Manage IncomeSalaries','url'=>array('admin')),
);
?>

<!-- <h1>Fell free to put your Income Salary</h1> -->

<?php
		
 if ($CPIInfo->GovernmentEmployee=='Y') { ?>
<?php echo $this->renderPartial('_formGovt', array('model'=>$model,	'CalculationModel'=>$CalculationModel)); ?>	
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isg/isg.js?v=<?=$this->v?>"></script>
		
	<?php } else { ?>	
<?php echo $this->renderPartial('_form', array('model'=>$model,	'CalculationModel'=>$CalculationModel)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/is/is2.js?v=<?=$this->v?>"></script>
<?php	} ?>



