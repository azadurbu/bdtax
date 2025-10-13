<?php
$this->breadcrumbs=array(
	'Inc Interest On Securities'=>array('index'),
	$model->InterestOnSecuritiesId,
);

$this->menu=array(
array('label'=>'List IncInterestOnSecurities','url'=>array('index')),
array('label'=>'Create IncInterestOnSecurities','url'=>array('create')),
array('label'=>'Update IncInterestOnSecurities','url'=>array('update','id'=>$model->InterestOnSecuritiesId)),
array('label'=>'Delete IncInterestOnSecurities','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->InterestOnSecuritiesId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncInterestOnSecurities','url'=>array('admin')),
);
?>

<h1>View IncInterestOnSecurities #<?php echo $model->InterestOnSecuritiesId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'InterestOnSecuritiesId',
		'IncomeId',
		'Type',
		'Description',
		'NetAmount',
		'CommissionOrInterest',
		'Cost',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
