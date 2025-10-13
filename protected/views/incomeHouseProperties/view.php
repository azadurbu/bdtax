<?php
$this->breadcrumbs=array(
	'Income House Properties'=>array('index'),
	$model->IncomePropertiesId,
);

$this->menu=array(
array('label'=>'List IncomeHouseProperties','url'=>array('index')),
array('label'=>'Create IncomeHouseProperties','url'=>array('create')),
array('label'=>'Update IncomeHouseProperties','url'=>array('update','id'=>$model->IncomePropertiesId)),
array('label'=>'Delete IncomeHouseProperties','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomePropertiesId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeHouseProperties','url'=>array('admin')),
);
?>

<h1>View IncomeHouseProperties #<?php echo $model->IncomePropertiesId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomePropertiesId',
		'AnnualRentalIncome',
		'ClaimedExpensesTotal',
		'Repair',
		'MunicipalOrLocalTax',
		'LandRevenue',
		'LoanInterestOrMorgageOrCapitalCrg',
		'InsurancePremium',
		'VacancyAllowence',
		'Others',
		'NetIncome',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
