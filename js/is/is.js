    function onValuePut (e) {
        ////console.log(e.value);    

        var targetId ='#'+e.id.slice(0,-2);
        var sourceId ='#'+e.id;

        //console.log(targetId);    

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

        var targetId ='#IncomeSalaries_ConveyanceAllowance';
        var sourceId ='#IncomeSalaries_ConveyanceAllowance_1';

        var sourceVal = Number($(sourceId).val());

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {

          bootbox.alert("Please put an number", function() {
          }); 

          $(sourceId).val( $(targetId).val() );
        };

//------------------------START------------Claculation---field----------------------------------------//
var ConveynceWaiverLevel =    Number($('#CalculationDataSource_ConveynceWaiverLevel').val());

//------------------------END--------------Claculation---field----------------------------------------//
var BasicSalary =  Number( $('#IncomeSalaries_BasicPay_1').val() );

//------------------------START--------------ConveynceWaiverLevel-------------------------------------------//


$('#IncomeSalaries_ConveyanceAllowance_2').val(ConveynceWaiverLevel);

if (sourceVal > ConveynceWaiverLevel) {
  var result = (sourceVal-ConveynceWaiverLevel);
  $('#IncomeSalaries_ConveyanceAllowance').val(result);
} else {
 $('#IncomeSalaries_ConveyanceAllowance').val(0);
 $('#IncomeSalaries_ConveyanceAllowance_2').val(sourceVal);
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
        ////console.log(e.value);    

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

          //console.log('input_val='+input_val);
          //console.log('BasicSalary='+BasicSalary);
          //console.log('HouseRentCompareValue='+HouseRentCompareValue);
          //console.log('percentOfBasicValue='+percentOfBasicValue);

          if ( (input_val > HouseRentCompareValue ) || (input_val > percentOfBasicValue ) ){ // HouseRentCompareValue = 240000

          if (percentOfBasicValue < HouseRentCompareValue) { // HouseRentCompareValue = 240000


            //console.log('subtract by percentOfBasicValue');
            var result = (input_val-percentOfBasicValue);
            $('#IncomeSalaries_HouseRentAllowance').val(result);
            $('#IncomeSalaries_HouseRentAllowance_2').val(percentOfBasicValue);
          } else {

            //console.log('subtract by HouseRentCompareValue');

            var result = (input_val-HouseRentCompareValue);
            $('#IncomeSalaries_HouseRentAllowance').val(result);
            $('#IncomeSalaries_HouseRentAllowance_2').val(HouseRentCompareValue);
          }

        } else {

         $('#IncomeSalaries_HouseRentAllowance').val(0);
         $('#IncomeSalaries_HouseRentAllowance_2').val(sourceVal);
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
        ////console.log(e.value);    

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

          //console.log('input_val='+input_val);
          //console.log('BasicSalary='+BasicSalary);
          //console.log('MedicalCompareValue='+MedicalCompareValue);
          //console.log('percentOfBasicValue='+percentOfBasicValue);

          if ( (input_val > MedicalCompareValue ) || (input_val > percentOfBasicValue ) ){ // MedicalCompareValue = 240000

          if (percentOfBasicValue < MedicalCompareValue) { // MedicalCompareValue = 240000


            //console.log('subtract by percentOfBasicValue');
            var result = (input_val-percentOfBasicValue);
            $('#IncomeSalaries_MedicalAllowance').val(result);
            $('#IncomeSalaries_MedicalAllowance_2').val(percentOfBasicValue);
          } else {

            //console.log('subtract by MedicalCompareValue');

            var result = (input_val-MedicalCompareValue);
            $('#IncomeSalaries_MedicalAllowance').val(result);
            $('#IncomeSalaries_MedicalAllowance_2').val(MedicalCompareValue);
          }

        } else {
         $('#IncomeSalaries_MedicalAllowance').val(0);
         $('#IncomeSalaries_MedicalAllowance_2').val(sourceVal);
       }
       var output1 =totalAmount(2);
       var output2 =totalAmount(3);
       var output =totalAmount(4);

       $('#IncomeSalaries_NetTaxableIncome_1').val(output1);
       $('#IncomeSalaries_NetTaxableIncome_2').val(output2);
       $('#IncomeSalaries_NetTaxableIncome').val(output);
     }
//------------------------END---------------HouseRentCal-------------------------------------------//
// ProvidentFoundInterest
// ProvidentFoundportion
//------------------------START--------------ProvidentFundCal-------------------------------------------//

function onProvidentFundTaxCal () {

        if($("input[type='radio']#IncomeSalaries_InterestRateByGovtId").is(':checked')) {
          var rateCondition = $("input[type='radio']#IncomeSalaries_InterestRateByGovtId:checked").val();          
        }  

        //console.log('rateCondition='+rateCondition);  

        var targetId ='#IncomeSalaries_InterestAccruedProvidentFund';
        var sourceId ='#IncomeSalaries_InterestAccruedProvidentFund_1';

        var sourceVal = Number( $('#IncomeSalaries_InterestAccruedProvidentFund_1').val() );

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

          var percentOfBasicValue = ( BasicSalary/3 ).toFixed(2); 

          if ( input_val > percentOfBasicValue ){ // ProvidentFoundInterest = 240000


          if( rateCondition=='N'){


            var result = (input_val-percentOfBasicValue);

            //console.log('subtract by percentOfBasicValue');
            
            $('#IncomeSalaries_InterestAccruedProvidentFund').val(result);
            $('#IncomeSalaries_InterestAccruedProvidentFund_2').val(percentOfBasicValue);
            
          } else if( rateCondition=='Y'){


          }

        } else {

         $('#IncomeSalaries_InterestAccruedProvidentFund').val(0);
         $('#IncomeSalaries_InterestAccruedProvidentFund_2').val(sourceVal);
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
    if (i != ~~i) return false; // make sure there's no decimal part
    return true;
  }

//     function isPositiveInteger(s)
//     {
//         return !!s.match(/^[0-9]+$/);
//     // or Rob W suggests
//     return /^\d+$/.test(s);
// }

function totalAmount(s)
{
  var output = 0;
  $('#mytable tr td:nth-child('+s+') input').each(function() {
    output = output +Number($(this).val());
  });

  return output;
}
