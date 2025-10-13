<?php
/*$this->breadcrumbs=array(
	'Income Salaries'=>array('index'),
	$model->IncomeSalariesId,
);*/


$this->breadcrumbs=array(
	'Personal Information'=>array('../index.php/PersonalInformation'),
	'Income'=>array('../index.php/income'),
	'Salary Income Entry'=>array('../index.php/incomeSalaries'),
	'Personal Information Entry',
);

$this->menu=array(
array('label'=>'List IncomeSalaries','url'=>array('index')),
array('label'=>'Create IncomeSalaries','url'=>array('create')),
array('label'=>'Update IncomeSalaries','url'=>array('update','id'=>$model->IncomeSalariesId)),
array('label'=>'Delete IncomeSalaries','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IncomeSalariesId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage IncomeSalaries','url'=>array('admin')),
);
?>

<h1>View Salary income of year  <?php echo $model->EntryYear; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'IncomeSalariesId',
		'BasicPay',
		'SpecialPay',
		'DearnessAllowance',
		'ConveyanceAllowance',
		'HouseRentAllowance',
		'MedicalAllowance',
		'ServantAllowance',
		'LeaveAllowance',
		'HonorariumOrReward',
		'OvertimeAllowance',
		'Bonus',
		'OtherAllowances',
		'EmployersContributionProvidentFund',
		'InterestAccruedProvidentFund',
		'DeemedIncomeTransport',
		'DeemedFreeAccommodation',
		'Others',
		'NetTaxableIncome',
		'CreateAt',
/*		'LastvisitAt',
		'EntryYear',
		'trash',*/
),
)); ?>

<style type="text/css">
	
	.detail-view th {
    text-align: right;
    width: 330px;
}
</style>
