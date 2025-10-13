<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tax-zone-circle-form',
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

                <fieldset class="form-horizontal wall" >



<?php
     $TypeOfIncomelist = CHtml::listData(TypeOfIncome::model()->findAll(array('order' => 'TypeName asc')), 'TypeOfIncomeId', 'TypeName');
?>
<div class="form-group"><?php echo CHtml::activeLabelEx($model,'TypeOfIncomeId', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3">
<?php
echo $form->dropDownList($model, 'TypeOfIncomeId', $TypeOfIncomelist, array('empty' => '--Please Select--', 'class' => 'form-control', 'onchange' => 'getSubCat(this.value)'));
?>
<?php echo $form->error($model,'TypeOfIncomeId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'SubCatIncomeId', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->dropDownList($model, 'SubCatIncomeId', [], array('empty' => '--Please Select--', 'class' => 'form-control')); ?>
<?php echo $form->error($model,'SubCatIncomeId'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'EmployerName', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textField($model,'EmployerName',array('maxlength'=>250, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'EmployerName'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CircleCode', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textField($model,'CircleCode',array('maxlength'=>10, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'CircleCode'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CircleName', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textField($model,'CircleName',array('maxlength'=>250, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'CircleName'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'ZoneName', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textField($model,'ZoneName',array('maxlength'=>250, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'ZoneName'); ?>

</div></div>

<div class="form-group"><?php echo CHtml::activeLabelEx($model,'CircleAddress', array('class'=>'col-sm-3')); ?>
<div class="col-sm-3"><?php echo $form->textArea($model,'CircleAddress',array('rows'=>6, 'cols'=>50, 'class' => 'form-control')); ?>
<?php echo $form->error($model,'CircleAddress'); ?>

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
<script>
zone_url="<?php echo Yii::app()->request->baseUrl; ?>/index.php/taxZoneCircle/";
function getSubCat(value, edit="")
{
    $("#TaxZoneCircle_SubCatIncomeId").empty();
    $("#TaxZoneCircle_SubCatIncomeId").append($("<option />").val("").text("--Please Select--"));
    if(value == "") return false;

    $('#loading').css('display','block');
    $.ajax({
        url : zone_url+"getSubCat",
        type : "POST",
        dataType : "json",
        cache : false,
        data : {
            value : value,
        },
        success : function(data) {
            $.each(data, function(index, element) {
                $("#TaxZoneCircle_SubCatIncomeId").append($("<option />").val(element.SubCatIncomeId).text(element.SubCatName));
            });
            if(edit == "Yes")
            {
                $("#TaxZoneCircle_SubCatIncomeId").val(<?=$model->SubCatIncomeId?>);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            bootbox.alert("Internal problem has been occurred. Please try again.");
            $('#loading').css('display','none');
        },
        complete : function()
        {
            $('#loading').css('display','none');
        }
    });
}
</script>