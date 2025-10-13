<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-tax-rebate-form',
	'enableAjaxValidation'=>false,
    )); ?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <section class="login-rt">
                <!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->
                <?php $t = $form->errorSummary($model);
                if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
                <?php endif; ?>

                <fieldset class="form-horizontal " >

                  <div class="row">
                    <div class="col-lg-8 ">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3><?=Yii::t('income',"Tax deductible investments information")?></h3>
                            </div>


                            <br/>



                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'LifeInsurancePremium', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'LifeInsurancePremium', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'LifeInsurancePremium'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'DeferredAnnuity', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'DeferredAnnuity', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'DeferredAnnuity'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'ProvidentFund', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'ProvidentFund', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'ProvidentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'SCECProvidentFund', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'SCECProvidentFund', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'SCECProvidentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'SuperAnnuationFund', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'SuperAnnuationFund', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'SuperAnnuationFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'InvestInStockOrShare', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'InvestInStockOrShare', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'InvestInStockOrShare'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'DepositPensionScheme', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'DepositPensionScheme', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'DepositPensionScheme'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'BenevolentFund', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'BenevolentFund', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'BenevolentFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'ZakatFund', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'ZakatFund', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'ZakatFund'); ?>

                                </div>
                            </div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'Others', array('class'=>'col-lg-6  control-label')); ?>
                                <div class="col-lg-4 "><?php echo $form->textField($model,'Others', array('class'=>'form-control',) ); ?>
                                    <?php echo $form->error($model,'Others'); ?>

                                </div>
                            </div>

                            <?php echo $form->hiddenField($model,'EntryYear',array('value'=>$this->taxYear() ) ); ?>
                            <?php echo $form->hiddenField($model,'CPIId',array('value'=>Yii::app()->user->CPIId ) ); ?>
                            <div class="panel-footer">
                                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                 'buttonType'=>'submit',
                                 'type'=>'success',
                                 'label'=>$model->isNewRecord ? Yii::t('income',"Create") : Yii::t('income',"Save"),
                                 )); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                 



                 <?php $this->endWidget(); ?>

             </fieldset>
         </section>
     </div>

 </article>
 <!-- /Data block -->
                    <!-- /Grid controls -->