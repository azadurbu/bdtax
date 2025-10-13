<style>
.exp_alert {
  font-size: 14px !important; 
  padding-top: 0px !important;
  color: #006600;
}
</style>
<?php
	
	echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4, 'model5'=>$model5, 'model6'=>$model6, 'model7'=>$model7, 'model8'=>$model8, 'model9'=>$model9, 'model10'=>$model10, 'model11'=>$model11)); 
?>


<script>
	expenditure_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/expenditure/";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/expenditure/create.js?v=<?=$this->v?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/expenditure/personal_fooding.js?v=<?=$this->v?>"></script>