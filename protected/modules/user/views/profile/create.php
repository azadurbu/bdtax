<?php
$this->breadcrumbs=array(
	Yii::t('user','Family')=>array('admin'),
	Yii::t('user','Add Family member'),
);

$this->menu=array(
    array('label'=>Yii::t('user','Manage family Members'), 'url'=>array('admin')),
);
?>
<!--<h1><?php echo Yii::t('user',"Create User"); ?></h1>-->

<?php
	echo $this->renderPartial('_form', array('model'=>$model));
?>