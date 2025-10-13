<?php
$this->breadcrumbs=array(
	'Income 82c'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Income82c','url'=>array('index')),
array('label'=>'Create Income82c','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('income-tax-rebate-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Income Tax Rebates</h1>

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
'id'=>'income-tax-rebate-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'Income82cId',
		'ContractorIncome',
		'ClearingAndForwardingIncome',
		'TravelAgentIncome',
		'ImporterTaxCollection',
		'KnitWovenExportIncome',
		'OtherThanKnitWovenExportIncome',
		'RoyaltyIncome',
		'SavingInstrumentInterestIncome',
		'ExportCashSubsidyIncome',
		'SavingAndFixedDepositInterestIncome',
		'LotteryIncome',
		'PropertySaleIncome',
		/*
		'InvestInStockOrShare',
		'DepositPensionScheme',
		'BenevolentFund',
		'ZakatFund',
		'Others',
		'CerateAt',
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
