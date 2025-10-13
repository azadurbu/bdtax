<?=$this->renderPartial('_exportbusiness', array('model3'=>$model3, 'CalculationModel'=>$CalculationModel,'model4'=>$model4))?>

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
		        <?=Yii::t( 'income', "Amount of Income")?>
		    </th>
		    <th>
		        <?=Yii::t( 'income', "Net taxable income")?>
		    </th>
		    <th>
		        <?=Yii::t( 'income', "Net taxable income")?>
		    </th>
		</thead>
		<tbody>
<!-- ================================================================== -->			
			<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'ExportBusiness', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->ExportBusiness_1 ?>" type="text" autocomplete="off" onkeyup="calExportBusiness(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_ExportBusiness_1" name="IncIncomeBusinessOrProfession[ExportBusiness_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->ExportBusiness ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_ExportBusiness" name="IncIncomeBusinessOrProfession[ExportBusiness]" readonly>
			        </div>
			    </td>
			    <td>
			        <div class="form-group">

			        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
			        		Details
			        	</button>

			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'HandCraftedMaterials', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->HandCraftedMaterials_1 ?>" type="text" autocomplete="off" onkeyup="calHandCraftedMaterials(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_HandCraftedMaterials_1" name="IncIncomeBusinessOrProfession[HandCraftedMaterials_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->HandCraftedMaterials ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_HandCraftedMaterials" name="IncIncomeBusinessOrProfession[HandCraftedMaterials]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'BusinessOfSoftwareDevelopment', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->BusinessOfSoftwareDevelopment_1 ?>" type="text" autocomplete="off" onkeyup="calBusinessOfSoftwareDevelopment(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment_1" name="IncIncomeBusinessOrProfession[BusinessOfSoftwareDevelopment_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->BusinessOfSoftwareDevelopment ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment" name="IncIncomeBusinessOrProfession[BusinessOfSoftwareDevelopment]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'NTTN', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->NTTN_1 ?>" type="text" autocomplete="off" onkeyup="calNTTN(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_NTTN_1" name="IncIncomeBusinessOrProfession[NTTN_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->NTTN ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_NTTN" name="IncIncomeBusinessOrProfession[NTTN]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'ITES', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
					<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "8.1")?>"></i>
				</td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->ITES_1 ?>" type="text" autocomplete="off" onkeyup="calITES(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_ITES_1" name="IncIncomeBusinessOrProfession[ITES_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->ITES ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeBusinessOrProfession_ITES" name="IncIncomeBusinessOrProfession[ITES]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'PoultryFarm', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->PoultryFarm_1 ?>" type="text" autocomplete="off" onkeyup="calPoultryFarm(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_PoultryFarm_1" name="IncIncomeBusinessOrProfession[PoultryFarm_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->PoultryFarm ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_PoultryFarm" name="IncIncomeBusinessOrProfession[PoultryFarm]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'AnnualTurnover', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
					<i class="fa fa-question-circle fa-1" /*data-toggle="tooltip"*/ title="<?=Yii::t('TTips', "8.2")?>"></i>
				</td>
			    <td>
			    	<div class="form-group">
			    		<input value="<?php echo @$model3->AnnualTurnover ?>" type="text" autocomplete="off" onkeyup="calAnnualTurnover(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_AnnualTurnover" name="IncIncomeBusinessOrProfession[AnnualTurnover]">
			    	</div>
			    </td>
			    <td>
			        &nbsp;
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'SmallMediumEnterprise', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->SmallMediumEnterprise_1 ?>" type="text" autocomplete="off" onkeyup="calSmallMediumEnterprise(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_SmallMediumEnterprise_1" name="IncIncomeBusinessOrProfession[SmallMediumEnterprise_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->SmallMediumEnterprise ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_SmallMediumEnterprise" name="IncIncomeBusinessOrProfession[SmallMediumEnterprise]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model3, 'Others', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model3->Others_1 ?>" type="text" autocomplete="off" onkeyup="calOthersBusiness(this.value)" class="form-control" id="IncIncomeBusinessOrProfession_Others_1" name="IncIncomeBusinessOrProfession[Others_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model3->Others ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeBusinessOrProfession_Others" name="IncIncomeBusinessOrProfession[Others]" readonly>
			        </div>
			    </td>
                <td>
                    <div class="form-group">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                            Details
                        </button>

                    </div>
                </td>
		   	</tr>



		   	<tr>
				<td colspan="3" style="text-align: right;">
					<button class="btn btn-success btn-lg" onclick="save_IncomeBusinessOrProfession_fraction('IncomeBusinessOrProfessionId',  'IncIncomeBusinessOrProfession', 'IncomeBusinessOrProfession')" type="button" ><?= Yii::t("income","Store") ?></button>
				</td>
		   	</tr>
		</tbody>
	
	
			
		
    </table>
</div>

<input value="<?php echo @$CalculationModel->ExportBusinessExamptPercent ?>" type="hidden" autocomplete="off" id="ExportBusinessExamptPercent" readonly>
<input value="<?php echo @$CalculationModel->AnnualTurnoverLimit ?>" type="hidden" autocomplete="off" id="AnnualTurnoverLimit" readonly>

<script>
function calExportBusiness (value) {
	var value = Number( value );
	var ExamptedPercent = Number( $("#ExportBusinessExamptPercent").val() );
	var ExamptedAmount = value * ExamptedPercent / 100

	if ( value <= ExamptedAmount ) {
		$("#IncIncomeBusinessOrProfession_ExportBusiness").val(0);
	}
	else {
		$("#IncIncomeBusinessOrProfession_ExportBusiness").val( (value-ExamptedAmount) );
	}
}
function calHandCraftedMaterials (value) {
	$("#IncIncomeBusinessOrProfession_HandCraftedMaterials").val(0);
}
function calBusinessOfSoftwareDevelopment (value) {
	$("#IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment").val(0);
}
function calNTTN (value) {
	$("#IncIncomeBusinessOrProfession_NTTN").val(0);
}
function calITES (value) {
	$("#IncIncomeBusinessOrProfession_ITES").val(0);
}
function calPoultryFarm (value) {
	$("#IncIncomeBusinessOrProfession_PoultryFarm").val(value);
}
function calAnnualTurnover (value) {
	var AnnualTurnover = Number( $("#IncIncomeBusinessOrProfession_AnnualTurnover").val() );
	var SmallMediumEnterprise = Number( $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val() );
	var AnnualTurnoverLimit = Number( $("#AnnualTurnoverLimit").val() );

	if ( AnnualTurnover > AnnualTurnoverLimit) {
		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(SmallMediumEnterprise);
	}
	else {
		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(0);
	}

}
function calSmallMediumEnterprise (value) {
	var AnnualTurnover = Number( $("#IncIncomeBusinessOrProfession_AnnualTurnover").val() );
	var SmallMediumEnterprise = Number( $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val() );
	var AnnualTurnoverLimit = Number( $("#AnnualTurnoverLimit").val() );

	if ( AnnualTurnover > AnnualTurnoverLimit) {
		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(SmallMediumEnterprise);
	}
	else {
		$("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(0);
	}
}

function calOthersBusiness (value) {
	$("#IncIncomeBusinessOrProfession_Others").val( Number(value) );
}

function saveScheduleDetails(){
    var Sales = $("#Sales").val();
    
    $.ajax({
        url : baseUrl+"/index.php/Income/saveScheduleDetails",
        type : "POST",
        data : {
            Sales:Sales
        },
        success : function(data) {
            console.log(data);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            bootbox.alert("Internal problem has been occurred. Please try again.");
            $('#loading').css('display','none');
        }
    });
}

</script>