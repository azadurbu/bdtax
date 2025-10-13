<input value="<?php echo @$model2->IncomeOtherSourceId ?>" type="hidden" autocomplete="off" id="IncomeOtherSource_id" name="IncIncomeOtherSource[IncomeOtherSourceId]">

<div class="table-responsive">
    <table class="table table-bordred table-striped">
		<thead>
		    <th>
		        <?=Yii::t( 'income', "Other Sources of Income")?>
		    </th>
		    <th>
		        <?=Yii::t( 'income', "Amount of Income (BDT)")?>
		    </th>
		    <th>
		        <?=Yii::t( 'income', "Net taxable income (BDT)")?>
		    </th>
		</thead>
		<tbody id="OtherSourcesOfIncomeTable">
<!-- ================================================================== -->			
			<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'InterestFromMutualFund', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->InterestFromMutualFund_1 ?>" type="text" autocomplete="off" onkeyup="calInterestFromMutualFund(this.value)" class="form-control" id="IncIncomeOtherSource_InterestFromMutualFund_1" name="IncIncomeOtherSource[InterestFromMutualFund_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->InterestFromMutualFund ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeOtherSource_InterestFromMutualFund" name="IncIncomeOtherSource[InterestFromMutualFund]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'CashDividend', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->CashDividend_1 ?>" type="text" autocomplete="off" onkeyup="calCashDividend(this.value)" class="form-control" id="IncIncomeOtherSource_CashDividend_1" name="IncIncomeOtherSource[CashDividend_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->CashDividend ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeOtherSource_CashDividend" name="IncIncomeOtherSource[CashDividend]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'InterestIncomeFromWEDB', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->InterestIncomeFromWEDB_1 ?>" type="text" autocomplete="off" onkeyup="calInterestIncomeFromWEDB(this.value)" class="form-control" id="IncIncomeOtherSource_InterestIncomeFromWEDB_1" name="IncIncomeOtherSource[InterestIncomeFromWEDB_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->InterestIncomeFromWEDB ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeOtherSource_InterestIncomeFromWEDB" name="IncIncomeOtherSource[InterestIncomeFromWEDB]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'USDollarPremium', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->USDollarPremium_1 ?>" type="text" autocomplete="off" onkeyup="calUSDollarPremium(this.value)" class="form-control" id="IncIncomeOtherSource_USDollarPremium_1" name="IncIncomeOtherSource[USDollarPremium_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->USDollarPremium ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeOtherSource_USDollarPremium" name="IncIncomeOtherSource[USDollarPremium]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'PoundSterlingPremium', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->PoundSterlingPremium_1 ?>" type="text" autocomplete="off" onkeyup="calPoundSterlingPremium(this.value)" class="form-control" id="IncIncomeOtherSource_PoundSterlingPremium_1" name="IncIncomeOtherSource[PoundSterlingPremium_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->PoundSterlingPremium ?>" type="text" autocomplete="off" class="form-control" id="IncIncomeOtherSource_PoundSterlingPremium" name="IncIncomeOtherSource[PoundSterlingPremium]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'EuroPremium', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->EuroPremium_1 ?>" type="text" autocomplete="off" onkeyup="calEuroPremium(this.value)" class="form-control" id="IncIncomeOtherSource_EuroPremium_1" name="IncIncomeOtherSource[EuroPremium_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->EuroPremium ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeOtherSource_EuroPremium" name="IncIncomeOtherSource[EuroPremium]" readonly>
			        </div>
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'InvestmentInInstrument', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			    		<input value="<?php echo @$model2->InvestmentInInstrument ?>" type="text" autocomplete="off" onkeyup="calInvestmentInInstrument(this.value)" class="form-control" id="IncIncomeOtherSource_InvestmentInInstrument" name="IncIncomeOtherSource[InvestmentInInstrument]">
			    	</div>
			    </td>
			    <td>
			        &nbsp;
			    </td>
		   	</tr>
<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'InterestFromInstrument', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->InterestFromInstrument_1 ?>" type="text" autocomplete="off" onkeyup="calInterestFromInstrument(this.value)" class="form-control" id="IncIncomeOtherSource_InterestFromInstrument_1" name="IncIncomeOtherSource[InterestFromInstrument_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->InterestFromInstrument ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeOtherSource_InterestFromInstrument" name="IncIncomeOtherSource[InterestFromInstrument]" readonly>
			        </div>
			    </td>
		   	</tr>

<!-- ================================================================== -->		

<!-- ================================================================== -->		
		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'SanchaypatraIncome', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->SanchaypatraIncome_1 ?>" type="text" autocomplete="off" onkeyup="calSanchaypatraIncome(this.value)" class="form-control" id="IncIncomeOtherSource_SanchaypatraIncome_1" name="IncIncomeOtherSource[SanchaypatraIncome_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->SanchaypatraIncome ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeOtherSource_SanchaypatraIncome" name="IncIncomeOtherSource[SanchaypatraIncome]" readonly>
			        </div>
			    </td>
		   	</tr>

<!-- ================================================================== -->		

<!-- ================================================================== -->		
		   	<tr>
				<td>
					<div class="row">
					    <div class="col-lg-5">
							<?php echo CHtml::activeLabelEx($model2, 'TDSFromSanchaypatra', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
					    </div>
					    <div class="col-lg-4">
							<input value="<?php echo @$model2->TDSFromSanchaypatra ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeOtherSource_TDSFromSanchaypatra" name="IncIncomeOtherSource[TDSFromSanchaypatra]" onkeyup="calTDSFromSanchaypatra(this.value)">
					    </div>
					</div>
		        	

		        	
			    </td>

			    <td>&nbsp;</td>
			    	
			    <td>&nbsp;</td>
			        
			    
		   	</tr>

<!-- ================================================================== -->	

		   	<tr>
				<td>
		        	<?php echo CHtml::activeLabelEx($model2, 'Others (Interest on FDR, DPS, Bank account, and any other income)', array( 'class'=> 'pull-left control-label', 'for' => 'inputMask', 'style' => 'color:#555555; text-align: left;')); ?> &nbsp;&nbsp;
			    </td>
			    <td>
			    	<div class="form-group">
			        	<input value="<?php echo @$model2->Others_1 ?>" type="text" autocomplete="off" onkeyup="calOthers(this.value)" class="form-control" id="IncIncomeOtherSource_Others_1" name="IncIncomeOtherSource[Others_1]">
			        </div>
			    </td>
			    <td>
			        <div class="form-group">
			        	<input value="<?php echo @$model2->Others ?>" type="text" autocomplete="off"  class="form-control" id="IncIncomeOtherSource_Others" name="IncIncomeOtherSource[Others]" readonly>
			        </div>
			    </td>
		   	</tr>



		   	<tr>
				<td colspan="3" style="text-align: right;">
					<button class="btn btn-success btn-lg" onclick="save_IncomeOtherSource_fraction('IncomeOtherSource_id', 'IncIncomeOtherSource', 'IncomeOtherSource')" type="button" ><?= Yii::t("income","Store") ?></button>
				</td>
		   	</tr>
		</tbody>
	
	
			
		
    </table>
</div>

<input value="<?php echo @$CalculationModel->InterestFromMutualFundExamptedAmount ?>" type="hidden" autocomplete="off" id="InterestFromMutualFundExamptedAmount" readonly>
<input value="<?php echo @$CalculationModel->CashDividendFromCompanyExamptedAmount ?>" type="hidden" autocomplete="off" id="CashDividendFromCompanyExamptedAmount" readonly>
<input value="<?php echo @$CalculationModel->InvestmentLimitInSavingsInstrument ?>" type="hidden" autocomplete="off" id="InvestmentLimitInSavingsInstrument" readonly>

<script>
function calInterestFromMutualFund (value) {
	var value = Number( value );
	var ExamptedAmount = Number( $("#InterestFromMutualFundExamptedAmount").val() );

	if ( value <= ExamptedAmount ) {
		$("#IncIncomeOtherSource_InterestFromMutualFund").val(0);
	}
	else {
		$("#IncIncomeOtherSource_InterestFromMutualFund").val( (value-ExamptedAmount) );
	}
}
function calCashDividend (value) {
	var value = Number( value );
	var ExamptedAmount = Number( $("#CashDividendFromCompanyExamptedAmount").val() );

	if ( value <= ExamptedAmount ) {
		$("#IncIncomeOtherSource_CashDividend").val(0);
	}
	else {
		$("#IncIncomeOtherSource_CashDividend").val( (value-ExamptedAmount) );
	}
}
function calInterestIncomeFromWEDB (value) {
	$("#IncIncomeOtherSource_InterestIncomeFromWEDB").val(0);
}
function calUSDollarPremium (value) {
	$("#IncIncomeOtherSource_USDollarPremium").val(0);
}
function calPoundSterlingPremium (value) {
	$("#IncIncomeOtherSource_PoundSterlingPremium").val(0);
}
function calEuroPremium (value) {
	$("#IncIncomeOtherSource_EuroPremium").val(0);
}
function calInvestmentInInstrument (value) {
	var InvestmentInInstrument = Number( $("#IncIncomeOtherSource_InvestmentInInstrument").val() );
	var InterestFromInstrument = Number( $("#IncIncomeOtherSource_InterestFromInstrument_1").val() );
	var InvestmentLimit = Number( $("#InvestmentLimitInSavingsInstrument").val() );

	if ( InvestmentInInstrument > InvestmentLimit) {
		$("#IncIncomeOtherSource_InterestFromInstrument").val(InterestFromInstrument);
	}
	else {
		$("#IncIncomeOtherSource_InterestFromInstrument").val(0);
	}

}
function calInterestFromInstrument (value) {
	var InvestmentInInstrument = Number( $("#IncIncomeOtherSource_InvestmentInInstrument").val() );
	var InterestFromInstrument = Number( $("#IncIncomeOtherSource_InterestFromInstrument_1").val() );
	var InvestmentLimit = Number( $("#InvestmentLimitInSavingsInstrument").val() );

	if ( InvestmentInInstrument > InvestmentLimit) {
		$("#IncIncomeOtherSource_InterestFromInstrument").val(InterestFromInstrument);
	}
	else {
		$("#IncIncomeOtherSource_InterestFromInstrument").val(0);
	}
}

function calOthers (value) {
	$("#IncIncomeOtherSource_Others").val( Number(value) );
}


function calSanchaypatraIncome (value) {
	$("#IncIncomeOtherSource_SanchaypatraIncome").val( Number(value) );
}

function calTDSFromSanchaypatra (value) {
	$("#IncIncomeOtherSource_TDSFromSanchaypatra").val( Number(value) );
}

</script>