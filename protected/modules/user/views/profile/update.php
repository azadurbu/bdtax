<?php
$this->breadcrumbs=array(
	(Yii::t('user','Administration'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(Yii::t('user','Update')),
);
$this->menu=array(
    array('label'=>Yii::t('user','Create User'), 'url'=>array('create')),
    array('label'=>Yii::t('user','View User'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>Yii::t('user','Manage Users'), 'url'=>array('admin')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('/user')),
);
?>

<h1><?php echo  Yii::t('user','Update User')." ".$model->id; ?></h1>

<?php


if(isset($nutrient_list)){

    echo $this->renderPartial('_form', array('model'=>$model,'nutrient_list'=>$nutrient_list));

} else {

    echo $this->renderPartial('_form', array('model'=>$model,));

}

?>