<?php
$this->breadcrumbs=array(
	Yii::t('user',"Users"),
);
if(UserModule::isAdmin()) {
	$this->layout='//layouts/column3';
	$this->menu=array(
	    array('label'=>Yii::t('user','Manage Users'), 'url'=>array('/user/admin')),
	);
}
?>

<h1><?php echo Yii::t('user',"List User"); ?></h1>
<?php // echo $test;//print_r($test);?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'email',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->email),array("user/view","id"=>$data->id))',
		),
		'create_at',
		'lastvisit_at',
	),
)); ?>
