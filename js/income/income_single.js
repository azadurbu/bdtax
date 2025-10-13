

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeAgriculture%%END%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeBusinessOrProfession%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

function delete_business_data(field_id,incomeId) {
	$.ajax({
		url : baseUrl+"/index.php/IncomeSingle/deleteQuickBusinessData",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {

			field_id:field_id,
			IncomeId: $("#Income_IncomeId").val(),
			
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

function save_business_data(model, id) {

	var income = $('#IncIncomeBusinessOrProfession_'+model).val();
    var incomeP = $('#IncIncomeBusinessOrProfession_'+model+'_1').val();
    //alert($('#'+incomeP).val());
    if(income!=''){

		$('#loading').css('display','block');
		$.ajax({
			url : baseUrl+"/index.php/IncomeSingle/SaveQuickBusinessData",
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

				Type: model,
				field_value1: income,
				field_value2: incomeP,
				IncomeId: $("#Income_IncomeId").val(),
				
			},
			success : function(data) {
				if(data.status == "success")
				{
					bootbox.alert(data.msg);
					setTimeout(function(){ location.reload(); }, 3000);	
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

    }else{
    	bootbox.alert("Please insert Net taxable income");
    }
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


//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%IncomeOtherSource%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


function save_Quick_IncomeOtherSource(id, model, field_name) {

	var securityId = "";

	if ($("#"+id).val()) {
		var securityId = $("#"+id).val()
	} else {
		var securityId = "notSet";
	}



	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/IncomeSingle/saveFrcOfOtherSource",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			

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


function save_IncomeBusinessOrProfession_fraction_single(id, model, field_name) {

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
		url : baseUrl+"/index.php/IncomeSingle/SaveFrcOfBusinessOrProfession",
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

