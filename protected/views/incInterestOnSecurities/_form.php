<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'inc-interest-on-securities-form',
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



<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeId'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeId'); ?>
<?php echo $form->error($model,'IncomeId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Type'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'Type',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'Type'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Description'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'Description'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'NetAmount'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'NetAmount'); ?>
<?php echo $form->error($model,'NetAmount'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CommissionOrInterest'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CommissionOrInterest'); ?>
<?php echo $form->error($model,'CommissionOrInterest'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Cost'); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'Cost'); ?>
<?php echo $form->error($model,'Cost'); ?>

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
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'EntryYear',array('size'=>9,'maxlength'=>9)); ?>
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