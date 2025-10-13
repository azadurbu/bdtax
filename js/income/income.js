$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  $("div.flash_alert").html("");
	});

	$("#IncInterestOnSecurities_Type").change(function() {
		if ($("#IncInterestOnSecurities_Type").val() == "Zero Coupon Bond") {
			$('#IncInterestOnSecurities_Cost').val( 0 ) ;
		}else{
			var IncInterestOnSecurities_CommissionOrInterest = $('#IncInterestOnSecurities_CommissionOrInterest').val();
			var IncInterestOnSecurities_NetAmount = $('#IncInterestOnSecurities_NetAmount').val();


				var value = (IncInterestOnSecurities_NetAmount-IncInterestOnSecurities_CommissionOrInterest);

			if (value<0) {

				var netValue = 0;
			} else {

				netValue = (IncInterestOnSecurities_NetAmount-IncInterestOnSecurities_CommissionOrInterest);
				
			}
			$('#IncInterestOnSecurities_Cost').val(netValue) ;
		}
	});
});

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%InterestOnSecurity%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
function InterestOnSecuritiesCalculation (e) {

	var sourceId ='#'+e.id; 

	var amount = isPositiveInteger(e.value);

	if (!amount) {

		bootbox.alert("Please put an number", function() {}); 

		$(sourceId).val( $(sourceId).val().slice(0,-1) );
	}

	if ($("#IncInterestOnSecurities_Type").val() == "Zero Coupon Bond") {
		$('#IncInterestOnSecurities_Cost').val( 0 ) ;
		return;
	}

	var IncInterestOnSecurities_CommissionOrInterest = $('#IncInterestOnSecurities_CommissionOrInterest').val();
	var IncInterestOnSecurities_NetAmount = $('#IncInterestOnSecurities_NetAmount').val();


		var value = (IncInterestOnSecurities_NetAmount-IncInterestOnSecurities_CommissionOrInterest);

	if (value<0) {

		var netValue = 0;
	} else {

		netValue = (IncInterestOnSecurities_NetAmount-IncInterestOnSecurities_CommissionOrInterest);
		
	}



	$('#IncInterestOnSecurities_Cost').val( netValue ) ;

}


function save_income_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfSecurities",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncInterestOnSecurities_Type 					: $("#IncInterestOnSecurities_Type").val(),
			IncInterestOnSecurities_Description 			: $("#IncInterestOnSecurities_Description").val(),
			IncInterestOnSecurities_NetAmount 				: $("#IncInterestOnSecurities_NetAmount").val(),
			IncInterestOnSecurities_CommissionOrInterest 	: $("#IncInterestOnSecurities_CommissionOrInterest").val(),
			IncInterestOnSecurities_Cost 					: $("#IncInterestOnSecurities_Cost").val(),
			IncomeId 										: $("#Income_IncomeId").val(),
			InterestOnSecuritiesId 							: securityId,
			model											: model,
			field_name 										: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_InterestOnSecurities(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncInterestOnSecurities_Type").val(data.Type);
			$("#IncInterestOnSecurities_Description").val(data.Description);
			$("#IncInterestOnSecurities_NetAmount").val(data.NetAmount);
			$("#IncInterestOnSecurities_CommissionOrInterest").val(data.CommissionOrInterest);
			$("#IncInterestOnSecurities_Cost").val(data.Cost);
			$("#InterestOnSecurities_id").val(data.InterestOnSecuritiesId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%InterestOnSecurity%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeAgriculture%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function BooksOfAccountStatus(){
	var bookOfAccStatus = $('input[name="BooksOfAccount"]:checked').val();
	// console.log(bookOfAccStatus);
	if(bookOfAccStatus=='No'){
		$('#IncIncomeAgriculture_ProductionCost').val(null);
		$('#IncIncomeAgriculture_TotalRevenue').val(null);
		$('#IncIncomeAgriculture_Cost').val(null);
		$('#IncIncomeAgriculture_ProductionCost').attr('readonly', true);
	}else{
		$('#IncIncomeAgriculture_ProductionCost').val(null);
		$('#IncIncomeAgriculture_TotalRevenue').val(null);
		$('#IncIncomeAgriculture_Cost').val(null);
		$('#IncIncomeAgriculture_ProductionCost').attr('readonly', false);
	}
}

function IncomeAgricultureCalculation (e) {
	var bookOfAccStatus = $('input[name="BooksOfAccount"]:checked').val();

	var sourceId ='#'+e.id; 

	var amount = isPositiveInteger(e.value);

	if (!amount) {

		bootbox.alert("Please put an number", function() {}); 

		$(sourceId).val( $(sourceId).val().slice(0,-1) );
	};  

	var IncIncomeAgriculture_TotalRevenue = $('#IncIncomeAgriculture_TotalRevenue').val();
	if(bookOfAccStatus == 'No'){
		pCost = IncIncomeAgriculture_TotalRevenue*60/100;
		var IncIncomeAgriculture_ProductionCost = $('#IncIncomeAgriculture_ProductionCost').val(pCost);
	}
	var IncIncomeAgriculture_ProductionCost = $('#IncIncomeAgriculture_ProductionCost').val();


	// console.log(bookOfAccStatus);

	var value = (IncIncomeAgriculture_TotalRevenue-IncIncomeAgriculture_ProductionCost);


	if (value<0) {

		var netValue = 0;
	} else {

		netValue = (IncIncomeAgriculture_TotalRevenue-IncIncomeAgriculture_ProductionCost);
		
	}
	$('#IncIncomeAgriculture_Cost').val( netValue ) ;

}


function save_IncomeAgriculture_fraction(id, description, cost, model, field_name) {

	//var data = $('#IncomeAgriculture_table').serialize();

	var BooksOfAccount = $('input[name="BooksOfAccount"]:checked').val();

	if(BooksOfAccount === undefined){
		BooksOfAccount='notSet';
	}

	var agricultureId = "";

	if ($("#"+id).val()) {
		var agricultureId = $("#"+id).val()
	} else {
		var agricultureId = "notSet";
	}

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfAgriculture",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			BooksOfAccount									: BooksOfAccount,
			IncIncomeAgriculture_LandInBigha 				: $("#IncIncomeAgriculture_LandInBigha").val(),
			IncIncomeAgriculture_CropsType					: $("#IncIncomeAgriculture_CropsType").val(),
			IncIncomeAgriculture_TotalRevenue 				: $("#IncIncomeAgriculture_TotalRevenue").val(),
			IncIncomeAgriculture_ProductionCost 			: $("#IncIncomeAgriculture_ProductionCost").val(),
			IncIncomeAgriculture_Cost 						: $("#IncIncomeAgriculture_Cost").val(),
			IncomeId 										: $("#Income_IncomeId").val(),
			IncomeAgricultureId 							: agricultureId,
			model											: model,
			field_name 										: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeAgriculture(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {					
			if (data.BooksOfAccount == "No") {
				$("#BooksOfAccount_1").attr('checked', 'checked');
			}
			else {
				$("#BooksOfAccount_0").attr('checked', 'checked');
			}
			BooksOfAccountStatus();

			setTimeout(
						function() 
						{
							$("#IncIncomeAgriculture_LandInBigha").val(data.LandInBigha);
							$("#IncIncomeAgriculture_CropsType").val(data.CropsType);
							$("#IncIncomeAgriculture_TotalRevenue").val(data.TotalRevenue);
							$("#BooksOfAccount").val(data.BooksOfAccount);
							$("#IncIncomeAgriculture_ProductionCost").val(data.ProductionCost);
							$("#IncIncomeAgriculture_Cost").val(data.Cost);
							$("#IncomeAgriculture_id").val(data.IncomeAgricultureId);
						}, 
					300);

			
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeAgriculture%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeBusinessOrProfession%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_IncomeBusinessOrProfession_fraction(id, model, field_name) {

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	var BusinessIncomeExemptedValue = null;
    if($('#IncIncomeBusinessOrProfessionDetails_BusinessIncomeExempted').is(":checked")){
    	BusinessIncomeExemptedValue = 'Yes';
    }else{
    	BusinessIncomeExemptedValue = null;
    }



	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/SaveFrcOfBusinessOrProfession",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			// ExportBusiness: $("#IncIncomeBusinessOrProfession_ExportBusiness").val(),
			// ExportBusiness_1: $("#IncIncomeBusinessOrProfession_ExportBusiness_1").val(),

			// HandCraftedMaterials_1: $("#IncIncomeBusinessOrProfession_HandCraftedMaterials_1").val(),
			// HandCraftedMaterials: $("#IncIncomeBusinessOrProfession_HandCraftedMaterials").val(),

			// BusinessOfSoftwareDevelopment_1: $("#IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment_1").val(),
			// BusinessOfSoftwareDevelopment: $("#IncIncomeBusinessOrProfession_BusinessOfSoftwareDevelopment").val(),

			// NTTN_1: $("#IncIncomeBusinessOrProfession_NTTN_1").val(),
			// NTTN: $("#IncIncomeBusinessOrProfession_NTTN").val(),

			// ITES_1: $("#IncIncomeBusinessOrProfession_ITES_1").val(),
			// ITES: $("#IncIncomeBusinessOrProfession_ITES").val(),

			// PoultryFarm_1: $("#IncIncomeBusinessOrProfession_PoultryFarm_1").val(),
			// PoultryFarm: $("#IncIncomeBusinessOrProfession_PoultryFarm").val(),

			// AnnualTurnover: $("#IncIncomeBusinessOrProfession_AnnualTurnover").val(),
		

			// SmallMediumEnterprise_1: $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise_1").val(),
			// SmallMediumEnterprise: $("#IncIncomeBusinessOrProfession_SmallMediumEnterprise").val(),

			// Others_1: $("#IncIncomeBusinessOrProfession_Others_1").val(),
			// Others: $("#IncIncomeBusinessOrProfession_Others").val(),

			IncomeFromBusiness1_1: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness1_1").val(),
			IncomeFromBusiness1: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness1").val(),

			IncomeFromBusiness2_1: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness2_1").val(),
			IncomeFromBusiness2: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness2").val(),

			IncomeFromBusiness3_1: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness3_1").val(),
			IncomeFromBusiness3: $("#IncIncomeBusinessOrProfession_IncomeFromBusiness3").val(),

			Type: $("#IncIncomeBusinessOrProfessionDetails_Type").val(),
			BusinessOrProfessionName: $("#IncIncomeBusinessOrProfessionDetails_BusinessOrProfessionName").val(),
			Address: $("#IncIncomeBusinessOrProfessionDetails_Address").val(),
			Sales: $("#IncIncomeBusinessOrProfessionDetails_Sales").val(),
			GrossProfit: $("#IncIncomeBusinessOrProfessionDetails_GrossProfit").val(),
			OtherExpense: $("#IncIncomeBusinessOrProfessionDetails_OtherExpense").val(),
			NetProfit: $("#IncIncomeBusinessOrProfessionDetails_NetProfit").val(),
			CashInHandOrBank: $("#IncIncomeBusinessOrProfessionDetails_CashInHandOrBank").val(),
			Inventories: $("#IncIncomeBusinessOrProfessionDetails_Inventories").val(),
			FixedAssets: $("#IncIncomeBusinessOrProfessionDetails_FixedAssets").val(),
			OtherAssets: $("#IncIncomeBusinessOrProfessionDetails_OtherAssets").val(),
			TotalAssets: $("#IncIncomeBusinessOrProfessionDetails_TotalAssets").val(),
			OpeningCapital: $("#IncIncomeBusinessOrProfessionDetails_OpeningCapital").val(),
			WithdrawlsInIncomeYear: $("#IncIncomeBusinessOrProfessionDetails_WithdrawlsInIncomeYear").val(),
			ClosingCapital: $("#IncIncomeBusinessOrProfessionDetails_ClosingCapital").val(),
			Liabilities: $("#IncIncomeBusinessOrProfessionDetails_Liabilities").val(),
			TotalCapitalLiabilities: $("#IncIncomeBusinessOrProfessionDetails_TotalCapitalLiabilities").val(),
			BusinessIncomeExempted: BusinessIncomeExemptedValue,

			temp_Amount: $("#temp_Amount").val(),
			temp_NetTaxable: $("#temp_NetTaxable").val(),

			IncomeId: $("#Income_IncomeId").val(),
			IncomeOtherSourceId: securityId,
			field_name: field_name,
			model: model
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeBusinessOrProfession(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncIncomeBusinessOrProfession_Type").val(data.Type);
			$("#IncIncomeBusinessOrProfession_Description").val(data.Description);
			$("#IncIncomeBusinessOrProfession_Cost").val(data.Cost);
			$("#IncomeBusinessOrProfession_id").val(data.IncomeBusinessOrProfessionId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeBusinessOrProfession%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%




//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeShareProfit%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_IncomeShareProfit_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	console.log(securityId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfShareProfit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeShareProfit_NameOfFirm 	: $("#IncIncomeShareProfit_NameOfFirm").val(),
			IncIncomeShareProfit_IncomeOfFirm 	: $("#IncIncomeShareProfit_IncomeOfFirm").val(),
			IncIncomeShareProfit_ShareOfFirm 	: $("#IncIncomeShareProfit_ShareOfFirm").val(),
			IncIncomeShareProfit_Cost 			: $("#IncIncomeShareProfit_Cost").val(),
			IncomeId 							: $("#Income_IncomeId").val(),
			IncomeShareProfitId 				: securityId,
			model								: model,
			field_name 							: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeShareProfit(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncIncomeShareProfit_NameOfFirm").val(data.NameOfFirm);
			$("#IncIncomeShareProfit_IncomeOfFirm").val(data.IncomeOfFirm);
			$("#IncIncomeShareProfit_ShareOfFirm").val(data.ShareOfFirm);
			$("#IncIncomeShareProfit_Cost").val(data.Cost);
			$("#IncomeShareProfit_id").val(data.IncomeShareProfitId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeShareProfit%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeSpouseOrChild%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_IncomeSpouseOrChild_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	console.log(securityId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfSpouseOrChild",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeSpouseOrChild_Type 	: $("#IncIncomeSpouseOrChild_Type").val(),
			IncIncomeSpouseOrChild_Name 	: $("#IncIncomeSpouseOrChild_Name").val(),
			IncIncomeSpouseOrChild_Cost 			: $("#IncIncomeSpouseOrChild_Cost").val(),
			IncomeId 							: $("#Income_IncomeId").val(),
			IncomeSpouseOrChildId 				: securityId,
			model								: model,
			field_name 							: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeSpouseOrChild(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncIncomeSpouseOrChild_Type").val(data.Type);
			$("#IncIncomeSpouseOrChild_Name").val(data.Name);
			$("#IncIncomeSpouseOrChild_Cost").val(data.Cost);
			$("#IncomeSpouseOrChild_id").val(data.IncomeSpouseOrChildId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeSpouseOrChild%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeCapitalGains%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function CalculationOfCapitalGain() {
	var IncomeType = $("#IncIncomeCapitalGains_Type").val();
    //alert(IncomeType);
	var MoreThanTenPercentHolder = $("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']:checked").val();
	var MoreThanFiveYearHolder = $("input[name='IncIncomeCapitalGains[MoreThanFiveYear]']:checked").val();
	var SaleOfShare = Number( $("#IncIncomeCapitalGains_SaleOfShare").val() );
	//var SaleOfShare = Number( $("#IncIncomeCapitalGains_SaleOfShare").val() );
//alert(SaleOfShare);
	if (IncomeType == "Sale of Share") {
		$("#sharePercentLandCarHouseDiv").hide();
		$("#sharePercentDiv").show();
		$("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
		if (MoreThanTenPercentHolder == "YES") {
			$("#IncIncomeCapitalGains_Cost").val(SaleOfShare);
		}
		else {
			$("#IncIncomeCapitalGains_Cost").val(0);
		}
	}else if(IncomeType == "Sale of Land" ||
	         IncomeType == "Sale of Land and House" ||
	         IncomeType == "Sale of Flat"){

		    $("#sharePercentDiv").hide();
			$("#sharePercentLandCarHouseDiv").show();
			$("#IncIncomeCapitalGains_SaleOfShare_Tds").show();

			$("#IncIncomeCapitalGains_Cost").val(SaleOfShare);
		    $("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
		
	}else if(IncomeType == "Signing Money Received"){
		    $("#sharePercentDiv").hide();
			$("#sharePercentLandCarHouseDiv").hide();
			$("#IncIncomeCapitalGains_SaleOfShare_Tds").show();

			$("#IncIncomeCapitalGains_Cost").val(SaleOfShare);
	}else {
		$("#IncIncomeCapitalGains_Cost").val(SaleOfShare);
		$("#sharePercentDiv").hide();
		$("#sharePercentLandCarHouseDiv").hide();
		$("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
		
	}
	
}
function save_IncomeCapitalGains_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfCapitalGains",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeCapitalGains_Type 					: $("#IncIncomeCapitalGains_Type").val(),
			IncIncomeCapitalGains_Description 			: $("#IncIncomeCapitalGains_Description").val(),
			IncIncomeCapitalGains_Cost 					: $("#IncIncomeCapitalGains_Cost").val(),
			SaleOfShare 								: $("#IncIncomeCapitalGains_SaleOfShare").val(),
			MoreThanTenPercentHolder 					: $("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']:checked").val(),
			IncomeId 									: $("#Income_IncomeId").val(),
			IncomeCapitalGainsId 						: securityId,
			model										: model,
			field_name 									: field_name,
			tds_amount 									: $("#IncIncomeCapitalGains_SaleOfShare_Tds").val()
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeCapitalGains(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncIncomeCapitalGains_Type").val(data.Type);
			$("#IncIncomeCapitalGains_Description").val(data.Description);
			$("#IncIncomeCapitalGains_SaleOfShare").val(data.SaleOfShare);
			if (data.MoreThanTenPercentHolder == "YES") {
				$("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']").filter('[value="YES"]').attr('checked',true);
			}else if(data.MoreThanTenPercentHolder == "Within"){
				$("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']").filter('[value="Within"]').attr('checked',true);
			}else if(data.MoreThanTenPercentHolder == "Morethan"){
				$("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']").filter('[value="Morethan"]').attr('checked',true);
			}else {
				$("input[name='IncIncomeCapitalGains[MoreThanTenPercentHolder]']").attr('checked',true);
			}
			$("#IncIncomeCapitalGains_SaleOfShare").val(data.SaleOfShare);
			$("#IncIncomeCapitalGains_Cost").val(data.Cost);
			$("#IncIncomeCapitalGains_SaleOfShare_Tds").val(data.tds_amount);
			$("#IncomeCapitalGains_id").val(data.IncomeCapitalGainsId);
			
			if(data.Type=='Others'){
			   $("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
			   $("#sharePercentLandCarHouseDiv").hide();
		       $("#sharePercentDiv").hide();
		       $("#IncIncomeCapitalGains_SaleOfShare_Tds").val('');
		       
			}else if(data.Type=='Sale of Share'){
			   $("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
			   $("#sharePercentLandCarHouseDiv").hide();
		       $("#sharePercentDiv").show();
		       $("#IncIncomeCapitalGains_SaleOfShare_Tds").val('');
			}else if(data.Type=='Signing Money Received'){
			   $("#sharePercentLandCarHouseDiv").hide();
		       $("#sharePercentDiv").hide();
		       $("#IncIncomeCapitalGains_SaleOfShare_Tds").show();
			}else{
			   $("#IncIncomeCapitalGains_SaleOfShare_Tds").hide();
			   $("#sharePercentLandCarHouseDiv").show();
		       $("#sharePercentDiv").hide();
		       $("#IncIncomeCapitalGains_SaleOfShare_Tds").val('');
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeCapitalGains%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%




//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeOtherSource%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_IncomeOtherSource_fraction(id, model, field_name) {

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}



	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfOtherSource",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			InterestFromMutualFund_1: $("#IncIncomeOtherSource_InterestFromMutualFund_1").val(),
			InterestFromMutualFund: $("#IncIncomeOtherSource_InterestFromMutualFund").val(),

			CashDividend_1: $("#IncIncomeOtherSource_CashDividend_1").val(),
			CashDividend: $("#IncIncomeOtherSource_CashDividend").val(),

			InterestIncomeFromWEDB_1: $("#IncIncomeOtherSource_InterestIncomeFromWEDB_1").val(),
			InterestIncomeFromWEDB: $("#IncIncomeOtherSource_InterestIncomeFromWEDB").val(),

			USDollarPremium_1: $("#IncIncomeOtherSource_USDollarPremium_1").val(),
			USDollarPremium: $("#IncIncomeOtherSource_USDollarPremium").val(),

			PoundSterlingPremium_1: $("#IncIncomeOtherSource_PoundSterlingPremium_1").val(),
			PoundSterlingPremium: $("#IncIncomeOtherSource_PoundSterlingPremium").val(),

			EuroPremium_1: $("#IncIncomeOtherSource_EuroPremium_1").val(),
			EuroPremium: $("#IncIncomeOtherSource_EuroPremium").val(),

			InvestmentInInstrument: $("#IncIncomeOtherSource_InvestmentInInstrument").val(),
		

			InterestFromInstrument_1: $("#IncIncomeOtherSource_InterestFromInstrument_1").val(),
			InterestFromInstrument: $("#IncIncomeOtherSource_InterestFromInstrument").val(),

			Others_1: $("#IncIncomeOtherSource_Others_1").val(),
			Others: $("#IncIncomeOtherSource_Others").val(),

			SanchaypatraIncome: $("#IncIncomeOtherSource_SanchaypatraIncome").val(),
			SanchaypatraIncome_1: $("#IncIncomeOtherSource_SanchaypatraIncome_1").val(),
			
			TDSFromSanchaypatra: $("#IncIncomeOtherSource_TDSFromSanchaypatra").val(),
			
			IncomeId: $("#Income_IncomeId").val(),
			IncomeOtherSourceId: securityId,
			field_name: field_name,
			model: model
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
                location.reload();
				
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeOtherSource(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncIncomeOtherSource_Type").val(data.Type);
			$("#IncIncomeOtherSource_Description").val(data.Description);
			$("#IncIncomeOtherSource_Cost").val(data.Cost);
			$("#IncomeOtherSource_id").val(data.IncomeOtherSourceId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeOtherSource%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ForeignIncome%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_ForeignIncome_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	console.log(securityId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfForeignIncome",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncForeignIncome_Type 					: $("#IncForeignIncome_Type").val(),
			IncForeignIncome_Description 			: $("#IncForeignIncome_Description").val(),
			IncForeignIncome_Cost 					: $("#IncForeignIncome_Cost").val(),
			IncomeId 											: $("#Income_IncomeId").val(),
			ForeignIncomeId 							: securityId,
			model												: model,
			field_name 											: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_ForeignIncome(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#IncForeignIncome_Type").val(data.Type);
			$("#IncForeignIncome_Description").val(data.Description);
			$("#IncForeignIncome_Cost").val(data.Cost);
			$("#ForeignIncome_id").val(data.ForeignIncomeId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%ForeignIncome%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%




//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%Income Tax Deduct At Source%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_IncomeTaxDeductedAtSource_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	console.log(securityId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/SaveFrcOfIncomeTaxDeductedSource",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeTaxDeductedAtSource_Description 			: $("#IncIncomeTaxDeductedAtSource_Description").val(),
			IncIncomeTaxDeductedAtSource_Cost 				: $("#IncIncomeTaxDeductedAtSource_Cost").val(),
			IncomeId 										: $("#Income_IncomeId").val(),
			IncIncomeTaxDeductedAtSourceId 					: securityId,
			model											: model,
			field_name 										: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeTaxDeductedAtSource(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},

		success : function(data) {
			$("#IncIncomeTaxDeductedAtSource_Description").val(data.Description);
			$("#IncIncomeTaxDeductedAtSource_Cost").val(data.Cost);
			$("#IncomeTaxDeductedAtSource_id").val(data.TaxDeductId);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%Income Tax Deduct At Source%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%Income Tax In Advance%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function typeChange(e){
	if(e.value == 'other'){
		$('#' + e.value).show();
		$('#IncIncomeTaxInAdvance_Description').val('');
	}else if(e.value == 'car_advance_tax'){
		$('#other').hide();
		$('#IncIncomeTaxInAdvance_Description').val('Car Advance Tax');
	}else{
		$('#other').hide();
		$('#IncIncomeTaxInAdvance_Description').val('');
	}
}


function save_IncomeTaxInAdvance_fraction(id, description, cost, model, field_name) {

	//var data = $('#InterestOnSecurities_table').serialize();

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}

	console.log(securityId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/SaveFrcOfIncomeTaxInAdvance",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeTaxInAdvance_Description 		: $("#IncIncomeTaxInAdvance_Description").val(),
			IncIncomeTaxInAdvance_Cost 				: $("#IncIncomeTaxInAdvance_Cost").val(),
			IncomeId 								: $("#Income_IncomeId").val(),
			IncIncomeTaxInAdvanceId 				: securityId,
			model									: model,
			field_name 								: field_name
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();	
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function edit_IncomeTaxInAdvance(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},

		success : function(data) {
			$("#IncIncomeTaxInAdvance_Description").val(data.Description);
			$("#IncIncomeTaxInAdvance_Cost").val(data.Cost);
			$("#IncomeTaxInAdvance_id").val(data.TaxAdvanceId);

			if(data.Description=='Car Advance Tax'){
				$('#other').hide();
				$("#IncIncomeTaxInAdvance_Type").val("car_advance_tax");
			}else{
				$('#other').show();
				$("#IncIncomeTaxInAdvance_Type").val("other");
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			$('#loading').css('display','none');
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%Income Tax In Advance%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



function isPositiveInteger(s)
{
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    if (i != ~~i) return false; // make sure there's no decimal part
    return true;
}

function delete_incomeFraction(id, model, field) {
	bootbox.confirm(delete_msg, function(result) {
		if(result) {
			$('#loading').css('display','block');
			$.ajax({
				url : baseUrl+"/index.php/Income/deleteData",
				type : "POST",
				dataType : "json",
				cache : false,
				data : {
					id : id,
					model: model,
					field : field
				},
				success : function(data) {
					location.reload();
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					bootbox.alert("Internal problem has been occurred. Please try again.");
					$('#loading').css('display','none');
				},
				complete : function()
				{
					$('#loading').css('display','none');
				}
			});
		}
	}); 

	
}


function set_no(field) {
	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/setNo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncomeId : $("#Income_IncomeId").val(),
			field : field
		},
		success : function(data) {
			location.reload();
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			location.reload();
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function delete_field_data(field) {
	bootbox.confirm("Are you sure?", function(result) {
		if(result) {
			$('#loading').css('display','block');
			$.ajax({
				url : baseUrl+"/index.php/Income/deleteParticularFieldData",
				type : "POST",
				dataType : "json",
				cache : false,
				data : {
					IncomeId : $("#Income_IncomeId").val(),
					field : field
				},
				success : function(data) {
					window.location.reload();
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					window.location.reload();
				},
				complete : function()
				{
					$('#loading').css('display','none');
				}
			});
		}
	});
}



function show_divs(div_hide, div1, div2) {
	$("#"+div_hide).hide(show_duration);
	$("#"+div1).fadeIn(show_duration);
	$("#"+div2).fadeIn(show_duration);
}


function netShareByPercent (e) {

	var  IncomeOfFirm =  Number($('#IncIncomeShareProfit_IncomeOfFirm').val());

	var amount = isPositiveInteger( IncomeOfFirm );

	if (!amount) {


		bootbox.alert("Please put an number", function() {}); 

		$('#IncIncomeShareProfit_IncomeOfFirm').val( IncomeOfFirm.val().slice(0,-1) );
	};      


                 //------------------------START------------Claculation---field----------------------------------------//
                 var ShareOfFirm =   Number($('#IncIncomeShareProfit_ShareOfFirm').val());
        //------------------------END--------------Claculation---field----------------------------------------//



        var  NetValueOfShare = (IncomeOfFirm*(ShareOfFirm/100));


        console.log('NetValueOfShare='+NetValueOfShare);



        $('#IncIncomeShareProfit_Cost').val( NetValueOfShare );

    }

    function totalExpense(s)
    {
    	var output = 0;
    	$('#mytable tr td:nth-child('+s+') input').each(function() {
    		output = output +Number($(this).val());
    	});

    	return output;
    }
