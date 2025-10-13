<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'income-tax-82c-form',
	'enableAjaxValidation' => false,
));?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <section class="login-rt">
                <!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->
                <?php $t = $form->errorSummary($model);
if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
                <?php endif;?>

                <fieldset class="form-horizontal " >

                  <div class="row">
                    <div class="col-lg-10 ">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3><?=Yii::t('income', "Tax deductible investments information")?></h3>
                            </div>


                            <br/>


                            <div class="form-group">
                                <div class="col-lg-5">&nbsp;</div>
                                <div class="col-lg-3 text-center">
                                    <label><?=Yii::t('income', "Amount (BDT)")?></label>
                                </div>
                                <div class="col-lg-3 text-center">
                                    <label><?=Yii::t('income', "Tax Deducted At Source (BDT)")?></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3" style="padding-left:5%;">
                                    <h3><strong><?=Yii::t('income', "Business")?></strong></h3>
                                </div>
                            </div>
                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContractorIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'ContractorIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'ContractorIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'ContractorIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ClearingAndForwardingIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'ClearingAndForwardingIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'ClearingAndForwardingIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'ClearingAndForwardingIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'TravelAgentIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'TravelAgentIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'TravelAgentIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'TravelAgentIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ImporterTaxCollection', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'ImporterTaxCollection_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'ImporterTaxCollection', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'ImporterTaxCollection'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'KnitWovenExportIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'KnitWovenExportIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'KnitWovenExportIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'KnitWovenExportIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'OtherThanKnitWovenExportIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'OtherThanKnitWovenExportIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'OtherThanKnitWovenExportIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'OtherThanKnitWovenExportIncome'); ?>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-3" style="padding-left:5%;">
                                    <h3><strong><?=Yii::t('income', "Other Sources")?></strong></h3>
                                </div>
                            </div>
                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'RoyaltyIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'RoyaltyIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'RoyaltyIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'RoyaltyIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'SavingInstrumentInterestIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'SavingInstrumentInterestIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'SavingInstrumentInterestIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'SavingInstrumentInterestIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ExportCashSubsidyIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'ExportCashSubsidyIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'ExportCashSubsidyIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'ExportCashSubsidyIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'SavingAndFixedDepositInterestIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'SavingAndFixedDepositInterestIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'SavingAndFixedDepositInterestIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'SavingAndFixedDepositInterestIncome'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'LotteryIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'LotteryIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'LotteryIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'LotteryIncome'); ?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3" style="padding-left:5%;">
                                    <h3><strong><?=Yii::t('income', "Capital Gain")?></strong></h3>
                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'PropertySaleIncome', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'PropertySaleIncome_1', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'PropertySaleIncome', array('class' => 'form-control', 'onkeyup'=>'onValuePut(this)')); ?>
                                    <?php echo $form->error($model, 'PropertySaleIncome'); ?>

                                </div>
                            </div>


                           <!--  <div class="form-group"><?php //echo CHtml::activeLabelEx($model, 'Others', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <input value="" type="text" class="form-control" id="Others_1" name="IncomeTaxRebate[Others_1">
                                </div>
                                <div class="col-lg-3 "><?php //echo $form->textField($model, 'Others', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php //echo $form->error($model, 'Others'); ?>

                                </div>
                            </div> -->

                            <?php echo $form->hiddenField($model, 'EntryYear', array('value' => $this->taxYear())); ?>
                            <?php echo $form->hiddenField($model, 'CPIId', array('value' => Yii::app()->user->CPIId)); ?>
                            <div class="panel-footer">
                                <div class="pull-left" style="padding:0 10px;">
                                    <?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType' => 'submit',
	'type' => 'success',
	'label' => $model->isNewRecord ? Yii::t('income', "Create") : Yii::t('income', "Save"),
));?>

                                   </div>

                                   <div class="pull-left" style="padding:0 10px;">
                                    <a class="btn btn-success" href="<?=Yii::app()->baseUrl?>/index.php/income/entry#s_29" ><?=Yii::t('income', "Cancel")?> </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>




                <?php $this->endWidget();?>

            </fieldset>
        </section>
    </div>

</article>
<!-- /Data block -->
                    <!-- /Grid controls -->