<?php
$this->breadcrumbs=array(
	'Personal Informations'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PersonalInformation','url'=>array('index')),
array('label'=>'Create PersonalInformation','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('personal-information-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Personal Informations</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'personal-information-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'CPIId',
		'Name',
		'ETIN',
		'NationalId',
		'TaxesCircle',
		'TaxesZone',
		/*
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
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
