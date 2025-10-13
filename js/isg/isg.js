function calculatePension(value) {
  value = Number( value );

  $("#IncomeSalaries_Pension_2").val(value);
  $("#IncomeSalaries_Pension").val(0);

  calculateTotal();
}

function calculateRecognizedProvidentFundIncome(value) {
  value = Number( value );
    $("#IncomeSalaries_RecognizedProvidentFundIncome_2").val(value);
    $("#IncomeSalaries_RecognizedProvidentFundIncome").val(0);
  calculateTotal();
}

function onValuePut (e) {


  var targetId ='#'+e.id.slice(0,-2);
  var sourceId ='#'+e.id;



  var amount = isPositiveInteger(e.value);

  if (!amount) {


    bootbox.alert("Please put an number", function() {
    }); 

    $(sourceId).val( $(targetId).val() );
  };



  if (targetId=='#IncomeSalaries_ConveyanceAllowance') {

    var ConveynceWaiverLevel = $('#CalculationDataSource_ConveynceWaiverLevel').val();

    if (e.value>ConveynceWaiverLevel) {

      var result = (e.value-ConveynceWaiverLevel);

      $('#IncomeSalaries_ConveyanceAllowance_2').val(ConveynceWaiverLevel);

      $('#IncomeSalaries_ConveyanceAllowance').val(result);

    }
  }

    $(targetId).val(e.value);

    var output1 =totalAmount(2);
    var output =totalAmount(4);

    $('#IncomeSalaries_NetTaxableIncome_1').val(output1);

}

function leaveEncashment(val){

  var targetId ='#IncomeSalaries_LeaveEncashment_2';
  var sourceId ='#IncomeSalaries_LeaveEncashment_1';

  var sourceVal = Number( $('#IncomeSalaries_LeaveEncashment_1').val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
    bootbox.alert("Please put an number", function() {    }); 
    $(sourceId).val( $(targetId).val() );
  };
    $("#IncomeSalaries_LeaveEncashment_2").val(sourceVal);
    $("#IncomeSalaries_LeaveEncashment").val(0);

  calculateTotal();
}

    //------------------------START--------------HouseRentCal-------------------------------------------//
function onGovtRuleTaxCal (e) {
  if( (e.id=='IncomeSalaries_BasicPay_1') || (e.id=='IncomeSalaries_Bonus_1') || (e.id=='IncomeSalaries_EntertainmentAllowance_1') || (e.id=='IncomeSalaries_Arear_1') || (e.id=='IncomeSalaries_HonorariumOrReward_1') ){

    directPay(e.id);

  } else {
    directExempted(e.id);
  }
} 

            
function directPay (id) {

  var id_data=id.split('_');
  id_data.pop();

  var main_id = id_data.join("_");


  var targetId ='#'+main_id;
  var sourceId ='#'+id;



  var sourceVal = Number( $(sourceId).val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
     bootbox.alert("Please put an number", function() {    }); 
     $(sourceId).val( $(targetId).val() );
   }

 var input_val =  Number( sourceVal );

 $(targetId).val(input_val);

 var basic_income = $('#IncomeSalaries_BasicPay_1').val();
 var bonus_income = $('#IncomeSalaries_Bonus_1').val();



 var output1 =totalAmount(2);
 var output2 =totalAmount(3);
 var output =totalAmount(4);

 $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
 $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
 $('#IncomeSalaries_NetTaxableIncome').val(output);

}


function directExempted (id) {

  var id_data=id.split('_');
  id_data.pop();

  var main_id = id_data.join("_");


  var targetId ='#'+main_id+'_2';
  var sourceId ='#'+id;

  


  var sourceVal = Number( $(sourceId).val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
   bootbox.alert("Please put an number", function() {    }); 
   $(sourceId).val( $(targetId).val() );
 };

 var input_val =  Number( sourceVal );

 $(targetId).val(input_val);

 
 var output1 =totalAmount(2);
 var output2 =totalAmount(3);
 var output =totalAmount(4);

 $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
 $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
 $('#IncomeSalaries_NetTaxableIncome').val(output);
 
}


function calculateTotal() {
  var output1 =totalAmount(2);
  var output2 =totalAmount(3);
  var output =totalAmount(4);

  $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
  $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
  $('#IncomeSalaries_NetTaxableIncome').val(output);
}

function isPositiveInteger(s)
{
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    //if (i != ~~i) return false; // make sure there's no decimal part
    if (i != parseInt(i)) return false;
    return true;
  }



function totalAmount(s)
{
  var output = 0;
  $('#mytable tr td:nth-child('+s+') input').each(function() {
    output = output +Number($(this).val());
  });

  return output;
}
