$(document).ready(function() {

});

function save_electronic_equipment() {
	if($("#Assets_ElectronicEquipmentDescription").val() == "" || $("#Assets_ElectronicEquipmentCost").val() == "")
	{
		show_error_success('eq_data', "failed", "Electronic Equipment description and cost is required");
		//bootbox.alert("Electronic Equipment description and cost is required");
		return false;
	}

	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveElectronicEquipment",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			ElectronicEquipmentDescription : $("#Assets_ElectronicEquipmentDescription").val(),
			ElectronicEquipmentCost: $("#Assets_ElectronicEquipmentCost").val()
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
			show_error_success('eq_data', data.status, data.msg);
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