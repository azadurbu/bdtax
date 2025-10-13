$(document).ready(function() {


});

function show_AgricultureProperty(data)
{
	var obj = jQuery.parseJSON(data);

	var HTML = '<tr id="AgricultureProperty_row_'+obj.AgriculturePropertyId+'">'+
    			'<td>'+obj.AgroPropertyDescription+'</td>'+
				'<td>'+obj.AgroPropertyValue+'</td>'+
				'<td>'+
					'<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_AgricultureProperty('+obj.AgriculturePropertyId+')"></button>'+
				'</td>'+
				'</tr>';

		$("#AgricultureProperty_table > tbody:last").append(HTML);
		
		$( "#AgroPropertyDescription" ).val("");
	    $( "#AgroPropertyValue" ).val("");
}

function delete_AgricultureProperty(id)
{	
	$('#loading').css('display','block');
    $.ajax({
		url : asset_url+"deleteAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			id : id
		},
		success : function(data) {
			if(data.status == "success")
			{
				$('#AgricultureProperty_row_'+id).remove();
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('agri_data', data.status, data.msg);
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


function save_AgricultureProperty()
{
	var AgroPropertyDescription = $( "#AgroPropertyDescription" ).val();
	var AgroPropertyValue = $( "#AgroPropertyValue" ).val();

	console.log(AgroPropertyDescription);
	console.log(AgroPropertyValue);
	
	var msg = "";
	if(!AgroPropertyDescription) msg += "<br>Property Description is required";
	if(!AgroPropertyValue) msg += "<br>Property Value is required";

	if(msg != "") 
	{
		show_error_success('agri_data', 'failed', msg);
		//bootbox.alert(msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"createAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			AgroPropertyDescription : AgroPropertyDescription,
			AgroPropertyValue: AgroPropertyValue
		},
		success : function(data) {
			if(data.status == "success")
			{
				show_AgricultureProperty(data.value);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('agri_data', data.status, data.msg);
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