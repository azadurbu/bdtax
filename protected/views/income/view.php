<?php
$this->breadcrumbs=array(
	'Incomes'=>array('index'),
	$model->IncomeId,
);

$this->menu=array(
array('label'=>'List Income','url'=>array('index')),
array('label'=>'Create Income','url'=>array('create')),
array('label'=>'Update Income','url'=>array('update','id'=>$model->IncomeId)),
array('label'=>'Delete Income','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Income','url'=>array('admin')),
);
?>

<h1>View Income #<?php echo $model->IncomeId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeId',
		'IncomeSalariesId',
		'InterestOnSecurities',
		'IncomePropertiesId',
		'IncomeAgriculture',
		'IncomeBusinessOrProfession',
		'IncomeShareProfitId',
		'IncomeSpouseOrChild',
		'CapitalGains',
		'IncomeOtherSourceId',
		'TotalOf2TO10',
		'ForeignIncome',
		'TotalIncome',
		'TaxLeviableOnTotalIncome',
		'IncomeTaxRebateId',
		'TaxPayable',
		'IncomeTaxPaymentId',
		'DifferenceBetweenPayableNPayment',
		'TaxExempted',
		'LastYearPaidTax',
		'OtherReceipts',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
