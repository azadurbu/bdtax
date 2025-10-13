<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-salaries-form',
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



<div class="form-group"><?php echo CHtml::activeLabelEx($model,'BasicPay',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'BasicPay'); ?>
<?php echo $form->error($model,'BasicPay'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'SpecialPay',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'SpecialPay'); ?>
<?php echo $form->error($model,'SpecialPay'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DearnessAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DearnessAllowance'); ?>
<?php echo $form->error($model,'DearnessAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ConveyanceAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'ConveyanceAllowance'); ?>
<?php echo $form->error($model,'ConveyanceAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'HouseRentAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'HouseRentAllowance'); ?>
<?php echo $form->error($model,'HouseRentAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'MedicalAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'MedicalAllowance'); ?>
<?php echo $form->error($model,'MedicalAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ServantAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'ServantAllowance'); ?>
<?php echo $form->error($model,'ServantAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'LeaveAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'LeaveAllowance'); ?>
<?php echo $form->error($model,'LeaveAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'HonorariumOrReward',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'HonorariumOrReward'); ?>
<?php echo $form->error($model,'HonorariumOrReward'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'OvertimeAllowance',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'OvertimeAllowance'); ?>
<?php echo $form->error($model,'OvertimeAllowance'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Bonus',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'Bonus'); ?>
<?php echo $form->error($model,'Bonus'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'OtherAllowances',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'OtherAllowances'); ?>
<?php echo $form->error($model,'OtherAllowances'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'EmployersContributionProvidentFund',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'EmployersContributionProvidentFund'); ?>
<?php echo $form->error($model,'EmployersContributionProvidentFund'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'InterestAccruedProvidentFund',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'InterestAccruedProvidentFund'); ?>
<?php echo $form->error($model,'InterestAccruedProvidentFund'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DeemedIncomeTransport',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DeemedIncomeTransport'); ?>
<?php echo $form->error($model,'DeemedIncomeTransport'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DeemedFreeAccommodation',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DeemedFreeAccommodation'); ?>
<?php echo $form->error($model,'DeemedFreeAccommodation'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'Others',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'Others'); ?>
<?php echo $form->error($model,'Others'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'NetTaxableIncome',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'NetTaxableIncome'); ?>
<?php echo $form->error($model,'NetTaxableIncome'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CPIId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CPIId'); ?>
<?php echo $form->error($model,'CPIId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DOB',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DOB'); ?>
<?php echo $form->error($model,'DOB'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CreateAt',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CreateAt'); ?>
<?php echo $form->error($model,'CreateAt'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'LastvisitAt',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'LastvisitAt'); ?>
<?php echo $form->error($model,'LastvisitAt'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'EntryYear',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'EntryYear',array('size'=>4,'maxlength'=>4)); ?>
<?php echo $form->error($model,'EntryYear'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'trash',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
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