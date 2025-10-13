<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */

$this->breadcrumbs=array(
	'Users Statistics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UsersStatistic', 'url'=>array('index')),
	array('label'=>'Create UsersStatistic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-statistic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users Statistics</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-statistic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'CPIId',
		'pdf_print_date',
		'pdf_print_count',
		'progress_percent_date',
		'progress_percent',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
