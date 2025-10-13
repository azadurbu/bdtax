$(document).ready(function() {

});

function save_jewellery() {
	if($("#Assets_JewelleryDescription").val() == "" || $("#Assets_JewelleryCost").val() == "")
	{
		//bootbox.alert("Jewellery description and cost is required");
		show_error_success('j_data', "failed", "Jewellery description and cost is required");
		return false;
	}

	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveJewellery",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			JewelleryDescription : $("#Assets_JewelleryDescription").val(),
			JewelleryCost: $("#Assets_JewelleryCost").val()
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
			show_error_success('j_data', data.status, data.msg);
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