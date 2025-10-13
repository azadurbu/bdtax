<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('sur-charge-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Sur Charges</h1>

<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/surCharge/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'sur-charge-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'MinAmount',
		'MaxAmount',
		'Percent',
		'CreateAt',
		'EntryYear',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template' => '{update}{delete}',
			'buttons' => array(
					'update' => array(
                                'url' => 'Yii::app()->createUrl("surCharge/update/id/".$data->Id)'
                                ),
					'delete' => array(
                                'url' => 'Yii::app()->createUrl("surCharge/delete/id/".$data->Id)'
                                )
						),
			),
),
)); ?>
</div>