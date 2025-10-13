<style>
.exp_alert {
  font-size: 14px !important; 
  padding-top: 0px !important;
  color: #006600;
}
</style>
<?php
	echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4, 'model5'=>$model5)); 
?>


<script>
    var delete_msg="<?php echo Yii::t('income', "Are you sure?"); ?>";
	liability_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/liabilities/";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/liabilities/create.js?v=<?=$this->v?>"></script>