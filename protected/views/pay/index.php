<div class="reg-form income-dashbord">
<div class="row">
  <div class="col-md-4">&nbsp;</div>
  <div class="col-md-4">

    <?=CHtml::link("Individual Payment", Yii::app()->baseUrl."/index.php/allIndPayments" , array('class'=>'btn btn-default btn-lg btn-block', 'type' => 'button'))?>

    <?=CHtml::link("Company Payment", Yii::app()->baseUrl."/index.php/allOrgPayments" , array('class'=>'btn btn-default btn-lg btn-block', 'type' => 'button'))?>

  </div>
  <div class="col-md-4">&nbsp;</div>
</div>

</div>
