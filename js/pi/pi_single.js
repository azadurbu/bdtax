$(document).ready(function() {
	$('#PersonalInformation_DOB').datepicker({
        // format: 'mm/dd/yyyy',
        format: 'dd-mm-yyyy',
        autoclose: true,
        'endDate' : dateFormat(new Date(), "DD-MM-YYYY")
    }).on('changeDate', function() {
            // var datePattern = $('#sd').val();

        });

    if ( $("#PersonalInformation_ETIN").val() == "" ) {
    	//$("#knowMeTab,#aboutLifeTab").hide();
    }

    
});



	function addEtin(){

		var msg=pi_msg;
		var ETIN = $('#PersonalInformation_ETIN').val();

        if (ETIN=='') {

        	//alert(ETIN);
        	error_count++;
        	
			$('#PersonalInformation_ETIN_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg+'</div>');

	

        	//submitFormSave('etin='+ETIN+'&CPIId='+CPIId, pUrl,'#PersonalInformation_ETIN_error');

        }else{
        	 details2_error++;
        	 $('#PersonalInformation_ETIN_error').html('');

        }
    }

    




	$('#PersonalInformation_DivisionId').change(function(e){
		var pUrl=pi_url+"districtParent";
        submitFormSave2('id='+e.target.value, pUrl,'.district_area');

    });


	function submitFormSave2(formData, pUrl,VDiv)
	{
		$('#loading').css('display','block');

		$.ajax({
			url: pUrl,
			type: 'POST',
			data:formData,
			// dataType : "json",
			success: function(response){


				$(VDiv).html(response);

				if (VDiv!='#PersonalInformation_ETIN_error') {


				};					

			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				
			},
		}).success(function(){

			$('#loading').css('display','none');

		});
	}




	function addPersonalInformation(){

		var fullName = $('#PersonalInformation_FullName').val();
		
		var dob = $('#PersonalInformation_DOB').val();
		var status = $('#Mstatus').val();
		var spouseName = $('#PersonalInformation_SpouseName').val();
		var gender = $('#PersonalInformation_Gender:checked').val();
		var residentialStatus = $('#PersonalInformation_ResidentialStatus:checked').val();
		var NationalId = $('#PersonalInformation_NationalId').val();

		//alert(fullName);
		var details1_error = 0;
		
        
        /*if (NationalId == '') {
			error_count++;
			$('#PersonalInformation_NID_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_full_name+'</div>');

		} else {  $('#PersonalInformation_NID_error').html(''); details1_error++;	} */

		if (fullName == '') {
			error_count++;
			$('#PersonalInformation_Name_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_full_name+'</div>');

		} else {  $('#PersonalInformation_Name_error').html(''); details2_error++;	}

		if (dob == '') {
			error_count++;
			// details1_error++;
			$('#PersonalInformation_dob_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_birth+'</div>');

		} else {  $('#PersonalInformation_dob_error').html(''); details2_error++;	}

		if (status == '') {
			error_count++;
			// details1_error++;
			$('#PersonalInformation_status_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_marital+'</div>');

		} else {  $('#PersonalInformation_status_error').html(''); details2_error++;	}
var marital_condition_error=false;

		if (status == 'Married') {

			if (spouseName == '') {
				
				marital_condition_error=true;
				$('#PersonalInformation_spouseName_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_spouse+' </div>');

			} else {  $('#PersonalInformation_spouseName_error').html(''); marital_condition_error = false;	}


		} else {  $('#PersonalInformation_spouseName_error').html('');	}



		if ( (gender == undefined)||(gender == '')) {
			// details1_error++;
			$('#PersonalInformation_gender_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_gender+'</div>');

		} else {  $('#PersonalInformation_gender_error').html(''); details2_error++;	}


		if (residentialStatus == '') {
			error_count++;
			// details1_error++;
			$('#PersonalInformation_residentialStatus_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_residential+'</div>');

		} else {  $('#PersonalInformation_residentialStatus_error').html(''); details2_error++;	}

		if ((details1_error==5) && (marital_condition_error==false)  ) {	

			
			// alert(fullName);

			var CPIId = $('#CPIId').val();

			data = {
				CPIId: CPIId,
				fullName: fullName,
				dob: dob,
				status: status,
				spouseName: spouseName,
				gender: gender,
				residentialStatus: residentialStatus,
				NationalId: NationalId

			};

			var pUrl=pi_url+"PIDetails1";

			//submitFormSave( data, pUrl,'#PersonalInformation_success1');


		}

	}



	$('#PIDetails-2_btn_single').click(function(e){
		addPersonalInformation();
		addEtin();
		
		
		// var disability  = $("input:radio[name=theme]").val();
		var fathersName = $('#PersonalInformation_FathersName').val();
		var mothersName = $('#PersonalInformation_MothersName').val();
		
		var freedomFighter  = $('#PersonalInformation_FreedomFighter').val();
		var areaOfResidence  = $('#PersonalInformation_AreaOfResidence :checked').val();
		var division = $('#PersonalInformation_DivisionId').val();
		var district = $('#PersonalInformation_DistrictId').val();
		var presentAddress = $('#PersonalInformation_PresentAddress').val();
		var permanentAddress = $('#PersonalInformation_PermanentAddress').val();
		var addressSame = $('#PersonalInformation_AddressSame').val();
		//var taxZone = $('#TaxZoneCircleId').val();

		var taxesCircle = $('#PersonalInformation_TaxesCircle').val();
		var taxesZone = $('#PersonalInformation_TaxesZone').val();
		var personalMobile = $('#PersonalInformation_Contact').val();
		var GovernmentEmployee = $('#PersonalInformation_GovernmentEmployee:checked').val();
		//alert(personalMobile);
     
		

		var createAccount =  ( $("input[name=createAccount]:checked").val() == undefined ) ? "No" : "Yes";

		

		

		if (!GovernmentEmployee) {
			alert('HI');
			error_count++;
			$('#govEmployee_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select Government Employee Status</div>');

		} else {  $('#govEmployee_error').html(''); details2_error++; }

		if (areaOfResidence == '') {
			error_count++;
			$('#AreaOfResidence_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select the Area Of Residence</div>');

		} else {  $('#AreaOfResidence_error').html(''); details2_error++; }

        var numericExpression = /^[0-9]+$/;

		if (taxesZone == '') {
			error_count++;
			$('#tax_zone_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter valid Tax Zone</div>');

		} else {  $('#tax_zone_error').html(''); details2_error++;	}

	
		
		if (taxesCircle == '') {
			
			$('#tax_zone_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter valid Tax Circle</div>');

		} else {  $('#tax_zone_error').html(''); details2_error++;	}



		if (division == '') {
			
			$('#PersonalInformation_division_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please select division you belongs to.</div>');

		} else {  $('#PersonalInformation_division_error').html(''); details2_error++;	}

		if (district == '') {
			
			$('#PersonalInformation_district_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please select district you belongs to</div>');

		} else {  $('#PersonalInformation_district_error').html(''); details2_error++;	}


		//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		//START---------------ADDRESS'S-------------------
		//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
		
		if (personalMobile == '') {
			
			$('#mobile_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your Mobile Number</div>');

		} else {  $('#mobile_error').html(''); details2_error++;	}

		if (presentAddress == '') {
			
			$('#PersonalInformation_presentAddress_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your Present Address</div>');

		} else {  $('#PersonalInformation_presentAddress_error').html(''); details2_error++;	}

		var addressSame = false
		if  ($('#PersonalInformation_AddressSame').prop("checked") == true ) {

			addressSame = false;
			$('#PersonalInformation_permanentAddress_error').html('');

		} else if(permanentAddress == '' ){

			addressSame = true;	
			$('#PersonalInformation_permanentAddress_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your Permanent Address</div>');

		} else  {
			$('#PersonalInformation_permanentAddress_error').html(''); addressSame = false;	}

		


		var data = $('#personal-information-form').serialize();		
		var gender = $('#PersonalInformation_Gender:checked').val();
		var ads = $('#PersonalInformation_AddressSame:checked').val();
		
		var CPIId = $('#CPIId').val();
		var pUrl=pi_url+"singleProfile?gen="+gender+"&ads="+ads;

		//data.push('gender');
        //alert(details2_error);
		if ( (details2_error==14)&&(addressSame==false)) {
			submitFormSave( data, pUrl,'#PersonalInformation_details2_success');
			//alert(details2_error);
		}else{
			details2_error = 0;
		}

		

		//submitFormSave( data, pUrl,'#PersonalInformation_details2_success');




});



	function submitFormSave(formData, pUrl,VDiv)
	{
		$('#loading').css('display','block');

		$.ajax({
			url: pUrl,
			type: 'POST',
			data:formData,
			dataType : "json",
			success: function(response){
				//$(VDiv).html(response.msg);
					
				if (response.status == "success") {

					window.scrollTo(0, 0);
					
					$(".flash_alert").html(response.msg).fadeIn();
					$('.flash_alert').delay(2000).fadeOut("slow");
					window.location=incomeUrl;
				
					//location.reload();
				} 
				else {
					$(".flash_alert").html(response.msg).fadeIn();
					$('.flash_alert').delay(5000).fadeOut("slow");
				}

						
						
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$(".flash_alert").html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Something went wrong, please try again.</div>').fadeIn();
				$('.flash_alert').delay(5000).fadeOut("slow");
				location.reload();
			},
		}).success(function(){

			$('#loading').css('display','none');

		});
	}

function validate(e) {
	var element = document.getElementById(e);
	element.value = element.value.replace(/[^a-zA-Z\-\.\,\'\_\s]+/, '');
  
};

function exp_show_error_success(id, status, msg)
{
	if(status == "error")
		$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-danger fade in" style="margin-bottom:0px; padding: 0px 5px;" ><a href="#" data-dismiss="alert" class="close">x</a><h5>'+msg+'</div>');
	if(status == "success")
		$("div#"+id).find("div.income_error_success_msg").html('<div class="alert alert-success fade in" style="margin-bottom:0px; padding: 0px 5px;" ><a href="#" data-dismiss="alert" class="close">x</a><h5>'+msg+'</div>');

}

$(function(){
	$('div.product-chooser').not('.disabled').find('div.product-chooser-item').on('click', function(){
		$(this).parent().parent().find('div.product-chooser-item').removeClass('selected');
		$(this).addClass('selected');

	});
});




$('.product-chooser-item').on('click', function(){
	var title = $(this).data('title');
            

            if (title=='single') {

            	$('#Mstatus').prop('value', 'Single');
            	$('.marriedMessage').html('<div class="col-md-2"><i class="fa fa-check"></i></div><div class="col-md-10"><h1>Thanks for informing us</h1></div><div class="clearfix"></div>');

            	$('#spouseSection').removeClass('show');
            	$('#spouseSection').addClass('hide');

            	$('#PersonalInformation_SpouseName').val('');
            	$('#PersonalInformation_SpouseETIN').val('');



            } else if(title=='Married') {

            	$('#Mstatus').prop('value', 'Married');
            	$('.marriedMessage').html('<div class="col-md-2"><i class="fa fa-check"></i></div><div class="col-md-10"><h1>Thanks as we see you are married.</h1></div><div class="clearfix"></div>');

            	$('#spouseSection').removeClass('hide');
            	$('#spouseSection').addClass('show');

            };


        });


	$('#PersonalInformation_AddressSame').change(function(e){

            if($(this).prop("checked") == true){
            	$('#PermanentAddressBox').hide();
            	$('#PersonalInformation_PermanentAddress').val('');
            }

            else if($(this).prop("checked") == false){
            	$('#PermanentAddressBox').show();
            }


        });

	$('.AnyDisabledChild').change(function(e){

		console.log($(this).val());

            if($(this).val() == 'N'){
            	$('.sub_section').hide();
            	$('.sub_section').val('');
            }

            else if($(this).val() == 'Y'){
            	$('.sub_section').show();
            }
        });


	$('#etinBtn').on('click', function(){	$("#myTab li").removeClass("active"); $('#etinTab').addClass('active'); });
	$('#name_btn1').on('click', function(){	$("#myTab li").removeClass("active"); $('#nameTab').addClass('active'); });
	$('#name_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#etinTab').addClass('active'); });
	$('#knowMe_btn1').on('click', function(){	$("#myTab li").removeClass("active"); $('#knowMeTab').addClass('active'); });
	$('#knowMe_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#knowMeTab').addClass('active'); });
	$('#aboutLife_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#aboutLifeTab').addClass('active'); });

	$('#etinBtn-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#etinTab').addClass('active'); });
	$('#name_btn1-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#nameTab').addClass('active'); });
	$('#name_btn-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#nameTab').addClass('active'); });
	$('#knowMe_btn1-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#knowMeTab').addClass('active'); });
	$('#knowMe_btn-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#knowMeTab').addClass('active'); });
	$('#aboutLife_btn-2').on('click', function(){	$("#myTab li").removeClass("active"); $('#aboutLifeTab').addClass('active'); });

	$('#final_btn').on('click', function(){	$("#myTab li").removeClass("active"); $('#finalTab').addClass('active'); });


	function dateFormat(date, format) {
		format = format.replace("DD", (date.getDate() < 10 ? '0' : '') + date.getDate());
		format = format.replace("MM", (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1));
		format = format.replace("YYYY", date.getFullYear());
		return format;
	}


function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
