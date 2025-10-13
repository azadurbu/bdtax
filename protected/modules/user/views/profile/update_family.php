<?php
$this->breadcrumbs=array(
	(Yii::t('user','Family'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(Yii::t('user','Update')),
);
$this->menu=array(
    
    array('label'=>Yii::t('user','Create Family User'), 'url'=>array('create')),    
    array('label'=>Yii::t('user','View Family User'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>Yii::t('user','Manage Family Users'), 'url'=>array('family/admin')),
);
?>

<h1><?php echo  Yii::t('user','Update User')." ".$model->id; ?></h1>

<?php


if(isset($nutrient_list)){

    echo $this->renderPartial('_form_family', array('model'=>$model,'nutrient_list'=>$nutrient_list));

} else {

    echo $this->renderPartial('_form_family', array('model'=>$model,));

}

?>