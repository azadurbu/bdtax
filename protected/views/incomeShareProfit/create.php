<?php
$this->breadcrumbs=array(
	'Income Share Profits'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List IncomeShareProfit','url'=>array('index')),
array('label'=>'Manage IncomeShareProfit','url'=>array('admin')),
);
?>

<!-- <h1>Create IncomeShareProfit</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/isp/isp.js?v=<?=$this->v?>"></script>