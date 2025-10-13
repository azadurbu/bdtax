<div id="home-mid" class="reg-form income-dashbord sticky-min-height2">
	<?php

	Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
		});
	$('.search-form form').submit(function(){
		$.fn.yiiGridView.update('sub-category-of-income-grid', {
			data: $(this).serialize()
		});
	return false;
});
	");
	?>

	<h2>Manage Sub Category Of Incomes</h2>

	<?=CHtml::link("Create New", Yii::app()->baseUrl."/index.php/subCategoryOfIncome/create" , array('class'=>'btn btn-default', 'type' => 'button'))?>


	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'sub-category-of-income-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'SubCatIncomeId',
			// 'TypeOfIncomeId',
			array(
				'name' => 'TypeName',
				'value' => 'CHtml::encode(@$data->type_of_income->TypeName)',
				'header' => 'Income Type Name'
				),
			'SubCatName',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template' => '{update}{delete}',
				'buttons' => array(
					'update' => array(
						'url' => 'Yii::app()->createUrl("subCategoryOfIncome/update/id/".$data->SubCatIncomeId)'
						),
					'delete' => array(
						'url' => 'Yii::app()->createUrl("subCategoryOfIncome/delete/id/".$data->SubCatIncomeId)'
						)
					),
				),
			),
			)); ?>
		</div>
