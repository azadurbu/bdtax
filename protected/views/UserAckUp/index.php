<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#User_mobile").mask("99999999999");

    });

</script>
<div class="registration">
    <h2>Acknowledgement Slip </h2>
<?php 
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'user-form',
                        'enableAjaxValidation' => false,
                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        'action'=>Yii::app()->createUrl('/user/admin/uploadMyDoc'),
                        ));

                ?>
                <input type="hidden" name="user_id" value="<?=Yii::app()->user->id?>">
                <div class="row">
                    <div class="col-lg-6 bs-common-example">
                        <label><?=Yii::t("dashboard","Tax Year")?> <span class="required">*</span><span id="tax_yearError" style="color:red"></span></label>
                        <?php echo $form->dropDownList($docModel, 'tax_year', CHtml::listData(TaxYears::model()->findAll(), 'tax_year', 'tax_year'), array('empty' => 'Choose Tax Year','class' => 'form-control',  'required' => "required")); ?>
                        <?php echo $form->error($docModel, 'tax_year'); ?> 
                        
                    </div>
                    <div class="col-lg-6 bs-common-example">
                        <label><?=Yii::t("user","Serial Number")?> <span class="required">*</span><span id="serial_numberError" style="color:red"></span></label>
                        <?php echo $form->textField($docModel, 'serial_number', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'required' => "required")); ?>
                        <?php echo $form->error($docModel, 'serial_number'); ?> 
                        
                    </div>

                    <div class="col-lg-6 bs-common-example">
                        <label><?=Yii::t("user","Date of Filing")?> <span class="required">*</span><span id="PDOBError" style="color:red"></span></label>
                        <?php echo $form->textField($docModel, 'date_uploaded', array('size' => 20, 'maxlength' => 255, 'id'=>'PDOB','readonly'=>'readonly' ,'class' => 'form-control', 'required' => "true")); ?>
                        <?php echo $form->error($docModel, 'date_uploaded'); ?>
                         
                        <?php echo $form->hiddenField($docModel, 'doc_name', array('size' => 20, 'maxlength' => 255, 'value'=>'AckSlip', 'type'=>'hidden', 'class' => 'form-control', 'required' => "required")); ?>
                        
                    </div>



                    <div class="col-lg-6 bs-common-example dropzone">
                        <label class="" ><?=Yii::t("user","Select Document")?> Image (png,jpg) only<span class="required">*</span><span id="fileError" style="color:red;margin-top: 70px;"></span></label><br/>
                        <label class="dropzone_label col-lg-12" for="uploadFile"><?=Yii::t("user","Click Or Drop the file here!!")?></label>
                        <input class="col-lg-12"  type="file" name="doc" required="required" id="uploadFile">

                        
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12 bs-common-example text-right">
                    
                    <button type="submit" class="btn btn-success" onclick="return validateFrom()" id="uploadBtn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?=Yii::t('user', 'Uploading')?>..."><?=Yii::t('user', 'Upload')?></button>


                        <?php // echo CHtml::submitButton(Yii::t('user', 'Upload'), array('class' => 'btn btn-success', 'id' => "uploadBtn", 'data-loading-text' => "<i class='fa fa-spinner fa-spin '></i> Please Wait...")); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
                <?php if($docs){?>
                <table id="my_doc_table" class="table table-bordred table-striped table-hove">
                                <thead>
                                    <tr>
                                        <th><?=Yii::t("dashboard","Tax Year")?></th>
                                        <th><?=Yii::t("user","Document Name")?></th>
                                        <th><?=Yii::t("user","Date of filing")?></th>
                                        <th><?=Yii::t("user","Serial Number")?></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($docs as $key => $doc) : ?>
                                        <tr>
                                            <td width="10%"><?=$doc->tax_year?></td>
                                            <td width="20%"><?=$doc->doc_name?></td>
                                            <td width="55%"><?=$doc->date_uploaded?></td>
                                            <td width="55%"><?=$doc->serial_number?></td>
                                            <td style="text-align: center;">
                                                <a title="" data-toggle="tooltip" href="<?=Yii::app()->createUrl("user/admin/downloadMyDoc/id/".$doc->id)?>" data-original-title="<?=Yii::t("user","Download Document")?>" target="_blank">
                                                    <i class="fa fa-download fa-lg"></i>
                                                </a>
                                                <?php
                                                 echo CHtml::link(
                                                     '<i class="fa fa-remove fa-lg"></i>',
                                                      array('user/admin/deleteMyDoc/id/'.$doc->id.'/type/5'),
                                                      array('confirm' => 'Are you sure you want to delete?', 'title'=>"", 'data-toggle'=>"tooltip", 'data-original-title'=>Yii::t("user","Delete Document"))
                                                 );
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    
                                    
                                </tbody>
                            </table>
                        <?php } ?>

</div>
<style type="text/css">
    .registration{padding: 5px;}
    .registration h2{font-size:26px;}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('#PDOB').datepicker({
        // format: 'mm/dd/yyyy',
        format: 'dd-mm-yyyy',
        autoclose: true,
        'endDate' : dateFormat(new Date(), "DD-MM-YYYY")
    }).on('changeDate', function() {
            // var datePattern = $('#sd').val();

        });

    if ( $("#PersonalInformation_ETIN").val() == "" ) {
        //$("#knowMeTab,#aboutLifeTab").hide();
    }

    
});

function dateFormat(date, format) {
        format = format.replace("DD", (date.getDate() < 10 ? '0' : '') + date.getDate());
        format = format.replace("MM", (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1));
        format = format.replace("YYYY", date.getFullYear());
        return format;
    }

    function validateFrom(){

        $('#PDOBError').html('');
        $('#fileError').html('');
        $('#serial_numberError').html('');
        $('#tax_yearError').html('');
        if($('#PDOB').val()==''){
            $('#PDOBError').html('Date of filing is required');
            
        }

        if($('#MyDocuments_tax_year').val()==''){
            $('#tax_yearError').html('Tax year is required');
            
        }

        if($('#MyDocuments_serial_number').val()==''){
            $('#serial_numberError').html('Serail Number is required');
            
        }

        if($('#uploadFile').val()==''){
            $('#fileError').html('File is required');
            
        }

        if($('#PDOB').val()=='' || $('#MyDocuments_tax_year').val()=='' || $('#MyDocuments_serial_number').val()=='' || $('#uploadFile').val()==''){
                return false;
        }

    }

</script>