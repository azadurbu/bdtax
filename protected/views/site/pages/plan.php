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
    'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => 'appnitro'),
));
?>


<div class="container plan-selection">
    <div class="logo"></div>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="section-title-responsive text-center" style="color:gray"><?php echo Yii::t('user', "Select the BDTax Plan that is best for you"); ?></h2>
        </div>
    </div>
    <br />

    <div class="row">

       <div class="col-xs-12">
                <div class="table-responsive">
                    <table width="100%" border="1" class="table-height border2">
                      <tr>
                        <td class="plan-table-width">
                             <p class="lead price-table-first">
                                 <strong><?php echo Yii::t('user', "Compare our product features"); ?></strong>
                             </p>
                        </td>
                        <td>
                        
                            <table width="100%" class="borderless">
                              <tr>
                                <td class="plan-table-width">
                                    <div class="panel-heading pannel-new-color">
                                            <h4 class="text-center"><?php echo Yii::t('user', "Individual"); ?>&nbsp;&nbsp;(<?php echo Yii::t('mainPage', "FREE"); ?>)</h4>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center plan-table-width"> 
                               		 <div class="prepare"><?php echo Yii::t('user', "Prepare your own taxes"); ?></div>
                   					 <a href="#" class="btn btn-lg btn-block btn-danger" id="plan-a" onclick="register(this)" ><?php echo Yii::t('user', "SELECT NOW!"); ?></a>
                                 </td>
                              </tr>
                              
                            </table>
                            
                        </td>
                        <td>
                            <table width="100%" class="borderless">
                              <tr class="border2">
                                <td class="plan-table-width"> <div class="panel-heading pannel-new-color">
                                        <h4 class="text-center"><?php echo Yii::t('user', "Professional"); ?>&nbsp;&nbsp;(<?php echo Yii::t('mainPage', "FREE"); ?>)</h4>
                                    </div>
                                </td>
                              </tr>
                              <tr>
                                <td class="text-center plan-table-width">
                                	<div class="prepare"><?php echo Yii::t('user', "Prepare your clients' taxes"); ?></div>
                   					<a href="#" class="btn btn-lg btn-block btn-danger" id="plan-b" onclick="register(this)" ><?php echo Yii::t('user', "SELECT NOW!"); ?></a>
                                </td>
                              </tr>
                              
                            </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Step-by-step, accurate tax preparation"); ?> </td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                         <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Time saving & easy to use"); ?> </td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                         <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Cloud based data entry & security"); ?></td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                         <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"> <?php echo Yii::t('user', "Save as PDF or print for easy filing"); ?> </td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Manage multiple clients' tax preparation"); ?> </td>
                        <td>&nbsp;</td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Multiple user login functionality"); ?> </td>
                        <td>&nbsp;</td>
                         <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Assign clients to your tax professionals"); ?></td>
                        <td>&nbsp;</td>
                        <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                      <tr>
                        <td class="plan-table-width"><?php echo Yii::t('user', "Review the status of all your clients"); ?></td>
                        <td>&nbsp;</td>
                         <td class="text-center plan-table-width"><span class="glyphicon glyphicon-ok"></span></td>
                      </tr>
                    </table>
                </div>
                
            </div>


</div>

</div>






                <div class="login">
                
                    <div class="login-form login" style="margin-top: 20px;">
                    
                        <div class="login-top-reg"></div>
                        <h3 class="padding-bottom" style="display:none;" id="individualAccount">
                          <?php echo Yii::t('user', "Create New Individual Account"); ?>
                        </h3>
                        <h3 class="padding-bottom" style="display:none;" id="professionalAccount">
                          <?php echo Yii::t('user', "Create New Professional Account"); ?>
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
                                    <div class="a-z sublog" >Please add a lowercase letter (abcdefghijklmnopqrstuvwxyz)<br></div>
                                    <div class="cap_a sublog">Please add an uppercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)<br></div>
                                    <div class="num sublog">Please add a number (0123456789)<br></div>
                                    <div class="symbol sublog">Please add a symbol (`~!@#$%^&*()_+-={}|[]\;:",./<>?')<br></div>
                                    <div class="more8 sublog">New password was less than 8 characters <br></div>
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
                                <!-- <input type="hidden" name="RegistrationForm[accountType]" value=""> -->
                                <?php echo $form->hiddenField($model, 'accountType', array('class' => 'form-control', 'type' => "email")); ?>
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
                                    <?php echo CHtml::submitButton(Yii::t('user', "Create Account"), array('class' => 'btn btn-success')); ?>
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
    $('.plan-selection').show();
    $('.login-form ').hide();

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





