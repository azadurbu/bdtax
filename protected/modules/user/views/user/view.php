<?php
$this->breadcrumbs=array(
	Yii::t('user','Users')=>array('index'),
	$model->email,
);
$this->layout='//layouts/column3';
$this->menu=array(
    array('label'=>Yii::t('user','List User'), 'url'=>array('index')),
);
?>


<h1><?php echo Yii::t('user','View User').' "'.$model->email.'"'; ?></h1>
<?php 

// For all users
	$attributes = array(
        'email',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'role',
        'activity_level',
        'allergies',
	);
	

	array_push($attributes,
		'create_at',
		array(
			'name' => 'lastvisit_at',
			'value' => (($model->lastvisit_at!='0000-00-00 00:00:00')?$model->lastvisit_at:Yii::t('user','Not visited')),
		)
	);
			
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));

?>
