$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  $("div.flash_alert").html("");
	});

});

//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%InterestOnSecurity%%START%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
function InterestOnSecuritiesCalculation (e) {

	var sourceId ='#'+e.id; 

	var amount = isPositiveInteger(e.value);

	if (!amount) {

		bootbox.alert("Please put an number", function() {}); 

		$(sourceId).val( $(sourceId).val().slice(0,-1) );
	};  

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

	console.log(securityId);

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
function IncomeAgricultureCalculation (e) {

	var sourceId ='#'+e.id; 

	var amount = isPositiveInteger(e.value);

	if (!amount) {

		bootbox.alert("Please put an number", function() {}); 

		$(sourceId).val( $(sourceId).val().slice(0,-1) );
	};  

	var IncIncomeAgriculture_TotalRevenue = $('#IncIncomeAgriculture_TotalRevenue').val();
	var IncIncomeAgriculture_ProductionCost = $('#IncIncomeAgriculture_ProductionCost').val();

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

	var agricultureId = "";

	if ($("#"+id).val()) {
		var agricultureId = $("#"+id).val()
	} else {
		var agricultureId = "notSet";
	}

	console.log(agricultureId);

	$('#loading').css('display','block');
	$.ajax({
		url : baseUrl+"/index.php/Income/saveFrcOfAgriculture",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
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
			$("#IncIncomeAgriculture_LandInBigha").val(data.LandInBigha);
			$("#IncIncomeAgriculture_CropsType").val(data.CropsType);
			$("#IncIncomeAgriculture_TotalRevenue").val(data.TotalRevenue);
			$("#IncIncomeAgriculture_ProductionCost").val(data.ProductionCost);
			$("#IncIncomeAgriculture_Cost").val(data.Cost);
			$("#IncomeAgriculture_id").val(data.IncomeAgricultureId);
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


function save_IncomeBusinessOrProfession_fraction(id, description, cost, model, field_name) {

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
		url : baseUrl+"/index.php/Income/SaveFrcOfBusinessOrProfession",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeBusinessOrProfession_Type 					: $("#IncIncomeBusinessOrProfession_Type").val(),
			IncIncomeBusinessOrProfession_Description 			: $("#IncIncomeBusinessOrProfession_Description").val(),
			IncIncomeBusinessOrProfession_Cost 					: $("#IncIncomeBusinessOrProfession_Cost").val(),
			IncomeId 											: $("#Income_IncomeId").val(),
			IncomeBusinessOrProfessionId 							: securityId,
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


function save_IncomeCapitalGains_fraction(id, description, cost, model, field_name) {

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
		url : baseUrl+"/index.php/Income/saveFrcOfCapitalGains",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeCapitalGains_Type 					: $("#IncIncomeCapitalGains_Type").val(),
			IncIncomeCapitalGains_Description 			: $("#IncIncomeCapitalGains_Description").val(),
			IncIncomeCapitalGains_Cost 					: $("#IncIncomeCapitalGains_Cost").val(),
			IncomeId 											: $("#Income_IncomeId").val(),
			IncomeCapitalGainsId 							: securityId,
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
			$("#IncIncomeCapitalGains_Cost").val(data.Cost);
			$("#IncomeCapitalGains_id").val(data.IncomeCapitalGainsId);
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


function save_IncomeOtherSource_fraction(id, description, cost, model, field_name) {

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
		url : baseUrl+"/index.php/Income/saveFrcOfOtherSource",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			IncIncomeOtherSource_Type 					: $("#IncIncomeOtherSource_Type").val(),
			IncIncomeOtherSource_Description 			: $("#IncIncomeOtherSource_Description").val(),
			IncIncomeOtherSource_Cost 					: $("#IncIncomeOtherSource_Cost").val(),
			IncomeId 											: $("#Income_IncomeId").val(),
			IncomeOtherSourceId 							: securityId,
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

function isPositiveInteger(s)
{
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    if (i != ~~i) return false; // make sure there's no decimal part
    return true;
}

function delete_incomeFraction(id, model, field) {
	bootbox.confirm("Are you sure?", function(result) {
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
