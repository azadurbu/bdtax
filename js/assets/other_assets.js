$(document).ready(function() {


});

function show_AnyOtherAsset(data)
{
	var obj = jQuery.parseJSON(data);

	var HTML = '<tr id="AnyOtherAsset_row_'+obj.AnyOtherAssetId+'">'+
    			'<td>'+obj.AnyOtherAssetDescription+'</td>'+
				'<td>'+obj.AnyOtherAssetValue+'</td>'+
				'<td>'+
					'<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_AnyOtherAsset('+obj.AnyOtherAssetId+')"></button>'+
				'</td>'+
				'</tr>';

		$("#AnyOtherAsset_table > tbody:last").append(HTML);
		
		$( "#AnyOtherAssetDescription" ).val("");
	    $( "#AnyOtherAssetValue" ).val("");
}

function delete_AnyOtherAsset(id)
{	
	$('#loading').css('display','block');
    $.ajax({
		url : asset_url+"deleteAnyOtherAsset",
		type : "POST",
		dataType : "json",
		data : {
			id : id
		},
		success : function(data) {
			if(data.status == "success")
			{
				$('#AnyOtherAsset_row_'+id).remove();
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('aoa_data', data.status, data.msg);
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


function save_AnyOtherAsset()
{
	var AnyOtherAssetDescription = $( "#AnyOtherAssetDescription" ).val();
	var AnyOtherAssetValue = $( "#AnyOtherAssetValue" ).val();
	
	var msg = "";
	if(!AnyOtherAssetDescription) msg += "<br>Asset Description is required";
	if(!AnyOtherAssetValue) msg += "<br>Asset Value is required";

	if(msg != "") 
	{
		//bootbox.alert(msg);
		show_error_success('aoa_data', "failed", msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"createAnyOtherAsset",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			AnyOtherAssetDescription : AnyOtherAssetDescription,
			AnyOtherAssetValue: AnyOtherAssetValue
		},
		success : function(data) {
			if(data.status == "success")
			{
				show_AnyOtherAsset(data.value);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('aoa_data', data.status, data.msg);
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