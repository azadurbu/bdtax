<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-other-source-form',
	'enableAjaxValidation'=>false,
    )); ?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container well">
            <section class="login-rt">
                <p class="help-block">Fields with <span class="required">*</span> are required.</p>
                <?php $t = $form->errorSummary($model);
                if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
                <?php endif; ?>

                <fieldset class="form-horizontal " >


                      <div class="row">
                        <div class="col-lg-7 ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3>Other source income information</h3>
                                </div>

               
<br/>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'InterestIncome', array('class'=>'col-lg-5 control-label')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'InterestIncome', array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'InterestIncome'); ?>

                        </div>
                    </div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'DividendIncome', array('class'=>'col-lg-5 control-label')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DividendIncome', array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'DividendIncome'); ?>

                        </div>
                    </div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'WinningsIncome', array('class'=>'col-lg-5 control-label')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'WinningsIncome', array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'WinningsIncome'); ?>

                        </div>
                    </div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'OthersIncome', array('class'=>'col-lg-5 control-label')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'OthersIncome', array('class'=>'form-control')); ?>
                            <?php echo $form->error($model,'OthersIncome'); ?>

                        </div>
                    </div>


                    <?php echo $form->hiddenField($model,'EntryYear',array('value'=>$this->taxYear() ) ); ?>
                    <?php echo $form->hiddenField($model,'CPIId',array('value'=>Yii::app()->user->CPIId ) ); ?>

                    </div>
</div>
</div>
<hr>

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