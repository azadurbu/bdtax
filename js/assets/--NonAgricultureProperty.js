$(document).ready(function() {


});

function show_NonAgricultureProperty(data)
{
	var obj = jQuery.parseJSON(data);

	var HTML = '<tr id="NonAgricultureProperty_row_'+obj.NonAgriculturePropertyId+'">'+
    			'<td>'+obj.NAgroPropertyDescription+'</td>'+
				'<td>'+obj.NAgroPropertyValue+'</td>'+
				'<td>'+
					'<button type="button" class="btn btn-danger glyphicon glyphicon-remove" onclick="delete_NonAgricultureProperty('+obj.NonAgriculturePropertyId+')"></button>'+
				'</td>'+
				'</tr>';

		$("#NonAgricultureProperty_table > tbody:last").append(HTML);
		
		$( "#NAgroPropertyDescription" ).val("");
	    $( "#NAgroPropertyValue" ).val("");
}

function delete_NonAgricultureProperty(id)
{	
	$('#loading').css('display','block');
    $.ajax({
		url : asset_url+"deleteNonAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			id : id
		},
		success : function(data) {
			if(data.status == "success")
			{
				$('#NonAgricultureProperty_row_'+id).remove();
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('non_agri_data', data.status, data.msg);
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


function save_NonAgricultureProperty()
{
	var NAgroPropertyDescription = $( "#NAgroPropertyDescription" ).val();
	var NAgroPropertyValue = $( "#NAgroPropertyValue" ).val();
	
	var msg = "";
	if(!NAgroPropertyDescription) msg += "<br>Property Description is required";
	if(!NAgroPropertyValue) msg += "<br>Property Value is required";

	if(msg != "") 
	{
		show_error_success('non_agri_data', 'failed', msg);
		//bootbox.alert(msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"createNonAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			NAgroPropertyDescription : NAgroPropertyDescription,
			NAgroPropertyValue: NAgroPropertyValue
		},
		success : function(data) {
			if(data.status == "success")
			{
				show_NonAgricultureProperty(data.value);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('non_agri_data', data.status, data.msg);
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