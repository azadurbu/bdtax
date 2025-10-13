


<!-- Grid row -->
<div class="">



    <!-- Data block -->
    <article class="data-block">
        <div class="data-container">
            <!--<header>
                <h2>User Information</h2>
            </header>-->
            <section class="login-rt">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'user-form',
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));

//                $form = $this->beginWidget(
//                                'bootstrap.widgets.TbActiveForm',
//                                array(
//                                    'id' => 'user-form',
//                                    'type' => 'login',
//                                    'htmlOptions' => array('class' => 'well'),
//                                )
//                );
                ?>
                <!--***********************************************************************************************************-->


                <p class="note"><?php echo Yii::t('user','Fields with <span class="required">*</span> are required.'); ?></p>


                <?php $t = CHtml::errorSummary($model);
                if (!empty($t)): ?>
                    <div class="alert alert-error fade in" style=" ">
                        <a class="close" data-dismiss="alert" href="#">&times;</a><?php echo CHtml::errorSummary($model); ?></div>
                <?php endif; ?>

                    <div class="row">
                        <div class="span4">

                            <fieldset class="form-horizontal " >

                                <div class="control-group ">
                                    <!--<label>First Name <span class="required">*</span></label>--><?php echo $form->labelEx($model, 'first_name', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'first_name', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'first_name'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'last_name', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'last_name', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'last_name'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'dob', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'dob', array('size' => 20, 'maxlength' => 255, 'id' => 'dp2', 'data-date-format' => 'mm-dd-yyyy')); ?>
                                    <?php echo $form->hiddenField($model, 'id', array()); ?>
                                    <?php echo $form->error($model, 'dob'); ?>
                                    <input type="hidden" name="age" id="age">
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'gender', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php echo $form->dropDownList($model, 'gender', array('none' => 'Please Select', 'male' => 'Male', 'female' => 'Female'), array('options' => array($model->gender => array('selected' => true)), 'id' => 'gender')); ?>
                                    <?php echo $form->error($model, 'gender'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'height', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">

                                        <div class="input-append"><?php echo $form->textField($model, 'height_feet', array('size' => 20, 'maxlength' => 255, 'class' => 'span1', 'data-mask' => '999-99-999-9999-9', 'prepend' => 'FEET')); ?><span class="add-on">Feet</span></div>
                                        <div class="input-append"><?php echo $form->textField($model, 'height_inch', array('size' => 20, 'maxlength' => 255, 'class' => 'span1', 'data-mask' => '999-99-999-9999-9')); ?><span class="add-on">Inch</span></div>
                                    <?php echo $form->error($model, 'height_feet'); ?><?php echo $form->error($model, 'height_inch'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'weight', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">
                                    <div class="input-append"><?php echo $form->textField($model, 'weight', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9','style'=>'max-width:105px;')); ?> <span class="add-on">Pound(lbs)</span></div>
                                    <?php echo $form->error($model, 'weight'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'activity_level', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">
                                    <?php echo $form->dropDownList($model, 'activity_level', array('none' => 'Please Select', '1.200' => 'Sedentary', '1.375' => 'Lightly Active', '1.550' => 'Moderately Active', '1.725' => 'Very Active', '1.900 ' => 'Extra Active '), array('options' => array($model->gender => array('selected' => true)), 'class' => 'BMRgen')); ?>
                                    <?php echo $form->error($model, 'activity_level'); ?>
                                </div>
                            </div>

                            <!--
                            •	1.200 = sedentary (little or no exercise)
                            •	1.375 = lightly active (light exercise/sports 1-3 days/week, approx. 590 Cal/day)
                            •	1.550 = moderately active (moderate exercise/sports 3-5 days/week, approx. 870 Cal/day)
                            •	1.725 = very active (hard exercise/sports 6-7 days a week, approx. 1150 Cal/day)
                            •	1.900 = extra active (very hard exercise/sports and physical job, approx. 1580 Cal/day)
                            -->

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'allergies', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'allergies', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'allergies'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'zip_code', array('class' => 'control-label', 'for' => 'inputMask')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'zip_code', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'zip_code'); ?>
                                </div>
                            </div>

                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'email', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php echo $form->textField($model, 'email', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'email'); ?>
                                </div>
                            </div>


                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'password', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php echo $form->passwordField($model, 'password', array('size' => 20, 'maxlength' => 255, 'class' => '', 'data-mask' => '999-99-999-9999-9')); ?>
                                    <?php echo $form->error($model, 'password'); ?>
                                </div>
                            </div>


                            <div class="control-group ">
                                <?php echo $form->labelEx($model, 'role', array('class' => 'control-label', 'for' => 'inputMask', 'style' => 'color:#555555')); ?>
                                    <div class="controls">
                                    <?php
                                    $role = Yii::app()->user->role;
                                    if ($role == 'superAdmin') {
                                    ?>
                                    <?php echo $form->dropDownList($model, 'role', array('none' => 'Please Select', 'superAdmin' => 'superAdmin', 'head' => 'Head', 'spouse' => 'Spouse', 'parents' => 'Parents', 'children' => 'Children', 'other' => 'Other'), array('options' => array($model->gender => array('selected' => true)), 'class' => '')); ?>
                                    <?php echo $form->error($model, 'role'); ?>
                                    <?php } else {
                                    ?>
                                    <?php echo $form->dropDownList($model, 'role', array('none' => 'Please Select', 'head' => 'Head', 'spouse' => 'Spouse', 'parents' => 'Parents', 'children' => 'Children', 'other' => 'Other'), array('options' => array($model->gender => array('selected' => true)), 'class' => '')); ?>
                                    <?php echo $form->error($model, 'role'); ?>

                                    <?php } ?>






                                </div>
                            </div>




                        </fieldset>

                    </div> <!--span4-->
                    <div class="span4 label " style="border-left:1px solid #CDCDCD; padding:5px; margin-left: 45px; /*width:300px;*/">
                        <h1 style="text-transform: none;text-align: center;">Recommended Nutrition</h1>
                        <div class="nutrient_list">

                            <?php
                                    // print_r($nutrient_list);
//                                             echo '<pre>';
//                              print_r($nutrient_list);
                                    if (isset($nutrient_list)) {
                            ?>
                                        <form id="nutri-form">
                                            <table >
                                                <tr><th>Title</th><th style="text-align:left" >Minimum</th><th style="text-align:left" >Maximum</th></tr>
                                                <tr><th>Total Calorie</th><td><?php echo '<input id="min_cal"style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . @$nutrient_list[0]['total_calories'] . '" name="min[total_calories]" />'; ?></td><td><?php echo '<input id="max_cal" style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . @$nutrient_list[1]['total_calories'] . '" name="max[total_calories]" />'; ?>&nbsp;(calories)</td></tr>
                                                <tr><th>Total Fat</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['total_fat'] . '" name="min[total_fat]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['total_fat'] . '" name="max[total_fat]" />'; ?>&nbsp;(%calories)</td></tr>
                                                <tr><th>Trans Fat</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['trans_fat'] . '" name="min[trans_fat]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['trans_fat'] . '" name="max[trans_fat]" />'; ?>&nbsp;(g)</td></tr>
                                                <tr><th>Saturated Fat</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['saturated_fat'] . '" name="min[saturated_fat]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['saturated_fat'] . '" name="max[saturated_fat]" />'; ?>&nbsp;(%calories)</td></tr>
                                                <tr><th>Cholesterol</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['cholesterol'] . '" name="min[cholesterol]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['cholesterol'] . '" name="max[cholesterol]" />'; ?>&nbsp;(mg)</td></tr>
                                                <tr><th>Sodium</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['sodium'] . '" name="min[sodium]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['sodium'] . '" name="max[sodium]" />'; ?>&nbsp;(mg)</td></tr>
                                                <tr><th>Potassium</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['potassium'] . '" name="min[potassium]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['potassium'] . '" name="max[potassium]" />'; ?>&nbsp;(mg)</td></tr>
                                                <tr><th>Carbohydrates</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['total_carbohydrates'] . '" name="min[total_carbohydrates]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['total_carbohydrates'] . '" name="max[total_carbohydrates]" />'; ?>&nbsp;(%calories)</td></tr>
                                                <tr><th>Dietary fiber</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['dietary_fiber'] . '" name="min[dietary_fiber]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['dietary_fiber'] . '" name="max[dietary_fiber]" />'; ?>&nbsp;(g)</td></tr>
                                                <tr><th>Sugars</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['sugars'] . '" name="min[sugars]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['sugars'] . '" name="max[sugars]" />'; ?>&nbsp;(g)</td></tr>
                                                <tr><th>Protein</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['protein'] . '" name="min[protein]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['protein'] . '" name="max[protein]" />'; ?>&nbsp;(g)</td></tr>
                                                <tr><th>Vitamin C</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['vitamin_c'] . '" name="min[vitamin_c]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['vitamin_c'] . '" name="max[vitamin_c]" />'; ?>&nbsp;(mg)</td></tr>
                                                <tr><th>Calcium</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['calcium'] . '" name="min[calcium]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['calcium'] . '" name="max[calcium]" />'; ?>&nbsp;(mg)</td></tr>
                                                <tr><th>Iron</th><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[0]['iron'] . '" name="min[iron]" />'; ?></td><td><?php echo '<input style="height:20px; margin-bottom:0px; padding:0px; max-width: 75px;" type="text" value="' . $nutrient_list[1]['iron'] . '" name="max[iron]" />'; ?>&nbsp;(mg)</td></tr>
                                            </table>

                                        </form>

                        <!--                                        <span class="btn btn-info nutritionSave pull-right" style="text-align:center;" >Recommended Nutrition save</span>-->


                            <?php
                                    }//empty check
                                    else {

                                        echo "<p>Sorry there is no data for this user</p>";
                                    }
                            ?>
                                </div>
                            </div><!--span4-->


                            <div class="span8 buttons pull-left" style="margin:5px 0px 5px 99px;">
                                <h1></h1>
                        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('user','Create') : Yii::t('user','Save'), array('class' => 'btn btn-danger btn-large')); ?>
                                </div>

                    <?php $this->endWidget(); ?>


                                </div> <!--row-->
                        </div> <!--row-->




                        </section>
                </div>

                </article>
                <!-- /Data block -->



                </div>
                <!-- /Grid row -->

                <script>
                    $(document).ready(function() {

                        $('#dp2').datepicker('hide').on('changeDate', function(){
                            var datePattern = $('#dp2').val();
                            var cup =datePattern.split('-');

                            //                       var date = data3+'-'+data1+'-'+data2;
                            var date = cup[2]+'-'+cup[0]+'-'+cup[1];

                            console.log(datePattern,date);
                            var age = getAge(date);
                            console.log(age);
                            $('#age').val(age);

                            nutrient();
                        });


                        $('#dp2').change(function(){
                            var datePattern = $('#dp2').val();
                            var cup =datePattern.split('-');
                            var date = cup[2]+'-'+cup[0]+'-'+cup[1];

                            console.log(date);
                            var age = getAge(date);
                            console.log(age);

                            $('#age').val(age);

                            nutrient();
                        });

                        $('#gender').change(function(){

                            var datePattern = $('#dp2').val();
                            var cup =datePattern.split('-');
                            var date = cup[2]+'-'+cup[0]+'-'+cup[1];

                            console.log(date);
                            var age = getAge(date);
                            console.log(age);

                            $('#age').val(age);

                            nutrient();
                        });

                        /*Custom Recommend Nutrition
                         *made it editeble for each
                         *family member
                         **/
                        $('.BMRgen').change(function(){

                            var datePattern = $('#dp2').val();
                            var cup =datePattern.split('-');
                            var date = cup[2]+'-'+cup[0]+'-'+cup[1];

                            var age = getAge(date);


                            //                  var age =$('#age').val();
                            var gender=$('#gender').val();
                            var ds =$('#User_height_inch').val();
                            var inch =Number(ds);

                            var height =((12*$('#User_height_feet').val())+inch);
                            var weight =$('#User_weight').val();
                            var User_activity_level =$('#User_activity_level').val();


                            if (age==''){
                                alert('Please calculate your age first to get BMR');
                            } else if (gender==''){
                                alert('Please calculate your gender first to get BMR');
                            } else if (height==''){
                                alert('Please put your height first to get BMR');
                            } else if (weight==''){
                                alert('Please calculate your weight first to get BMR');
                            }

                            if(gender=='male'){
                                var BMR = ((10 * (0.453592*weight)) + (6.25 * (2.54*height)) - (5 * age)) + 5;
                                var total_calories = (User_activity_level*BMR).toFixed(0);
                                $('#max_cal').val(total_calories);
                                $('#min_cal').val(total_calories-(total_calories*.1));
                                console.log(BMR.toFixed(0));
                                console.log(height);
                            }
                            else {
                                var BMR = ((10 * (0.453592*weight)) + (6.25 * (2.54*height)) - (5 * age)) - 161;
                                var total_calories = (User_activity_level*BMR).toFixed(0);
                                $('#max_cal').val(total_calories);
                                $('#min_cal').val(total_calories-(total_calories*.1));
                                console.log(BMR.toFixed(0));
                            }

                            //                            alert (BMR);


                        });
                        /*Custom Recommend Nutrition
                         *made it editeble for each
                         *family member
                         **/
                        $('.nutritionSave').click(function(){
                            var datePattern = $('#dp2').val();
                            var cup =datePattern.split('-');
                            var date = cup[2]+'-'+cup[0]+'-'+cup[1];

                            console.log(date);
                            var age = getAge(date);
                            console.log(age);

                            $('#age').val(age);

                            customNutrition();
                        });

                        function getAge(dateString) {
                            var today = new Date();
                            var birthDate = new Date(dateString);
                            var age = today.getFullYear() - birthDate.getFullYear();
                            var m = today.getMonth() - birthDate.getMonth();
                            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                                age--;
                            }
                            return age;
                        }


                        function nutrient() {
                            var age =$('#age').val();
                            var gender=$('#gender').val();
                            var id =$('#User_id').val();

                            var formData = 'age='+age+'&gender='+gender+'&id='+id;

                            console.log(formData);


                            var pUrl="<?php echo Yii::app()->request->baseUrl; ?>/index.php/nutrientRange/nutrient_list";

                            submitFormSearchFilter(formData, pUrl,'.nutrient_list');



                        };

                        function submitFormSearchFilter(formData,pUrl,VDiv)
                        {
                            $('#loading').css('display','block');

                            $.ajax({
                                url: pUrl,
                                type: 'POST',
                                data:formData,
                                success: function(response)
                                {
                                    $(VDiv).html(response);

                                }

                            }).success(function(){
                                $('#loading').css('display','none');
                            });
                        }

                        function customNutrition() {
                            var age =$('#age').val();
                            var gender=$('#gender').val();
                            var id =$('#User_id').val();

                            //console.log(yummly_id);

                            var formData2 = $('#nutri-form').serialize();

                            var formData = 'age='+age+'&gender='+gender+'&id='+id+'&'+formData2;

                            console.log(formData);


                            var pUrl="<?php echo Yii::app()->request->baseUrl; ?>/index.php/nutrientRange/nutrient_list";

                            submitCustomNutrition(formData, pUrl,'.nutrient_list');



                        };

                        function submitCustomNutrition(formData,pUrl,VDiv)
                        {
                            $('#loading').css('display','block');

                            $.ajax({
                                url: pUrl,
                                type: 'POST',
                                data:formData,
                                success: function(response)
                                {
                                    $(VDiv).html(response);

                                }

                            }).success(function(){
                                $('#loading').css('display','none');
                            });
                        }

                    });/*DocumentReady*/

                </script>

                <style>
                    .nutriInput{ height:14px; margin-bottom:0px; padding:0px; }
                </style>

                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css" rel="stylesheet" type="text/css" />
                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>





