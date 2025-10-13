show_duration = 500;

$(document).ready(function(){
	$("#cht_btn").click(function() {
		$("#chat_window").toggle(300);
		if ( $('#cht_btn').text() == "Start Chat" ) {
			$('#cht_btn').text("Close Chat");
		}
		else {
			$('#cht_btn').text("Start Chat");
		}
		var h=0;
		$('div.posts').find('.post').each(function(k){
			h += $(this).outerHeight();
		});
		$('div.posts').scrollTop(h);

	});
});

function minimize_chat() {
		$("#chat_window").toggle(300);
		if ( $('#cht_btn').text() == "Start Chat" ) {
			$('#cht_btn').text("Close Chat");
		}
		else {
			$('#cht_btn').text("Start Chat");
		}
		$('#cht_btn').text("Start Chat");
		var h=0;
		$('div.posts').find('.post').each(function(k){
			h += $(this).outerHeight();
		});
		$('div.posts').scrollTop(h);

	};

function next_pre(id)
{
	window.location.href = "#"+id;
	$('#expenditure_tab a[href="#'+id+'"]').tab('show');
}

function hide_show(hide, show)
{
	$("#"+hide).hide(show_duration);
	$("#"+show).fadeIn(show_duration);
}

$(document).on('keydown', '.int_field', function(e){
    var key = e.charCode || e.keyCode || 0;
    // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
    return (key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105));
});

function removeOldMessage() {
	var base_url = $("#BASE_URL").val();

	bootbox.confirm("Do you really want to delete chat history?", function(result) {
  		if(result) {
				$.ajax({
			      url : base_url+"/index.php/dashboard/removeOldMessage",
			      type : "POST",
			      data : {
			        
			      },
			      success : function(data) {
			      	bootbox.alert("Successfully Deleted.", function() {
			      		location.reload(true);
          			}); 
			      },
			      error : function(XMLHttpRequest, textStatus, errorThrown) {
			        bootbox.alert("Internal problem has been occurred. Please try again.");
			      }
			    });
		}
	});
}