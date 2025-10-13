<?php
$this->breadcrumbs=array(
	'Sub Category Of Incomes'=>array('index'),
	$model->SubCatIncomeId,
);

$this->menu=array(
array('label'=>'List SubCategoryOfIncome','url'=>array('index')),
array('label'=>'Create SubCategoryOfIncome','url'=>array('create')),
array('label'=>'Update SubCategoryOfIncome','url'=>array('update','id'=>$model->SubCatIncomeId)),
array('label'=>'Delete SubCategoryOfIncome','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->SubCatIncomeId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage SubCategoryOfIncome','url'=>array('admin')),
);
?>

<h1>View SubCategoryOfIncome #<?php echo $model->SubCatIncomeId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'SubCatIncomeId',
		'TypeOfIncomeId',
		'SubCatName',
),
)); ?>
