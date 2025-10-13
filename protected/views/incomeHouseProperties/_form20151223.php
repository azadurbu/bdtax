<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'income-house-properties-form',
	'enableAjaxValidation'=>false,
    )); ?>

    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <section class="well">
                <!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->
                <?php $t = $form->errorSummary($model);
                if (!empty($t)): ?>
                <div class="alert alert-error fade in" style=" ">
                    <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo $form->errorSummary($model); ?></div>
                <?php endif; ?>

                <fieldset class="form-horizontal " >



                    <div class="row">
                        <div class="col-lg-7 ">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3><?=Yii::t('income',"Rental Property Income Information")?></h3>
                                </div>

                                <div class="well" style="">                              

                                    <p>       
                                        <label>                                                     
                                            <?php echo $form->radioButton($model, 'ResidentOrCommercial', array('value' => '1', 'uncheckValue' => null, 'checked'=>"checked", 'onClick'=>"onValuePut(this),repairCostByType()" )); ?>
                                            <span class="overlay"></span> <span class="text"><?=Yii::t('income',"Residential")?></span></label>
                                            <label >                                                            
                                                <?php echo $form->radioButton($model, 'ResidentOrCommercial', array('value' => '2', 'uncheckValue' => null, 'onClick'=>"onValuePut(this),repairCostByType()" )); ?>
                                                <span class="overlay"></span> <span class="text"><?=Yii::t('income',"Commercial")?></span></label>
                                            </p> 
                                        </div>


                                        <table   class="table">
                                            <thead>
                                                <tr class="panel-heading">
                                                    <th><?=Yii::t('income',"Details")?></th>
                                                    <th>BDTk</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                             <tr>
                                                <td>
                                                    <?php echo CHtml::activeLabelEx($model,'AnnualRentalIncome',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                                    &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.1")?>"></i>
                                                </td>
                                                <td>
                                                 <?php echo $form->textField($model,'AnnualRentalIncome', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"repairCostByType(), onValuePut(this)" )); ?>
                                                 <?php echo $form->error($model,'AnnualRentalIncome'); ?>
                                             </td>
                                         </tr>
                                     </tbody> 
                                     <tbody id="mytable"> 
                                         <tr>
                                            <td>
                                                <?php echo CHtml::activeLabelEx($model,'Repair',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                                &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.2")?>"></i>
                                            </td>
                                            <td>
                                             <?php echo $form->textField($model,'Repair', array ('class'=>'form-control',  'autocomplete'=>"off", 'readOnly'=>"readOnly" )); ?>
                                             <?php echo $form->error($model,'Repair'); ?>
                                         </td>
                                     </tr>
                                     <tr>
                                        <td>
                                            <?php echo CHtml::activeLabelEx($model,'MunicipalOrLocalTax',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                            &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.3")?>"></i>
                                        </td>
                                        <td>
                                         <?php echo $form->textField($model,'MunicipalOrLocalTax', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                                         <?php echo $form->error($model,'MunicipalOrLocalTax'); ?>
                                     </td>
                                 </tr>

                                 <tr>
                                    <td>
                                        <?php echo CHtml::activeLabelEx($model,'LandRevenue',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                        &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.4")?>"></i>
                                    </td>
                                    <td>
                                     <?php echo $form->textField($model,'LandRevenue', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                                     <?php echo $form->error($model,'LandRevenue'); ?>
                                 </td>
                             </tr>

                             <tr>
                                <td>
                                    <?php echo CHtml::activeLabelEx($model,'LoanInterestOrMorgageOrCapitalCrg',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.5")?>"></i>
                                </td>
                                <td>
                                 <?php echo $form->textField($model,'LoanInterestOrMorgageOrCapitalCrg', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                                 <?php echo $form->error($model,'LoanInterestOrMorgageOrCapitalCrg'); ?>
                             </td>
                         </tr>

                         <tr>
                            <td>
                                <?php echo CHtml::activeLabelEx($model,'InsurancePremium',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.6")?>"></i>
                            </td>
                            <td>
                             <?php echo $form->textField($model,'InsurancePremium', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                             <?php echo $form->error($model,'InsurancePremium'); ?>
                         </td>
                     </tr>

                     <tr>
                        <td>
                            <?php echo CHtml::activeLabelEx($model,'VacancyAllowence',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                            &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.7")?>"></i>
                        </td>
                        <td>
                         <?php echo $form->textField($model,'VacancyAllowence', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                         <?php echo $form->error($model,'VacancyAllowence'); ?>
                     </td>
                 </tr>

                 <tr>
                    <td>
                        <?php echo CHtml::activeLabelEx($model,'Others',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                        &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.8")?>"></i>
                    </td>
                    <td>
                     <?php echo $form->textField($model,'Others', array ('class'=>'form-control',  'autocomplete'=>"off", 'onkeyup'=>"onValuePut(this)" )); ?>
                     <?php echo $form->error($model,'Others'); ?>
                 </td>
             </tr>
         </tbody>
         <tbody>

             <tr>
                <td>
                    <?php echo CHtml::activeLabelEx($model,'ClaimedExpensesTotal',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                    &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.9")?>"></i>
                </td>
                <td>
                    <?php echo $form->textField($model,'ClaimedExpensesTotal', array ('class'=>'form-control',  'autocomplete'=>"off", 'readOnly'=>"readOnly" )); ?>
                    <?php echo $form->error($model,'ClaimedExpensesTotal'); ?>
                </td>
            </tr>

        </tbody>
        <tfoot>

         <tr>
            <td>
                <?php echo CHtml::activeLabelEx($model,'NetIncome',array('class' => '', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                &nbsp;&nbsp;<i class="fa fa-question-circle fa-1" data-toggle="tooltip" title="<?=Yii::t('TTips',"7.10")?>"></i>
            </td>
            <td>
             <?php echo $form->textField($model,'NetIncome', array ('class'=>'form-control' )); ?>
             <?php echo $form->error($model,'NetIncome'); ?>
         </td>
     </tr>

 </tfoot>
</table>
<div class="panel-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
       'buttonType'=>'submit',
       'type'=>'success',
       'label'=>$model->isNewRecord ? Yii::t('income',"Create") : Yii::t('income',"Save"),
       )); ?>
   </div>
</div>
</div>
</div>



<?php echo $form->hiddenField($model,'EntryYear',array('value'=>$this->taxYear() ) ); ?>
<?php echo $form->hiddenField($model,'CPIId',array('value'=>Yii::app()->user->CPIId ) ); ?>

<?php echo $form->hiddenField($CalculationModel,'CommercialRentPercent'); ?>
<?php echo $form->hiddenField($CalculationModel,'ResidentialRentPercent'); ?>









<?php $this->endWidget(); ?>

</fieldset>
</section>
</div>

</article>
<!-- /Data block -->
<!-- /Grid controls -->



