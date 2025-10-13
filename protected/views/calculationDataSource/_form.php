<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'calculation-data-source-form',
    'htmlOptions'=>array(
                          'class'=>'subscribe_form',
                        ),
	//'enableAjaxValidation'=>true,
)); ?>


<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'ConveynceWaiverLevel'); ?>
            <?php echo $form->textField($model,'ConveynceWaiverLevel', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'ConveynceWaiverLevel'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'HouseRentWaiverPercent'); ?>
            <?php echo $form->textField($model,'HouseRentWaiverPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'HouseRentWaiverPercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'CommercialRentPercent'); ?>
            <?php echo $form->textField($model,'CommercialRentPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'CommercialRentPercent'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'HouseRentCompareValue'); ?>
            <?php echo $form->textField($model,'HouseRentCompareValue', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'HouseRentCompareValue'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'MedicalWaiverPercent'); ?>
            <?php echo $form->textField($model,'MedicalWaiverPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'MedicalWaiverPercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'MedicalCompareValue'); ?>
            <?php echo $form->textField($model,'MedicalCompareValue', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'MedicalCompareValue'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'ProvidentFoundInterest'); ?>
            <?php echo $form->textField($model,'ProvidentFoundInterest', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'ProvidentFoundInterest'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'ProvidentFoundportion'); ?>
            <?php echo $form->textField($model,'ProvidentFoundportion', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'ProvidentFoundportion'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'ResidentialRentPercent'); ?>
            <?php echo $form->textField($model,'ResidentialRentPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'ResidentialRentPercent'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'CommercialRentPercent'); ?>
            <?php echo $form->textField($model,'CommercialRentPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'CommercialRentPercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'NormalTaxWaiverAmount'); ?>
            <?php echo $form->textField($model,'NormalTaxWaiverAmount', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'NormalTaxWaiverAmount'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'FemaleTaxWaiverAmount'); ?>
            <?php echo $form->textField($model,'FemaleTaxWaiverAmount', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'FemaleTaxWaiverAmount'); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'DisableTaxWaiverAmount'); ?>
            <?php echo $form->textField($model,'DisableTaxWaiverAmount', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'DisableTaxWaiverAmount'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'FreedomFighterTaxWaiverAmount'); ?>
            <?php echo $form->textField($model,'FreedomFighterTaxWaiverAmount', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'FreedomFighterTaxWaiverAmount'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'AgricultureTaxWaiverAmount'); ?>
            <?php echo $form->textField($model,'AgricultureTaxWaiverAmount', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'AgricultureTaxWaiverAmount'); ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'NRBStatusPercent'); ?>
            <?php echo $form->textField($model,'NRBStatusPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'NRBStatusPercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'MaxInvestPercent'); ?>
            <?php echo $form->textField($model,'MaxInvestPercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'MaxInvestPercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'MaxDepositeValue'); ?>
            <?php echo $form->textField($model,'MaxDepositeValue', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'MaxDepositeValue'); ?>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'TaxRebatePercent'); ?>
            <?php echo $form->textField($model,'TaxRebatePercent', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'TaxRebatePercent'); ?>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <?php echo CHtml::activeLabelEx($model,'EntryYear'); ?>
            <?php echo $form->textField($model,'EntryYear', array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'EntryYear'); ?>
        </div>
    </div>
</div>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
