<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array( 'id' => 'income-salaries-form', 'enableAjaxValidation' => false, ));?>

<!-- Data block -->
<article class="data-block ">
    <div class="data-container">
        <section class="login-rt">

            <fieldset class="form-horizontal ">


                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3><?=Yii::t('income', "Salary Income Information")?></h3>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordred table-striped">

                                    <thead>
                                        <th>
                                            <?=Yii::t( 'income', "Pay & Allowance")?>
                                        </th>
                                        <th>
                                            <?=Yii::t( 'income', "Amount of Income")?>
                                        </th>
                                        <th>
                                            <?=Yii::t( 'income', "Amount of Exempted Income")?>
                                        </th>
                                        <th>
                                            <?=Yii::t( 'income', "Net Taxable Income")?>
                                        </th>
                                    </thead>
                                    <tbody id="mytable">

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'BasicPay', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.1")?>"></i>
                                            </td>
                                            <td>
                                                <input required value="<?php echo @$model->BasicPay ?>" type="text" autocomplete="off" onkeyup="onValuePut(this), onHouseRentTaxCal(this),onMedicalWaiverTaxCal(),calculateDeemedIncomeTransport(),calculateDeemedFreeIncome()" class="form-control" id="IncomeSalaries_BasicPay_1" name="IncomeSalaries_BasicPay_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_BasicPay_2" name="IncomeSalaries_BasicPay_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'BasicPay', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'BasicPay'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'SpecialPay', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.2")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->SpecialPay ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_SpecialPay_1" name="IncomeSalaries_SpecialPay_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_SpecialPay_2" name="IncomeSalaries_SpecialPay_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'SpecialPay', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'SpecialPay'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'DearnessAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.3")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->DearnessAllowance ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_DearnessAllowance_1" name="IncomeSalaries_DearnessAllowance_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_DearnessAllowance_2" name="IncomeSalaries_DearnessAllowance_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'DearnessAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'DearnessAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'ConveyanceAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.4")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->ConveyanceAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onConveyTaxCal(this)" class="form-control" id="IncomeSalaries_ConveyanceAllowance_1" name="IncomeSalaries[ConveyanceAllowance_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->ConveyanceAllowance_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_ConveyanceAllowance_2" name="IncomeSalaries[ConveyanceAllowance_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'ConveyanceAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'ConveyanceAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'HouseRentAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.5")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->HouseRentAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onHouseRentTaxCal(this)" class="form-control" id="IncomeSalaries_HouseRentAllowance_1" name="IncomeSalaries[HouseRentAllowance_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->HouseRentAllowance_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_HouseRentAllowance_2" name="IncomeSalaries[HouseRentAllowance_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'HouseRentAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'HouseRentAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'MedicalAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.6")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->MedicalAllowance_1 ?>" type="text" autocomplete="off" onkeyup="onMedicalWaiverTaxCal(this)" class="form-control" id="IncomeSalaries_MedicalAllowance_1" name="IncomeSalaries[MedicalAllowance_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->MedicalAllowance_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_MedicalAllowance_2" name="IncomeSalaries[MedicalAllowance_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'MedicalAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'MedicalAllowance'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'MedicalAllowanceForDisability', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.6")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->MedicalAllowanceForDisability_1 ?>" type="text" autocomplete="off" onkeyup="onMedicalWaiverForDisabilityTaxCal(this.value)" class="form-control" id="IncomeSalaries_MedicalAllowanceForDisability_1" name="IncomeSalaries[MedicalAllowanceForDisability_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->MedicalAllowanceForDisability_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_MedicalAllowanceForDisability_2" name="IncomeSalaries[MedicalAllowanceForDisability_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'MedicalAllowanceForDisability', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'MedicalAllowanceForDisability'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'Surgery_HEKLC', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.66")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Surgery_HEKLC_1 ?>" type="text" autocomplete="off" onkeyup="onSurgeryHEKLC(this.value)" class="form-control" id="IncomeSalaries_Surgery_HEKLC_1" name="IncomeSalaries[Surgery_HEKLC_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Surgery_HEKLC_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Surgery_HEKLC_2" name="IncomeSalaries[Surgery_HEKLC_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Surgery_HEKLC', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Surgery_HEKLC'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'ServantAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.7")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->ServantAllowance ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_ServantAllowance_1" name="IncomeSalaries_ServantAllowance_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_ServantAllowance_2" name="IncomeSalaries_ServantAllowance_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'ServantAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'ServantAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'LeaveAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.8")?>"></i>
                                                <br/>
                                                <br/>
                                                <label class="control-label pull-left" style="color:#555555;font-weight: 500">
                                                    <?=Yii::t( 'income', "Mentioned in Employment contract regarding LFA/FREE OR Concessional Passage. ");

                                                    echo $form->checkBox($model,'LfaExempted',array('value'=>'Y','uncheckValue'=>'N','checked'=>($model->LfaExempted=='Y')?true:false, 'onClick'=>'leaveAllowanceExempted(this.value)'));
                                                    ?>
                                                </label>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->LeaveAllowance_1 ?>" type="text" autocomplete="off" onkeyup="leaveAllowanceExempted(this.value)" class="form-control" id="IncomeSalaries_LeaveAllowance_1" name="IncomeSalaries[LeaveAllowance_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->LeaveAllowance_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_LeaveAllowance_2" name="IncomeSalaries[LeaveAllowance_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'LeaveAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'LeaveAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'LeaveEncashment', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.24")?>"></i>
                                                <br/>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->LeaveEncashment_1 ?>" type="text" autocomplete="off" onkeyup="leaveEncashment(this.value)" class="form-control" id="IncomeSalaries_LeaveEncashment_1" name="IncomeSalaries[LeaveEncashment_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->LeaveEncashment_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_LeaveEncashment_2" name="IncomeSalaries[LeaveEncashment_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'LeaveEncashment', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'LeaveEncashment'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'HonorariumOrReward', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.9")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->HonorariumOrReward ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_HonorariumOrReward_1" name="IncomeSalaries_HonorariumOrReward_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_HonorariumOrReward_2" name="IncomeSalaries_HonorariumOrReward_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'HonorariumOrReward', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'HonorariumOrReward'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'OvertimeAllowance', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.10")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->OvertimeAllowance ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_OvertimeAllowance_1" name="IncomeSalaries_OvertimeAllowance_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_OvertimeAllowance_2" name="IncomeSalaries_OvertimeAllowance_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'OvertimeAllowance', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'OvertimeAllowance'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'Bonus', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.11")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Bonus ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_Bonus_1" name="IncomeSalaries_Bonus_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Bonus_2" name="IncomeSalaries_Bonus_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Bonus', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Bonus'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'OtherAllowances', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.12")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->OtherAllowances ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_OtherAllowances_1" name="IncomeSalaries_OtherAllowances_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_OtherAllowances_2" name="IncomeSalaries_OtherAllowances_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'OtherAllowances', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'OtherAllowances'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'EmployersContributionProvidentFund', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.13")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->EmployersContributionProvidentFund ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_EmployersContributionProvidentFund_1" name="IncomeSalaries_EmployersContributionProvidentFund_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_EmployersContributionProvidentFund_2" name="IncomeSalaries_EmployersContributionProvidentFund_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'EmployersContributionProvidentFund', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'EmployersContributionProvidentFund'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <label class="pull-right control-label" style="color:#555555;font-weight: 500" for="inputMask">
                                                    <?=Yii::t( 'income', "Interest amount")?>
                                                </label>
                                                <?php echo CHtml::activeLabelEx($model, 'InterestAccruedProvidentFund', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.14")?>"></i>

                                                <br/>
                                                <br/>
                                                <div class="hide">

                                                    <p class="overlay">
                                                        </span> <span class="text">Interest Rate By Govt

			<?php echo $form->radioButton($model, 'InterestRateByGovtId', array('value' => 'Y', 'uncheckValue' => null)); ?>
			<span class="text"><?=Yii::t( 'income', "YES")?></span>

                                                        <?php echo $form->radioButton($model, 'InterestRateByGovtId', array('value' => 'N', 'uncheckValue' => null, 'checked' => "checked")); ?>
                                                        <span class="text"><?=Yii::t( 'income', "NO")?></span>
                                                    </p>

                                                </div>
                                                <label class="control-label pull-left" style="color:#555555;font-weight: 500" for="inputMask">
                                                    <?=Yii::t( 'income', "Rate of interest")?>
                                                </label>
                                                <div class="col-lg-3">
                                                    <input value="<?php echo @$model->RateOfInterest ?>" type="text" autocomplete="off" onkeyup="onProvidentFundTaxCal(this)" class="form-control col-lg-2" id="IncomeSalaries_RateOfInterest" name="IncomeSalaries[RateOfInterest]">
                                                </div>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->InterestAccruedProvidentFund_1 ?>" type="text" autocomplete="off" onkeyup="onValuePut(this),onProvidentFundTaxCal(this)" class="form-control" id="IncomeSalaries_InterestAccruedProvidentFund_1" name="IncomeSalaries[InterestAccruedProvidentFund_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->InterestAccruedProvidentFund_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_InterestAccruedProvidentFund_2" name="IncomeSalaries[InterestAccruedProvidentFund_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'InterestAccruedProvidentFund', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'InterestAccruedProvidentFund'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'ReceivedAnyTransport', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <!-- <i class="fa fa-question-circle fa-1" title="<?=Yii::t('TTips', "6.15")?>"></i> -->
                                            </td>
                                            <td>
                                                <!-- <input value="<?php echo @$model->DeemedIncomeTransport ?>" type="hidden" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_DeemedIncomeTransport_1" name="IncomeSalaries_DeemedIncomeTransport_1"> -->

                                                <?php echo $form->radioButton($model, 'ReceivedAnyTransport', array('value' => 'Y', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "YES")?></b></span>
                                            </td>



                                            <td>
                                                <!-- <input value="0" type="hidden" readonly='readonly' class="form-control" id="IncomeSalaries_DeemedIncomeTransport_2" name="IncomeSalaries_DeemedIncomeTransport_2"> -->

                                                <?php echo $form->radioButton($model, 'ReceivedAnyTransport', array('value' => 'N', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "NO")?></b></span>
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'DeemedIncomeTransport', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'DeemedIncomeTransport'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'ReceivedAnyHouse', array( 'class'=> 'pull-left', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                
                                            </td>
                                            <td>
                                                <?php echo $form->radioButton($model, 'ReceivedAnyHouse', array('value' => 'Y', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "YES")?></b></span>
                                            </td>
                                            <td>
                                                <?php echo $form->radioButton($model, 'ReceivedAnyHouse', array('value' => 'N', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "NO")?></b></span>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <tr id="TR_RentalValueOfHouse" style="display: none;">
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'RentalValueOfHouse', array('class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'RentalValueOfHouse', array('onkeyup' => "calculateDeemedFreeIncome()", 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'RentalValueOfHouse'); ?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <tr id="TR_PaidAnyPartOfRent" style="display: none;">
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'PaidAnyPartOfRent', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                
                                            </td>
                                            <td>
                                                <?php echo $form->radioButton($model, 'PaidAnyPartOfRent', array('value' => 'Y', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "YES")?></b></span>
                                            </td>
                                            <td>
                                                <?php echo $form->radioButton($model, 'PaidAnyPartOfRent', array('value' => 'N', 'uncheckValue' => null)); ?>
                                                <span class="text"><b><?=Yii::t( 'income', "NO")?></b></span>
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <tr id="TR_PaidPartOfRentValue" style="display: none;">
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'PaidPartOfRentValue', array('class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'PaidPartOfRentValue', array('onkeyup' => "calculateDeemedFreeIncome()",'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'PaidPartOfRentValue'); ?>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'DeemedFreeAccommodation', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.16")?>"></i>
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'DeemedFreeAccommodation', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'DeemedFreeAccommodation'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'Others', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.17")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Others ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_Others_1" name="IncomeSalaries_Others_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Others_2" name="IncomeSalaries_Others_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Others', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Others'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'Arear', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.17")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Arear ?>" type="text" autocomplete="off" onkeyup="onValuePut(this)" class="form-control" id="IncomeSalaries_Arear_1" name="IncomeSalaries_Arear_1">
                                            </td>
                                            <td>
                                                <input value="0" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Arear_2" name="IncomeSalaries_Arear_2">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Arear', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Arear'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>

                                                <?php echo CHtml::activeLabelEx($model, 'Gratuity', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.19")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Gratuity_1 ?>" type="text" autocomplete="off" onkeyup="calculateGratuity(this.value)" class="form-control" id="IncomeSalaries_Gratuity_1" name="IncomeSalaries[Gratuity_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Gratuity_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Gratuity_2" name="IncomeSalaries[Gratuity_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Gratuity', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Gratuity'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'WorkersProfitParticipationFund', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;

                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.23")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->WorkersProfitParticipationFund_1 ?>" type="text" autocomplete="off" onkeyup="calculateWPPF(this.value)" class="form-control" id="IncomeSalaries_WorkersProfitParticipationFund_1" name="IncomeSalaries[WorkersProfitParticipationFund_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->WorkersProfitParticipationFund_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_WorkersProfitParticipationFund_2" name="IncomeSalaries[WorkersProfitParticipationFund_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'WorkersProfitParticipationFund', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'WorkersProfitParticipationFund'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'Pension', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?> &nbsp;&nbsp;
                                                
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Pension_1 ?>" type="text" autocomplete="off" onkeyup="calculatePension(this.value)" class="form-control" id="IncomeSalaries_Pension_1" name="IncomeSalaries[Pension_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->Pension_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_Pension_2" name="IncomeSalaries[Pension_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'Pension', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'Pension'); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'RecognizedProvidentFundIncome', array( 'class'=> 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "6.20")?>"></i>
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->RecognizedProvidentFundIncome_1 ?>" type="text" autocomplete="off" onkeyup="calculateRecognizedProvidentFundIncome(this.value)" class="form-control" id="IncomeSalaries_RecognizedProvidentFundIncome_1" name="IncomeSalaries[RecognizedProvidentFundIncome_1]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->RecognizedProvidentFundIncome_2 ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_RecognizedProvidentFundIncome_2" name="IncomeSalaries[RecognizedProvidentFundIncome_2]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'RecognizedProvidentFundIncome', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'RecognizedProvidentFundIncome'); ?>
                                            </td>
                                        </tr>

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model, 'NetTaxableIncome', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'text-align:left;')); ?> &nbsp;&nbsp;
                                                <i class="fa fa-question-circle fa-1" /*data-toggle="tooltip" */ title="<?=Yii::t('TTips', "6.18")?>"></i>
                                            </td>
                                            <td>
                                                <input required value="<?php echo @$model->NetSalaryIncome ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_NetTaxableIncome_1" name="IncomeSalaries[NetSalaryIncome]">
                                            </td>
                                            <td>
                                                <input value="<?php echo @$model->NetTaxWaiver ?>" type="text" readonly='readonly' class="form-control" id="IncomeSalaries_NetTaxableIncome_2" name="IncomeSalaries[NetTaxWaiver]">
                                            </td>
                                            <td>
                                                <?php echo $form->textField($model, 'NetTaxableIncome', array('readonly' => 'readonly', 'class' => 'form-control')); ?>
                                                <br/>
                                                <?php echo $form->error($model, 'NetTaxableIncome'); ?>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>




                                <?php echo $form->hiddenField($model, 'EntryYear', array('value' => $this->taxYear())); ?>
                                <?php echo $form->hiddenField($model, 'CPIId', array('value' => Yii::app()->user->CPIId)); ?>

                                <?php echo $form->hiddenField($CalculationModel, 'ConveynceWaiverLevel'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'HouseRentWaiverPercent'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'CommercialRentPercent'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'HouseRentCompareValue'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'MedicalWaiverPercent'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'MedicalCompareValue'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'ProvidentFoundInterest'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'ProvidentFoundportion'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'ResidentialRentPercent'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'MedicalAllowanceExamtedForDisability'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'ReceivedTransportValue'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'ReceivedTransportPercentOfBasic'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'DeemedFreeAccPercentOfBasic'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'GratuityExemptedAmount'); ?>
                                <?php echo $form->hiddenField($CalculationModel, 'WPPFExemptedAmount'); ?>


                            </div>


                            <div class="panel-footer">
                                <div class="pull-left" style="padding:0 10px;">
                                    <?php $this->widget('bootstrap.widgets.TbButton', array( 'buttonType' => 'submit', 'type' => 'success', 'label' => $model->isNewRecord ? Yii::t('income', "Create") : Yii::t('income', "Save"), ));?>
                                </div>

                                <div class="pull-left" style="padding:0 10px;">
                                    <a class="btn btn-success" href="<?=Yii::app()->baseUrl?>/index.php/incomeSingle/entry#s_7">
                                        <?=Yii::t( 'income', "Cancel") ?>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>


                        </div>
                        <!-- panel panel-success END-->
                    </div>
                    <!-- col-lg-10 END -->
                </div>
                <!-- Row END -->


                <div class="clearfix"></div>
    </div>



    <?php $this->endWidget();?>

    </fieldset>
    </section>
    </div>

</article>
<!-- /Data block -->
<!-- /Grid controls -->

<script type="text/javascript">
</script>



<!-- set up the modal to start hidden and fade in and out -->