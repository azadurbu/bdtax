<?php
$this->breadcrumbs=array(
	'Income 82c'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Income82c','url'=>array('index')),
array('label'=>'Manage Income82c','url'=>array('admin')),
);
?>

<!-- <h1>Create IncomeTaxRebate</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/82c/82c.js?v=<?=$this->v?>"></script>