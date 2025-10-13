show_duration = 500;
$(document).ready(function() {
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	  $("div.flash_alert").html("");
	})

});

function save_liabilities(field_name) {
	$('#loading').css('display','block');
	
	var value = $("#Liabilities_"+field_name+"Total").val();
	
	
	$.ajax({
		url : liability_url+"saveInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			value : value,
			field_name : field_name,
			LiabilityId : $("#Liabilities_LiabilityId").val(),

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


function save_liabilities_fraction(id, description, cost, model, field_name) {
	$('#loading').css('display','block');
	$.ajax({
		url : liability_url+"saveFractionInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : $("#"+id).val(),
			description : $("#"+description).val(),
			cost : $("#"+cost).val(),
			model: model,
			field_name : field_name,
			LiabilityId : $("#Liabilities_LiabilityId").val()
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
		url : liability_url+"getDataForEdit",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			id : id,
			model: model
		},
		success : function(data) {
			$("#"+field+"_id").val(data.Id);
			$("#"+field+"_description").val(data.Description);
			$("#"+field+"_cost").val(data.Cost);
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
bootbox.confirm(delete_msg, function(result) {
  if(result) {
  	$('#loading').css('display','block');
	$.ajax({
		url : liability_url+"deleteData",
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
		url : liability_url+"setNo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			LiabilityId : $("#Liabilities_LiabilityId").val(),
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
			url : liability_url+"deleteParticularFieldData",
			type : "POST",
			dataType : "json",
			cache : false,
			data : {
				LiabilityId : $("#Liabilities_LiabilityId").val(),
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
/*
function show_error_success(id, status, msg)
{
	if(status == "failed")
		$("div#"+id).find("p.exp_alert").html('<div class="alert alert-danger">'+msg+'</div>');
	if(status == "success")
		$("div#"+id).find("p.exp_alert").html('<div class="alert alert-success">'+msg+'</div>');
}
*/
function show_divs(div_hide, div1, div2) {
	$("#"+div_hide).hide(show_duration);
	$("#"+div1).fadeIn(show_duration);
	$("#"+div2).fadeIn(show_duration);
}