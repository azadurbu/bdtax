$(document).ready(function() {


});


function save_nonAgricultureProperty()
{
	var type = $( "#non_agriculture_property_type" ).val();
	var description = $( "#non_agriculture_property_description" ).val();
	var valueStartOfYear = $( "#non_agriculture_property_ValueStartOfIncomeYear" ).val();
	var valueDuringYear = $( "#non_agriculture_property_ValueChangeDuringIncomeYear" ).val();
	var cost = $( "#non_agriculture_property_cost" ).val();
	var housePropertystatus = $( "#housePropertyStatus" );
	if (housePropertystatus.is(':checked')) {
            var housePorpertyValue = 'Yes';
        } else {
           var housePorpertyValue = null;
        }
	
	var msg = "";
	if(!type) msg += "<br>Property Type is required";
	if(!description) msg += "<br>Property Description is required";
	if(!valueStartOfYear) msg += "<br>Value Start Of Income Year is required";
	if(!valueDuringYear) msg += "<br>Value Change During Income Year is required";
	if(!cost) msg += "<br>Value is required";

	if(msg != "") 
	{
		bootbox.alert(msg);
		return false;
	}
	$('#loading').css('display','block');

	$.ajax({
		url : asset_url+"CreateNonAgricultureProperty",
		type : "POST",
		dataType : "json",
		data : {
			type : type,
			AssetsId : $("#Assets_AssetsId").val(),
			description : description,
			valueStartOfYear: valueStartOfYear,
			valueDuringYear : valueDuringYear,
			cost : cost,
			housePorpertyValue: housePorpertyValue,
			Id : $("#non_agriculture_property_id").val()
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


$(document).on('keyup', '#non_agriculture_property_ValueStartOfIncomeYear', function(e){
	calculateNonAgriValue();
});

$(document).on('keyup', '#non_agriculture_property_ValueChangeDuringIncomeYear', function(e){
	calculateNonAgriValue();
});

function calculateNonAgriValue() {
	var value = parseFloat( $("#non_agriculture_property_ValueStartOfIncomeYear").val() ) + parseFloat( $("#non_agriculture_property_ValueChangeDuringIncomeYear").val() );
	$("#non_agriculture_property_cost").val(value);
}