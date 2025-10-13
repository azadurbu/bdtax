function onValuePutRebate (e) {   

        var sourceId ='#'+e.id;

        var targetId ='#'+e.id.slice(0,-2);

        var amount = isPositiveInteger(e.value);

        if (!amount) {


          bootbox.alert("Please put an number", function() {
          }); 

          $(sourceId).val( $(targetId).val() );
        };


        if(sourceId == '#IncomeTaxRebate_LifeInsurancePremium_1' || sourceId == '#IncomeTaxRebate_PolicyValue'){

          var policyValuePercent = 10;

          var policyValue = $('#IncomeTaxRebate_PolicyValue').val();

          var amount1 = (policyValue*policyValuePercent)/100;
          var amount2 = $('#IncomeTaxRebate_LifeInsurancePremium_1').val();

          var amount = Math.min(amount1,amount2);

          $('#IncomeTaxRebate_LifeInsurancePremium').val(amount);

        }else if(sourceId == '#IncomeTaxRebate_DepositPensionScheme_1'){

          var max_dps = 60000;
          if($('#IncomeTaxRebate_DepositPensionScheme_1').val() <= max_dps){
            $(targetId).val(e.value);
          }else{
            $(targetId).val(60000);
          }

        }else if(sourceId == '#IncomeTaxRebate_Computer_1'){
          var max_computerValue = 50000;
          if($('#IncomeTaxRebate_Computer_1').val() <= max_computerValue){
            $(targetId).val(e.value);
          }else{
            $(targetId).val(max_computerValue);
          }

          if($('#IncomeTaxRebate_Computer_1').val() != ''){
            $('#IncomeTaxRebate_Laptop_1').attr('readonly', true);
          }else{
            $('#IncomeTaxRebate_Laptop_1').attr('readonly', false);
          }

        }else if(sourceId == '#IncomeTaxRebate_Laptop_1'){

          var max_laptopValue = 100000;
          if($('#IncomeTaxRebate_Laptop_1').val() <= max_laptopValue){
            $(targetId).val(e.value);
          }else{
            $(targetId).val(max_laptopValue);
          }

          if($('#IncomeTaxRebate_Laptop_1').val() != ''){
            $('#IncomeTaxRebate_Computer_1').attr('readonly', true);
          }else{
            $('#IncomeTaxRebate_Computer_1').attr('readonly', false);
          }

        }else{

           $(targetId).val(e.value);

        }


        function isPositiveInteger(s)
        {
            var i = +s; // convert to a number
            if (i < 0) return false; // make sure it's positive
            if (i != ~~i) return false; // make sure there's no decimal part
            return true;
          }



      }