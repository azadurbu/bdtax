<div id="home-mid" class="reg-form income-dashbord sticky-min-height3">
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('income-tax-percent-amount-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Income Tax Percent Amounts</h1>


<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/incomeTaxPercentAmount/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'income-tax-percent-amount-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'IncomeTaxPercentAmountId',
		'Amount',
		'Percent',
		'CreateAt',
		'EntryYear',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template' => '{update}{delete}',
			'buttons' => array(
					'update' => array(
                                'url' => 'Yii::app()->createUrl("incomeTaxPercentAmount/update/id/".$data->IncomeTaxPercentAmountId)'
                                ),
					'delete' => array(
                                'url' => 'Yii::app()->createUrl("incomeTaxPercentAmount/delete/id/".$data->IncomeTaxPercentAmountId)'
                                )
						),
),
),
)); ?>
</div>