    function onValuePut (e) {
        //console.log(e.value);    

        var targetId ='#'+e.id.slice(0,-2);
        var sourceId ='#'+e.id;

        // console.log(targetId);    

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
        var output =totalAmount(4);

        $('#IncomeSalaries_NetTaxableIncome_1').val(output1);

        console.log(output1);    


      }

    //------------------------START--------------HouseRentCal-------------------------------------------//
function onGovtRuleTaxCal () {
        //console.log(e.value);    

        var targetId ='#IncomeSalaries_BasicPay';
        var sourceId ='#IncomeSalaries_BasicPay_1';

        var sourceVal = Number( $('#IncomeSalaries_BasicPay_1').val() );

        var amount = isPositiveInteger(sourceVal);

        if (!amount) {
         bootbox.alert("Please put an number", function() {    }); 
         $(sourceId).val( $(targetId).val() );
       };

        var input_val =  Number( sourceVal );


            $('#IncomeSalaries_BasicPay').val(input_val);
            $('#IncomeSalaries_NetTaxableIncome').val(input_val);


     }


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
