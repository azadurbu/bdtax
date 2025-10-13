function loadpayment(plan_id, loadurl,loadingurl)
	{
		$('#payment-method-list').html('<img style="height:119px" src="'+loadingurl+'" />');
        //alert(plan_id);
		$.ajax({
			url: loadurl,
			type: 'POST',
			data : { 
		        'plan_id': plan_id
		    },
			
			success: function(response){
                var htmlArray = response.split("######");
				//alert(response);
				$('.payment-due-container').html(htmlArray[1]);
				$('#payment-method-list').html(htmlArray[0]);
				$('.payment-methode-wrapping a').attr('onclick','stopMoving(this)');
			    $('.payment-methode-wrapping a').click(function (e) {
			        e.preventDefault();
			    });

			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
			},
		}).success(function(){

			//$('#loading').css('display','none');

		});
	}

function loadpaymentUpgrade(plan_id, parentid,loadurl,loadingurl)
	{
		$('#payment-method-list-upgrade').html('<img style="height:119px" src="'+loadingurl+'" />');
        //alert(plan_id);
		$.ajax({
			url: loadurl,
			type: 'POST',
			data : { 
		        'plan_id': plan_id,
		        'parentid': parentid
		    },
			
			success: function(response){
                var htmlArray = response.split("######");
				//alert(response);
				//$('.payment-due-container').html(htmlArray[1]);
				$('#payment-method-list-upgrade').html(htmlArray[0]);
				$('.payment-methode-wrapping a').attr('onclick','stopMoving(this)');
			    $('.payment-methode-wrapping a').click(function (e) {
			        e.preventDefault();
			   });

			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
			},
		}).success(function(){

			//$('#loading').css('display','none');

		});
	}


function showMethodDetailsbyClick(loadUrl,plan_id){

        $('#modalPlanDetails .modal-body').html('');
        //alert(plan_id);
		$.ajax({
			url: loadUrl,
			type: 'POST',
			data : { 
		        'plan_id': plan_id,
		    },
			
			success: function(response){
                

                $('#modalPlanDetails').modal('show');
                $('#modalPlanDetails .modal-body').html(response);


			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
			},
		}).success(function(){

			//$('#loading').css('display','none');

		});

	

}