<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sur-charge-form',
	'enableAjaxValidation'=>false,
)); ?>

<!-- Data block -->
<article class="data-block">
    <div class="data-container">
        <section class="login-rt">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>

                <fieldset class="form-horizontal well" >



<div class="form-group"><?php echo CHtml::activeLabelEx($model,'MinAmount', array('class'=>'col-sm-2')); ?>
<div class="col-sm-3 form-inline"><?php echo $form->textField($model,'MinAmount', array('class' => 'form-control')); ?>
<?php echo $form->error($model,'MinAmount'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'MaxAmount', array('class'=>'col-sm-2')); ?>
<div class="col-sm-3 form-inline"><?php echo $form->textField($model,'MaxAmount', array('class' => 'form-control')); ?>
<?php echo $form->error($model,'MaxAmount'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Percent', array('class'=>'col-sm-2')); ?>
<div class="col-sm-3 form-inline"><?php echo $form->textField($model,'Percent', array('class' => 'form-control')); ?>
<?php echo $form->error($model,'Percent'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'EntryYear', array('class'=>'col-sm-2')); ?>
<div class="col-sm-3 form-inline"><?php echo $form->textField($model,'EntryYear',array('size'=>9,'maxlength'=>9, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'EntryYear'); ?>

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