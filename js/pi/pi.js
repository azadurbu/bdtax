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



	$('#etin_btn').click(function(e){

		var msg=pi_msg;
		var ETIN = $('#PersonalInformation_ETIN').val();

        if (ETIN!='') {

        	var CPIId = $('#CPIId').val();

        	var pUrl=pi_url+"etin";

        	submitFormSave('etin='+ETIN+'&CPIId='+CPIId, pUrl,'#PersonalInformation_ETIN_error');

        } else {

        	window.location.href = pi_url2 + "#PIDetails-1";

			//$(".flash_alert").html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+msg+'</div>').fadeIn();
			//$('.flash_alert').delay(5000).fadeOut("slow");
        } //ETIN CHECK

    });




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




	$('#PIDetails-1_btn').click(function(e){

		var fullName = $('#PersonalInformation_FullName').val();
		var dob = $('#PersonalInformation_DOB').val();
		var status = $('#Mstatus').val();
		var spouseName = $('#PersonalInformation_SpouseName').val();
		var spouseETIN = $('#PersonalInformation_SpouseETIN').val();
		var gender = $('#PersonalInformation_Gender:checked').val();
		var residentialStatus = $('#PersonalInformation_ResidentialStatus:checked').val();
		var AnyDisabledChild = $('#PersonalInformation_AnyDisabledChild:checked').val();
		var AvailChildDisabilityExemp = $('#PersonalInformation_AvailChildDisabilityExemp:checked').val();
		var NationalId = $('#PersonalInformation_NationalId').val();

		//alert(fullName);
		var details1_error = 0;

		if (fullName == '') {
			
			$('form #PIDetails-1 #PersonalInformation_Name_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_full_name+'</div>');

		} else {  $('form #PIDetails-1 #PersonalInformation_Name_error').html(''); details1_error++;	}

		if (dob == '') {
			// details1_error++;
			$('form #PIDetails-1 #PersonalInformation_dob_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_birth+'</div>');

		} else {  $('form #PIDetails-1 #PersonalInformation_dob_error').html(''); details1_error++;	}

		if (status == '') {
			// details1_error++;
			$('form #PIDetails-1 #PersonalInformation_status_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_marital+'</div>');

		} else {  $('form #PIDetails-1 #PersonalInformation_status_error').html(''); details1_error++;	}
var marital_condition_error=false;

		if (status == 'Married') {

			if (spouseName == '') {
				marital_condition_error=true;
				$('form #PIDetails-1 #PersonalInformation_spouseName_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_spouse+' </div>');

			} else {  $('form #PIDetails-1 #PersonalInformation_spouseName_error').html(''); marital_condition_error = false;	}


		} else {  $('form #PIDetails-1 #PersonalInformation_spouseName_error').html('');	}



		if ( (gender == undefined)||(gender == '')) {
			// details1_error++;
			$('form #PIDetails-1 #PersonalInformation_gender_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_gender+'</div>');

		} else {  $('form #PIDetails-1 #PersonalInformation_gender_error').html(''); details1_error++;	}


		if (residentialStatus == '') {
			// details1_error++;
			$('form #PIDetails-1 #PersonalInformation_residentialStatus_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>'+pi_msg_residential+'</div>');

		} else {  $('form #PIDetails-1 #PersonalInformation_residentialStatus_error').html(''); details1_error++;	}

		if ((details1_error==5) && (marital_condition_error==false)  ) {	

			var data = $('form #PDetails1').serialize();
			// alert(fullName);

			var CPIId = $('#CPIId').val();

			data = {
				CPIId: CPIId,
				fullName: fullName,
				dob: dob,
				status: status,
				spouseName: spouseName,
				spouseETIN: spouseETIN,
				AnyDisabledChild: AnyDisabledChild,
				AvailChildDisabilityExemp: AvailChildDisabilityExemp,
				gender: gender,
				residentialStatus: residentialStatus,
				NationalId: NationalId

			};

			var pUrl=pi_url+"PIDetails1";

			submitFormSave( data, pUrl,'#PersonalInformation_success1');


		}

	});



	$('#PIDetails-2_btn').click(function(e){
		
		var disability  = $('#PersonalInformation_Disability').val();
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

		// var GovernmentEmployee = $('#PersonalInformation_GovernmentEmployee').val();
		var GovernmentEmployee = $('#PersonalInformation_GovernmentEmployee:checked').val()

		var employeeType = $('#employeeType').val();

		var SC = Number($('#SC').val());

		var createAccount =  ( $("input[name=createAccount]:checked").val() == undefined ) ? "No" : "Yes";

		var details2_error = 0;

		// 1# Disability validation
		if ($("#PersonalInformation_Disability:checked").length == 0) {
			
			$('form #PIDetailsForm-2 #disability_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select the disability section</div>');
		} else {  $('form #PIDetailsForm-2 #disability_error').html(''); details2_error++;	}

		if ($("#PersonalInformation_FreedomFighter:checked").length == 0) {
			
			$('form #PIDetailsForm-2 #freedomFighter_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select the Freedom Fighter Section</div>');

		} else {  $('form #PIDetailsForm-2 #freedomFighter_error').html(''); details2_error++;	}

		if ($("#PersonalInformation_GovernmentEmployee:checked").length == 0) {
			
			$('form #PIDetailsForm-2 #govEmployee_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select the Government Employee Section</div>');

		} else {  $('form #PIDetailsForm-2 #govEmployee_error').html(''); details2_error++;	}

		if (areaOfResidence == '') {
			
			$('form #PIDetailsForm-2 #AreaOfResidence_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please Select the Area Of Residence</div>');

		} else {  $('form #PIDetailsForm-2 #AreaOfResidence_error').html(''); details2_error++; }

        var numericExpression = /^[0-9]+$/;

		if (taxesZone == '') {
			
			$('form #PIDetailsForm-2 #tax_zone_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter valid Tax Zone</div>');

		} else {  $('form #PIDetailsForm-2 #tax_zone_error').html(''); details2_error++;	}

	
		
		if (taxesCircle == '') {
			
			$('form #PIDetailsForm-2 #tax_zone_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter valid Tax Circle</div>');

		} else {  $('form #PIDetailsForm-2 #PersonalInformation_fathersName_error').html(''); details2_error++;	}



		if (division == '') {
			
			$('form #PIDetailsForm-2 #PersonalInformation_division_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please select division you belongs to.</div>');

		} else {  $('form #PIDetailsForm-2 #PersonalInformation_division_error').html(''); details2_error++;	}

		if (district == '') {
			
			$('form #PIDetailsForm-2 #PersonalInformation_district_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please select district you belongs to</div>');

		} else {  $('form #PIDetailsForm-2 #PersonalInformation_district_error').html(''); details2_error++;	}


//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//START---------------ADDRESS'S-------------------
//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
if (presentAddress == '') {
	
	$('form #PIDetailsForm-2 #PersonalInformation_presentAddress_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your Present Address</div>');

} else {  $('form #PIDetailsForm-2 #PersonalInformation_presentAddress_error').html(''); details2_error++;	}

var addressSame = false
if  ($('#PersonalInformation_AddressSame').prop("checked") == true ) {

	addressSame = false;
	$('form #PIDetailsForm-2 #PersonalInformation_permanentAddress_error').html('');

} else if(permanentAddress == '' ){

	addressSame = true;	
	$('form #PIDetailsForm-2 #PersonalInformation_permanentAddress_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your Permanent Address</div>');

} else  {
	$('form #PIDetailsForm-2 #PersonalInformation_permanentAddress_error').html(''); addressSame = false;	}

//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//END---------------ADDRESS'S-------------------
//#%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

//Email Address Verification
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var emailField = $('#PersonalInformation_Email').val();

		var emailInvalid = false;

        if (reg.test(emailField) == false && emailField!='') 
        {
            $('form #PIDetailsForm-2 #email_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter your valid email address</div>');
            emailInvalid = true;
        }else{
        	emailInvalid = false;
        }
//Email Address Verification
//Create Account Verification

if (createAccount == "Yes" && $('#PersonalInformation_Email').val() == "") {
	$('form #PIDetailsForm-2 #email_error').html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Please enter email address for creating account.</div>');
	return false;
}



//Create Account Verification - ends

var result ='';

var governmentEmployee=false;

var data = $('form #PIDetailsForm-2').serialize();		
var CPIId = $('#CPIId').val();
var pUrl=pi_url+"PIDetails2";

if (employeeType!='') {

	//if(employeeType=='N' && GovernmentEmployee=='Y' && SC>0) {
	if(employeeType != GovernmentEmployee && SC>0) {
		bootbox.confirm("As you made changes in employee type. So your all data entered in the salary income will be removed.<br />Are you agree to remove them? press OK if yes", function(result) {
			
			if(result === true) {		
				governmentEmployee = false;	
			} else {
				governmentEmployee = true;	
			}

			if ( (details2_error==9)&&(addressSame==false)&&(governmentEmployee==false)&&(emailInvalid==false) ) {
				submitFormSave( data, pUrl,'#PersonalInformation_details2_success');
			}

//------------------------------------
		}); 	
	} 
	else {
		if ( (details2_error==9)&&(addressSame==false)&&(governmentEmployee==false)&&(emailInvalid==false) ) {
			submitFormSave( data, pUrl,'#PersonalInformation_details2_success');
		}
	}
}
else {
	if ( (details2_error==9)&&(addressSame==false)&&(governmentEmployee==false)&&(emailInvalid==false) ) {
		submitFormSave( data, pUrl,'#PersonalInformation_details2_success');
	}
}




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
					
					if ( pUrl.match(/etin/gi) != null) {
						$("#knowMeTab,#aboutLifeTab").show();
						window.location.href = pi_url2 + "#PIDetails-1";
					}
					else if ( pUrl.match(/PIDetails1/gi) != null ) {
						
						window.location.href = pi_url2 + "#PIDetails-2";
					}
					else if ( pUrl.match(/PIDetails2/gi) != null ) {

						window.location.href = pi_url + "review";
					}

					$("#knowMeTab,#aboutLifeTab").show();
					$(".flash_alert").html(response.msg).fadeIn();
					$('.flash_alert').delay(5000).fadeOut("slow");
				} 
				else {
					$(".flash_alert").html(response.msg).fadeIn();
					$('.flash_alert').delay(5000).fadeOut("slow");
				}

						
						
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$(".flash_alert").html('<div class="alert alert-danger fade in"><a href="#" data-dismiss="alert" class="close">×</a><h5>Something went wrong, please try again.</div>').fadeIn();
				$('.flash_alert').delay(5000).fadeOut("slow");
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
