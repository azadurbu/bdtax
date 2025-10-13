<?php
$this->breadcrumbs=array(
	'Income Share Profits'=>array('index'),
	$model->IncomeShareProfitId=>array('view','id'=>$model->IncomeShareProfitId),
	'Update',
);

	$this->menu=array(
	array('label'=>'List IncomeShareProfit','url'=>array('index')),
	array('label'=>'Create IncomeShareProfit','url'=>array('create')),
	array('label'=>'View IncomeShareProfit','url'=>array('view','id'=>$model->IncomeShareProfitId)),
	array('label'=>'Manage IncomeShareProfit','url'=>array('admin')),
	);
	?>

	<!-- <h1>Update IncomeShareProfit <?php echo $model->IncomeShareProfitId; ?></h1> -->

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isp/isp.js?v=<?=$this->v?>"></script>