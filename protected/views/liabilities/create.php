<style>
.exp_alert {
  font-size: 14px !important; 
  padding-top: 0px !important;
  color: #006600;
}
</style>
<?php
$this->breadcrumbs=array(
	'Liabilities'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Liabilities','url'=>array('index')),
array('label'=>'Manage Liabilities','url'=>array('admin')),
);
?>

<!-- <h1>Create Liabilities</h1> -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<script>

	liabilities_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/liabilities/";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/liabilities/create.js?v=<?=$this->v?>"></script>