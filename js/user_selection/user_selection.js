var sumw = 0;
var counterw = 0;
var lenghtw = '';

$( document ).ready(function() {
            
            $('.user-selection-page .btn1').click(function(){
                $('.btn1').removeClass('btn-success')
                $(this).addClass('btn-success');
                $('#min-income').val($(this).attr('data-id'));

                
                
            })

            $('.user-selection-page .btn2').click(function(){
                $('.btn2').removeClass('btn-success')
                $(this).addClass('btn-success');
                $('#min-wealth').val($(this).attr('data-id'));
            })

            $('.user-selection-page .btn3').click(function(){
                $('.btn3').removeClass('btn-success')
                $(this).addClass('btn-success');
                $('#car-motor').val($(this).attr('data-id'));
                
            })

            $('.user-selection-page .btn4').click(function(){
                $('.btn4').removeClass('btn-success')
                $(this).addClass('btn-success');
                $('#house-property').val($(this).attr('data-id'));
                
            })

            $('.btn-selection-save').click(function(){
                var hp = $('#house-property').val();
                var cm = $('#car-motor').val();
                var mw = $('#min-wealth').val();
                var mi = $('#min-income').val();
                var wAnser = [];

                

                if(hp=='' || cm=='' || mw=='' || mi==''){
                    alert('Please complete your answer');
                }else{

                    var i=0;

                    if(mi=='2'){
                        wAnser[i]= oow;
                        i++;
                    }
                    if(mw=='2'){
                        wAnser[i]= ddw;
                        i++;
                    }
                    if(cm=='1'){
                        wAnser[i]= ttw;
                        i++;
                    }
                    if(hp=='1'){
                        wAnser[i]= ffw;
                        i++;
                    }


                    if(hp=='2'&& cm=='2' && mw=='1'&& mi=='1'){
                        
                        var str = success_message;
                        $('#from-type').val(1);
                           
                    }else{
                        var str = fail_message;
                        $('#from-type').val(2);
                    }

                    $('.modal-body').html('<p style="font-size:18px"><strong>'+str+'</strong></p>');
                    //wAnser.forEach(myFunction);
                    sumw = '';
                    counterw = 0;
                    lenghtw = wAnser.length;
                    wAnser.forEach(myFunction);
                    $('.answerbox').html(sumw);

                    //document.getElementById("demo").innerHTML = numbers;
                    //answerbox(sumw);
                    $('#AcknowledgementSlip').modal('show');

                }

            })

            

            $('.modal-ok').click(function(){
                $('#AcknowledgementSlip').modal('hide');
                saveuserSelection($('#from-type').val());
            })


    });

function myFunction(item) {
    if(counterw==0){
        sumw += item
    }else{
        //alert(counterw+1);
        //alert(lenghtw);

        if((counterw+1)==lenghtw){
            sumw += ' '+andw+' '+item;
        }else{
            sumw += ','+item;
        }
        
    }
    
    counterw++;
    
    
    
}


function saveuserSelection(type){
	$.ajax({
			url : baseUrl+"/index.php/dashboard/saveUserSelection",
			type : "POST",
			dataType : "json",
			data : {
				type : type,
				
			},
			success : function(data) {
				//alert(data.status);
				if(data.status == "1")
				{
					if(data.type==1){
						window.location=baseUrl+"/index.php/singlepage/profile";
					}else{
						window.location=baseUrl+"/index.php/dashboard/index";	
					}
				}
				else
				{
					alert("Something Went wrong");
				}
			}
		});

}


function redirecttoPay(type){

    $.ajax({
            url : baseUrl+"/index.php/dashboard/saveSpecialSelection",
            type : "POST",
            dataType : "json",
            data : {
                type : type,
                
            },
            success : function(data) {
                //alert(data.status);
                if(data.status == "1")
                {
                    if(data.type==1){
                        window.location=baseUrl+"/index.php/payment?prime=1";
                    }
                }
                else
                {
                    alert("Something Went wrong");
                }
            }
        });
    //alert('HI');
    
    //http://localhost/bdtax/index.php/payment
}