$(document).ready(function() {
    $('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]').change(function() {
        calculateDeemedIncomeTransport();
        onConveyTaxCal();
    });

    $('input[type=radio][name="IncomeSalaries[ReceivedAnyHouse]"]').change(function() {
        onChangeOfReceivedAnyHouse();
    });
    $('input[type=radio][name="IncomeSalaries[PaidAnyPartOfRent]"]').change(function() {
        onChangeOfPaidAnyPartOfRent();
    });

    //HIDE SHOW DEEMED FREE ACCOMODATION FOR EDIT
    if ( $('input[type=radio][name="IncomeSalaries[ReceivedAnyHouse]"]:checked').val() == "Y" ) {
      $("#TR_RentalValueOfHouse,#TR_PaidAnyPartOfRent").show();
      if ( $('input[type=radio][name="IncomeSalaries[PaidAnyPartOfRent]"]:checked').val() == "Y" ) {
        $("#TR_PaidPartOfRentValue").show();
      }
      else {
        $("#TR_PaidPartOfRentValue").hide();
      }
    }
    else {
      $("#TR_RentalValueOfHouse,#TR_PaidAnyPartOfRent,#TR_PaidPartOfRentValue").hide();
    }
    //END OF HIDE SHOW DEEMED FREE ACCOMODATION FOR EDIT
    
}); 

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

function onChangeOfReceivedAnyHouse() {
  var val = $('input[type=radio][name="IncomeSalaries[ReceivedAnyHouse]"]:checked').val();
  
  $("#IncomeSalaries_RentalValueOfHouse").val("");
  $("#IncomeSalaries_PaidPartOfRentValue").val("");
  
  $("#TR_RentalValueOfHouse,#TR_PaidAnyPartOfRent,#TR_PaidPartOfRentValue").hide();
  $('input[type=radio][name="IncomeSalaries[PaidAnyPartOfRent]"]:checked').prop('checked', false);
  
  if (val == "Y") {
    $("#TR_RentalValueOfHouse,#TR_PaidAnyPartOfRent").show();
  }
  else {
    
  }
  calculateDeemedFreeIncome();
}

function onChangeOfPaidAnyPartOfRent() {
  var val = $('input[type=radio][name="IncomeSalaries[PaidAnyPartOfRent]"]:checked').val();
  $("#IncomeSalaries_PaidPartOfRentValue").val("");
  if (val == "Y") {
    $("#TR_PaidPartOfRentValue").show();
  }
  else {
    $("#TR_PaidPartOfRentValue").hide();
  }
  calculateDeemedFreeIncome();
}

function calculateGratuity(value) {
  value = Number( value );
  var GratuityExemptedAmount = Number( $("#CalculationDataSource_GratuityExemptedAmount").val() );
  if (value <= GratuityExemptedAmount) {
    $("#IncomeSalaries_Gratuity_2").val(value);
    $("#IncomeSalaries_Gratuity").val(0);
  }
  else {
    $("#IncomeSalaries_Gratuity_2").val(GratuityExemptedAmount);
    $("#IncomeSalaries_Gratuity").val( (value - GratuityExemptedAmount) );
  }
  calculateTotal();
}

//WPPF = Workers Profit Participation Fund Exempted Amount
function calculateWPPF(value) {
  value = Number( value );
  var WPPFExemptedAmount = Number( $("#CalculationDataSource_WPPFExemptedAmount").val() );

  if (value <= WPPFExemptedAmount) {
    $("#IncomeSalaries_WorkersProfitParticipationFund_2").val(value);
    $("#IncomeSalaries_WorkersProfitParticipationFund").val(0);
  }
  else {
    $("#IncomeSalaries_WorkersProfitParticipationFund_2").val(WPPFExemptedAmount);
    $("#IncomeSalaries_WorkersProfitParticipationFund").val( (value - WPPFExemptedAmount) );
  }

  calculateTotal();
}

function calculateDeemedFreeIncome() {
  var ReceivedAnyHouse = $('input[type=radio][name="IncomeSalaries[ReceivedAnyHouse]"]:checked').val();
  var PaidAnyPartOfRent = $('input[type=radio][name="IncomeSalaries[PaidAnyPartOfRent]"]:checked').val();

  var PercentOfBasic = Number( $("#CalculationDataSource_DeemedFreeAccPercentOfBasic").val() ) * Number( $("#IncomeSalaries_BasicPay_1").val() ) / 100;

  var RentalValueOfHouse = Number( $("#IncomeSalaries_RentalValueOfHouse").val() );
  var PaidPartOfRentValue = Number( $("#IncomeSalaries_PaidPartOfRentValue").val() );

  if (ReceivedAnyHouse == "Y") {
    if (PaidAnyPartOfRent == "Y") {
      var minVal = Math.min.apply(Math, [PercentOfBasic, RentalValueOfHouse]);
      var income = (minVal - PaidPartOfRentValue);
      income = (income < 0) ? 0 : income;
      $("#IncomeSalaries_DeemedFreeAccommodation").val( (income) );
    }
    else if (PaidAnyPartOfRent == "N") {
      var minVal = Math.min.apply(Math, [PercentOfBasic, RentalValueOfHouse]);
      $("#IncomeSalaries_DeemedFreeAccommodation").val(minVal);
    }
    else {
      $("#IncomeSalaries_DeemedFreeAccommodation").val(0);
    }
  }
  else {
    $("#IncomeSalaries_DeemedFreeAccommodation").val(0);
  }

  calculateTotal();

}

function calculateDeemedIncomeTransport() {
  var val = $('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]:checked').val();
  $("#IncomeSalaries_DeemedIncomeTransport_1").val(0);
  $("#IncomeSalaries_DeemedIncomeTransport_2").val(0);

  if (val == 'Y') {
      var ReceivedTransportValue = Number( $("#CalculationDataSource_ReceivedTransportValue").val() );
      var PercentOfBasic = Number( $("#CalculationDataSource_ReceivedTransportPercentOfBasic").val() );

      var basicSalary = Number( $("#IncomeSalaries_BasicPay_1").val() );

      var percentOfBasic = PercentOfBasic * basicSalary / 100;

      var maxVal = Math.max.apply(Math, [ReceivedTransportValue, percentOfBasic]);

      $("#IncomeSalaries_DeemedIncomeTransport").val(maxVal);
  }
  else {
      $("#IncomeSalaries_DeemedIncomeTransport").val(0);
  }

  calculateTotal();
  /*var output =totalAmount(4);
  $('#IncomeSalaries_NetTaxableIncome').val(output);*/
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

          };


          // $( #IncomeSalaries_ConveyanceAllowance+'_2' ).val( $(targetId).val() );
        };

        $(targetId).val(e.value);

        var output1 =totalAmount(2);
        var output2 =totalAmount(3);
        var output =totalAmount(4);

        $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
        $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
        $('#IncomeSalaries_NetTaxableIncome').val(output);



      }

      function onConveyTaxCal () {
        $('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]:checked').val()
        console.log("string=" + $('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]:checked').val());

        var targetId ='#IncomeSalaries_ConveyanceAllowance';
        var sourceId ='#IncomeSalaries_ConveyanceAllowance_1';

        var sourceVal = Number($(sourceId).val());

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {

          bootbox.alert("Please put an number", function() {
          }); 

          $(sourceId).val( $(targetId).val() );
        }

//------------------------START------------Claculation---field----------------------------------------//
var ConveynceWaiverLevel =    Number($('#CalculationDataSource_ConveynceWaiverLevel').val());

//------------------------END--------------Claculation---field----------------------------------------//
var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );

//------------------------START--------------ConveynceWaiverLevel-------------------------------------------//

if ($('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]:checked').val() == "Y") {
  ConveynceWaiverLevel = 0;
}
$('#IncomeSalaries_ConveyanceAllowance_2').val(ConveynceWaiverLevel);

if (sourceVal > ConveynceWaiverLevel) {
  var result = (sourceVal-ConveynceWaiverLevel);
  $('#IncomeSalaries_ConveyanceAllowance').val(result.toFixed(2));
} else {
 $('#IncomeSalaries_ConveyanceAllowance').val(0);
 $('#IncomeSalaries_ConveyanceAllowance_2').val(sourceVal.toFixed(2));
}

//------------------------END---------------ConveynceWaiverLevel-------------------------------------------//

var output1 =totalAmount(2);
var output2 =totalAmount(3);
var output =totalAmount(4);

$('#IncomeSalaries_NetTaxableIncome_1').val(output1);
$('#IncomeSalaries_NetTaxableIncome_2').val(output2);
$('#IncomeSalaries_NetTaxableIncome').val(output);    

}

//------------------------START--------------HouseRentCal-------------------------------------------//
function onHouseRentTaxCal () {   

        var targetId ='#IncomeSalaries_HouseRentAllowance';
        var sourceId ='#IncomeSalaries_HouseRentAllowance_1';

        var sourceVal = Number( $('#IncomeSalaries_HouseRentAllowance_1').val() );

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {
         bootbox.alert("Please put an number", function() {    }); 
         $(sourceId).val( $(targetId).val() );
       };
        //------------------------START------------Claculation---field----------------------------------------//
        var HouseRentWaiverPercent =  Number($('#CalculationDataSource_HouseRentWaiverPercent').val());
        var HouseRentCompareValue =   Number($('#CalculationDataSource_HouseRentCompareValue').val());
        //------------------------END--------------Claculation---field----------------------------------------//

        var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );
        var input_val =  Number( sourceVal );

          var percentOfBasicValue = ( BasicSalary*(HouseRentWaiverPercent/100) ) //if basic==200000 then percentOfSourceValue = 100000 as HouseRentWaiverPercent = 50%


          if ( (input_val > HouseRentCompareValue ) || (input_val > percentOfBasicValue ) ){ // HouseRentCompareValue = 240000

          if (percentOfBasicValue < HouseRentCompareValue) { // HouseRentCompareValue = 240000

            var result = (input_val-percentOfBasicValue);
            $('#IncomeSalaries_HouseRentAllowance').val(result.toFixed(2));
            $('#IncomeSalaries_HouseRentAllowance_2').val(percentOfBasicValue.toFixed(2));
          } else {



            var result = (input_val-HouseRentCompareValue);
            $('#IncomeSalaries_HouseRentAllowance').val(result.toFixed(2));
            $('#IncomeSalaries_HouseRentAllowance_2').val(HouseRentCompareValue.toFixed(2));
          }

        } else {

         $('#IncomeSalaries_HouseRentAllowance').val(0);
         $('#IncomeSalaries_HouseRentAllowance_2').val(sourceVal.toFixed(2));
       }
       var output1 =totalAmount(2);
       var output2 =totalAmount(3);
       var output =totalAmount(4);

       $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
       $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
       $('#IncomeSalaries_NetTaxableIncome').val(output);
     }
//------------------------END---------------HouseRentCal-------------------------------------------//

// MedicalWaiverPercent
// MedicalCompareValue
// ProvidentFoundInterest
// ProvidentFoundportion
//------------------------START--------------HouseRentCal-------------------------------------------//
function onMedicalWaiverTaxCal () { 

        var targetId ='#IncomeSalaries_MedicalAllowance';
        var sourceId ='#IncomeSalaries_MedicalAllowance_1';

        var sourceVal = Number( $('#IncomeSalaries_MedicalAllowance_1').val() );

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {
         bootbox.alert("Please put an number", function() {    }); 
         $(sourceId).val( $(targetId).val() );
       };
        //------------------------START------------Claculation---field----------------------------------------//
        var MedicalWaiverPercent =  Number($('#CalculationDataSource_MedicalWaiverPercent').val());
        var MedicalCompareValue =   Number($('#CalculationDataSource_MedicalCompareValue').val());
        //------------------------END--------------Claculation---field----------------------------------------//
        var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );
        var input_val =  Number( sourceVal );

          var percentOfBasicValue = ( BasicSalary*(MedicalWaiverPercent/100) ) //if basic==200000 then percentOfSourceValue = 100000 as MedicalWaiverPercent = 50%

          if ( (input_val > MedicalCompareValue ) || (input_val > percentOfBasicValue ) ){ // MedicalCompareValue = 240000

          if (percentOfBasicValue < MedicalCompareValue) { // MedicalCompareValue = 240000

            var result = (input_val-percentOfBasicValue);
            $('#IncomeSalaries_MedicalAllowance').val(result.toFixed(2));
            $('#IncomeSalaries_MedicalAllowance_2').val(percentOfBasicValue.toFixed(2));
          } else {

            var result = (input_val-MedicalCompareValue);
            $('#IncomeSalaries_MedicalAllowance').val(result.toFixed(2));
            $('#IncomeSalaries_MedicalAllowance_2').val(MedicalCompareValue.toFixed(2));
          }

        } else {
         $('#IncomeSalaries_MedicalAllowance').val(0);
         $('#IncomeSalaries_MedicalAllowance_2').val(sourceVal.toFixed(2));
       }
       var output1 =totalAmount(2);
       var output2 =totalAmount(3);
       var output =totalAmount(4);

       $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
       $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
       $('#IncomeSalaries_NetTaxableIncome').val(output);
     }

function onMedicalWaiverForDisabilityTaxCal(val) {
  
  var targetId ='#IncomeSalaries_MedicalAllowanceForDisability';
  var sourceId ='#IncomeSalaries_MedicalAllowanceForDisability_1';

  var sourceVal = Number( $('#IncomeSalaries_MedicalAllowanceForDisability_1').val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
    bootbox.alert("Please put an number", function() {    }); 
    $(sourceId).val( $(targetId).val() );
  };
  //------------------------START------------Claculation---field----------------------------------------//
  var ExamtedAmount =  Number($('#CalculationDataSource_MedicalAllowanceExamtedForDisability').val());

  if (sourceVal <= ExamtedAmount) {
    $('#IncomeSalaries_MedicalAllowanceForDisability_2').val(sourceVal);
    $(targetId).val(0);
  }
  else {
    $('#IncomeSalaries_MedicalAllowanceForDisability_2').val(ExamtedAmount);
    $(targetId).val( (sourceVal - ExamtedAmount) );
  }

  //------------------------END--------------Claculation---field----------------------------------------//
  var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );
  var input_val =  Number( sourceVal );

  var output1 =totalAmount(2);
  var output2 =totalAmount(3);
  var output =totalAmount(4);

  $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
  $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
  $('#IncomeSalaries_NetTaxableIncome').val(output);
}

function onSurgeryHEKLC(val){
  var targetId ='#IncomeSalaries_Surgery_HEKLC_2';
  var sourceId ='#IncomeSalaries_Surgery_HEKLC_1';

  var sourceVal = Number( $('#IncomeSalaries_Surgery_HEKLC_1').val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
    bootbox.alert("Please put an number", function() {    }); 
    $(sourceId).val( $(targetId).val() );
  };

  $("#IncomeSalaries_Surgery_HEKLC_2").val(sourceVal);
  $("#IncomeSalaries_Surgery_HEKLC").val(0);

  calculateTotal();
}

function leaveAllowanceExempted(val){

  var targetId ='#IncomeSalaries_LeaveAllowance_2';
  var sourceId ='#IncomeSalaries_LeaveAllowance_1';
  var isLFAExempted = $('#IncomeSalaries_LfaExempted').is(":checked");

  var sourceVal = Number( $('#IncomeSalaries_LeaveAllowance_1').val() );

  var amount = isPositiveInteger(sourceVal);

  if (!amount) {
    bootbox.alert("Please put an number", function() {    }); 
    $(sourceId).val( $(targetId).val() );
  };
  if(isLFAExempted == true){
    $("#IncomeSalaries_LeaveAllowance_2").val(sourceVal);
    $("#IncomeSalaries_LeaveAllowance").val(0);
    $("#IncomeSalaries_LfaExempted").val('Y');
  }else{
    $("#IncomeSalaries_LeaveAllowance_2").val(0);
    $("#IncomeSalaries_LeaveAllowance").val(sourceVal);
    $("#IncomeSalaries_LfaExempted").val('N');
  }

  calculateTotal();
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
    $("#IncomeSalaries_LeaveEncashment").val(sourceVal);
    $("#IncomeSalaries_LeaveEncashment_2").val(0);

  calculateTotal();
}

//------------------------END---------------HouseRentCal-------------------------------------------//
// ProvidentFoundInterest
// ProvidentFoundportion
//------------------------START--------------ProvidentFundCal-------------------------------------------//

function onProvidentFundTaxCal () {

        if($("input[type='radio']#IncomeSalaries_InterestRateByGovtId").is(':checked')) {
          var rateCondition = $("input[type='radio']#IncomeSalaries_InterestRateByGovtId:checked").val();          
        }  

        var targetId ='#IncomeSalaries_InterestAccruedProvidentFund';
        var sourceId ='#IncomeSalaries_InterestAccruedProvidentFund_1';
        var rateofinterestId ='#IncomeSalaries_RateOfInterest';


        var rateofinterestValue = Number( $('#IncomeSalaries_RateOfInterest').val() );
        var sourceVal = Number( $('#IncomeSalaries_InterestAccruedProvidentFund_1').val() );
        var dearnessValue = Number( $('#IncomeSalaries_DearnessAllowance_1').val() );

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {
         bootbox.alert("Please put an number", function() {  }); 
         $(sourceId).val( $(targetId).val() );
       };
       
        //------------------------START------------Claculation---field----------------------------------------//
        var ProvidentFoundportion =  Number($('#CalculationDataSource_ProvidentFoundportion').val());
        var ProvidentFoundInterest =   Number($('#CalculationDataSource_ProvidentFoundInterest').val());
        //------------------------END--------------Claculation---field----------------------------------------//
        var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );
        var input_val =  Number( sourceVal );
        var totalSalaryAndDearness = BasicSalary + dearnessValue;


     

          // var percentOfBasicValue = ( BasicSalary/3 ).toFixed(2); 
          var salaryDearnessAllowedTax = ( totalSalaryAndDearness/ProvidentFoundportion ).toFixed(2);
          var rateInterestAllowedTax = ((sourceVal/rateofinterestValue)*ProvidentFoundInterest).toFixed(2);
          
          percentOfBasicValue = Math.min(salaryDearnessAllowedTax, rateInterestAllowedTax);

          if(percentOfBasicValue > sourceVal){
            percentOfBasicValue = sourceVal;
          }

          if(rateofinterestValue>0 && sourceVal>0){
            if( rateCondition=='N'){
              var result = (percentOfBasicValue);
              
              $('#IncomeSalaries_InterestAccruedProvidentFund_2').val(result);
              var taxable_income = sourceVal - percentOfBasicValue;
              $('#IncomeSalaries_InterestAccruedProvidentFund').val(taxable_income);
              
            } else if( rateCondition=='Y'){


            }

          }else{
            $('#IncomeSalaries_InterestAccruedProvidentFund').val(0);
            $('#IncomeSalaries_InterestAccruedProvidentFund_2').val(0);
          }


       var output1 =totalAmount(2);
       var output2 =totalAmount(3);
       var output =totalAmount(4);

       $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
       $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
       $('#IncomeSalaries_NetTaxableIncome').val(output);
     }
//------------------------END---------------ProvidentFundCal-------------------------------------------//


function isPositiveInteger(s)
{
    var i = +s; // convert to a number
    if (i < 0) return false; // make sure it's positive
    //if (i != ~~i) return false; // make sure there's no decimal part
    if (i != parseInt(i)) return false;
    return true;
  }

//     function isPositiveInteger(s)
//     {
//         return !!s.match(/^[0-9]+$/);
//     // or Rob W suggests
//     return /^\d+$/.test(s);
// }

function calculateTotal() {
  var output1 =totalAmount(2);
  var output2 =totalAmount(3);
  var output =totalAmount(4);

  $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
  $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
  $('#IncomeSalaries_NetTaxableIncome').val(output);
}

function totalAmount(s)
{
  var output = 0;
  $('#mytable tr td:nth-child('+s+') input').each(function() {
    if ($(this).attr('id') == "IncomeSalaries_ReceivedAnyTransport" || $(this).attr('id') == "IncomeSalaries_ReceivedAnyHouse" || $(this).attr('id') == "IncomeSalaries_PaidAnyPartOfRent")
    {

    }
    else {
      var val = ( isNaN(Number($(this).val())) ) ? 0 : Number($(this).val());
      output = output + val;
    }
    
  });

  //for first column
  if (s == 2) {

    output -= ( isNaN(Number($("#IncomeSalaries_RentalValueOfHouse").val())) ) ? 0 : Number($("#IncomeSalaries_RentalValueOfHouse").val());
    output -= ( isNaN(Number($("#IncomeSalaries_PaidPartOfRentValue").val())) ) ? 0 : Number($("#IncomeSalaries_PaidPartOfRentValue").val());


    output += ( isNaN(Number($("#IncomeSalaries_DeemedFreeAccommodation").val())) ) ? 0 : Number($("#IncomeSalaries_DeemedFreeAccommodation").val());

    if ($('input[type=radio][name="IncomeSalaries[ReceivedAnyTransport]"]:checked').val() == "Y") {
      output += ( isNaN(Number($("#IncomeSalaries_DeemedIncomeTransport").val())) ) ? 0 : Number($("#IncomeSalaries_DeemedIncomeTransport").val());
    }
  }

  return output;
}
