<?php
$this->breadcrumbs=array(
	'Income 82c'=>array('index'),
	$model->Income82cId=>array('view','id'=>$model->Income82cId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Income82c','url'=>array('index')),
	array('label'=>'Create Income82c','url'=>array('create')),
	array('label'=>'View Income82c','url'=>array('view','id'=>$model->Income82cId)),
	array('label'=>'Manage Income82c','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update IncomeTaxRebate <?php echo $model->Income82cId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/82c/82c.js?v=<?=$this->v?>"></script>