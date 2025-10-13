<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-form',
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



<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeSalariesId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeSalariesId'); ?>
<?php echo $form->error($model,'IncomeSalariesId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'InterestOnSecurities',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'InterestOnSecurities'); ?>
<?php echo $form->error($model,'InterestOnSecurities'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomePropertiesId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomePropertiesId'); ?>
<?php echo $form->error($model,'IncomePropertiesId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeAgriculture',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeAgriculture'); ?>
<?php echo $form->error($model,'IncomeAgriculture'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeBusinessOrProfession',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeBusinessOrProfession'); ?>
<?php echo $form->error($model,'IncomeBusinessOrProfession'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeShareProfitId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeShareProfitId'); ?>
<?php echo $form->error($model,'IncomeShareProfitId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeSpouseOrChild',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeSpouseOrChild'); ?>
<?php echo $form->error($model,'IncomeSpouseOrChild'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CapitalGains',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CapitalGains'); ?>
<?php echo $form->error($model,'CapitalGains'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeOtherSourceId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeOtherSourceId'); ?>
<?php echo $form->error($model,'IncomeOtherSourceId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TotalOf2TO10',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TotalOf2TO10'); ?>
<?php echo $form->error($model,'TotalOf2TO10'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ForeignIncome',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'ForeignIncome'); ?>
<?php echo $form->error($model,'ForeignIncome'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TotalIncome',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TotalIncome'); ?>
<?php echo $form->error($model,'TotalIncome'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxLeviableOnTotalIncome',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TaxLeviableOnTotalIncome'); ?>
<?php echo $form->error($model,'TaxLeviableOnTotalIncome'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeTaxRebateId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeTaxRebateId'); ?>
<?php echo $form->error($model,'IncomeTaxRebateId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxPayable',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TaxPayable'); ?>
<?php echo $form->error($model,'TaxPayable'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'IncomeTaxPaymentId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'IncomeTaxPaymentId'); ?>
<?php echo $form->error($model,'IncomeTaxPaymentId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DifferenceBetweenPayableNPayment',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DifferenceBetweenPayableNPayment'); ?>
<?php echo $form->error($model,'DifferenceBetweenPayableNPayment'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxExempted',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TaxExempted'); ?>
<?php echo $form->error($model,'TaxExempted'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'LastYearPaidTax',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'LastYearPaidTax'); ?>
<?php echo $form->error($model,'LastYearPaidTax'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'OtherReceipts',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'OtherReceipts'); ?>
<?php echo $form->error($model,'OtherReceipts'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CerateAt',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CerateAt'); ?>
<?php echo $form->error($model,'CerateAt'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'LastUpdateAt',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'LastUpdateAt'); ?>
<?php echo $form->error($model,'LastUpdateAt'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CPIId',array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'CPIId'); ?>
<?php echo $form->error($model,'CPIId'); ?>

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