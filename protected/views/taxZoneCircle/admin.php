<div id="home-mid" class="reg-form income-dashbord sticky-min-height2">
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tax-zone-circle-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h2>Manage Tax Zone Circles</h2>

<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/taxZoneCircle/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'tax-zone-circle-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
				'name' => 'TaxTypeName',
				'value' => 'CHtml::encode(@$data->type_of_income->TypeName)',
				'header' => 'Tax Type Name'
				),
		array(
				'name' => 'SubCatName',
				'value' => 'CHtml::encode(@$data->sub_category_of_income->SubCatName)',
				'header' => 'Sub Cat Name'
				),
		
		'EmployerName',
		'CircleCode',
		'CircleName',
		'ZoneName',
		'CircleAddress',
		/*'CerateAt',
		'LastUpdateAt',
		'EntryBy',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template' => '{update}{delete}',
				'buttons' => array(
					'update' => array(
						'url' => 'Yii::app()->createUrl("taxZoneCircle/update/id/".$data->TaxZoneCircleId)'
						),
					'delete' => array(
						'url' => 'Yii::app()->createUrl("taxZoneCircle/delete/id/".$data->TaxZoneCircleId)'
						)
					),
),
),
)); ?>
</div>
