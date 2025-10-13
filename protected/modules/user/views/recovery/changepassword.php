<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('user', "Change Password");
$this->breadcrumbs = array(
	Yii::t('user', "Login") => array('/user/login'),
	Yii::t('user', "Change Password"),
);
?>
    <br/>

    <div class="login panel panel-success">
        <div class="panel-heading">
            <h1><?php echo Yii::t('user', "Change Password"); ?></h1>
        </div>
        <div class="well" style="margin-bottom: 0px;">

           <fieldset class="form-horizontal" >
            <?php echo CHtml::beginForm(); ?>

            <p class="note"><?php echo Yii::t('user', 'Fields with <span class="required">*</span> are required:'); ?></p><br/>
            <?php echo CHtml::errorSummary($form); ?>
            <div class="form-group">
                <?php echo CHtml::activeLabelEx($form, 'password', array('class' => 'col-lg-3', 'required' => 'required')); ?>
                <div class="col-lg-9 form-inline"><?php echo CHtml::activePasswordField($form, 'password', array('class' => 'form-control')); ?>&nbsp;&nbsp;<span id="result" class="label label-warning" style="padding:5px; margin-bottom: 5px;"></span><br />
                    <div class="log " style="color:red; display:none;">
                        <div class="a-z sublog" >Please add a lowercase letter (abcdefghijklmnopqrstuvwxyz)<br></div>
                        <div class="cap_a sublog">Please add an uppercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)<br></div>
                        <div class="num sublog">Please add a Number (0123456789)<br></div>
                        <div class="symbol sublog">Please add a symbol (`~!@#$%^&*()_+-={}|[]\;:",./<>?')<br></div>
                        <div class="more8 sublog">New Password was less than 8 characters <br></div>
                    </div>
<!--                <p class="hint">
                    <?php echo Yii::t('user', "Minimal password length 5 symbols."); ?>
                </p>-->
            </div>
        </div>

        <div class="form-group">
            <?php echo CHtml::activeLabelEx($form, 'verifyPassword', array('class' => 'col-lg-3')); ?>
            <div class="col-lg-9 form-inline"> <?php echo CHtml::activePasswordField($form, 'verifyPassword', array('class' => 'form-control')); ?>&nbsp;&nbsp;<span id="result2" class="label label-warning" style="padding:5px; margin-bottom: 5px;"></span>
            </div>
        </div>


        <div class="form-actions">
            <?php echo CHtml::submitButton(Yii::t('user', "Save"), array('class' => 'btn btn-danger btn-large', 'id' => 'p_check')); ?>
        </div>

        <?php echo CHtml::endForm(); ?>
    </fieldset><!-- form -->
</div>
</div>
<br/>

<script>


    /*
    jQuery document ready.
    */
    $(document).ready(function()
    {
        /*
            assigning keyup event to password field
            so everytime user type code will execute
            */

            $('#p_check').click(function(e)
            {

                var pot=$('#result').html();
                var pot2=$('#result2').html();

         
            if( (pot != 'Strong') || (pot2 != 'Passwords match') ) {

                e.preventDefault();
                alert("Please fill up all required fields correctly");
            }
        });

            $('#UserChangePassword_password').keyup(function()
            {
                $('.log').css('display', 'block')
            //                            alert('hi');


            $('#result').html(checkStrength($('#UserChangePassword_password').val()))
        });

            $('#UserChangePassword_verifyPassword,#UserChangePassword_password').keyup(function()
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
                $('.log').prepend('<div class="cap_a sublog">Please add an uppercase letter (ABCDEFGHIJKLMNOPQRSTUVWXYZ)<br></div>');

        }


        if (password.match(/([0-9])/)){
            //                    alert('0-9 putted');
            $('.num').remove();
            strength += 1;
        }  else {
            var check=$('.num').val();
            if (check==undefined)
                $('.log').prepend('<div class="num sublog">Please add a Number (0123456789)<br></div>');

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

<style>
    .sublog
    {
        padding:4px 2px 2px;
        font-weight: normal;

    }
</style>