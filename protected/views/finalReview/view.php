<?php
$this->breadcrumbs=array(
	'Liabilities'=>array('index'),
	$model->LiabilityId,
);

$this->menu=array(
array('label'=>'List Liabilities','url'=>array('index')),
array('label'=>'Create Liabilities','url'=>array('create')),
array('label'=>'Update Liabilities','url'=>array('update','id'=>$model->LiabilityId)),
array('label'=>'Delete Liabilities','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->LiabilityId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Liabilities','url'=>array('admin')),
);
?>

<h1>View Liabilities #<?php echo $model->LiabilityId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'LiabilityId',
		'MortgagesOnPropertyOrLand',
		'UnsecuredLoans',
		'BankLoans',
		'OthersLoan',
		'TotalLiabilities',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
