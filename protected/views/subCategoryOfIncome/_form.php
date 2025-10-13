<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sub-category-of-income-form',
	'enableAjaxValidation'=>false,
)); ?>

<!-- Data block -->
<article class="data-block">
    <div class="data-container">
        <section class="login-rt">
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>

                <fieldset class="form-horizontal wall" >


<?php
     $TypeOfIncomelist = CHtml::listData(TypeOfIncome::model()->findAll(array('order' => 'TypeName asc')), 'TypeOfIncomeId', 'TypeName');
?>
<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TypeOfIncomeId', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3">
<?php
echo $form->dropDownList($model, 'TypeOfIncomeId', $TypeOfIncomelist, array('empty' => '--Please Select--', 'class' => 'form-control'));
?>
<?php echo $form->error($model,'TypeOfIncomeId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'SubCatName', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textField($model,'SubCatName',array('maxlength'=>50, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'SubCatName'); ?>

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