  


function netShareByPercent (e) {

                 var  IncomeOfFirm =  Number($('#IncomeShareProfit_IncomeOfFirm').val());

	var amount = isPositiveInteger( IncomeOfFirm );

	if (!amount) {


		bootbox.alert("Please put an number", function() {}); 

		$('#IncomeShareProfit_IncomeOfFirm').val( IncomeOfFirm.val().slice(0,-1) );
	};      


                 //------------------------START------------Claculation---field----------------------------------------//
                 var ShareOfFirm =   Number($('#IncomeShareProfit_ShareOfFirm').val());
        //------------------------END--------------Claculation---field----------------------------------------//

    

        	var  NetValueOfShare = (IncomeOfFirm*(ShareOfFirm/100));

       
	console.log('NetValueOfShare='+NetValueOfShare);



        $('#IncomeShareProfit_NetValueOfShare').val( NetValueOfShare );

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
	});

	return output;
}
