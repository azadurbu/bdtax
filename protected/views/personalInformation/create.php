<?php
$this->breadcrumbs=array(
	'Personal Informations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PersonalInformation','url'=>array('index')),
array('label'=>'Manage PersonalInformation','url'=>array('admin')),
);
?>

<h1>Create PersonalInformation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>