<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'income-tax-rebate-form',
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
                                <div class="col-lg-offset-1 col-lg-3">
                                    <label><?=Yii::t('income',"Amount (BDT)")?></label>
                                </div>
                                <div class="col-lg-3">
                                    <label><?=Yii::t('income',"Allowed (BDT)")?></label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-5">
                                    
                                    <?php echo CHtml::activeLabelEx($model, 'LifeInsurancePremium', array('class' => 'col-lg-12 control-label')); ?>
                                    <p class="LifeInsurancePremium-income" style="color:red;font-size: 12px;padding-right:15px;display: none;text-align: right;">Please enter this amount to Asset->Investments page.</p>
                                    <br/>
                                    <br/>
                                    <!-- <div class="col-lg-offset-4 col-lg-5"> -->
                                    <label class="col-lg-offset-2 col-lg-4 pull-left"><?=Yii::t('income',"Policy Value")?></label>
                                    <!-- </div> -->
                                    <div class="col-lg-6">
                                        <?php echo $form->textField($model, 'PolicyValue', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'LifeInsurancePremium_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','onclick'=>'showwarning("LifeInsurancePremium-income")','onblur'=>'hidewarning("LifeInsurancePremium-income")' )); ?>
                                </div>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'LifeInsurancePremium', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'LifeInsurancePremium'); ?>
                                </div>
                            </div>

                            <!-- <div class="form-group"><?php //echo CHtml::activeLabelEx($model, 'DeferredAnnuity', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <input value="" type="text" class="form-control" id="DeferredAnnuity_1" name="DeferredAnnuity_1">
                                </div>
                                <div class="col-lg-3 "><?php //echo $form->textField($model, 'DeferredAnnuity', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php //echo $form->error($model, 'DeferredAnnuity'); ?>

                                </div>
                            </div> -->

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ProvidentFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'ProvidentFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 ">
                                <?php echo $form->textField($model, 'ProvidentFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ProvidentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'SCECProvidentFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'SCECProvidentFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'SCECProvidentFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'SCECProvidentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'SuperAnnuationFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'SuperAnnuationFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'SuperAnnuationFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'SuperAnnuationFund'); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-lg-5">
                                <?php echo CHtml::activeLabelEx($model, 'InvestInStockOrShare', array('class' => 'col-lg-12  control-label')); ?>
                            <p class="InvestInStockOrShare-income" style="color:red;font-size: 12px;padding-right:15px;text-align: right;display: none;">Please enter this amount to Asset->Investments page.</p>
                              </div>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'InvestInStockOrShare_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','onclick'=>'showwarning("InvestInStockOrShare-income")','onblur'=>'hidewarning("InvestInStockOrShare-income")' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'InvestInStockOrShare', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'InvestInStockOrShare'); ?>

                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-lg-5">
                                <?php echo CHtml::activeLabelEx($model, 'DepositPensionScheme', array('class' => 'col-lg-12  control-label')); ?>
                                <p class="DepositPensionScheme-income" style="color:red;font-size: 12px;padding-right:15px;text-align: right;display: none;">Please enter this amount to Asset->Investments page.</p>
                                </div>

                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DepositPensionScheme_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','onclick'=>'showwarning("DepositPensionScheme-income")','onblur'=>'hidewarning("DepositPensionScheme-income")'  )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DepositPensionScheme', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DepositPensionScheme'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'BenevolentFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'BenevolentFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'BenevolentFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'BenevolentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ZakatFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ZakatFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ZakatFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ZakatFund'); ?>

                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-lg-5 ">
                                <?php echo CHtml::activeLabelEx($model, 'SavingsCertificates', array('class' => 'col-lg-12  control-label')); ?>
                                <p class="SavingsCertificates-income" style="color:red;font-size: 12px;padding-right:15px;text-align: right;display: none;">Please enter this amount to Asset->Investments page.</p>
                            </div>
                                <div class="col-lg-3 ">
                                    <?php echo $form->textField($model, 'SavingsCertificates_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','onclick'=>'showwarning("SavingsCertificates-income")','onblur'=>'hidewarning("SavingsCertificates-income")' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'SavingsCertificates', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'SavingsCertificates'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'BangladeshGovtTreasuryBond', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'BangladeshGovtTreasuryBond_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'BangladeshGovtTreasuryBond', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'BangladeshGovtTreasuryBond'); ?>

                                </div>
                            </div>

                             <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DonationNLInstitutionFON', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DonationNLInstitutionFON_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DonationNLInstitutionFON', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DonationNLInstitutionFON'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DonationCharityHospitalNBR', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DonationCharityHospitalNBR_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DonationCharityHospitalNBR', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DonationCharityHospitalNBR'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DonationOrganizationRetardPeople', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DonationOrganizationRetardPeople_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DonationOrganizationRetardPeople', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DonationOrganizationRetardPeople'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContributionNLInstituionLW', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ContributionNLInstituionLW_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ContributionNLInstituionLW', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ContributionNLInstituionLW'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContributionLiberationWarMuseum', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ContributionLiberationWarMuseum_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ContributionLiberationWarMuseum', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ContributionLiberationWarMuseum'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContributionAgaKhanDN', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ContributionAgaKhanDN_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ContributionAgaKhanDN', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ContributionAgaKhanDN'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContributionAsiaticSocietyBd', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ContributionAsiaticSocietyBd_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ContributionAsiaticSocietyBd', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ContributionAsiaticSocietyBd'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DonationICDDRB', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DonationICDDRB_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DonationICDDRB', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DonationICDDRB'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DotationCRP', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DotationCRP_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DotationCRP', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DotationCRP'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'DonationEduInstitutionGov', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'DonationEduInstitutionGov_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'DonationEduInstitutionGov', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'DonationEduInstitutionGov'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'ContributionAhsaniaMissionCancerHospital', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'ContributionAhsaniaMissionCancerHospital_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'ContributionAhsaniaMissionCancerHospital', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'ContributionAhsaniaMissionCancerHospital'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'MutualFund', array('class' => 'col-lg-5  control-label')); ?>
                                <div class="col-lg-3 ">

                                    <?php echo $form->textField($model, 'MutualFund_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); ?>
                                </div>
                                <div class="col-lg-3 "><?php echo $form->textField($model, 'MutualFund', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'MutualFund'); ?>

                                </div>
                            </div>
                            
                            <!-- <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'Computer', array('class' => 'col-lg-5  control-label')); ?>
                                <i style="float: left" class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.21")?>"></i>
                                <div class="col-lg-3 "> -->

                                    <?php
                                    if($model->Laptop_1!=null){
                                        echo $form->hiddenField($model, 'Computer_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','readonly'=>true )); 
                                    }else{
                                        echo $form->hiddenField($model, 'Computer_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); 
                                    }
                                    ?>
                                <!-- </div>
                                <div class="col-lg-3 "> --><?php echo $form->hiddenField($model, 'Computer', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <?php echo $form->error($model, 'Computer'); ?>

                                <!-- </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model, 'Laptop', array('class' => 'col-lg-5  control-label')); ?> -->
                                <!-- <i style="float: left" class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.22")?>"></i>
                                <div class="col-lg-3 "> -->

                                    <?php 
                                    if($model->Computer_1==null){
                                        echo $form->hiddenField($model, 'Laptop_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)' )); 
                                    }else{
                                        echo $form->hiddenField($model, 'Laptop_1', array('class' => 'form-control','onkeyup'=>'onValuePutRebate(this)','readonly'=>true )); 
                                    }

                                    ?>
                                <!-- </div>
                                <div class="col-lg-3 "> --><?php echo $form->hiddenField($model, 'Laptop', array('class' => 'form-control', 'readonly'=>true)); ?>
                                    <!-- <?php echo $form->error($model, 'Laptop'); ?>

                                </div>
                            </div> -->




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
                                    <a class="btn btn-success" href="<?=Yii::app()->baseUrl?>/index.php/income/entry#s_25" ><?=Yii::t('income', "Cancel")?> </a>
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

<script type="text/javascript">
    function showwarning(ob){
        
        $('.'+ob).show();

    }
    function hidewarning(ob){
        $('.'+ob).hide();

    }
</script>