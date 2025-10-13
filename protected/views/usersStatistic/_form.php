<?php
/* @var $this UsersStatisticController */
/* @var $model UsersStatistic */
/* @var $form CActiveForm */
// echo Yii::app()->getHomeUrl(true);die;
?>

<!-- Grid row -->
<div class="sticky-min-height2 "> 

    <!-- Data block -->
    <article class="data-block well ">
        <div class="data-container">
            <!--<header>
                <h2>User Information</h2>
            </header>-->
            <div class="row">
                <div class="col-md-3">
                    <h2><?=Yii::t("user","Reports")?>&nbsp;&nbsp;</h2>
                    <?=CHtml::link("Tax Owed Report", Yii::app()->baseUrl."/index.php/reports/showUserPercent" , array('class'=>'btn btn-default btn-md btn-block', 'type' => 'button'))?>
                    <?=CHtml::link("User Progress Report", Yii::app()->baseUrl."/index.php/reports/userProgressReport" , array('class'=>'btn btn-default btn-md btn-block', 'type' => 'button'))?>
                </div>
            </div>
            <hr />
            <section class="login-rt">
                <!--***********************************************************************************************************-->
                <h2><?=Yii::t("user","User Statistic")?>&nbsp;&nbsp;</h2>

                <div class="clearfix"></div>

                <!-- <p class="note"><?php //echo Yii::t('user','Fields with <span class="required">*</span> are required.'); ?></p> -->

                <div class="row">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'users-statistic-form', 'action'=>Yii::app()->getHomeUrl().'/usersStatistic/PdfStatistic',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));

                ?>
                    <div class="col-lg-4"><!-- First column END -->
                    <h3 class="note"><?php echo Yii::t('user','PDF Statistic'); ?></h3>
                        <fieldset class="form-horizontal " >

                            <div class="control-group ">
                              <?php echo $form->labelEx($model, 'Year', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('start_year', date('Y'), $year, array('empty' => 'Please select year', 'class' => 'form-control')); 
                                    ?>
                                    <?php echo $form->error($model, 'pdf_print_date'); ?>
                                </div>
                            </div>

                            <br/>

                            <div class=" buttons">
                                <?php echo CHtml::submitButton(Yii::t('user','Filter'), array('class' => 'btn btn-danger btn-large')); ?>
                            </div>
                           </fieldset>

                       </div> <!--col-lg-2--><!-- First column END -->

                       <div class="col-lg-2"><!-- First column END -->
                        <!-- <fieldset class="form-horizontal " >
                            <div class="control-group ">
                              <?php //echo $form->labelEx($model, 'End Year', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php //echo CHtml::dropDownList('end_year', date('Y'), $year, array('empty' => 'Please select year', 'class' => 'form-control')); 
                                    ?>
                                    <?php echo $form->error($model, 'pdf_print_date'); ?>
                                </div>
                            </div>
                        </fieldset> -->
                       </div> <!--col-lg-4--><!-- First column END -->

                       <?php $this->endWidget(); ?>

                       <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'users-statistic-form', 'action'=>Yii::app()->getHomeUrl().'/usersStatistic/CompletionStatistic',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    ));

                ?>
                    <div class="col-lg-4"><!-- First column END -->
                    <h3 class="note"><?php echo Yii::t('user','100% Completion Statistic'); ?></h3>
                        <fieldset class="form-horizontal " >

                            <div class="control-group ">
                              <?php echo $form->labelEx($model, 'Year', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('start_year', date('Y'), $year, array('empty' => 'Please select year', 'class' => 'form-control')); 
                                    ?>
                                    <?php echo $form->error($model, 'pdf_print_date'); ?>
                                </div>
                            </div>

                            <br/>

                            <div class=" buttons">
                                <?php echo CHtml::submitButton(Yii::t('user','Filter'), array('class' => 'btn btn-danger btn-large')); ?>
                            </div>
                           </fieldset>

                       </div> <!--col-lg-2--><!-- First column END -->

                       <div class="col-lg-2"><!-- First column END -->
                        <!-- <fieldset class="form-horizontal " >
                            <div class="control-group ">
                              <?php //echo $form->labelEx($model, 'End Year', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                <div class="controls">
                                    <?php //echo CHtml::dropDownList('end_year', date('Y'), $year, array('empty' => 'Please select year', 'class' => 'form-control')); 
                                    ?>
                                    <?php echo $form->error($model, 'pdf_print_date'); ?>
                                </div>
                            </div>
                        </fieldset> -->
                       </div> <!--col-lg-4--><!-- First column END -->

                       <?php $this->endWidget(); ?>

                    </div> <!--row-->

                    <br />



                    <?php //$this->endWidget(); ?>

                </section>
            </div>

        </article>
        <!-- /Data block -->



    </div>
    <!-- /Grid row -->