<?php
$this->breadcrumbs=array(
	'Authitemchildren'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Authitemchild','url'=>array('index')),
array('label'=>'Manage Authitemchild','url'=>array('admin')),
);
?>

<h1>Create Authitemchild</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>