show_duration = 500;
$(document).ready(function() {

	$("#personal_food_expenses_data,#accommodation_expenses_data,#transportation_expenses_data,#electricity_expenses_data,#water_expenses_data,#gas_expenses_data,#telephone_expenses_data,#child_edu_expenses_data,#foreign_travel_expenses_data,#festival_other_expenses_data").live("keydown", function(e) {
        var key = e.charCode || e.keyCode || 0;
        // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
        return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || key == 110 || key == 190);
    });



});

function save_expenditure(field_name) {
	$('#loading').css('display','block');
	$.ajax({
		url : expenditure_url+"saveInfo",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			value : $("#Expenditure_"+field_name).val(),
			field_name: field_name,
			ExpenditureId : $("#Expenditure_ExpenditureId").val(),

		},
		success : function(data) {
			if(data.status == "success")
			{
				$("#Expenditure_"+field_name).val(data.value);
				bootbox.alert(data.msg);
			}
			else
			{
				$("#Expenditure_"+field_name).val("");
				bootbox.alert(data.msg);
			}
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