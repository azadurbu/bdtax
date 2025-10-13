<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />


<!-- 
<h1>Manage Organizations</h1>

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
</div>
-->
<!-- search-form -->


<div class="panel panel-success filterable">

		<div class="panel-heading">

		<div class="row">
			<div class="col-lg-6">
				<h3 class="panel-title"><strong>User Activity Log</strong></h3>
			</div>
			<div class="col-lg-6">

			</div>
		</div>
	</div>

<div class="common-padding sticky-min-height2 table-responsive">
	<div>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'page-form',
			'enableAjaxValidation'=>true,
		)); ?>

		</br>
		<b style="padding-left: 13px;"><?=Yii::t('common', "From")?> : </b>
		
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'from_date',  // name of post parameter
			'value'=>'',  // value comes from cookie after submittion
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(

			),
		));
		?>
		<b><?=Yii::t('common', "To")?> : </b>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name'=>'to_date',
			'value'=>'',
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',

			),
			'htmlOptions'=>array(

			),
		));
		?>
		<?php echo CHtml::submitButton(Yii::t('common', "Go"), array('class' => 'btn btn-success btn-xl')); ?>
		<?php $this->endWidget(); ?>


	</div>


<div class="table-responsive">
		<?php
			// $model = Organizations::model()->findAll();
			// var_dump($model);die;
			$this->widget('bootstrap.widgets.TbGridView',array(
			// 'id'=>'organizations-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
			// 'id',
				'name',
				'email',
				'ip_address',
				'activity_type',
				'activity_time',
			/*
			'address_line2',
			'city',
			'zip_code',
			'adminUser_id',
			'status',
			*/
				// array(
				// 	'class' => 'bootstrap.widgets.TbToggleColumnOrg',
				// 	'toggleAction' => 'organizations/toggle',
				// 	'name' => 'status',
				// 	'htmlOptions'=>array('title'=>'Active / Inactive'),
				// 	'header' => Yii::t('user','Active / Inactive'),
				// 	'filter'=>CHtml::dropDownList('Organizations[status]', $model->status, array("1" => "Active", "0" => "Inactive"), array('empty'=>'Select','class'=>'form-control')),

				// ),
			// array(
			// 	'class' => 'bootstrap.widgets.TbButtonColumn',            
			// 	'template' => '{update} ',
			// 	'buttons' => array(
			// 		'update' => array(
			// 			'label' => 'Update Data',
			// 			'icon' => 'fa fa-edit fa-lg',
			// 					// 'visible' => '(Yii::app()->user->role=="superAdmin") || (Yii::app()->user->role=="Coordinator/Manager") || (Yii::app()->user->role=="Teacher")|| (Yii::app()->user->role=="Parent/Caregiver")|| (Yii::app()->user->role=="Mentor")',
			// 			'url' => 'Yii::app()->createUrl("Organizations/update/id/".$data->id)',
			// 			),				

			// 		),
			// 	),

			),
			)); ?>
           </div>
	
  </div>

	<script type="text/javascript">
		//$('.summary').hide();
	</script>

	<style type="text/css">
		.grid-view {
			padding-top: 5px !important;
		}

		a {
			color: #5cb85c;
			text-decoration: none;
		}
	</style>
