<?php
$this->breadcrumbs=array(
	'Income Tax Rebates'=>array('index'),
	$model->IncomeTaxRebateId=>array('view','id'=>$model->IncomeTaxRebateId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeTaxRebate','url'=>array('index')),
	array('label'=>'Create IncomeTaxRebate','url'=>array('create')),
	array('label'=>'View IncomeTaxRebate','url'=>array('view','id'=>$model->IncomeTaxRebateId)),
	array('label'=>'Manage IncomeTaxRebate','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update IncomeTaxRebate <?php echo $model->IncomeTaxRebateId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/rebate/rebate.js?v=<?=$this->v?>"></script>