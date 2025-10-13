$(document).ready(function() {

});

function save_outside_business() {

	$('#loading').css('display','block');
	$.ajax({
		url : asset_url+"saveOutsideBusiness",
		type : "POST",
		dataType : "json",
		cache : false,
		data : {
			AssetsId : $("#Assets_AssetsId").val(),
			OutsideBusinessCashInHandTotal : $("#Assets_OutsideBusinessCashInHandTotal").val(),
			OutsideBusinessCashAtBankTotal: $("#Assets_OutsideBusinessCashAtBankTotal").val(),
            OutsideBusinessFundTotal: $("#Assets_OutsideBusinessFundTotal").val(),
			OutsideBusinessOtherdepositsTotal: $("#Assets_OutsideBusinessOtherdepositsTotal").val()
		},
		success : function(data) {
			if(data.status == "success")
			{
				location.reload();
			}
			else
			{
				bootbox.alert(data.msg);
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			bootbox.alert("Internal problem has been occurred. Please try again.");
			location.reload();
		},
		complete : function()
		{
			$('#loading').css('display','none');
		}
	});
}

function delete_outside_business_data(field) {
bootbox.confirm("Are you sure?", function(result) {
    if(result) {
        $('#loading').css('display','block');
        $.ajax({
            url : asset_url+"deleteOutsideBusinessFieldData",
            type : "POST",
            dataType : "json",
            cache : false,
            data : {
                AssetsId : $("#Assets_AssetsId").val(),
                field : field
            },
            success : function(data) {
                location.reload();
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                location.reload();
            },
            complete : function()
            {
                $('#loading').css('display','none');
            }
        });
    }
});
}


function save_outside_business_fraction() {
    $('#loading').css('display','block');
    $.ajax({
        url : asset_url+"saveOursideBusinessFractionInfo",
        type : "POST",
        dataType : "json",
        cache : false,
        data : {
            AssetsId : $("#Assets_AssetsId").val(),
            Id : $("#outside_business_id").val(),
            OutsideBusinessType : $("#outside_business_type").val(),
            Description : $("#outside_business_description").val(),
            Cost : $("#outside_business_cost").val()
        },
        success : function(data) {
            if(data.status == "success")
            {
                location.reload();  
            }
            else
            {
                bootbox.alert(data.msg);
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            bootbox.alert("Internal problem has been occurred. Please try again.");
            $('#loading').css('display','none');
        },
        complete : function()
        {
            $('#loading').css('display','none');
        }
    });
}