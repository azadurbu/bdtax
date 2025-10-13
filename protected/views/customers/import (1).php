<?php
/*$this->breadcrumbs=array(
	Yii::t('user','Administration')=>array('admin'),
	Yii::t('user','Add User'),
);*/

$this->menu=array(
    array('label'=>Yii::t('user','Manage Users'), 'url'=>array('admin')),
    array('label'=>Yii::t('user','List User'), 'url'=>array('/user')),
);
?>
<!--<h1><?php echo Yii::t('user',"Create User"); ?></h1>-->

<?php
	echo $this->renderPartial('_form', array('model'=>$model,'changePass'=>null, 'voucher' => $voucher, 'docModel'=>$docModel, 'docs' => $docs));
?>