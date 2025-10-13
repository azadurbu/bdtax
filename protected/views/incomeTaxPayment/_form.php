<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-tax-payment-form',
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

                                      <div class="row">
                        <div class="col-lg-7 ">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3>Tax payment details</h3>
                                </div>

               
<br/>



<div class="form-group"><?php echo CHtml::activeLabelEx($model,'DeductedAtSource',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'DeductedAtSource' ,array('class'=>'form-control')); ?>
<?php echo $form->error($model,'DeductedAtSource'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'AdvanceTax',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'AdvanceTax' ,array('class'=>'form-control')); ?>
<?php echo $form->error($model,'AdvanceTax'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TaxPaidOnReturn',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'TaxPaidOnReturn' ,array('class'=>'form-control')); ?>
<?php echo $form->error($model,'TaxPaidOnReturn'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'AdjustmentTaxRefund',array('class' => 'col-lg-5 control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
<div class="col-sm-5 col-sm-9 form-inline"><?php echo $form->textField($model,'AdjustmentTaxRefund' ,array('class'=>'form-control')); ?>
<?php echo $form->error($model,'AdjustmentTaxRefund'); ?>

</div></div>





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