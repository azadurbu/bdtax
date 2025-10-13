<div id="home-mid" class="reg-form income-dashbord sticky-min-height">
	<div  class="continue-return-page">
		 <h2></h2>
         <div class="d-board-area">
         	<div class="row">
                <div class="col-md-12">
                	<div class="continue-return-txt">
                         <!-- <span>You are currently preparing your tax return.</span> -->
                         <div class="clearfix"></div>
                         <a href="<?=$present_link?>" class="btn btn-success btn-lg"><?= Yii::t('dashboard','Continue where you left') ?></a>
                     </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="continue-dashboard-txt">
                         <!-- <span>You are currently preparing your tax return.</span> -->
                         <div class="clearfix"></div>
                         <a href="<?php echo Yii::app()->baseUrl . '/index.php/'; ?>" class="btn btn-danger btn-lg"><?= Yii::t('dashboard','Continue with dashboard') ?></a>
                     </div>
                </div>
            </div>


         </div>
		<div class="clearfix"></div>
	</div>
</div>