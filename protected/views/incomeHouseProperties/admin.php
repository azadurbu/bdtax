<?php
$this->breadcrumbs=array(
	'Personal Information'=>array('../index.php/PersonalInformation'),
	'Income'=>array('../index.php/income'),
	'Salary Income Entry'=>array('../index.php/IncomeSalaries'),
	'House Properties Income'=>array('admin'),
	'Entry',
);

$this->menu=array(
array('label'=>'List IncomeHouseProperties','url'=>array('index')),
array('label'=>'Create IncomeHouseProperties','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('income-house-properties-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Income House Properties</h1>


<?php echo CHtml::link('Want to add more properties',Yii::app()->baseUrl.'/index.php/incomeHouseProperties/entry',array('class'=>'btn')); ?>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'income-house-properties-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
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
		/*'CerateAt',
		'LastUpdateAt',
		'CPIId',
		'EntryYear',
		'trash',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
