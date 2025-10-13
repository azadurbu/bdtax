<div id="home-mid" class="reg-form income-dashbord">
  <div class="home_icon-box home_icon-7"></div>
    <h4 style="color:#b90601; text-transform:uppercase; font-size:26px; font-weight:bold;"><?=Yii::t("payment", "Payment") ?></h4>

  <div class="clearfix"></div>

<?php
  if(Yii::app()->user->hasFlash('payment_success')) {
?>
    <br />
    <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a>
    <?=Yii::app()->user->getFlash('payment_success')?></div>
<?php
    } else if(Yii::app()->user->hasFlash('payment_error')) {
?>
    <br />
    <div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><?=Yii::app()->user->getFlash('payment_error')?></div>
<?php
    }
?>


    <div class="row">
      <div class="col-lg-12" style="text-align: center;">

        <?php echo $this->renderPartial('invoice', array('data'=>$data)); ?>

      </div>
      <div class="clearfix"></div>
    </div>


</div>





