<style>
.asset_alert {
  font-size: 14px !important; 
  padding-top: 0px !important;
  color: #006600;
}
</style>
<?php echo $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2, 'model3'=>$model3, 'model4'=>$model4, 'model5'=>$model5, 'model6'=>$model6, 'model7'=>$model7, 'model8'=>$model8, 'model9'=>$model9, 'model10'=>$model10, 'model11'=>$model11, 'model12'=>$model2, 'modelL'=>$modelL)); ?>

<script>
	asset_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/assets/";

</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/create.js?v=<?=$this->v?>"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/shareholding.js?v=<?=$this->v?>"></script>





<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/investment.js?v=<?=$this->v?>"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/motor_vehicle.js?v=<?=$this->v?>"></script>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/outside_business.js?v=<?=$this->v?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/nonAgricultureProperty.js?v=<?=$this->v?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/assets/agricultureProperty.js?v=<?=$this->v?>"></script>

