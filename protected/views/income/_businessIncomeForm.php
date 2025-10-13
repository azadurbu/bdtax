<?=$this->renderPartial('_exportBusiness', array('model3'=>$model3, 'CalculationModel'=>$CalculationModel,'model4'=>$model4))?>

<input value="<?php echo @$model3->IncomeBusinessOrProfessionId ?>" type="hidden" autocomplete="off" id="IncomeBusinessOrProfessionId" name="IncIncomeBusinessOrProfession[IncomeBusinessOrProfessionId]">

<button type="button" class="btn btn-success" style="display: none" id='exportBusinessP' data-toggle="modal" data-target="#exportBusiness">
    Details
</button>

<div class="table-responsive">
    <table class="table table-bordred table-striped">
        <thead>
            <th>
                <?=Yii::t( 'income', "Sources of Income")?>
            </th>
            <th>
                <?=Yii::t( 'income', "Amount of Income (BDT)")?>
            </th>
            <th>
                <?=Yii::t( 'income', "Net taxable income (BDT)")?>
            </th>
            <th>
                
            </th>
        </thead>
        <tbody>
<!-- ================================================================== -->         
            <!-- <tr>
                <td>
                    <?php echo CHtml::activeLabelEx($model3, 'ExportBusiness', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
                </td>
                <td>
                    <div class="form-group">
                        <input value="<?php echo @$model3->ExportBusiness_1 ?>" type="text" autocomplete="off" onkeyup="calExportBusiness(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_ExportBusiness_1" name="IncIncomeBusinessOrProfession[ExportBusiness_1]" readonly>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input value="<?php echo @$model3->ExportBusiness ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_ExportBusiness" name="IncIncomeBusinessOrProfession[ExportBusiness]" readonly>
                    </div>
                </td>
                <td>
                    <div class="form-group">

                  
                         <button type="button" class="btn btn-success" onclick="get_data('ExportBusiness', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


			        </div>
			    </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'HandCraftedMaterials', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->HandCraftedMaterials_1 ?>" type="text" autocomplete="off" onkeyup="calHandCraftedMaterials(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_HandCraftedMaterials_1" name="IncIncomeBusinessOrProfession[HandCraftedMaterials_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->HandCraftedMaterials ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_HandCraftedMaterials" name="IncIncomeBusinessOrProfession[HandCraftedMaterials]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('HandCraftedMaterials', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>

                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'BusinessOfSoftwareDevelopment', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->BusinessOfSoftwareDevelopment_1 ?>" type="text" autocomplete="off" onkeyup="calBusinessOfSoftwareDevelopment(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment_1" name="IncIncomeBusinessOrProfession[BusinessOfSoftwareDevelopment_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->BusinessOfSoftwareDevelopment ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment" name="IncIncomeBusinessOrProfession[BusinessOfSoftwareDevelopment]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('BusinessOfSoftwareDevelopment', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>

                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'NTTN', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->NTTN_1 ?>" type="text" autocomplete="off" onkeyup="calNTTN(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_NTTN_1" name="IncIncomeBusinessOrProfession[NTTN_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->NTTN ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_NTTN" name="IncIncomeBusinessOrProfession[NTTN]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('NTTN', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'ITES', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
					<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "8.1")?>"></i>
				</td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->ITES_1 ?>" type="text" autocomplete="off" onkeyup="calITES(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_ITES_1" name="IncIncomeBusinessOrProfession[ITES_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->ITES ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_ITES" name="IncIncomeBusinessOrProfession[ITES]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('ITES', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'PoultryFarm', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->PoultryFarm_1 ?>" type="text" autocomplete="off" onkeyup="calPoultryFarm(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_PoultryFarm_1" name="IncIncomeBusinessOrProfession[PoultryFarm_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->PoultryFarm ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_PoultryFarm" name="IncIncomeBusinessOrProfession[PoultryFarm]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('PoultryFarm', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   <!-- 	<tr>
				<td>
		        	<?php //echo CHtml::activeLabelEx($model3, 'AnnualTurnover', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
					<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "8.2")?>"></i>
				</td>
			    <td>
			    	<div class="form-group"> -->
			    		<input value="<?php echo @$model3->AnnualTurnover ?>" type="hidden" autocomplete="off" onkeyup="calAnnualTurnover(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_AnnualTurnover" name="IncIncomeBusinessOrProfession[AnnualTurnover]" readonly>
			    	<!-- </div>
			    </td>
			    <td>
			        &nbsp;
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('AnnualTurnover', '<?php //echo $model3->IncomeId;?>');">Details</button>


                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'SmallMediumEnterprise', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->SmallMediumEnterprise_1 ?>" type="text" autocomplete="off" onkeyup="calSmallMediumEnterprise(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_SmallMediumEnterprise_1" name="IncIncomeBusinessOrProfession[SmallMediumEnterprise_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->SmallMediumEnterprise ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_SmallMediumEnterprise" name="IncIncomeBusinessOrProfession[SmallMediumEnterprise]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('SmallMediumEnterprise', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


                    </div>
                </td>
		   	</tr> -->
<!-- ================================================================== -->		
		   	<!-- <tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'Others', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->Others_1 ?>" type="text" autocomplete="off" onkeyup="calOthersBusiness(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_Others_1" name="IncIncomeBusinessOrProfession[Others_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->Others ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_Others" name="IncIncomeBusinessOrProfession[Others]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('Others', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>


                    </div>
                </td>
		   	</tr> -->

<!-- ================================================================== -->		
		   	<tr>
				<td>
					<label class="pull-left control-label" style="color:#555555; text-align: left;" for="inputMask"><?=Yii::t('income','Income From Business 1') ?></label>
		        	<?php //echo CHtml::activeLabelEx($model3, 'IncomeFromBusiness1', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness1_1 ?>" type="text" autocomplete="off" onkeyup="calIncomeFromBusiness1Business(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness1_1" name="IncIncomeBusinessOrProfession[IncomeFromBusiness1_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness1 ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness1" name="IncIncomeBusinessOrProfession[IncomeFromBusiness1]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('IncomeFromBusiness1', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>

                        <button type="button" class="btn btn-danger" onclick="delete_bin_data('IncomeFromBusiness1', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Delete")?></button>


                    </div>
                </td>
		   	</tr>

<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<label class="pull-left control-label" style="color:#555555; text-align: left;" for="inputMask"><?=Yii::t('income','Income From Business 2') ?></label> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness2_1 ?>" type="text" autocomplete="off" onkeyup="calIncomeFromBusiness2Business(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness2_1" name="IncIncomeBusinessOrProfession[IncomeFromBusiness2_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness2 ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness2" name="IncIncomeBusinessOrProfession[IncomeFromBusiness2]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('IncomeFromBusiness2', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>

                        <button type="button" class="btn btn-danger" onclick="delete_bin_data('IncomeFromBusiness2', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Delete")?></button>


                    </div>
                </td>
		   	</tr>

<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<label class="pull-left control-label" style="color:#555555; text-align: left;" for="inputMask"><?=Yii::t('income','Income From Business 3') ?></label> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness3_1 ?>" type="text" autocomplete="off" onkeyup="calIncomeFromBusiness3Business(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness3_1" name="IncIncomeBusinessOrProfession[IncomeFromBusiness3_1]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->IncomeFromBusiness3 ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_IncomeFromBusiness3" name="IncIncomeBusinessOrProfession[IncomeFromBusiness3]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" onclick="get_data('IncomeFromBusiness3', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Details")?></button>

                        <button type="button" class="btn btn-danger" onclick="delete_bin_data('IncomeFromBusiness3', '<?php echo $model3->IncomeId;?>');"><?=Yii::t( 'income', "Delete")?></button>


                    </div>
                </td>
		   	</tr>


		   <!-- 	<tr>
				<td colspan="3" style="text-align: right;">
					<button class="btn btn-success btn-lg" style="display: none;" onclick="save_IncomeBusinessOrProfession_fraction('IncomeBusinessOrProfessionId',  'IncIncomeBusinessOrProfession', 'IncomeBusinessOrProfession')" type="button" ><?= Yii::t("income","Store") ?></button>
				</td>
		   	</tr> -->
		</tbody>
	
	
			
		
    </table>
</div>

<input value="<?php echo @$CalculationModel->ExportBusinessExamptPercent ?>" type="hidden" autocomplete="off" id="ExportBusinessExamptPercent" readonly>
<input value="<?php echo @$CalculationModel->AnnualTurnoverLimit ?>" type="hidden" autocomplete="off" id="AnnualTurnoverLimit" readonly>

<script>
// function calExportBusiness (value) {
// 	var value = Number( value );
// 	var ExamptedPercent = Number( $("#ExportBusinessExamptPercent").val() );
// 	var ExamptedAmount = value * ExamptedPercent / 100

// 	$("#IncIncomeBusinessOrProfession_ExportBusiness_1").val(value);

// 	if ( value <= ExamptedAmount ) {
//         $("#IncIncomeBusinessOrProfession_ExportBusiness").val(0);
// 		$("#temp_NetTaxable").val(0);
// 	}
// 	else {
//         $("#IncIncomeBusinessOrProfession_ExportBusiness").val( (value-ExamptedAmount) );
// 		$("#temp_NetTaxable").val( (value-ExamptedAmount) );
// 	}
// }
// function calHandCraftedMaterials (value) {
// 	$("#IncIncomeBusinessOrProfession_HandCraftedMaterials_1").val(value);
// 	$("#IncIncomeBusinessOrProfession_HandCraftedMaterials").val(0);
//     $("#temp_NetTaxable").val(0);
// }
// function calBusinessOfSoftwareDevelopment (value) {
// 	$("#IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment_1").val(value);
// 	$("#IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment").val(0);
//     $("#temp_NetTaxable").val(0);
// }
// function calNTTN (value) {
// 	$("#IncIncomeBusinessOrProfession_NTTN_1").val(value);
// 	$("#IncIncomeBusinessOrProfession_NTTN").val(0);
//     $("#temp_NetTaxable").val(0);
// }
// function calITES (value) {
// 	$("#IncIncomeBusinessOrProfession_ITES_1").val(value);
// 	$("#IncIncomeBusinessOrProfession_ITES").val(0);
//     $("#temp_NetTaxable").val(0);
// }
// function calPoultryFarm (value) {
// 	$("#IncIncomeBusinessOrProfession_PoultryFarm_1").val(value);
// 	$("#IncIncomeBusinessOrProfession_PoultryFarm").val(value);
//     $("#temp_NetTaxable").val(value);
// }
// // function calAnnualTurnover (value) {
// // 	// var AnnualTurnover = Number( $("#IncIncomeBusinessOrProfession_AnnualTurnover").val() );
// // 	// var SmallMediumEnterprise = Number( $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val() );
// // 	// var AnnualTurnoverLimit = Number( $("#AnnualTurnoverLimit").val() );

// // 	// if ( AnnualTurnover > AnnualTurnoverLimit) {
// // 	// 	$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(SmallMediumEnterprise);
// // 	// }
// // 	// else {
// // 	// 	$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(0);
// // 	// }

// // }
// function calSmallMediumEnterprise (value) {
// 	var AnnualTurnover = Number( $("#IncIncomeBusinessOrProfessionDetails_Sales").val() );
// 	var SmallMediumEnterprise = Number( $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val() );
// 	var AnnualTurnoverLimit = Number( $("#AnnualTurnoverLimit").val() );

// 	$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val(Number(value));
// 	$("#IncIncomeBusinessOrProfession_AnnualTurnover").val(Number($('#IncIncomeBusinessOrProfessionDetails_Sales')));
// 	if ( AnnualTurnover > AnnualTurnoverLimit) {
// 		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(SmallMediumEnterprise);
// 		$("#temp_NetTaxable").val(Number(value));
// 	}
// 	else {
// 		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(0);
// 		$("#temp_NetTaxable").val(0);
// 	}
// }

// function calOthersBusiness (value) {
//     $("#IncIncomeBusinessOrProfession_Others_1").val(Number(value));
//     $("#IncIncomeBusinessOrProfession_Others").val(Number(value));
// 	$("#temp_NetTaxable").val(Number(value));

// }

function calIncomeFromBusiness1 (value,status) {
    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness1_1").val(Number(value));
 //    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness1").val(Number(value));
	// $("#temp_NetTaxable").val(Number(value));
	if(status == false){
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness1").val(Number(value));
		$("#temp_NetTaxable").val(Number(value));
	}else{
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness1").val(Number(0));
		$("#temp_NetTaxable").val(Number(0));
	}

}

function calIncomeFromBusiness2 (value,status) {
    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness2_1").val(Number(value));
 //    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness2").val(Number(value));
	// $("#temp_NetTaxable").val(Number(value));
	if(status == false){
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness2").val(Number(value));
		$("#temp_NetTaxable").val(Number(value));
	}else{
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness2").val(Number(0));
		$("#temp_NetTaxable").val(Number(0));
	}

}

function calIncomeFromBusiness3 (value,status) {
    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness3_1").val(Number(value));
 //    $("#IncIncomeBusinessOrProfession_IncomeFromBusiness3").val(Number(value));
	// $("#temp_NetTaxable").val(Number(value));
	if(status == false){
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness3").val(Number(value));
		$("#temp_NetTaxable").val(Number(value));
	}else{
		$("#IncIncomeBusinessOrProfession_IncomeFromBusiness3").val(Number(0));
		$("#temp_NetTaxable").val(Number(0));
	}

}

function delete_bin_data(type,incomeId){

	$.ajax({
        url : baseUrl+"/index.php/Income/deleteBusinessDetails",
        type : "POST",
        dataType : "json",
        cache : false,
        data : {
            Type: type,
            IncomeId: incomeId
        },
        success : function(data) {
            //location.reload();
        }
    });

}

function get_data(type,incomeId){
	//Header of the modal
	// if(type == 'ExportBusiness'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Income from export business') ?>");
	// }
	// if(type == 'HandCraftedMaterials'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Income from export of hand crafted materials') ?>");
	// }
	// if(type == 'BusinessOfSoftwareDevelopment'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Income from business of Software Development') ?>");
	// }
	// if(type == 'NTTN'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','NTTN (Nationwide Telecommunication Transmission Network)') ?>");
	// }
	// if(type == 'ITES'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Information Technology Enabled Services (ITES)') ?>");
	// }
	// if(type == 'PoultryFarm'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Income from hen-duck hatchery, prawn & fish hatchery, fish culture') ?>");
	// }
	// if(type == 'SmallMediumEnterprise'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Income of SME') ?>");
	// }
	// if(type == 'Others'){
	// 	$(".my_modal-header h3").text("<?=Yii::t('income','Others') ?>");
	// }
	if(type == 'IncomeFromBusiness1'){
		$(".my_modal-header h3").text("<?=Yii::t('income','Income From Business 1') ?>");
	}
	if(type == 'IncomeFromBusiness2'){
		$(".my_modal-header h3").text("<?=Yii::t('income','Income From Business 2') ?>");
	}
	if(type == 'IncomeFromBusiness3'){
		$(".my_modal-header h3").text("<?=Yii::t('income','Income From Business 3') ?>");
	}
	//Header of the modal

    var tempAmount = $('#IncIncomeBusinessOrProfession_'+type+'_1').val();
    var tempTaxableIncome = $('#IncIncomeBusinessOrProfession_'+type).val();
    $('#temp_Amount').val(tempAmount);
    $('#temp_NetTaxable').val(tempTaxableIncome);
    $.ajax({
        url : baseUrl+"/index.php/Income/getBusinessDetails",
        type : "POST",
        dataType : "json",
        cache : false,
        data : {
            Type: type,
            IncomeId: incomeId
        },
        success : function(data) {
            $('#IncIncomeBusinessOrProfessionDetails_Type').val(type);
            $('#IncIncomeBusinessOrProfessionDetails_BusinessOrProfessionName').val(data.BusinessOrProfessionName);
            $('#IncIncomeBusinessOrProfessionDetails_Address').val(data.Address);
            $('#IncIncomeBusinessOrProfessionDetails_Sales').val(data.Sales);
            $('#IncIncomeBusinessOrProfessionDetails_GrossProfit').val(data.GrossProfit);
            $('#IncIncomeBusinessOrProfessionDetails_OtherExpense').val(data.OtherExpense);
            $('#IncIncomeBusinessOrProfessionDetails_NetProfit').val(data.NetProfit);
            $('#IncIncomeBusinessOrProfessionDetails_CashInHandOrBank').val(data.CashInHandOrBank);
            $('#IncIncomeBusinessOrProfessionDetails_Inventories').val(data.Inventories);
            $('#IncIncomeBusinessOrProfessionDetails_FixedAssets').val(data.FixedAssets);
            $('#IncIncomeBusinessOrProfessionDetails_OtherAssets').val(data.OtherAssets);
            $('#IncIncomeBusinessOrProfessionDetails_TotalAssets').val(data.TotalAssets);
            $('#IncIncomeBusinessOrProfessionDetails_OpeningCapital').val(data.OpeningCapital);
            $('#IncIncomeBusinessOrProfessionDetails_NetProfitBalanceSheet').val(data.NetProfit);
            $('#IncIncomeBusinessOrProfessionDetails_WithdrawlsInIncomeYear').val(data.WithdrawlsInIncomeYear);
            $('#IncIncomeBusinessOrProfessionDetails_ClosingCapital').val(data.ClosingCapital);
            $('#IncIncomeBusinessOrProfessionDetails_Liabilities').val(data.Liabilities);
            $('#IncIncomeBusinessOrProfessionDetails_TotalCapitalLiabilities').val(data.TotalCapitalLiabilities);
            if(data.BusinessIncomeExempted=='Yes'){
            	$('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').prop('checked',true); 
            }else{
            	$('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').prop('checked',false); 
            }
            // if(data.status == "success")
            // {
            //     location.reload();  
            // }
            // else
            // {
            //     bootbox.alert(data.msg);
            // }
            //$('#exportBusinessP').click();//
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            bootbox.alert("Internal problem has been occurred. Please try again.");
            $('#loading').css('display','none');
        },
        complete : function()
        {
            $('#exportBusinessP').click();
        }
    });
}

</script>