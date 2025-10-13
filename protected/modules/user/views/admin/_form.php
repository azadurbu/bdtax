<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#User_mobile").mask("99999999999");

    });

</script>

<script type="text/javascript">
function onlyAlphabets(evt)
{
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  // if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
  if ((charCode >= 65 && charCode<=90) || (charCode>=97 && charCode<=122) || charCode==32 || charCode==08){
      return true;
  }
 return false;

}


</script>
<!-- Dialog show event handler -->

<script type="text/javascript">

    function delete_user_account() {

        bootbox.confirm({
            message: "If you delete your account, all your data will be lost and can not be recovered. Are you sure you want to delete your account?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {

                    $('#loading').css('display','block');
                    if(result)
                    {
                        $.ajax({
                            url : "<?=Yii::app()->createUrl("user/admin/destroy/",array("id"=>Yii::app()->user->id))?>",
                            type : "POST",
                            dataType : "json",
                            cache : false,
                            success : function(data) {
                                location.reload();
                            },
                            error : function(XMLHttpRequest, textStatus, errorThrown) {
                                location.reload();
                            },
                            complete : function()
                            {
                                $('#loading').css('display','none');
                            }
                        });
                    }



            }
        });

    }




</script>

<div class="nav-tabs-sticky-pi margin_bottom common-padding sticky-min-height3">


    <div role="tabpanel" id="liabilities_tab">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTab">
            <?php if($model->isNewRecord) { ?>
                <li role="presentation" class="active"  id="profileTab"><a href="#profile" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t('user', "New User")?></a></li>
            <?php } else { ?>
                <li role="presentation" class="active"  id="profileTab"><a href="#profile" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"><?=Yii::t('user', "My Profile")?></a></li>
            <?php //if($model->id === Yii::app()->user->id){ ?>
                <li role="presentation" id="updatePassTab"><a href="#updatePass" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"> <?=Yii::t('user', "Change Password")?> </a></li>
            

            <?php if(Yii::app()->user->role == 'customers') { ?>
                <li role="presentation"  id="pdfTab"><a href="#pdf" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"> <?=Yii::t('user', "My Downloads")?> </a></li>
            <?php } ?>
            
            <?php if( Yii::app()->user->role == 'customers' || (Yii::app()->user->role == 'superAdmin' && $model->role_id == 2) ) { ?>
                <li role="presentation"  id="paymentTab"><a href="#myPayment" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"> <?=Yii::t('user', "My Payment")?> </a></li>

                <li role="presentation"  id="giftVoucherTab"><a href="#giftVoucher" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"> <?=Yii::t('user', "Gift Voucher")?> </a></li>
            <?php } ?>

            <?php if( in_array(Yii::app()->user->role, ['customers']) ) { ?>
                <li role="presentation"><a href="#myDocs" role="tab" data-toggle="tab" title="<?=Yii::t('TTips', "")?>"> <?=Yii::t('user', "My Documents")?> </a></li>
            <?php } ?>
            
        <?php } ?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            
            <!-- #################------------PROFILE--------START----------################ -->
            <div role="tabpanel" class="tab-pane active" id="profile">

                <?php

                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));

                ?>
                <!--***********************************************************************************************************-->
                <?php if($model->isNewRecord) { ?>
                <h2><?=Yii::t("user","Add User")?>&nbsp;&nbsp;</h2>                                   
                <?php } else { ?>
                <h2><?=Yii::t("user","My Profile")?>&nbsp;&nbsp;</h2>
                <?php } ?>
                <br>
                <div class="clearfix"></div>

                <p class="note"><?php echo Yii::t('user','Fields with <span class="required">*</span> are required.'); ?></p>

                <?php
                //$t = CHtml::errorSummary($model);
                //if (!empty($t)):
                    ?>
                <!-- <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo CHtml::errorSummary($model); ?></div> -->
                <?php //endif; ?>

                <div class="row">
                    <div class="col-lg-4"><!-- First column END -->

                        <fieldset class="form-horizontal " >

                            <div class="control-group ">
                                <!--<label>First Name <span class="required">*</span></label>--><?php echo $form->labelEx($model, 'first_name', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo $form->textField($model, 'first_name', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'data-mask' => '999-99-999-9999-9','tabindex'=> '1','onkeypress' => 'return onlyAlphabets(event)')); ?>
                                    <?php echo $form->error($model, 'first_name'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'last_name', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="form-controls">
                                    <?php echo $form->textField($model, 'last_name', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'data-mask' => '999-99-999-9999-9','tabindex'=> '2','onkeypress' => 'return onlyAlphabets(event)')); ?>
                                    <?php echo $form->error($model, 'last_name'); ?>
                                </div>
                            </div>


                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'email', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo $form->textField($model, 'email', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'data-mask' => '999-99-999-9999-9','tabindex'=> '3','readonly'=>'true')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>


                            


                           </fieldset>

                       </div> <!--col-lg-4--><!-- First column END -->

                       <div class="col-lg-4"><!-- 2nd column START -->

                        <fieldset class="form-horizontal " >

                            <div class="control-group ">
                                <!--<label>First Name <span class="required">*</span></label>--><?php echo $form->labelEx($model, 'middle_name', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo $form->textField($model, 'middle_name', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'data-mask' => '999-99-999-9999-9','tabindex'=> '1','onkeypress' => 'return onlyAlphabets(event)')); ?>
                                    <?php echo $form->error($model, 'middle_name'); ?>
                                </div>
                            </div>

                            


                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'mobile', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="form-controls">
                                    <?php echo $form->textField($model, 'mobile', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'data-mask' => '999-99-999-9999-9','tabindex'=> '2')); ?>
                                    <?php echo $form->error($model, 'mobile'); ?>
                                </div>
                            </div>

                            <?php 

                            //------------------------role------------------------------------//

                            $data=CHtml::listData(Role::model()->findAll(), 'id', 'role');
                            $data_admin=array_slice(CHtml::listData(Role::model()->findAll(), 'id', 'role'),2, NULL, true);
                            foreach ($data_admin as $key => $value) {
                                if ($value == "superAdmin") $data_admin[$key] = "Super Admin";
                                if ($value == "customers") $data_admin[$key] = "Customers";
                                if ($value == "companyAdmin") $data_admin[$key] = "Company Admin";
                                if ($value == "companyUser") $data_admin[$key] = "Company User";
                            }
                     

                            //------------------------role------------------------------------//

                            ?>

                            <?php if (Yii::app()->user->role == 'superAdmin') { ?>
                                <div class="control-group">
                                    <?php echo CHtml::activeLabelEx($model, 'role_id', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                        <?php echo $form->dropDownList($model, 'role_id', array(1 => 'Super Admin'), array('empty' => 'Choose Role','class' => 'form-control')); ?>
                                        
                                        <?php echo $form->error($model, 'role_id'); ?> 
                                    </div>
                                </div>

                                <?php } else if((Yii::app()->user->role == 'companyAdmin')) { ?>
                                <div class="control-group">
                                    <?php echo CHtml::activeLabelEx($model, 'role_id', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                       
                                       <?php echo $form->dropDownList($model, 'role_id', $data_admin, array('class'=>'form-control')); ?>
                                       <?php echo $form->error($model, 'role_id'); ?> 
                                   </div>
                               </div>

                               <?php } ?>

                          


                            </fieldset>

                        </div> <!--col-lg-4--><!-- 2nd column END -->

                    </div> <!--row-->

                    <br />
                    <div class="row" style="">
                        <div class="col-lg-4 buttons">
                            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('user','Create') : Yii::t('user','Save'), array('class' => 'btn btn-danger btn-large')); ?>


                        </div>

                        <?php
                        if($model->org_id==null)
                        {

                            ?>


                        <!-- <div class="col-lg-8 buttons">
                            <button type="button" class="btn btn-danger btn-large pull-right" style="margin-right: 35px;" onclick="delete_user_account()" type="button"><?php //echo Yii::t('user','Delete My Account')  ?></button>
                        
                        </div> -->
                            <?php
                        }
                        ?>

                    </div> <!--row-->





                    <?php $this->endWidget(); ?>


                <div class="col-lg-4 buttons">



                </div>

            </div>

            <!-- #################------------CHANGE PASSWORD--------START----------################ -->
            <?php if($changePass!==null){ ?>
            <div role="tabpanel" class="tab-pane " id="updatePass">
                <?php
                // var_dump(de($model->password));die;
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'chnage-password-form',
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'action'=>Yii::app()->createUrl('/user/admin/PassChange'),
                    'htmlOptions' => array('enctype' => 'multipart/form-data',
                                            'name'=>'changePassword'),
                    'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                    ));
                ?>
                <h2> <?=Yii::t('p_info', "Change Password")?>&nbsp;&nbsp;</h2>
                <div class="row">
                    <div class="col-lg-4"><!-- First column END -->

                        <fieldset class="form-horizontal " >

                            <!-- <div class="control-group ">
                                <?php //echo $form->labelEx($changePass, 'oldPassword', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php //echo $form->passwordField($changePass, 'oldPassword', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'tabindex'=> '1')); ?>
                                    <?php //echo $form->error($changePass, 'oldPassword'); ?>
                                </div>
                            </div> -->
                            <?php echo $form->hiddenField($model, 'id', array('class' => 'form-control')); ?>

                            <div class="control-group ">
                                <?php echo $form->labelEx($changePass, 'password', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="form-controls">
                                    <?php echo $form->passwordField($changePass, 'password', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'tabindex'=> '2')); ?><span id="result" class="label label-warning" ></span>
                                    <div class="log " style="color:red; display:none;">
                                        <div class="a-z sublog" >Please add a lowercase letter (abcdefghijklmnopqrstuvwxyz)<br></div>
                                        <div class="cap_a sublog">Please add an uppercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)<br></div>
                                        <div class="num sublog">Please add a number (0123456789)<br></div>
                                        <div class="symbol sublog">Please add a symbol (`~!@#$%^&*()_+-={}|[]\;:",./<>?')<br></div>
                                        <div class="more8 sublog">New password was less than 8 characters <br></div>
                                    </div>
                                    <?php echo $form->error($changePass, 'password'); ?>
                                </div>
                            </div>


                            <div class="control-group ">
                                <?php echo $form->labelEx($changePass, 'verifyPassword', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo $form->passwordField($changePass, 'verifyPassword', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'tabindex'=> '3')); ?>
                                    <?php echo $form->error($changePass, 'verifyPassword'); ?>
                                </div>
                            </div>

                            <br />
                            <div class="row" style="">
                                <div class="col-lg-4 buttons">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('user','Create') : Yii::t('user','Save'), array('class' => 'btn btn-danger btn-large')); ?>
                                </div>
                            </div> <!--row-->
                            


                        </fieldset>

                    </div> <!--col-lg-4--><!-- First column END -->
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <?php } ?>

            <!-- #################------------DOWNLOAD PDF--------START----------################ -->
            <div role="tabpanel" class="tab-pane" id="pdf">

                <div class="row">
                    <div class="col-lg-12 center">
                        <h2><?=Yii::t("user","Download Tax Return Form")?>&nbsp;&nbsp;</h2>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2" style="padding-top: 6px;">
                        <b><?=Yii::t("user","Download PDF of")?>&nbsp;&nbsp;</b>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-control" name="tax_year" id="tax_year">
                           <?php for($i=2020;$i<date('Y');$i++){?>   
                                <option value="<?php echo $i; ?>"><?php echo $i; ?>-<?php echo ($i+1); ?></option>
                           <?php } ?>
                        </select>
                        <?php //CHtml::dropDownList('tax_year', $this->taxYear(), CHtml::listData(TaxYears::model()->findAll(), 'tax_year', 'tax_year'), array('class' => 'form-control')); ?>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-success btn-large" onClick="downloadPDF('<?=Yii::app()->user->CPIId?>')"><?=Yii::t("user","Download")?>&nbsp;&nbsp;</button>
                    </div>
                </div>
                <br><br>

            </div>

            <!-- ################# PAYMENT START ################ -->
            <div role="tabpanel" class="tab-pane" id="myPayment">

                <div class="row">
                    <div class="col-lg-12 center">
                        <h2><?=Yii::t("payment","Payment Status")?>&nbsp;&nbsp;</h2>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding-top: 6px;">
                        <div class="table-responsive payment-status">
                            <table class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th><?=Yii::t("payment","Status")?></th>
                                        <th><?=Yii::t("payment","Transaction Date")?></th>
                                        <th><?=Yii::t("dashboard","Tax Year")?></th>
                                        <th><?=Yii::t("payment","Transaction ID")?></th>
                                        <th><?=Yii::t("payment","Amount")?></th>
                                        <th><?=Yii::t("payment","Card Type")?></th>
                                        <th><?=Yii::t("payment","Card Issuer")?></th>
                                        <th><?=Yii::t("payment","Bank Transaction ID")?></th>
                                        <th><?=Yii::t("payment","Error")?></th>
                                       
                                      
                                          
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    if ( !isset($payments) ) $payments = [];
                                    
                                    foreach ($payments as $key => $payment) {
                                ?>
                                    <tr>
                                        <th><?=$payment->status?></th>
                                        <td><?=date("d/m/Y h:i A",strtotime($payment->tran_date))?></td>
                                        <td><?=$payment->payment_year?></td>
                                        <td><?=$payment->tran_id?></td>
                                        <td><?=$payment->amount?></td>
                                        <td><?=$payment->card_type?></td>
                                        <td><?=$payment->card_issuer?></td>
                                        <td><?=$payment->bank_tran_id?></td>
                                        <td><?=($payment->error != "") ? $payment->error : "&nbsp;" ?></td>
                                        
                                    </tr>
                                <?php
                                    } 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <br><br>

            </div>
            <!-- ################# PAYMENT ENDS ################ -->
            

            <!-- ################# gift Voucher START ################ -->
            <div role="tabpanel" class="tab-pane" id="giftVoucher">

                <div class="row">
                    <div class="col-lg-12 center">
                        <h2><?=Yii::t("payment","Gift Voucher")?>&nbsp;&nbsp;</h2>
                    </div>
                </div>

                <?php if ($voucher != null) : ?>
                <div class="row">
                    <div class="col-lg-6">

                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">
                                <tbody>
                                    <tr>
                                        <th>Voucher Code</th>
                                        <td><?=$voucher->voucher_code?></td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>
                                            <?php
                                                if ($voucher->discount_type == "PERCENT")
                                                    echo $voucher->discount_value . "%";
                                                else 
                                                    echo $voucher->discount_value . " Tk.";

                                            ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <?php if (Yii::app()->user->role == 'superAdmin') : ?>
                                <p>No voucher code found</p>
                            <?php else : ?>
                                <p><?=Yii::t("payment","Please enter your gift voucher code")?></p>
                            <input type="text" id="giftVoucherCode" class="form-control"> 
                            <br>
                            <button type="button" class="btn btn-success btn-large" onClick="submitVoucherCode('null')"> <?=Yii::t("user"," Redeem")?> </button>
                        
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- ################# gift Voucher ENDS ################ -->

            <!-- ################# My Document START ################ -->
            <div role="tabpanel" class="tab-pane" id="myDocs">

                <div class="row">
                    <div class="col-lg-12 center my-document-profile">
                        <h2 style="padding-bottom: 0px;"><?=Yii::t("user","My Documents")?>&nbsp;&nbsp;</h2>
                   
                            Please 
                            <a data-toggle="modal" data-target="#requiredDocuments" href="#" target="_blank" style="color: #D9534F; font-size: 16px;">
                                <b>click here</b>
                            </a>
                            to see which documents should be uploaded here for your tax preparation. Allowed file types: JPG, PNG, Word, Excel, PDF
                     
                    </div>
                </div>
                <br />
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
                        <label><?=Yii::t("dashboard","Tax Year")?> <span class="required">*</span></label>
                        <?php echo $form->dropDownList($docModel, 'tax_year', CHtml::listData(TaxYears::model()->findAll(), 'tax_year', 'tax_year'), array('empty' => 'Choose Tax Year','class' => 'form-control',  'required' => "required")); ?>
                        <?php echo $form->error($docModel, 'tax_year'); ?> 
                    </div>
                    <div class="col-lg-6 bs-common-example">
                        <label><?=Yii::t("user","Document Name")?> <span class="required">*</span></label>
                        <?php echo $form->textField($docModel, 'doc_name', array('size' => 20, 'maxlength' => 255, 'class' => 'form-control', 'required' => "required")); ?>
                        <?php echo $form->error($docModel, 'doc_name'); ?> 
                    </div>
                       
                     <div class="col-lg-6 bs-common-example note-height">
                        <label><?=Yii::t("user","Notes")?></label>
                        <?php echo $form->textArea($docModel, 'notes', array('maxlength' => 500, 'class' => 'form-control')); ?>
                        <?php echo $form->error($docModel, 'notes'); ?> 
                    </div>

                    <div class="col-lg-6 bs-common-example dropzone">
                        <label class="" ><?=Yii::t("user","Select Document")?> <span class="required">*</span></label><br/>
                        <label class="dropzone_label col-lg-12" for="uploadFile"><?=Yii::t("user","Click Or Drop the file here!!")?></label>
                        <input class="col-lg-12"  type="file" name="doc" required="required" id="uploadFile">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12 bs-common-example text-right">
                    
                    <button type="submit" class="btn btn-success" id="uploadBtn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?=Yii::t('user', 'Uploading')?>..."><?=Yii::t('user', 'Upload')?></button>


                        <?php // echo CHtml::submitButton(Yii::t('user', 'Upload'), array('class' => 'btn btn-success', 'id' => "uploadBtn", 'data-loading-text' => "<i class='fa fa-spinner fa-spin '></i> Please Wait...")); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
                

                <hr>
                <div class="row">
                    <div class="col-lg-12">
						<div class="payment-status-document bs-common-example">
                            <table id="my_doc_table" class="table table-bordred table-striped table-hove">
                                <thead>
                                    <tr>
                                        <th><?=Yii::t("dashboard","Tax Year")?></th>
                                        <th><?=Yii::t("user","Document Name")?></th>
                                        <th><?=Yii::t("user","Notes")?></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($docs as $key => $doc) : ?>
                                        <tr>
                                            <td width="10%"><?=$doc->tax_year?></td>
                                            <td width="20%"><?=$doc->doc_name?></td>
                                            <td width="55%"><?=$doc->notes?></td>
                                            <td style="text-align: center;">
                                                <a title="" data-toggle="tooltip" href="<?=Yii::app()->createUrl("user/admin/downloadMyDoc/id/".$doc->id)?>" data-original-title="<?=Yii::t("user","Download Document")?>" target="_blank">
                                                    <i class="fa fa-download fa-lg"></i>
                                                </a>
                                                <?php
                                                 echo CHtml::link(
                                                     '<i class="fa fa-remove fa-lg"></i>',
                                                      array('admin/deleteMyDoc','id'=>$doc->id),
                                                      array('confirm' => 'Are you sure you want to delete?', 'title'=>"", 'data-toggle'=>"tooltip", 'data-original-title'=>Yii::t("user","Delete Document"))
                                                 );
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                     if(isset($userdocs)&&$userdocs):
                                     foreach ($userdocs as $udoc) : ?>
                                        <tr>
                                            <td width="10%"><?=$udoc['tax_year']?></td>
                                            <td width="20%"><?=$udoc['title']?></td>
                                            <td width="55%"></td>
                                            <td style="text-align: center;">
                                                <a title="" data-toggle="tooltip" href="<?=Yii::app()->createUrl("user/admin/downloadMyDoc/id/".$udoc['fileid']."/type/2")?>" data-original-title="<?=Yii::t("user","Download Document")?>" target="_blank">
                                                    <i class="fa fa-download fa-lg"></i>
                                                </a>
                                                <?php
                                                if($udoc['order_status']==8){
                                                     echo CHtml::link(
                                                         '<i class="fa fa-remove fa-lg"></i>',
                                                          array('admin/deleteMyDoc','id'=>$udoc['fileid'],'type'=>'2'),
                                                          array('confirm' => 'Are you sure you want to delete?', 'title'=>"", 'data-toggle'=>"tooltip", 'data-original-title'=>Yii::t("user","Delete Document"))
                                                     );
                                                 }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                    endif; ?>
                                    <?php if(isset($userack) && $userack):
                                    foreach ($userack as $uack) : ?>
                                        <tr>
                                            <td width="10%"><?=$uack['tax_year']?></td>
                                            <td width="20%">Acknowledgement Slip</td>
                                            <td width="55%"></td>
                                            <td style="text-align: center;">
                                                <a title="" data-toggle="tooltip" href="<?=Yii::app()->createUrl("user/admin/downloadMyDoc/id/".$uack['id']."/type/3")?>" data-original-title="<?=Yii::t("user","Download Document")?>" target="_blank">
                                                    <i class="fa fa-download fa-lg"></i>
                                                </a>
                                                <?php
                                                 echo CHtml::link(
                                                     '<i class="fa fa-remove fa-lg"></i>',
                                                      array('admin/deleteMyDoc','id'=>$uack['id'],'type'=>'3'),
                                                      array('confirm' => 'Are you sure you want to delete?', 'title'=>"", 'data-toggle'=>"tooltip", 'data-original-title'=>Yii::t("user","Delete Document"))
                                                 );
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                    endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>



            </div>
            <!-- ################# My Document ENDS ################ -->
        </div>
    </div>
</div>

<!-- Modal - requiredDocuments -->
<div class="modal fade" id="requiredDocuments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="myModalLabel"><strong>Documents/Information to be submitted along with the return:</strong></h3>
      </div>
      <div class="modal-body">
        <ol>
          <li><strong>Salary:</strong><br>
            Salary statement, Bank Statement/Certificate if Bank Account present or Interest income from bank, Proof for Investment allowances (e.g For Life Insurance policy proof of Premium Payment).</li>
          <li><strong>Interest on Securities:</strong><br>
        Photocopy of Bond/Debenture of the year when it was bought, If Interest income then approval from Interest Giving Authority, If Bond/Debenture is bought by Loan from Institution then Bank Statement/Certificate regarding payment of Interest or Approval Certificate from Institution.</li>
          <li><strong>From House Property:</strong><br>
            Rental Agreement supporting the House Rent or Copy of slip for Rent, Monthly Statement of Rent Received, Bank Statement of the Account in which Rent received, Copy of slip supporting payment of Municipal Tax Land Tax City Corporation Tax, If house bought/constructed on loan from bank then bank statement supporting interest payment, Copy for premium payment for insurance of house property.</li>
          <li><strong>Business or Profession:</strong><br>
        Income statement and Balance sheet of Business/Profession.</li>
          <li><strong>Profit from Partnership Firm:</strong><br>
          Income statement and Balance sheet of Firm.</li>
          <li><strong>Capital Gains:</strong><br>
          Copy of deed for sale of immovable property, Photocopy of challan/pay order if any TDS, Documents supporting profit from transactions of share of company listed in stock exchange.</li>
          <li><strong>Other Sources:</strong><br>
          If any cash dividend then bank statement and copy of dividend warrant/certificate, Copy of certificate at the time of interest income or encashment of saving instruments, Bank statement/certificate if interest income from bank, Documents related to any other income.</li>
          <li><strong>Proof of TDS:</strong><br>
            Copy of challan of tax payment, pay order/bank draft/account payee cheque (up to 10,000 payment can be done through treasury challan.above this payment must be done through pay order/bank draft/account payee cheque), Certificate from TDS authority if any TDS.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





    <script type="text/javascript">
            $(document).ready(function()
            {
                $('#uploadBtn').on('click', function() {
                    if ($("#MyDocuments_tax_year").val() != "" && $("#MyDocuments_doc_name").val() != "" && $("#uploadFile").val() != "") {
                        var $this = $(this);
                        $this.button('loading');
                    }
                    //$this.button('reset');
                });
                    $('#my_doc_table').DataTable();
               
                    $('#UserChangePassword_password').keyup(function() {
                      $('.log').css('display', 'block');
                      $('#result').html(checkStrength($('#UserChangePassword_password').val()));
                    });

                    $('#UserChangePassword_verifyPassword').keyup(function()
                    {

                        var main_pass=$('#UserChangePassword_password').val();
                        var con_pass=$('#UserChangePassword_verifyPassword').val();

                        if((main_pass.length>7)&&(main_pass==con_pass))

                            $('#result2').html('Passwords match');
                        else
                            $('#result2').html('The passwords did not match');
                    });

            /*
                    checkStrength is function which will do the
                    main password strength checking for us
                    */

                function checkStrength(password)
                {
                //initial strength
                var strength = 0

                if (password.match(/([a-z])/)){
                    //                    alert('a-z putted');
                    $('.a-z').remove();
                    strength += 1;
                }  else {
                    var check=$('.a-z').val();
                    if (check==undefined)
                        $('.log').prepend('<div class="a-z sublog" >Please add a lowercase letter (abcdefghijklmnopqrstuvwxyz)<br></div>');

                }


                if (password.match(/([A-Z])/)){
                    //                    alert('A-Z putted');
                    $('.cap_a').remove();
                    strength += 1;
                }  else {
                    var check=$('.cap_a').val();
                    if (check==undefined)
                        $('.log').prepend('<div class="cap_a sublog">Please add a Upercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)<br></div>');

                }


                if (password.match(/([0-9])/)){
                    //                    alert('0-9 putted');
                    $('.num').remove();
                    strength += 1;
                }  else {
                    var check=$('.num').val();
                    if (check==undefined)
                        $('.log').prepend('<div class="num sublog">Please add a number (0123456789)<br></div>');

                }

                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
                    //                    alert('0-9 putted');
                    $('.symbol').remove();
                    strength += 1;
                }  else {
                    var check=$('.symbol').val();
                    if (check==undefined)
                        $('.log').prepend('<div class="symbol sublog">Please add a symbol (`~!@#$%^&*()_+-={}|[]\;:",./<>?\')<br></div>');

                }


                //      if (password.match(/([A-Z])/) && password.match(/([0-9])/)){ alert('A-Z putted'); $('.cap_a').remove(); }  strength += 1;



                //if length is 8 characters or more, increase strength value
                if (password.length > 7){
                    $('.more8').remove();
                    strength += 1;
                }  else {
                    var check=$('.more8').val();
                    if (check==undefined)
                        $('.log').prepend('<div class="more8 sublog">New Password was less than 8 characters <br></div>');

                }


                //now we have calculated strength value, we can return messages

                //if value is less than 2
                if (strength < 2 )
                {
                    $('#result').removeClass()
                    $('#result').addClass('weak label label-warning')
                    return 'Weak'
                }
                else if (strength == 4 )
                {
                    $('#result').removeClass()
                    $('#result').addClass('good label label-warning')
                    return 'Good'
                }
                else if (strength > 4 )
                {
                    $('#result').removeClass()
                    $('#result').addClass('strong label label-warning')
                    return 'Strong'
                }
            }
        });

    </script>
<script type="text/javascript">
    

    function submitVoucherCode(id) {
        $('#loading').css('display','block');
        $("#showPaymentLink").html("");
        $.ajax({
            url : "<?=$this->createAbsoluteUrl('/Voucher/redeem')?>",
            type : "POST",
            dataType : "json",
            cache : false,
            data : { 
                'id': id,
                'code': $("#giftVoucherCode").val()
            },
            success : function(data) {
                if (data.status == "success") {
                    bootbox.alert(data.msg, function(){
                        location.reload(true); 
                    });
                }
                else {
                    bootbox.alert(data.msg);
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






