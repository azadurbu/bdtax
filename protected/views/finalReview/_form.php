<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'liabilities-form',
	'enableAjaxValidation'=>false,
    )); ?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <section class="login-rt">
                <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                <?php $t = $form->errorSummary($model);
                if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
                <?php endif; ?>

                <fieldset class="form-horizontal " >



                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'MortgagesOnPropertyOrLand'); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'MortgagesOnPropertyOrLand'); ?>
                            <?php echo $form->error($model,'MortgagesOnPropertyOrLand'); ?>

                        </div></div>

                        <div class="form-group"><?php echo CHtml::activeLabelEx($model,'UnsecuredLoans'); ?>
                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'UnsecuredLoans'); ?>
                                <?php echo $form->error($model,'UnsecuredLoans'); ?>

                            </div></div>

                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'BankLoans'); ?>
                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'BankLoans'); ?>
                                    <?php echo $form->error($model,'BankLoans'); ?>

                                </div></div>

                                <div class="form-group"><?php echo CHtml::activeLabelEx($model,'OthersLoan'); ?>
                                    <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'OthersLoan'); ?>
                                        <?php echo $form->error($model,'OthersLoan'); ?>

                                    </div></div>

                                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'TotalLiabilities'); ?>
                                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TotalLiabilities'); ?>
                                            <?php echo $form->error($model,'TotalLiabilities'); ?>

                                        </div></div>

                                        <div class="form-group"><?php echo CHtml::activeLabelEx($model,'CerateAt'); ?>
                                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CerateAt'); ?>
                                                <?php echo $form->error($model,'CerateAt'); ?>

                                            </div></div>

                                            <div class="form-group"><?php echo CHtml::activeLabelEx($model,'LastUpdateAt'); ?>
                                                <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'LastUpdateAt'); ?>
                                                    <?php echo $form->error($model,'LastUpdateAt'); ?>

                                                </div></div>

                                                <div class="form-group"><?php echo CHtml::activeLabelEx($model,'CPIId'); ?>
                                                    <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CPIId'); ?>
                                                        <?php echo $form->error($model,'CPIId'); ?>

                                                    </div></div>

                                                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'EntryYear'); ?>
                                                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'EntryYear',array('size'=>4,'maxlength'=>4)); ?>
                                                            <?php echo $form->error($model,'EntryYear'); ?>

                                                        </div></div>

                                                        <div class="form-group"><?php echo CHtml::activeLabelEx($model,'trash'); ?>
                                                            <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'trash'); ?>
                                                                <?php echo $form->error($model,'trash'); ?>

                                                            </div></div>
                                                            <div class="form-actions">
                                                                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                 'buttonType'=>'submit',
                                                                 'type'=>'primary',
                                                                 'label'=>$model->isNewRecord ? 'Create' : 'Save',
                                                                 )); ?>
                                                             </div>

                                                             <?php $this->endWidget(); ?>

                                                         </fieldset>
                                                     </section>
                                                 </div>

                                             </article>
                                             <!-- /Data block -->
                    <!-- /Grid controls -->