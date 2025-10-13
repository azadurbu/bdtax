show_duration = 500;
$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  $("div.flash_alert").html("");
	});

});
function save_asset(field_name) {
	$('#loading').css('display','block');
	if(field_name == "TotalTaxPaidLastYear") {
		var value = $("#Assets_"+field_name).val();
	}
	else {
		var value = $("#Assets_"+field_name+"Total").val();
	}
	
	$.ajax({
		url : asset_url+"saveInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			value : value,
			field_name : field_name,
			AssetsId : $("#Assets_AssetsId").val(),

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


function save_asset_fraction(id, description, cost, model, field_name) {
	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveFractionInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : $("#"+id).val(),
			description : $("#"+description).val(),
			cost : $("#"+cost).val(),
			model: model,
			field_name : field_name,
			AssetsId : $("#Assets_AssetsId").val()
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

function edit_exp(id, model, field) {
	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			if(model == "AssetsAgricultureProperty") {
				$("#agriculture_property_id").val(data.Id);
				$("#agriculture_property_description").val(data.Description);
				$("#agriculture_property_ValueStartOfIncomeYear").val(data.ValueStartOfIncomeYear);
				$("#agriculture_property_ValueChangeDuringIncomeYear").val(data.ValueChangeDuringIncomeYear);
				$("#agriculture_property_cost").val(data.Cost);
			}
			if(model == "AssetsNonAgricultureProperty") {
				$("#non_agriculture_property_id").val(data.Id);
				$("#non_agriculture_property_type").val(data.Type);
				$("#non_agriculture_property_description").val(data.Description);
				$("#non_agriculture_property_ValueStartOfIncomeYear").val(data.ValueStartOfIncomeYear);
				$("#non_agriculture_property_ValueChangeDuringIncomeYear").val(data.ValueChangeDuringIncomeYear);
				$("#non_agriculture_property_cost").val(data.Cost);
			}
			if(model == "AssetsShareholdingCompanyList") {
				$("#shareholding_company_id").val(data.Id);
				$("#CompanyName").val(data.CompanyName);
				$("#NumberOfShares").val(data.NumberOfShares);
				$("#EachShareCost").val(data.EachShareCost);
				$("#CompanyAssetValue").val(data.CompanyAssetValue);
			}
			else if(model == "AssetsInvestment") {
				$("#investment_id").val(data.Id);
				$("#investment_type").val(data.InvestmentType);
				$("#investment_description").val(data.Description);
				$("#investment_cost").val(data.Cost);
			}
			else if(model == "AssetsMotorVehicles") {
				$("#motor_vehicle_id").val(data.Id);
				$("#MotorVehicleType").val(data.MotorVehicleType);
				$("#RegistrationNo").val(data.RegistrationNo);
				$("#MVDescription").val(data.MVDescription);
				$("#MVValue").val(data.MVValue);
			}

			else if(model == "AssetsOutsideBusiness") {
				$("#outside_business_id").val(data.Id);
				$("#outside_business_type").val(data.OutsideBusinessType);
				$("#outside_business_description").val(data.Description);
				$("#outside_business_cost").val(data.Cost);
			}			
			else {
				$("#"+field+"_id").val(data.Id);
				$("#"+field+"_description").val(data.Description);
				$("#"+field+"_cost").val(data.Cost);
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

function delete_exp(id, model, field) {
bootbox.confirm("Are you sure?", function(result) {
  if(result) {
  	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"deleteData",
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
		url : asset_url+"setNo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			field : field
		},
		success : function(data) {
			location.reload();
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			//location.reload();
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
			url : asset_url+"deleteParticularFieldData",
			type : "POST",
			dataType : "json",
			cache : false,
			data : {
				AssetsId : $("#Assets_AssetsId").val(),
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
});
}

function show_divs(div_hide, div1, div2) {
	$("#"+div_hide).hide(show_duration);
	$("#"+div1).fadeIn(show_duration);
	$("#"+div2).fadeIn(show_duration);
}

/*function save_assets(field_name, div_id) {
	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			value : $("#Assets_"+field_name).val(),
			field_name: field_name,
			AssetsId : $("#Assets_AssetsId").val()

		},
		success : function(data) {
			if(data.status == "success")
			{
				$("#Assets_"+field_name).val(data.value);
				//bootbox.alert(data.msg);
			}
			else
			{
				$("#Assets_"+field_name).val(data.value);
				//bootbox.alert(data.msg);
			}
			show_error_success(div_id, data.status, data.msg);
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
}*/
