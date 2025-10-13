<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'organizations-form',
	'enableAjaxValidation' => false,
));?>


    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js?v=<?=$this->v?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#Organizations_phone_number").mask("99999999999");
    });
</script>

<div class="panel panel-success">
    <div class="panel-heading">
        <h1><?=Yii::t("org_profile","Organization Profile")?> <?=isset($model->org_plan) ? " - " . $model->org_plan : ""?></h1>
    </div>


<div class="org_create">
    <div class="well">


        <!-- Data block -->

        <p class="help-block"><?php echo Yii::t('org_profile','Fields with <span class="required">*</span> are required.'); ?></p>
        <div class="flash_alert">
        <?php
            if(Yii::app()->user->hasFlash('success')) {
        ?>
            <div class="alert alert-success fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5><?=Yii::app()->user->getFlash('success')?></div>
        <?php
            }
        ?>
        <?php
            if(Yii::app()->user->hasFlash('error')) {
        ?>
            <div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5><?=Yii::app()->user->getFlash('error')?></div>
        <?php
            }
        ?>
        </div>

        <fieldset class="form-horizontal" >



            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'organization_name', array('class' => 'col-lg-3')); ?>
                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'organization_name', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'organization_name'); ?>

                </div></div>

                <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'contact_first_name', array('class' => 'col-lg-3')); ?>
                    <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'contact_first_name', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                        <?php echo $form->error($model, 'contact_first_name'); ?>

                    </div></div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'contact_last_name', array('class' => 'col-lg-3')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'contact_last_name', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($model, 'contact_last_name'); ?>

                        </div></div>

                        <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'contact_email', array('class' => 'col-lg-3')); ?>
                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'contact_email', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                <?php echo $form->error($model, 'contact_email'); ?>

                            </div></div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'address_line1', array('class' => 'col-lg-3')); ?>
                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'address_line1', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                    <?php echo $form->error($model, 'address_line1'); ?>

                                </div></div>

                                <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'address_line2', array('class' => 'col-lg-3')); ?>
                                    <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'address_line2', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                        <?php echo $form->error($model, 'address_line2'); ?>

                                    </div></div>

                                    <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'city', array('class' => 'col-lg-3')); ?>
                                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'city', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                            <?php echo $form->error($model, 'city'); ?>

                                        </div></div>

                                        <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'zip_code', array('class' => 'col-lg-3')); ?>
                                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'zip_code', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                                <?php echo $form->error($model, 'zip_code'); ?>

                                            </div></div>

                                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'phone_number', array('class' => 'col-lg-3')); ?>
                                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'phone_number', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                                    <?php echo $form->error($model, 'phone_number'); ?>

                                                </div></div>
                                           <?php  $model->etin = $this->_decode($model->etin);  ?> 
                                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'etin', array('class' => 'col-lg-3 required')); ?>
                                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model, 'etin', array('class'=> 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                                                    <?php echo $form->error($model, 'etin'); ?>

                                                </div></div>

                                        <?php if (Yii::app()->user->role=='companyAdmin' || Yii::app()->user->role=='companyUser') : ?>
                                        <hr />

                                        <div class="form-group">
                                            <b style="color: red; margin-left: 15px;">Please email <a href="mailto:<?=Yii::app()->params['billingEmail']?>"><?=Yii::app()->params['billingEmail']?></a> to upgrade/change your plan.</b>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">
                                                <?=Yii::t("user", "Current Plan")?>
                                            </label>
                                            <div class="col-sm-5 col-sm-9 form-inline">
                                                <input class="form-control" size="60" maxlength="255"  value="<?=$model->org_plan?>" type="text" disabled="disabled" >
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        
                                        <?php if (Yii::app()->user->role=='companyAdmin' || Yii::app()->user->role=='superAdmin') : ?>
                                         <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'payment_method_id', array('class' => 'col-lg-3')); ?>
                                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->dropDownList($model, 'payment_method_id', $paymentMethods, array('class'=> 'form-control', "required" => "required")); ?>
                                                <?php echo $form->error($model, 'payment_method_id'); ?>

                                            </div></div>
                                        <?php endif; ?>

                                        <?php if (Yii::app()->user->role=='superAdmin' && isset($trial->plan)) : ?>
                                        <hr />
                                           <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'org_plan', array('class' => 'col-lg-3')); ?>
                                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->dropDownList($model, 'org_plan',array(
                                                                    "Trial" => $trial->plan . " - Free", 
                                                                    "Small" =>  $small->plan . " - " . $small->price . " ". $this->currency, 
                                                                    "Medium" => $medium->plan . " - " . $medium->price . " ". $this->currency, 
                                                                    "Enterprise" => $enterprise->plan . " - " . $enterprise->price . " ". $this->currency
                                                                ), array('class'=> 'form-control')); ?>
                                                    <?php echo $form->error($model, 'org_plan'); ?>

                                                </div></div>
                                        <?php endif; ?>
                                        
                                           


                                                <div class="form-actions">
                                                    <?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType' => 'submit',
	'type' => 'success',
	'label' => $model->isNewRecord ? Yii::t('income', "Create") :  Yii::t('income', "Save"),
));?>
                                                   </div>

                                                   <?php $this->endWidget();?>

                                               </fieldset>


                                           </div>

</div>
<!--                                            <div class="panel-footer">

</div> -->

</div>