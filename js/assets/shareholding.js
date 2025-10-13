$(document).ready(function() {


});

$(document).on('keyup', '#NumberOfShares', function(e){
	calculateValue();
});

$(document).on('keyup', '#EachShareCost', function(e){
	calculateValue();
});


function calculateValue() {
	var value = parseFloat( $("#NumberOfShares").val() ) * parseFloat( $("#EachShareCost").val() );
	$("#CompanyAssetValue").val(value);
}

function show_shareholder(data)
{
	var obj = jQuery.parseJSON(data);

	var HTML = '<tr id="shareholding_row_'+obj.ShareholdingCompanyId+'">'+
    			'<td>'+obj.CompanyName+'</td>'+
				'<td>'+obj.NumberOfShares+'</td>'+
				'<td>'+obj.EachShareCost+'</td>'+
				'<td>'+obj.CompanyAssetValue+'</td>'+
				'<td>'+
					'<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_shareholder('+obj.ShareholdingCompanyId+')"></button>'+
				'</td>'+
				'</tr>';

		$("#shareholding_table > tbody:last").append(HTML);
		
		$( "#CompanyName" ).val("");
	    $( "#NumberOfShares" ).val("");
	    $( "#EachShareCost" ).val("");
	    $( "#CompanyAssetValue" ).val("");
}

function delete_shareholder(id)
{	
	$('#loading').css('display','block');
    $.ajax({
		url : asset_url+"deleteShareholder",
		type : "POST",
		dataType : "json",
		data : {
			id : id
		},
		success : function(data) {
			if(data.status == "success")
			{
				$('#shareholding_row_'+id).remove();
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('share_data', data.status, data.msg);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
    return false;
}


function save_shareholder()
{
	var C_Name = $( "#CompanyName" ).val();
	var N_O_Share = $( "#NumberOfShares" ).val();
	var E_S_Cost = $( "#EachShareCost" ).val();
	var C_A_Value = $( "#CompanyAssetValue" ).val();
	
	var msg = "";
	if(!C_Name) msg += "<br>Company Name is required";
	if(!N_O_Share) msg += "<br>Number of Shares is required";
	if(!E_S_Cost) msg += "<br>Each Share Cost is required";
	if(!C_A_Value) msg += "<br>Company Asset Value is required";

	if(msg != "") 
	{
		bootbox.alert(msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"createShareholder",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			C_Name : C_Name,
			N_O_Share: N_O_Share,
			E_S_Cost : E_S_Cost,
			C_A_Value : C_A_Value,
			Id : $("#shareholding_company_id").val()
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
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}