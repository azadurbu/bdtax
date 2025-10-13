<?php
$this->breadcrumbs=array(
	'Inc Income Business Or Professions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List IncIncomeBusinessOrProfession','url'=>array('index')),
array('label'=>'Create IncIncomeBusinessOrProfession','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('inc-income-business-or-profession-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Inc Income Business Or Professions</h1>

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
'id'=>'inc-income-business-or-profession-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'IncomeBusinessOrProfessionId',
		'IncomeId',
		'Type',
		'Description',
		'Cost',
		'CerateAt',
		/*
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
