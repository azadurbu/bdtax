<?php
$this->breadcrumbs=array(
	'Expenditures'=>array('index'),
	$model->ExpenditureId,
);

$this->menu=array(
array('label'=>'List Expenditure','url'=>array('index')),
array('label'=>'Create Expenditure','url'=>array('create')),
array('label'=>'Update Expenditure','url'=>array('update','id'=>$model->ExpenditureId)),
array('label'=>'Delete Expenditure','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ExpenditureId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Expenditure','url'=>array('admin')),
);
?>

<h1>View Expenditure #<?php echo $model->ExpenditureId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'ExpenditureId',
		'PersonalFoodingExpenses',
		'TotalTaxPaidLastYear',
		'AccommodationExpenses',
		'TransportExpenses',
		'ResidenceElectricityBill',
		'ResidenceWasaBill',
		'ResidenceGasBill',
		'ResidenceTelephoneBill',
		'ChildrenEducationExpenses',
		'PersonalForeignTravelExpenses',
		'FestivalNOtherSpecialExpenses',
		'TotalExpenditure',
		'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
),
)); ?>
