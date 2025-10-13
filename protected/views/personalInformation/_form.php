<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'personal-information-form',
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

<!-- <div class="form-group"><label for="TestForm_textField" class="col-sm-3 control-label">Text input</label>
    <div class="col-sm-5 col-sm-9">
        <input type="text" id="TestForm_textField" name="TestForm[textField]" placeholder="Text input" class="form-control">
    <span class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</span>
</div></div> -->


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Name'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'Name'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ETIN'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'ETIN'); ?>
<?php echo $form->error($model,'ETIN'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'NationalId', array('maxlength'=> '17')); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'NationalId'); ?>
<?php echo $form->error($model,'NationalId'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxesCircle'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'TaxesCircle',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'TaxesCircle'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxesZone'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'TaxesZone',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'TaxesZone'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'AssesmentYearId'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'AssesmentYearId'); ?>
<?php echo $form->error($model,'AssesmentYearId'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ResidentialStatus'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'ResidentialStatus',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'ResidentialStatus'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Status'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'Status',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'Status'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'BusinessName'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'BusinessName',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'BusinessName'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'SpouseName'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'SpouseName',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'SpouseName'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'FathersName'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'FathersName',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'FathersName'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'MothersName'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'MothersName',array('size'=>60,'maxlength'=>80)); ?>
<?php echo $form->error($model,'MothersName'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DOB'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'DOB'); ?>
<?php echo $form->error($model,'DOB'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'PresentAddress'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textArea($model,'PresentAddress',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'PresentAddress'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'PermanentAddress'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textArea($model,'PermanentAddress',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'PermanentAddress'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'PhoneOffice'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'PhoneOffice',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PhoneOffice'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'PhoneBusiness'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'PhoneBusiness',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PhoneBusiness'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'PhoneResidential'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'PhoneResidential',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PhoneResidential'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'VatNumber'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'VatNumber'); ?>
<?php echo $form->error($model,'VatNumber'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'NoOfAdultInFamily'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'NoOfAdultInFamily'); ?>
<?php echo $form->error($model,'NoOfAdultInFamily'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'NoOfChildInFamily'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'NoOfChildInFamily'); ?>
<?php echo $form->error($model,'NoOfChildInFamily'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'UserId'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'UserId'); ?>
<?php echo $form->error($model,'UserId'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CreateAt'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'CreateAt'); ?>
<?php echo $form->error($model,'CreateAt'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'LastvisitAt'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'LastvisitAt'); ?>
<?php echo $form->error($model,'LastvisitAt'); ?>

</div></div>


<div class="form-group"><?php echo CHtml::activeLabelEx($model,'trash'); ?>
<div class="col-sm-5 col-sm-9"><?php echo $form->textField($model,'trash'); ?>
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