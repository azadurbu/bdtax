<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-share-profit-form',
	'enableAjaxValidation'=>false,
    )); ?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <section class="well">
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
                                    <h3>Shared firm profit information</h3>
                                </div>

               
<br/>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'NameOfFirm',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'NameOfFirm', array('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"netShareByPercent()" )); ?>
                            <?php echo $form->error($model,'NameOfFirm'); ?>

                        </div>
                    </div>
                                        <div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeOfFirm',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeOfFirm', array('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"netShareByPercent()" )); ?>
                            <?php echo $form->error($model,'IncomeOfFirm'); ?>

                        </div>
                    </div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'ShareOfFirm',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'ShareOfFirm', array('class'=>'form-control' ,  'autocomplete'=>"off", 'onkeyup'=>"netShareByPercent()"  ));  ?> <div class="label label-primary" style="font-size:18px;">%</div>
                            <?php echo $form->error($model,'ShareOfFirm'); ?>

                        </div>
                    </div>

                    <div class="form-group"><?php echo CHtml::activeLabelEx($model,'NetValueOfShare',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                        <div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'NetValueOfShare', array('class'=>'form-control', 'readonly'=>'readonly')); ?>
                            <?php echo $form->error($model,'NetValueOfShare'); ?>

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