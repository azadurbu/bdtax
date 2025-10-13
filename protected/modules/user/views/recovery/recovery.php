<?php $this->pageTitle=Yii::app()->name . ' - '.Yii::t('user',"Restore");
$this->breadcrumbs=array(
	Yii::t('user',"Login") => array('/user/login'),
	Yii::t('user',"Restore"),
    );
    ?>
    <div id="content" class="dashbord-bg">
        <div class="container">
            <div class="login">
                <div class="login-form">
                    <div class="content mail-login-box">
                        <h1><?php echo Yii::t('user',"Recover Password"); ?></h1>

                        <?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
                        <div class="success text-center">
                            <?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
                        </div>
                        <br/>
                    <?php else: ?>

                    <?php echo CHtml::beginForm(); ?>

                    <?php echo CHtml::errorSummary($form); ?>


                    <div class="form-group">
                        <?php echo CHtml::activeLabel($form,'login_or_email'); ?>
                        <?php echo CHtml::activeTextField($form,'login_or_email', array('class' => 'form-control')) ?>
                        <span id="helpBlock" class="help-block"><?php echo Yii::t('user',"Please enter your email address."); ?></span>
                    </div>


                    <div class="input-group login-button">
                        <?php //echo CHtml::submitButton(Yii::t('user',"Restore")); ?>
                        <button class="btn btn-success" type="submit"><span class="awe-signin"></span> <?php echo Yii::t('user',"Restore"); ?></button>
                    </div>

                    <?php echo CHtml::endForm(); ?>
                <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            
        </div>

    </div>



</div>

</div>

<!--==================================++++++++++++++++++++++++++++++++++++++++++==================================-->
<!--/CONTENT AREA-->
