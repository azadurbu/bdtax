  
function onValuePut (e) {

	var sourceId ='#'+e.id; 

	// console.log("sourceId="+sourceId);


	var amount = isPositiveInteger(e.value);

	if (!amount) {


		bootbox.alert("Please put an number", function() {}); 

		$(sourceId).val( $(sourceId).val().slice(0,-1) );
	};      

	var output1 =totalExpense(2);

	$('#IncomeHouseProperties_ClaimedExpensesTotal').val(output1);


	var netEarn =   $('#IncomeHouseProperties_AnnualRentalIncome').val();

	$('#IncomeHouseProperties_NetIncome').val( (netEarn-output1) ) ;

}



function repairCostByType (e) {



	if($("input[type='radio']#IncomeHouseProperties_ResidentOrCommercial").is(':checked')) 
	{
		var rateCondition = $("input[type='radio']#IncomeHouseProperties_ResidentOrCommercial:checked").val();          
	} 

	console.log('rateCondition='+rateCondition);
                 //------------------------START------------Claculation---field----------------------------------------//
                 var CommercialRentPercent =  Number($('#CalculationDataSource_CommercialRentPercent').val());
                 var ResidentialRentPercent =   Number($('#CalculationDataSource_ResidentialRentPercent').val());
        //------------------------END--------------Claculation---field----------------------------------------//


        var netEarn =   $('#IncomeHouseProperties_AnnualRentalIncome').val();

        if (rateCondition == 1) 
        {     

        	var repairCost = (netEarn*(ResidentialRentPercent/100));

        } else if (rateCondition == 2)
        {

        	var repairCost = (netEarn*(CommercialRentPercent/100));
        }   



        $('#IncomeHouseProperties_Repair').val(repairCost);

    }


    function isPositiveInteger(s)
    {
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    if (i != ~~i) return false; // make sure there's no decimal part
    return true;
}


function totalExpense(s)
{
	var output = 0;
	$('#mytable tr td:nth-child('+s+') input').each(function() {
		output = output +Number($(this).val());
		console.log("Expensevalues="+$(this).val());
	});

	return output;
}

function onSharePercent() {

	var sourceId = '#IncomeHouseProperties_ShareOfProperty'; 

	var percentOfShare = $(sourceId).val();
	var netIncome = $('#IncomeHouseProperties_NetIncome').val();

	if(percentOfShare!=''){
		var shareOfIncome = (netIncome*percentOfShare)/100;

		$('#IncomeHouseProperties_ShareOfIncome').val(shareOfIncome);
		
	}
	if(percentOfShare==''){
		$('#IncomeHouseProperties_ShareOfIncome').val(netIncome);
	}

}

