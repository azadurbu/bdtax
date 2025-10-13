<div id="home-mid" class="reg-form income-dashbord">

<h2>View Type of Income #<?php echo $model->TypeOfIncomeId; ?></h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'TypeOfIncomeId',
		'TypeName',
),
)); ?>
</div>
