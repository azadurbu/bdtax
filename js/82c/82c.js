function onValuePut (e) {   

        var sourceId ='#'+e.id;

        var targetId ='#'+e.id.slice(0,-2);

        var amount = isPositiveInteger(e.value);

        if (!amount) {


          bootbox.alert("Please put an number", function() {
          }); 

          $(sourceId).val( $(targetId).val() );
        };


        function isPositiveInteger(s)
        {
            var i = +s; // convert to a number
            if (i < 0) return false; // make sure it's positive
            if (i != ~~i) return false; // make sure there's no decimal part
            return true;
          }

      }