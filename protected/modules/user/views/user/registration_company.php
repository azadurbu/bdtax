<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/individual.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/accept_bttn_css.css?v=<?=$this->v?>" rel="stylesheet" type="text/css" />

<!-- GAS START-->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
        { (i[r].q=i[r].q||[]).push(arguments)}

        ,i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-68998551-1', 'auto');
    ga('send', 'pageview');

</script>
<script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
});
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<!-- GAS END-->

<?php $this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', "Registration");?>
<!--<div class="row" >-->
<?php
/* $this->breadcrumbs=array(
Yii::t('user',"Registration"),
); */

// Yii::app()->language='bn';
?>

<title><?=$this->pageTitle;?></title>
<?php 
    $planTrial = CompanyPlan::model()->find(array('condition' => "plan='Trial'"));
    $planSmall = CompanyPlan::model()->find(array('condition' => "plan='Small'"));
    $planMedium = CompanyPlan::model()->find(array('condition' => "plan='Medium'"));
    $planEnterprise = CompanyPlan::model()->find(array('condition' => "plan='Enterprise'"));
?>

<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/input_mask.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#RegistrationForm_mobile").mask("99999999999");
        //$("#RegistrationForm_mobile").mask("(999) 999-9999");
        //var phoneNumber1 =phoneNumber.replace('(', "").replace(')', "").replace('-', "").replace(' ', "");
    });
</script>
<div class="content-wrapper">


    <!--#########################################------------------------#######################################-->

    <?php if (Yii::app()->user->hasFlash('registration')): ?>

        <div class="login">
            <div class="logo"></div>
            <div style='padding: 20px; text-align: center; font-size: 15px; display: block; margin: 20px 0px 150px;' class='label label-success '>
                <?php echo Yii::app()->user->getFlash('registration'); ?>
            </div>



        </div>
    <?php else: ?>


        <?php
        $form = $this->beginWidget('UActiveForm', array(
            'id' => 'registration-form',
            'enableAjaxValidation' => false,
            'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'appnitro', 'onsubmit'=>'trimInput()'),
        ));
        ?>


        <div class="container plan-selection">
            <div class="logo"></div>

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-title-responsive text-center" style="color:gray"><?php echo Yii::t('user', "Select the plan that is best for your Company"); ?></h2>
                </div>
            </div>
            <br />

            <div class="row">

                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="price-table-style border2">

                            <colgroup></colgroup>
                            <colgroup></colgroup>
                            <colgroup></colgroup>
                            <colgroup></colgroup>

                            <thead>
                            <tr class="most-popular-row">
                                <td>&nbsp;</td>
                                <td class="most-popular-row-border-hide">&nbsp;</td>
                                <td class="image-bottom most-popular-row-border-hide">
                                    <img src="<?php echo Yii::app()->baseUrl ?>/images/most-popular-pic.png">
                                </td>
                                <td class="most-popular-row-border-hide">&nbsp;</td>
                            </tr>

                            <tr>
                                <th style="font-size: 16px; color: #444; font-weight: bold;"><?=Yii::t('user',"Are you an individual taxpayer")?>?   <a href="<?=Yii::app()->baseUrl.'/index.php/user/registration/individual'?>"><?=Yii::t('user',"Click here")?></a></th>
                                <th>
                                    <h2><?=Yii::t('user',"SMALL")?></h2>
                                </th>
                                <th>
                                    <h2><?=Yii::t('user',"MEDIUM")?></h2>
                                </th>
                                <th>
                                    <h2><?=Yii::t('user',"ENTERPRISE")?></h2>
                                </th>
                            </tr>

                            <tr class="price-table-style-price">
                                <td class="border-bottom-compare"><?=Yii::t('user',"Compare our product features and benefits")?> <br/>
                                    </td>
                                <td>
                                    <p><?=$planSmall->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"MONTH")?> </span></p>
                                </td>
                                <td>
                                    <p><?=$planMedium->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"MONTH")?></span></p>
                                </td>
                                <td>
                                    <p><?=$planEnterprise->price?> <span> <?=Yii::t('user',"BDT")?>/<?=Yii::t('user',"MONTH")?></span></p>
                                </td>
                            </tr>

                            <tr class="start-for-free">
                                <td>&nbsp; </td>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?></a>
                                </td>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=$planTrial->trial_period?> <?=Yii::t('user',"Days Free Trial")?>  </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=Yii::t('user',"Easily manage and prepare your clients taxes")?> </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=Yii::t('user',"Manage client's tax related documents securely online and access them anytime and from anywhere")?> </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=Yii::t('user',"Unlimited company tax professionals")?></span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=Yii::t('user',"Individual client dashboard and management")?></span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=Yii::t('user',"Track tax preparation progress by client")?> </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=Yii::t('user',"Transfer clients between tax professionals")?> </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=Yii::t('user',"Reduce client tax preparation time by 80%")?> </span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span> <?=Yii::t('user',"Upload client tax related documents, no paper")?></span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>

                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=Yii::t('user',"Bank-level data encryption and protection")?></span></th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=$planSmall->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </th>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=$planMedium->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </th>
                                <td>&nbsp;</td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-red.png"></td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                            <tr>
                                <th><i class="fa fa-check circle" aria-hidden="true"></i> <span><?=$planEnterprise->max_number_of_users?> <?=Yii::t('user',"Client tax preparations")?></span> </th>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><img src="<?php echo Yii::app()->baseUrl ?>/images/tik-icon-green.png"></td>
                            </tr>
                           
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                </td>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                </td>
                                <td>
                                    <a href="#"  id="plan-b" onclick="register(this)"><?=Yii::t('user',"START FOR FREE")?> <p class="arrow-icon" aria-hidden="true"></p></a>
                                </td>
                            </tr>

                            
                            </tfoot>

                        </table>



						<div class="col-xs-12">
                            	<div class="we-accept"> 
                                 <p><?=Yii::t('user',"We Accept")?></p>
                                 <ul>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/visa.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/master.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/amex.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/dbblnexus.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/qcash.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/fastcash.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/citytouch.png" /></li>                                
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/bankasia.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/ibbl.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/mtbl.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/dbblmobilebank.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/bkash.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/abbank.png" /></li>
                                    <li><img src="<?php echo Yii::app()->baseUrl ?>/images/mycash.png" /></li>
                                 </ul>
                        </div>
                            </div>

                    </div>

                </div>


            </div>

        </div>
		
        <div class="container">
        
            <div class="col-md-3">
                <img src="<?php echo Yii::app()->baseUrl ?>/img/Champion_final3.png"  width="100%" alt=""/>
            	<img src="<?php echo Yii::app()->baseUrl ?>/img/start_award_logo.png"  width="100%" alt=""/>
                <img src="<?php echo Yii::app()->baseUrl ?>/img/bangladesh_copyright_logo.png"  width="100%" alt=""/>
                
            </div>

            <div class="login col-md-6">

            <div class="login-form login" style="margin-top: 20px;">

                <div class="login-top-reg"></div>
                <h3 class="padding-bottom" style="display:none;" id="individualAccount">
                    <?php echo Yii::t('user', "Create New Individual Account"); ?>
                </h3>
                <h3 class="padding-bottom" style="display:block;" id="professionalAccount">
                    <?php echo Yii::t('user', "Create New Company Account"); ?>
                </h3>
                <div class="registarion-content">

                    <?php $t = CHtml::errorSummary($model);
                    if (!empty($t)): ?>
                        <div class="span7 alert alert-danger fade in" style="display: none;">
                            <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo CHtml::errorSummary($model); ?></div>
                    <?php endif;?>


                    <form>

                        <div class="input-box">
                            <!-- <input type="email" class="form-control" placeholder="Emai address"> -->
                            <?php echo $form->textField($model, 'first_name', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'First Name'), 'type' => "text")); ?>
                            <?php echo $form->error($model, 'first_name', array('class' => 'required')); ?>

                        </div><br>
                        <div class="input-box">
                            <!-- <input type="email" class="form-control" placeholder="Emai address"> -->
                            <?php echo $form->textField($model, 'middle_name', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Middle Name'), 'type' => "text")); ?>
                            <?php echo $form->error($model, 'middle_name', array('class' => 'required')); ?>

                        </div><br>
                        <div class="input-box">
                            <!-- <input type="email" class="form-control" placeholder="Emai address"> -->
                            <?php echo $form->textField($model, 'last_name', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Last Name'), 'type' => "text")); ?>
                            <?php echo $form->error($model, 'last_name', array('class' => 'required')); ?>

                        </div><br>
                        <div class="input-box">
                            <!-- <input type="email" class="form-control" placeholder="Emai address"> -->
                            <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Email address'), 'type' => "email")); ?>
                            <?php echo $form->error($model, 'email', array('class' => 'required')); ?>

                        </div><br>
                        <div class="input-box">
                            <!-- <input type="email" class="form-control" placeholder="Confirm Emai Address"> -->
                            <?php echo $form->textField($model, 'verifyEmail', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Confirm email address'), 'type' => "email")); ?>
                            <?php echo $form->error($model, 'verifyEmail', array('class' => 'required')); ?>
                        </div><br>
                        <div class="input-box">
                            <!-- <input type="password" class="form-control" placeholder="Password"> -->
                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'password'))); ?><span id="result" class="label label-warning" ></span>
                            <div class="log " style="color:red; display:none;">
                                <div class="a-z sublog" ><?php echo Yii::t('user', "Please add a lowercase letter (abcdefghijklmnopqrstuvwxyz)"); ?><br></div>
                                <div class="cap_a sublog"><?php echo Yii::t('user', "Please add an uppercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)"); ?><br></div>
                                <div class="num sublog"><?php echo Yii::t('user', "Please add a number (0123456789)"); ?><br></div>
                                <div class="symbol sublog"><?php echo Yii::t('user', "Please add a symbol (`~!@#$%^&*()_+-={}|[]\;:\",./<>?')"); ?><br></div>
                                <div class="more8 sublog"><?php echo Yii::t('user', "New password was less than 8 characters"); ?><br></div>
                            </div>
                            <?php echo $form->error($model, 'password', array('class' => 'required')); ?>
                        </div>
                        <br />
                        <div class="input-box">
                            <!-- <input type="password" class="form-control" placeholder="Confirm Password"> -->

                            <?php echo $form->passwordField($model, 'verifyPassword', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Confirm password'))); ?>
                            <span id="result2" class="label label-warning"></span>
                            <?php echo $form->error($model, 'verifyPassword', array('class' => 'required')); ?>

                        </div>
                        <br />

                        <div class="input-box">
                            <!-- <input type="text" class="form-control" placeholder="Mobile phone (optional)"> -->
                            <?php echo $form->textField($model, 'mobile', array('class' => 'form-control', 'placeholder' => Yii::t('user', 'Mobile phone (optional)'))); ?>
                            <?php echo $form->error($model, 'mobile', array('class' => 'required')); ?>

                        </div><br>

                        <div class="input-box">

                            <?php
                            /*     $ATList =  array(
                            '1'=>'Individual Tax payer account',
                            '3'=>'Company account'
                            );*/
                            ?>

                            <?php //echo $form->dropDownList($model,'accountType', $ATList,array( 'empty' => 'Please select account Type', 'class' => 'form-control', 'onchange' => '')); ?>
                            <?php //echo $form->error($model, 'accountType', array('class' => 'required')); ?>

                        </div><br>

                        <div class="plan-type">
                            
                             <input type="hidden" value=3 name="RegistrationForm[accountType]" >
                        </div>


                        <?php if (UserModule::doCaptcha('registration')): ?>
                            <div>
                                <?php echo $form->labelEx($model, 'verifyCode'); ?>

                                <?php $this->widget('CCaptcha');?><br /><br />
                                <?php echo $form->textField($model, 'verifyCode'); ?>
                                <?php echo $form->error($model, 'verifyCode', array('class' => 'required')); ?>

                                <p class="hint"><?php echo Yii::t('user', "Please enter the letters as they are shown in the image above."); ?>
                                    <br/><?php echo Yii::t('user', "Letters are not case-sensitive."); ?></p>
                            </div>
                        <?php endif;?>

                        <div class="login-button">
                        	<?php 
							 echo CHtml::tag('button', array(
								'name'=>'btnSubmit',
								'type'=>'submit',
								'class' => 'btn btn-success btn-lg btn-block'
                             ), '<span class="glyphicon glyphicon-lock"></span> '. Yii::t('user', "Create Account"));
							?>	
                            <?php //echo CHtml::submitButton(Yii::t('user', "Create Account"), array('class' => 'btn btn-success')); ?>
                        </div>

                        <?php $this->endWidget();?>


                        <!--          <div class="login-button">
                                  <button type="button" class="btn btn-success">Create Account</button>
                              </div> -->

                        <div class="clearfix"></div>
                        <h5><?php echo Yii::t('user', 'By clicking the create account button, you agree to our'); ?> <a id="agreement" data-target="#agreeModal" data-toggle="modal" href="#"><?php echo Yii::t('user', 'Terms and Conditions'); ?></a><?php echo Yii::t('user', '.'); ?></h5>

                    </form>

                </div>
            </div>
            <br /><br />
        	</div>
        
            <div class="col-md-3"> 
            
            	<div class="testimonial-wrapper tesimonial-registration">
  					  <div class="row">
         <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
                
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Mahbub Hasan Shohag.jpg" alt="">
                    </div>
                    <p class="description">
						Very useful and effective. Thanks a lot for excellent webpage.
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Mahboob Hasan Shohag</h3>
                    </div>
                </div>
                
                <div class="testimonial">
                    <div class="pic">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/testimonials/Rana Chowdhury.jpg" alt="">
                    </div>
                    <p class="description">
                      The future is here. Tax filing made easy for everybody.
                    </p>
                    <div class="testimonial-profile">
                        <h3 class="title">Rana Chowdhury</h3>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
				</div>
            
            </div>
        
       </div>
        
    <?php endif;?>
    <!--#########################################------------------------#######################################-->


    <script>


        /*
         jQuery document ready.
         */
        $(document).ready(function()
        {

            if ($("#RegistrationForm_accountType").val() == "1") {
                $("#individualAccount").show();
                $("#professionalAccount").hide();
            }
            else if ($("#RegistrationForm_accountType").val() == "3") {
                $("#individualAccount").hide();
                $("#professionalAccount").show();
            }


            $('#RegistrationForm_password').keyup(function() {
                $('.log').css('display', 'block');
                $('#result').html(checkStrength($('#RegistrationForm_password').val()));
            });

            $('#RegistrationForm_verifyPassword').keyup(function()
            {

                var main_pass=$('#RegistrationForm_password').val();
                var con_pass=$('#RegistrationForm_verifyPassword').val();

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

        $.extend({
            getUrlVars: function(){
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            },
            getUrlVar: function(name){
                return $.getUrlVars()[name];
            }
        });
        var et = $('div').hasClass('errorSummary');

        if(et){
            $('.plan-selection').hide();
            $('.login-form ').show();

        } else {
            $('.plan-selection').hide();
            $('.login-form ').show();

        }


        function register (e){
            $('.login-form').show();
            $('.plan-selection').hide();

            if (e.id=='plan-a') {
                $('.plan-type').html('<input type="hidden" value=1 name="RegistrationForm[accountType]" >');
                $("#individualAccount").show();
                $("#professionalAccount").hide();
            } else if(e.id=='plan-b'){
                $('.plan-type').html('<input type="hidden" value=3 name="RegistrationForm[accountType]" >');
                $("#individualAccount").hide();
                $("#professionalAccount").show();
            }

        }

    </script>

    <style>




        /* Use a wide full screen for small screens like tablets. */
        @media (min-width: 768px) and (max-width:992px) {
            .container {
                width: initial;
                padding-left: 2em;
                padding-right: 2em;
            }
        }

        /* --- Plans ---------------------------- */

        .my_planHeader {
            text-align: center;
            color: white;
            padding-top:0.2em;
            padding-bottom:0.2em;
        }
        .my_planTitle {
            font-size:2em;
            font-weight: bold;
        }
        .my_planPrice {
            font-size:1.4em;
            font-weight: bold;
        }
        .my_planDuration {
            margin-top: -0.6em;
        }

        @media (max-width: 768px) {
            .my_planTitle {
                font-size:small;
            }
        }

        /* --- Features ------------------------- */

        .my_feature {
            line-height:2.8em;
        }

        @media (max-width: 768px) {
            .my_feature {
                text-align: center
            }
        }

        .my_featureRow {
            /*margin-top: 0.1em;*/
            /*margin-bottom: 0.1em;*/
            border: 0.1em solid lightgray;
            border-bottom: none;
            color:gray;
        }

        .my_featureRow_last {
            /*margin-top: 0.1em;*/
            /*margin-bottom: 0.1em;*/
            border: 0.1em solid lightgray;
            color:gray;
        }

        /* --- Plan 1 --------------------------- */
        .my_plan1 {
            background: rgb(224,234,242);
        }

        .my_planHeader.my_plan1 a {
            background: rgb(72, 109, 139);
            color:white;
        }

        .my_planHeader.my_plan1 {
            background: rgb(105, 153, 193);
            border-bottom: thick solid rgb(72, 109, 139);
        }

        /* --- Plan 2 --------------------------- */
        .my_plan2 {
            background: #F4F4F4;
            border-left: 2px solid #fcece1;
        }

        .my_planHeader.my_plan2 a {
            background: rgb(108, 131, 62);
            color:white;
        }

        .my_planHeader.my_plan2 {
            background: rgb(134, 162, 77);
            border-bottom: thick solid rgb(108, 131, 62);
        }

        /* --- Plan 3 --------------------------- */
        .my_plan3 {
            background: #F4F4F4;
            border-left: 2px solid #fcece1;
        }

        .my_planHeader.my_plan3 a {
            background: rgb(199, 127, 40);
            color:white;
        }

        .my_planHeader.my_plan3 {
            background: rgb(253, 161, 49);
            border-bottom: thick solid rgb(199, 127, 40);
        }




        .my_planFeature {
            text-align: center;
            font-size: 2em;
        }

        .my_planFeature i.my_check {
            color: #4cae4c;
            font-size: 17px;

        }

        .panel {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            margin-bottom: 0px;
        }

        <!--
        /* Font Definitions */

        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-parent:"";
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:0in;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}

        p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:.5in;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:0in;
            margin-left:.5in;
            margin-bottom:.0001pt;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:0in;
            margin-left:.5in;
            margin-bottom:.0001pt;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
        {mso-style-priority:34;
            mso-style-unhide:no;
            mso-style-qformat:yes;
            mso-style-type:export-only;
            margin-top:0in;
            margin-right:0in;
            margin-bottom:10.0pt;
            margin-left:.5in;
            mso-add-space:auto;
            line-height:115%;
            mso-pagination:widow-orphan;
            font-size:11.0pt;
            font-family:"Calibri","sans-serif";
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        span.Heading2Char
        {mso-style-name:"Heading 2 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 2";
            mso-ansi-font-size:18.0pt;
            mso-bidi-font-size:18.0pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.Heading3Char
        {mso-style-name:"Heading 3 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 3";
            mso-ansi-font-size:13.5pt;
            mso-bidi-font-size:13.5pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.Heading4Char
        {mso-style-name:"Heading 4 Char";
            mso-style-priority:9;
            mso-style-unhide:no;
            mso-style-locked:yes;
            mso-style-link:"Heading 4";
            mso-ansi-font-size:12.0pt;
            mso-bidi-font-size:12.0pt;
            font-family:"Times New Roman","serif";
            mso-ascii-font-family:"Times New Roman";
            mso-fareast-font-family:"Times New Roman";
            mso-hansi-font-family:"Times New Roman";
            mso-bidi-font-family:"Times New Roman";
            font-weight:bold;}
        span.underline
        {mso-style-name:underline;
            mso-style-unhide:no;}
        span.correction
        {mso-style-name:correction;
            mso-style-unhide:no;}
        .MsoChpDefault
        {mso-style-type:export-only;
            mso-default-props:yes;
            mso-ascii-font-family:Calibri;
            mso-ascii-theme-font:minor-latin;
            mso-fareast-font-family:Calibri;
            mso-fareast-theme-font:minor-latin;
            mso-hansi-font-family:Calibri;
            mso-hansi-theme-font:minor-latin;
            mso-bidi-font-family:Vrinda;
            mso-bidi-theme-font:minor-bidi;}
        .MsoPapDefault
        {mso-style-type:export-only;
            margin-bottom:10.0pt;
            line-height:115%;}
        @page Section1
        {size:8.5in 11.0in;
            margin:1.0in 1.0in 1.0in 1.0in;
            mso-header-margin:.5in;
            mso-footer-margin:.5in;
            mso-paper-source:0;}
        div.Section1
        {page:Section1;}
        /* List Definitions */


        @list l5:level4 lfo8
        {mso-level-start-at:0;
            mso-level-number-format:arabic;
            mso-level-numbering:continue;
            mso-level-text:"%4\.";
            mso-level-tab-stop:2.0in;
            mso-level-number-position:left;
            text-indent:-.25in;}
        ol
        {margin-bottom:0in;}
        ul
        {margin-bottom:0in;}
        -->
    </style>
<script type="text/javascript">
    function trimInput(){
        var email = document.getElementById("RegistrationForm_email").value;
        var trimmedEmail = email.trim();
        document.getElementById("RegistrationForm_email").value = trimmedEmail;

        var verifyEmail = document.getElementById("RegistrationForm_verifyEmail").value;
        var trimmedVerifyEmail = verifyEmail.trim();
        document.getElementById("RegistrationForm_verifyEmail").value = trimmedVerifyEmail;

    }
</script>




