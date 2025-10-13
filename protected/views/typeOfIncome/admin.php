<div id="home-mid" class="reg-form income-dashbord sticky-min-height2">
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('type-of-income-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2>Manage Type Of Incomes</h2>

<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/typeOfIncome/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'type-of-income-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'TypeOfIncomeId',
		'TypeName',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template' => '{update}{delete}',
			'buttons' => array(
					'update' => array(
                                'url' => 'Yii::app()->createUrl("typeOfIncome/update/id/".$data->TypeOfIncomeId)'
                                ),
					'delete' => array(
                                'url' => 'Yii::app()->createUrl("typeOfIncome/delete/id/".$data->TypeOfIncomeId)'
                                )
						),
			),
),
)); ?>
</div>