<?php
$this->breadcrumbs=array(
	'Personal Informations'=>array('index'),
	$model->Name,
);

$this->menu=array(
array('label'=>'List PersonalInformation','url'=>array('index')),
array('label'=>'Create PersonalInformation','url'=>array('create')),
array('label'=>'Update PersonalInformation','url'=>array('update','id'=>$model->CPIId)),
array('label'=>'Delete PersonalInformation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->CPIId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PersonalInformation','url'=>array('admin')),
);
?>

<h1>View PersonalInformation #<?php echo $model->CPIId; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'CPIId',
		'Name',
		'ETIN',
		'NationalId',
		'TaxesCircle',
		'TaxesZone',
		'AssesmentYearId',
		'ResidentialStatus',
		'Status',
		'BusinessName',
		'SpouseName',
		'FathersName',
		'MothersName',
		'DOB',
		'PresentAddress',
		'PermanentAddress',
		'PhoneOffice',
		'PhoneBusiness',
		'PhoneResidential',
		'VatNumber',
		'NoOfAdultInFamily',
		'NoOfChildInFamily',
		'UserId',
		'CreateAt',
		'LastvisitAt',
		'trash',
),
)); ?>
