$(document).ready(function() {


});

function save_investment()
{
    
    $('#loading').css('display','block');

    $.ajax({
        url : asset_url+"saveInvesrments",
        type : "POST",
        dataType : "json",
        data :  $('form#investment_form').serialize(),
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
        },
        complete : function()
        {
            $('#loading').css('display','none');
        }
    });
}

function delete_invest_data(field) {
bootbox.confirm("Are you sure?", function(result) {
    if(result) {
        $('#loading').css('display','block');
        $.ajax({
            url : asset_url+"deleteInvestFieldData",
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

function save_asset_invest_fraction() {
    $('#loading').css('display','block');
    $.ajax({
        url : asset_url+"saveInvestFractionInfo",
        type : "POST",
        dataType : "json",
        cache : false,
        data : {
            AssetsId : $("#Assets_AssetsId").val(),
            Id : $("#investment_id").val(),
            InvestmentType : $("#investment_type").val(),
            Description : $("#investment_description").val(),
            Cost : $("#investment_cost").val()
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