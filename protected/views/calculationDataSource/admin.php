<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
				
				
<?php
Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
	});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('calculation-data-source-grid', {
		data: $(this).serialize()
	});
return false;
});
");
?>

<h2>Manage Calculation Data Sources</h2>

<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/calculationDataSource/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'calculation-data-source-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			/*'CalculationId',*/
			'ConveynceWaiverLevel',
			'HouseRentWaiverPercent',
			'CommercialRentPercent',
			'HouseRentCompareValue',
			'MedicalWaiverPercent',
		
		'MedicalCompareValue',
		'ProvidentFoundInterest',
		'ProvidentFoundportion',
		'ResidentialRentPercent',
		/*'CreateAt',
		'LastvisitAt',*/
		'EntryYear',
		/*'trash',*/
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{view}{update}{delete}',
			'buttons' => array(
					'view' => array(
                                'url' => 'Yii::app()->createUrl("calculationDataSource/view/id/".$data->CalculationId)'
                                ),
					'update' => array(
                                'url' => 'Yii::app()->createUrl("calculationDataSource/update/id/".$data->CalculationId)'
                                ),
					'delete' => array(
                                'url' => 'Yii::app()->createUrl("calculationDataSource/delete/id/".$data->CalculationId)'
                                )
						),
			),
		),
		)); ?>
</div>