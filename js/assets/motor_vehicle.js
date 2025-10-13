$(document).ready(function() {


});


function delete_MotorVehicle(id)
{	
	$('#loading').css('display','block');
    $.ajax({
		url : asset_url+"deleteMotorVehicle",
		type : "POST",
		dataType : "json",
		data : {
			id : id
		},
		success : function(data) {
			if(data.status == "success")
			{
				$('#MotorVehicle_row_'+id).remove();
				//bootbox.alert(data.msg);
			}
			else
			{
				//bootbox.alert(data.msg);
			}
			show_error_success('mv_data', data.status, data.msg);
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


function save_MotorVehicle()
{
	var MotorVehicleType = $( "#MotorVehicleType" ).val();
	var RegistrationNo = $( "#RegistrationNo" ).val();
	var MVDescription = $( "#MVDescription" ).val();
	var MVValue = $( "#MVValue" ).val();
	var multipleCarStatus = $( "#multipleCarStatus" );
	if (multipleCarStatus.is(':checked')) {
            var multipleCarValue = 'Yes';
        } else {
           var multipleCarValue = null;
        }
	
	var msg = "";
	if(!MotorVehicleType) msg += "<br>Vehicle Type is required";
	if(!RegistrationNo) msg += "<br>Registration No is required";
	if(!MVDescription) msg += "<br>Description is required";
	if(!MVValue) msg += "<br>Value is required";

	if(msg != "") 
	{
		//bootbox.alert(msg);
		show_error_success('mv_data', "failed", msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"createMotorVehicle",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			Id : $("#motor_vehicle_id").val(),
			MotorVehicleType : MotorVehicleType,
			RegistrationNo: RegistrationNo,
			MVDescription : MVDescription,
			MVValue : MVValue,
			multipleCarValue : multipleCarValue,
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
			location.reload();
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}