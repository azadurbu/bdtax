$(document).ready(function() {

});

function save_furniture() {
	if($("#Assets_FurnitureDescription").val() == "" || $("#Assets_FurnitureCost").val() == "")
	{
		//bootbox.alert("Furniture description and cost is required");
		show_error_success('furniture_data', "failed", "Furniture description and cost is required");
		return false;
	}

	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveFurniture",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			FurnitureDescription : $("#Assets_FurnitureDescription").val(),
			FurnitureCost: $("#Assets_FurnitureCost").val()
		},
		success : function(data) {
			if(data.status == "success")
			{
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('furniture_data', data.status, data.msg);
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