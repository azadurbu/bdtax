<?php
$this->breadcrumbs=array(
	'Income Tax Rebates'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncomeTaxRebate','url'=>array('index')),
array('label'=>'Manage IncomeTaxRebate','url'=>array('admin')),
);
?>

<!-- <h1>Create IncomeTaxRebate</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/rebate/rebate.js?v=<?=$this->v?>"></script>