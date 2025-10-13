$(document).ready(function() {


});


function save_agricultureProperty()
{
	var description = $( "#agriculture_property_description" ).val();
	var valueStartOfYear = $( "#agriculture_property_ValueStartOfIncomeYear" ).val();
	var valueDuringYear = $( "#agriculture_property_ValueChangeDuringIncomeYear" ).val();
	var cost = $( "#agriculture_property_cost" ).val();
	
	var msg = "";
	if(!description) msg += "<br>Property Description is required";
	if(!valueStartOfYear) msg += "<br>Value Start Of Income Year is required";
	if(!valueDuringYear) msg += "<br>Value Change During Income Year is required";
	if(!cost) msg += "<br>Value is required";

	console.log(valueDuringYear);

	if(msg != "") 
	{
		bootbox.alert(msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"CreateAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			description : description,
			valueStartOfYear: valueStartOfYear,
			valueDuringYear : valueDuringYear,
			cost : cost,
			Id : $("#agriculture_property_id").val()
		},
		success : function(data) {
			console.log(data);
			if(data.status == "success")
			{
				location.reload();
			}
			else
			{
				bootbox.alert(data.msg);
				return false;
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

$(document).on('keyup', '#agriculture_property_ValueStartOfIncomeYear', function(e){
	calculateAgriValue();
});

$(document).on('keyup', '#agriculture_property_ValueChangeDuringIncomeYear', function(e){
	calculateAgriValue();
});

function calculateAgriValue() {
	var value = parseFloat( $("#agriculture_property_ValueStartOfIncomeYear").val() ) + parseFloat( $("#agriculture_property_ValueChangeDuringIncomeYear").val() );
	$("#agriculture_property_cost").val(value);
}
